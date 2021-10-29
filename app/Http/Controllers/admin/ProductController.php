<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use Nette\Utils\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $limit = $request->limit ?? 10;

        $sql = Product::with('category')->select();

        if (isset($request->search_content) or isset($request->price_search_content) or isset($request->quantity_search_content)) {
            $data = $sql->where("name", "LIKE", "%$request->search_content%")
                ->where("price", "LIKE", "%$request->price_search_content%")
                ->where("quantity", "LIKE", "%$request->quantity_search_content%")
                ->paginate($limit);
        } else {
            $data = $sql->paginate($limit);
        }
        if ($request->ajax()) {
            return view('admin.product.productData',compact('data'));
        } else {
            return view('admin.product.manage',compact('data'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $categories = Category::select('id', 'root', 'name')->where('root', 0)->get();

        return view('admin.product.create', compact('brands', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:products',
            'brand' => 'required',
            'category' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'sku_code' => 'required',
        ]);

        try {
            $product = Product::create([
                'create_by' => Auth::id(),
                'name' => $request->name,
                'slug' => slugify($request->name),
                'brand_id' => $request->brand,
                'category_id' => $request->category,
                'model' => $request->model,
                'price' => $request->price,
                'offer_price' => $request->offer_price,
                'offer_date_start' => $request->offer_date_start,
                'offer_date_end' => $request->offer_date_end,
                'quantity' => $request->quantity,
                'sku_code' => $request->sku_code,
                'warranty' => $request->warranty,
                'warranty_duration' => $request->warranty_duration,
                'warranty_conditions' => $request->warranty_conditions,
                'description' => $request->description,
                'featured' => $request->featured,
                'status' => $request->status,
            ]);

            $product_img = $request->file('thumbnail')[0];
            $product_file_name = rand('00', '99') . uniqid() . '.' . $product_img->getClientOriginalExtension();
            Image::make($product_img)->resize(400, 400)->save(storage_path('app/public/products/' . $product_file_name));
            $product->thumbnail = $product_file_name;

            $images = $request->file('gallery');
            $file_names = [];
            foreach ($images as $row){
                $product_file_names = rand('00', '99') . uniqid() . '.' . $row->getClientOriginalExtension();
                Image::make($row)->resize(400, 400)->save(storage_path('app/public/products/' . $product_file_names));
                array_push($file_names, $product_file_names);
            }
            $product->gallery = $file_names;

            $product->save();

            $message = "Product has been Successfully Created!";

        } catch (Exception $e) {
            $status = false;
            $message = $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Mail\Customer\WelcomeMail;
use App\Models\Admin\Category;
use App\Models\Brand;
use App\Models\Customers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SiteController extends Controller
{
    public function index()
    {
        $categories = Category::select('id', 'root', 'name', 'slug', 'status')->where('root', 0)->get();
        $products = Product::all();

        $elec_cate = Category::where('id', 1)->where('status', Product::ACTIVE)->first();
        $elec_ids = [];
        foreach ($elec_cate->sub_cats as $item) {
            array_push($elec_ids, $item->id);
            if ($item->sub_cats->count() > 0){
                foreach ($item->sub_cats as $sub_items){
                    array_push($elec_ids, $sub_items->id);
                }
            }
        }
        $elec_product = Product::whereIn('category_id', $elec_ids)->get();

        $acce_cate = Category::where('id', 2)->where('status', Product::ACTIVE)->first();
        $acce_ids = [];
        foreach ($acce_cate->sub_cats as $item) {
            array_push($acce_ids, $item->id);
            if ($item->sub_cats->count() > 0){
                foreach ($item->sub_cats as $sub_items){
                    array_push($acce_ids, $sub_items->id);
                }
            }
        }
        $acce_product = Product::whereIn('category_id', $acce_ids)->get();

        return view('frontend.index', compact('categories', 'products', 'elec_cate', 'elec_product', 'acce_cate', 'acce_product'));
    }


    public function product($slug)
    {
        $categories = Category::select('id', 'root', 'name', 'slug', 'status')->where('root', 0)->get();
        $product = Product::where('slug', $slug)->where('status', Product::ACTIVE)->first();

        if ($product) {
            $related_product = Product::where('category_id', $product->category_id)->where('status', Product::ACTIVE)->take(10)->get();

            return view('frontend.single-product', compact('related_product', 'product', 'categories'));
        }

        return redirect()->route('index');
    }


    public function cat_products(Request $request, $slug1, $slug2 = null, $slug3 = null)
    {
        $categories = Category::with('products')->select('id', 'root', 'name', 'slug', 'status')->where('root', 0)->get();

        if ($slug3) {
            $category = Category::where('slug', $slug3)->where('status', 'active')->first();
            $cats[] = $category->id;
        } else {
            $category = Category::where('slug', $slug2)->where('status', 'active')->first();

            $cats = [$category->id];
            foreach ($category->sub_cats as $sub_cat) {
                array_push($cats, $sub_cat->id);
            }
        }

        $root_category = Category::where('id', $category->root)->first();

        $limit = $request->limit ?? 9;

        $sql = Product::with('category')->whereIn('category_id', $cats)->select();

        if (isset($request->sortby) or isset($request->filterCategorywise) or isset($request->filterBrandwise) or (isset($request->min) && isset($request->max))) {

            if (isset($request->min) && isset($request->max)){
                $sql->whereIn('price', [$request->min, $request->max]);
            }

            if (isset($request->filterCategorywise)) {
                $categories = explode(',', $request->filterCategorywise);
                $categoriesIds = [];

                foreach ($categories as $category) array_push($categoriesIds, $category);

                $sql->whereIn('category_id', $categoriesIds);

            }else{
                $data = $sql->paginate($limit);
            }

            if (isset($request->filterBrandwise)) {
                $brands = explode(',', $request->filterBrandwise);
                $brandsIds = [];

                foreach ($brands as $brand) array_push($brandsIds, $brand);

                $sql->whereIn('brand_id', $brandsIds);
            }

            if (isset($request->sortby)) {
                switch ($request->sortby) {
                    case 'price_h_to_l':
                        $data = $sql->orderBy('price', 'DESC')->paginate($limit);
                        break;

                    case 'price_l_to_h':
                        $data = $sql->orderBy('price')->paginate($limit);
                        break;

                    case 'latest':
                        $data = $sql->paginate($limit)->take(15);
                        break;

                    default:
                        $data = $sql->paginate($limit);
                        break;
                }
            } else {
                $data = $sql->paginate($limit);
            }
        }
        $data = $sql->paginate($limit);

        $brands = Brand::select('id', 'name', 'slug')->get();


        if ($request->ajax()) {
            return view('frontend.category.products', compact('data', 'category', 'root_category', 'categories', 'brands'));
        } else {
            return view('frontend.category.manage', compact('data', 'category', 'root_category', 'categories', 'brands'));
        }


    }
}

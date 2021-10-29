<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand.manage',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
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
            'name' => 'required|string|max:255|unique:categories',
            'status' => 'required'
        ]);

        try {
            $brand = Brand::create([
                'user_id' => Auth::id(),
                'name' => $request->name,
                'slug' => slugify($request->name),
                'icon' => $request->icon,
                'image' => $request->image,
                'status' => $request->status,
            ]);

            if ($request->file('icon')) {
                $category_icon = $request->file('icon');
                $category_icon_file_name = rand('00', '99') . uniqid() . '.' . $category_icon->getClientOriginalExtension();
                $category_icon->storeAs('brands', $category_icon_file_name);
                $brand->icon = $category_icon_file_name;
            }

            if ($request->file('image')) {
                $category_banner = $request->file('image');
                $category_banner_file_name = rand('00', '99') . uniqid() . '.' . $category_banner->getClientOriginalExtension();
                $category_banner->storeAs('brands', $category_banner_file_name);
                $brand->image = $category_banner_file_name;
            }

            $brand->save();

            $message = "Brand Successfully Created!";

        } catch (Exception $e) {
            $status = false;
            $message = $e->getMessage();

        }

        /*return response()->json([
            'status' => $status ?? true,
            'message' => $message,
            'data' => category_options($data)
        ]);*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

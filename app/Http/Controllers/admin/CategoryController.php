<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $data = Category::select('id', 'root', 'name', 'slug')->get();

        return view('admin.category.manage', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = Category::select('id', 'root', 'name', 'slug')->where('root', 0)->get();
        return view('admin.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories',
            'status' => 'required'
        ]);

        try {
            $category = Category::create([
                'create_by' => Auth::id(),
                'root' => $request->root,
                'name' => $request->name,
                'status' => $request->status,
                'slug' => slugify($request->name),
                'icon' => $request->icon,
                'banner' => $request->banner
            ]);

            if ($request->file('icon')) {
                $category_icon = $request->file('icon');
                $category_icon_file_name = rand('00', '99') . uniqid() . '.' . $category_icon->getClientOriginalExtension();
                $category_icon->storeAs('categories', $category_icon_file_name);
                $category->icon = $category_icon_file_name;
            }

            if ($request->file('banner')) {
                $category_banner = $request->file('banner');
                $category_banner_file_name = rand('00', '99') . uniqid() . '.' . $category_banner->getClientOriginalExtension();
                $category_banner->storeAs('categories', $category_banner_file_name);
                $category->banner = $category_banner_file_name;
            }

            $category->save();

            $message = "Category Successfully Created!";

        } catch (Exception $e) {
            $status = false;
            $message = $e->getMessage();

        }

        $data = Category::select('id', 'root', 'name', 'slug')->where('root', 0)->get();

        /*return response()->json([
            'status' => $status ?? true,
            'message' => $message,
            'data' => category_options($data)
        ]);*/
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Admin\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Admin\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Admin\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}

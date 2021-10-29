<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Exception;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user.manage', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed'],
            'status' => ['required']
        ]);
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'status' => $request->status,
            ]);

            $u_img       = $request->file('image');
            $u_file_name = rand('00', '99') . uniqid() . '.' . $u_img->getClientOriginalExtension();
            $u_img->storeAs('users/', $u_file_name);
            $user->image = $u_file_name;

            /*$u_cover_img       = $request->file('cover_image');
            $u_cover_file_name = rand('00', '99') . uniqid() . '.' . $u_cover_img->getClientOriginalExtension();
            $u_cover_img->storeAs('users/', $u_cover_file_name);
            $user->cover_image = $u_cover_file_name;
            $user->save();*/

            $message = "User Successfully Added";

        } catch (Exception $e) {
            $status  = false;
            $message = $e->getMessage();
        }


        return $message;
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
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user) {
            $user->delete();
            File::delete(public_path('storage/users/' . $user->image));
            $message = "User successfully deleted";
        } else {
            $status  = false;
            $message = "Fail";
        }

        return response()->json([
            'status' => $status ?? true,
            'message' => $message
        ]);
    }
}

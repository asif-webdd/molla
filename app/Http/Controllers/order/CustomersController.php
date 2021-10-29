<?php

namespace App\Http\Controllers\order;

use App\Http\Controllers\Controller;
use App\Mail\Customer\WelcomeMail;
use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Exception;
use Cart;
use Illuminate\Support\Facades\Session;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function get_customers(){
        $limit = $request->limit ?? 15;

        $customers = Customers::select('name', 'email', 'mobile', 'address')->paginate($limit);

        return view('admin.customers', compact('customers', 'limit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function registration_form()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function registration(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:customers',
            'mobile' => 'required|string|max:11',
        ]);

        try {
            $customer = Customers::create([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'password' => bcrypt($request->password),
            ]);

            set_message('success', 'Registration successfully. check your e-mail, we have sent verification mail.');

            $customer->update([
               'email_verified_token' => random_string(50)
            ]);

            Mail::to($customer->email)->send(new WelcomeMail($customer));

        }catch (Exception $e){
            set_message('danger', $e->getMessage());
        }

        return redirect()->route('index');
    }


    public function login(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        try {
            $customer = Customers::where('email', $request->username)->orWhere('mobile', $request->username)->first();

            if ($customer){
                if (password_verify($request->password, $customer->password)){
                    if ($customer->email_verified == 1){
                        session()->put('customer_id', $customer->id);
                        session()->put('customer_name', $customer->name);

                        if (Cart::isEmpty()){
                            return redirect()->route('index');
                        }else{
                            return redirect()->route('cart.index');
                        }

                    }else{
                        set_message('danger', 'Your account not verified.');
                    }
                }else{
                    set_message('danger', 'These credentials do not match our records.');
                }
            }else{
                set_message('danger', 'These credentials do not match our records.');
            }

        }catch (Exception $e){
            set_message('danger', $e->getMessage());
        }
    }


    public function verify($token){
        if($token){
            $customer = Customers::where('email_verified_token', $token)->first();
            if ($customer){
                $customer->update([
                    'email_verified' => 1,
                    'email_verified_at' => Carbon::now(),
                    'email_verified_token' => null
                ]);
            }
            set_message('success', 'Your account successfully activated!');

        }

        return redirect()->route('index');
    }


    public function logout(){
        session()->forget('customer_id');

        return redirect()->route('index');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function show(Customers $customers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function edit(Customers $customers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customers $customers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customers $customers)
    {
        //
    }
}

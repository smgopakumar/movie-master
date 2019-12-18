<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'mobile' => 'required|numeric||unique:users',
            'password' => 'required|min:6|confirmed',
//            'confirm_password' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $data['validation'] = $validator->messages();
            return Redirect::back()->withInput($request->all())->withErrors(['errors' =>  $validator->errors()->first(),'login_status' => 400]);

        } else {

            $data = $request->all();
            $data['user_type_id'] = 2;
            $data['password'] = Hash::make($request->password);

            $user = User::create($data);

            if($user){
                return redirect('/login');
            }else{
                return Redirect::back()->withInput($request->all())->withErrors(['message' => 'Error!! Try Again','login_status' => 400]);
            }
        }

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

    public function loginPage()
    {
        return view('login');
    }
    public function registerPage()
    {
        return view('register');

    }

    public function userLogin(Request $request)
    {
        $rules = array(
            'email' => 'required|email',
            'password' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return Redirect::back()->withInput($request->all())->withErrors(['message' => $validator->errors()->first(),'login_status' => 400]);
        } else {

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1, 'user_type_id' => 1]))
            {
                return redirect()->route('/admin/dashboard');
//                return redirect()->action('Admin\HomeController');
            }
            elseif(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1, 'user_type_id' => 2]))
            {
                return redirect()->route('/home');
            } else
            {
                return Redirect::back()->withInput($request->all())->withErrors(['message' =>  'User not available or Account not activated','login_status' => 400]);
            }
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }




}

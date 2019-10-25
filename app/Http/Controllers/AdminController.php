<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePassword;
use App\Http\Requests\SignUp;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('view.pages.sigup');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SignUp $request)
    {
        $account = $request->except('_token');
        User::create($account);

        return redirect()->route('signup.index')->with('success', 'Đăng ký thành công');
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

    public function showLogin()
    {
        if (Auth::check()) {
            return redirect('dashboard/product');
        } else
            return view('view.pages.customlogin');
    }

    public function Login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if (Auth::attempt(['email' => $email, 'password' => $password, 'role_id' => '2'])) {
            return redirect()->route('home');
        } elseif (Auth::attempt(['email' => $email, 'password' => $password, 'role_id' => '1'])) {
            return redirect()->route('dashboard.showproduct');
        } else {
            return back()->with('thongbao', 'Tài khoản hoặc mật khẩu sai');
        }
    }

    public function Logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }

    public function showProfile()
    {
        $userInfo = Auth::user();

        return view('view.pages.custome', compact('userInfo'));
    }

    public function showEditProfile()
    {
        $userInfo = Auth::user();

        return view('view.pages.edit_profile', compact('userInfo'));
    }

    public function editProfile(Request $request, $id)
    {
        $user = $request->except('_token');
        DB::table('users')->where('id', $id)
                                ->update($user);

        return back()->with('thongbao', 'Sửa thông tin thành công');
    }

    public function showEditPassword()
    {
        $user = Auth::user();

        return view('view.pages.edit_password', compact('user'));
    }

    public function editPassword(ChangePassword $request, $id)
    {
        $oldPassword = $request->input('password');
        $newPassword = $request->input('newpassword');
        $hashedPassword = Auth::user()->password;

        if ( Hash::check($oldPassword, $hashedPassword)) {

             DB::table('users')->where('id', $id)
                                ->update(['password' => Hash::make($newPassword)]);

            return back()->with('thongbao', 'Thay đổi mật khẩu thành công');
        } else {

            return back()->with('thongbao1', 'Mật khẩu cũ không đúng');
        }


    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function getLogin(){
        if(Auth::guard('admin')->check())
            return redirect()->intended('admin/home/index.html');
        return view('admin.login');
    }
    public function postLogin(Request $request){
        if(Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ])){
            return redirect()->intended('admin/home/index.html');
        }
        return redirect('admin/login.html')->with('thongbao','Đăng nhập không thành công')->withInput();
    }
    public function getLogout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login.html');
    }
    //hiển thị thông tin admin
    public function view(){
        $admin = Admin::all();
        return view('admin.admin.view',compact('admin'));
    }
    //hiển thị form sửa thông tin admin
    public function edit($id){
        $admin = Admin::find($id);
        if(!$admin) return view('admin.product.error');
        return view('admin.admin.edit',compact('admin'));
    }
    //xử lý sửa thông tin admin
    public function postEdit($id,Request $request){
        $admin = Admin::find($id);
        $admin->user_name = $request->user_name;
        $admin->email = $request->email;
        if($request->password!='')
            $admin->password = bcrypt($request->password);
        $admin->save();
        return redirect('admin/admin/edit/'.$id.'.html')->with('thongbao', 'Chỉnh sửa thông tin admin thành công');
    }
}

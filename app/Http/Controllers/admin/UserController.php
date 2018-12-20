<?php

namespace App\Http\Controllers\admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //hiển thị danh sách sản phẩm
    public function view(){
        $user = User::where('id','<>',0);
        $total = count($user->get());
        $user = $user->paginate(5);
        return view('admin.user.view',[
            'user' => $user,
            'total' => $total
        ]);
    }
    //hiển thị form thông tin sản phẩm
    public function add(){
        return view('admin.user.add');
    }
    //xử lý thêm thông tin sản phẩm
    public function postAdd(Request $request){
        $user = new User();
        $user->full_name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect('admin/user/view.html')->with('thongbao','Thêm khách hàng mới thành công');
    }
    //kiểm tra email tồn tại hay chưa
    public function checkEmail(Request $request){
        if(count(User::where('email',$request->email)
                ->where('email','<>',$request->email_old)
                ->get())>0){
            return json_encode(FALSE);
        }
        return json_encode(TRUE);
    }
    //hiển thị form sửa thông tin sản phẩm
    public function edit($id){
        $user = user::find($id);
        if(!$user) return view('admin.product.error');
        return view('admin.user.edit',compact('user'));
    }
    //xử lý sửa thông tin sản phẩm
    public function postEdit($id,Request $request){
        $user = User::find($id);
        $user->full_name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->address = $request->address;
        if($request->password!='')
            $user->password = bcrypt($request->password);
        $user->save();
        return redirect('admin/user/edit/'.$id.'.html')->with('thongbao', 'Chỉnh sửa thông tin khách hàng thành công');
    }
    //xóa sản phẩm
    public function delete($id){
        $user = user::find($id);
        if(!$user) return view('admin.product.error');
        $user->delete();
        return redirect('admin/user/view.html')->with('thongbao','Xóa khách hàng thành công');
    }
    //xóa nhiều khách hàng
    public function deleteMultiple(Request $request){
        foreach ($request->allVals as $row){
            $user = User::find($row);
            if(!$user) return response()->json('fail');
            $user->delete();
        }
        return response()->json('ok');
    }
}

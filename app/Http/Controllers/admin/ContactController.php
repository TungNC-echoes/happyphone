<?php

namespace App\Http\Controllers\admin;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    //
    public function view(){
        $contact = DB::table('contact')->join('users','id_user','users.id')
            ->selectRaw('users.full_name as name,contact.*')->get();
        return view('admin.contact.view',compact('contact'));
    }
    //
    public function delete($id){
        $contact = Contact::find($id);
        if(!$contact) return view('admin.product.error');
        $contact->delete();
        return redirect('admin/contact/view.html')->with('thongbao','Xóa phản hồi thành công');
    }
    //xóa nhiều phản hồi
    public function deleteMultiple(Request $request){
        foreach ($request->allVals as $row){
            $contact = Contact::find($row);
            if(!$contact) return response()->json('fail');
            $contact->delete();
        }
        return response()->json('ok');
    }
}

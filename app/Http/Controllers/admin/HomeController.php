<?php
/**
 * Created by PhpStorm.
 * User: quangha
 * Date: 2/10/2018
 * Time: 10:33 PM
 */

namespace App\Http\Controllers\admin;

use App\Contact;
use App\Http\Controllers\Controller;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $tran = DB::table('bills')->join('users','bills.id_customer','users.id')
            ->selectRaw('users.full_name as name,bills.*')
            ->orderByRaw('bills.date_order desc')->take(10)->get();
        $total_tran = count($tran);
        $total_product = count(Product::all());
        $total_comment = count(Contact::all());
        $total_user = count(User::all());
        return view('admin.home.index',[
            'total_tran' => $total_tran,
            'total_product' => $total_product,
            'total_user' => $total_user,
            'total_comment' => $total_comment,
            'tran' => $tran
        ]);
    }

}
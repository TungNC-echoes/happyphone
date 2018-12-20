<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class CartController extends Controller
{
    //add to cart
    public function add($id,$value){
        if(!Auth::check())
            return null;
        $product = Product::find($id);
        Cart::add(array('id' => $id, 'name' => $product->name, 'qty' => $value, 'price' => $product->unit_price,'option'=>$product->image));
        $cart = Cart::content();
        foreach ($cart as $row){
            $image = Product::find($row->id)->image;
            $c[] = array('rowId' => $row->rowId,'id' => $row->id,'name' => $row->name,'price' => number_format($row->price,0),'qty' => $row->qty,'image' => $image);
        }
        $result = array($c,count($cart),Cart::subtotal());
        return $result;
//        echo '<div class="beta-select"><i class="fa fa-shopping-cart"></i>Giỏ hàng ('.Cart::count().')'.'
//                <i class="fa fa-chevron-down"></i></div>'.'
//                 <div class="beta-dropdown cart-body" style="width: 380px">'.'
//               <div style="height: 310px;overflow: auto;">';
//        foreach ($cart as $row) {
//            $image = Product::find($row->id)->image;
//        echo '<div class="cart-item">'.'
//            <div class="media col-sm-10">'.'
//            <a class="pull-left" href="#" style="width: 70px;"><img src="http://localhost/websitebanhang/public/source/image/product/'.$image.'" height="70px"></a>'.'
//            <div class="media-body">'.'
//                <span class="cart-item-title">'.$row->name.'</span>'.'
//                <span class="cart-item-amount">'.$row->price.'</span>'.'
//                <input type="number" value="1" min="1" style="width: 40px">'.'
//                </div></div>'.'
//                <a class="col-sm-2" href="#" style="margin-top: 15px"><img src="http://localhost/websitebanhang/public/source/image/delete.png"></a>'.'
//            <div class="clearfix"></div></div>';
//
//     }
//     echo '</div><div class="cart-caption">
//              <div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">$34.55</span></div>
//                   <div class="clearfix"></div>
//                    <div class="center">
//                        <div class="space10">&nbsp;</div>
//                            <a href="checkout.html" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
//                            </div>
//                        </div>
//                    </div>
//           </div> <!-- .cart -->';
    }
    public function index(){
        $cart = Cart::content();
        if(count($cart)==0){
            return array(0,0,0);
        }
        $c = array();
        foreach ($cart as $row){
            $image = Product::find($row->id)->image;
            $c[] = array('rowId' => $row->rowId,'id' => $row->id,'name' => $row->name,'price' => number_format($row->price,0),'qty' => $row->qty,'image' => $image);
        }
        $result = array($c,count($cart),Cart::subtotal());
        return $result;
    }
    public function delete($rowId){
        Cart::remove($rowId);
//        $cart = Cart::content();
//        $c = array();
//        foreach ($cart as $row){
//            $image = Product::find($row->id)->image;
//            $c[] = array('rowId' => $row->rowId,'id' => $row->id,'name' => $row->name,'price' => $row->price,'qty' => $row->qty,'image' => $image);
//        }
//        $result = array($c,count($cart),Cart::subtotal());
//        return $result;
        $result = array(count(Cart::content()),Cart::subtotal());
        return $result;
    }
    public function update($rowId,$value){
//        $cart = Cart::content();
//        foreach ($cart as $row){
//            if($id == $row->id){
//                $rowId = $row->rowId;
//                break;
//            }
//        }
        Cart::update($rowId,$value);
        $tien =0;
        $cart = Cart::content();
        foreach ($cart as $row){
            if($rowId == $row->rowId){
                $tien = ($row->price)*$value;
                break;
            }
        }
        $result = array($value,Cart::subtotal(),$tien);
        return $result;
    }
}

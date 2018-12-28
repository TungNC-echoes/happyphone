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
        if (!empty($product['promotion_price'])) {
            $price = $product->promotion_price;
        } else {
            $price = $product->unit_price;
        }
        Cart::add(array('id' => $id, 'name' => $product->name, 'qty' => $value, 'price' => $price,'option'=>$product->image));
        $cart = Cart::content();
        foreach ($cart as $row){
            $image = Product::find($row->id)->image;
            $c[] = array('rowId' => $row->rowId,'id' => $row->id,'name' => $row->name,'price' => number_format($row->price,0),'qty' => $row->qty,'image' => $image);
        }
        $result = array($c,count($cart),Cart::subtotal());
        return $result;
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
        $result = array(count(Cart::content()),Cart::subtotal());
        return $result;
    }
    public function update($rowId,$value){
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

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Builder;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Redis;
use PhpParser\Node\Stmt\Return_;

class HomeController extends Controller
{
    public function index(){
        if(Auth::id()){
            return redirect('redirect');
        }else
        $data=product::all();
        $data2=builder::all();
        return view("home",compact("data","data2" ));
    }

    public function addcart(Request $request, $id){
        if(Auth::id()){
            $user_id=Auth::id();
            $productid=$id;
            $quantity=$request->quantity;
            $cart=new cart();
            $cart->user_id=$user_id;
            $cart->product_id=$productid;
            $cart->quantity=$quantity;
            $cart -> save();
            return redirect()->back();
        } else {
            return redirect('/login');
        }
    }

    public function showcart(Request $request,$id){
        $count=cart::where('user_id', $id)->count();
        if(Auth::id()==$id){
            $data2=cart::select('*')->where('user_id', '=', $id)->get();
            $data = cart::where('user_id', $id)->join('products', 'carts.product_id', '=', 'products.id')->get();
            return view('showcart', compact('count', 'data', 'data2'));
        }else{
            return redirect()->back();
        }
    }

    public function remove($id){
        $data=cart::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function orderconfirm(Request $request){
        foreach($request->productname as $key => $productname){
            $data=new order;
            $data->productname=$productname;
            $data->price=$request->price[$key];
            $data->quantity=$request->quantity[$key];
            $data->name=$request->name;
            $data->phone=$request->phone;
            $data->address=$request->address;
            $data->save();
        } return redirect()->back();
    } 

    public function redirect(){
        $data = product::all();
        $data2 = builder::all();
        $usertype = Auth::user()->usertype;
        if($usertype=='1'){
            return view('admin.admin');
        } else {
            $user_id=Auth::id();
            $count=cart::where('user_id', $user_id)->count();
            return view('home',compact('data','data2','count'));
        }
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Product;
use App\Models\Builder;
use App\Models\Reservation;
use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function user(){
        $data=user::all();
        return view("admin.users", compact("data"));
    }
    public function deleteuser($id){
        $data=user::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function deleteproducts($id){
        $data=product::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function updateproducts($id){
        $data=product::find($id);
        return view("admin.updateproducts", compact("data"));
    }
    public function update(Request $request, $id){
        $data=product::find($id);
        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('productimage',$imagename);
        $data->image = $imagename;
        $data->title=$request->title;
        $data->price=$request->price;
        $data->description=$request->description;
        $data->save();
        return redirect()->back();
    }
    public function product(){
        $data=product::all();
        return view("admin.product", compact("data"));
    }
    public function uploadproduct(Request $request){
       $data = new product;
       $image = $request->image;
       $imagename = time().'.'.$image->getClientOriginalExtension();
       $request->image->move('productimage',$imagename);
       $data->image = $imagename;
       $data->title=$request->title;
       $data->price=$request->price;
       $data->description=$request->description;
       $data->save();
       return redirect()->back();
    }
    public function reservation(Request $request){
        $data = new reservation;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->guest=$request->guest;
        $data->date=$request->date;
        $data->time=$request->time;
        $data->message=$request->message;
        $data->save();
        return redirect()->back();
     }
    public function viewreservation(){
        if(Auth::id()){
        $data=reservation::all();
        return view("admin.adminreservation", compact("data"));
        }else{
            return redirect('login');
        }
    }
    public function viewbuilder(){
        $data=builder::all();
        return view("admin.adminbuilder",compact("data"));
    }
    public function uploadbuilder(Request $request){
        $data = new builder;
        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('builderimage',$imagename);
        $data->image = $imagename;
        $data->name=$request->name;
        $data->specialty=$request->specialty;
        $data->save();
        return redirect()->back();
    }
    public function updatebuilder($id){
        $data=builder::find($id);
        return view("admin.updatebuilder", compact("data"));
    }
    public function updatepcbuilder(Request $request, $id){
        $data=builder::find($id);
        $image = $request->image;
            if($image){
                $imagename = time().'.'.$image->getClientOriginalExtension();
                $request->image->move('builderimage',$imagename);
                $data->image = $imagename;
            }
        $data->name=$request->name;
        $data->specialty=$request->specialty;
        $data->save();
        return redirect()->back();
    }
    public function orders(){
        $data=order::all();
        return view('admin.orders', compact('data'));
    }
    public function deletebuilder($id){
        $data=builder::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function search(Request $request){
        $search=$request->search;
        $data=order::where('name','Like','%'.$search.'%')->orWhere('productname','Like','%'.$search.'%')->get();
        return view('admin.orders', compact('data'));
    }
 }


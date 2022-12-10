<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Food;
use App\Models\User;
use App\Models\Reservation;
use App\Models\Foodchef;
use App\Models\Cart;
use App\Models\Order;

use Illuminate\Database\Eloquent\Model;



class HomeController extends Controller
{
    public function index()
    {
        return view ('home');
    }

    public function redirects()
    {
        $data=food::all();
        $viewchef=foodchef::all();
        $usertype=Auth::user()->usertype;
        if($usertype=="1"){
            return view ("admin.adminhome");
        }
        else{

            $user_id=Auth::id();
            $count=cart::where('user_id',$user_id)->count();
            return view('home', compact('data','viewchef','count'));
        }
    }
    public function addcart(Request $request, $id)
    {
        if (Auth::id())
        {

            $user_id=Auth::id();
            $foodid=$id;
            $cart=new cart;
            $cart->user_id=$user_id;
            $cart->food_id=$foodid;
            $cart->qty=$request->qty;
            $cart->save();
            return redirect()->back();
        }
        else
        {
            return redirect('/login');
        }
    }
    public function showcart(request $request, $id)
    {
        $user=user::find(Auth::id());

        $name=$user->name;
        $phone=$user->phone;
        $address=$user->address;


        $count=cart::where('user_id',$id)->count();
        $data2=cart::select('*')->where('user_id', '=', $id)->get();
        $data=cart::where('user_id',$id)->join('food','carts.food_id', '=' , 'food.id')->get();

        return view('showcart', compact('user','count','data','data2'));
    }


    public function deletecart($id)
    {
        $item=cart::find($id);
        $item->delete();
        return redirect()->back();

    }
    public function orderconfirm(Request $request)
    {
        foreach($request->foodname as $key=>$foodname)
        {
            $data = new order;
            $data->foodname=$foodname;
            $data->price=$request->price[$key];
            $data->qty=$request->qty[$key];
            $data->name=$request->name;
            $data->phone=$request->phone;
            $data->address=$request->address;
            $data->save();
        }
        return redirect()->back()->with('message', 'Order Request Successful. We will contact with you soon.');

    }


}

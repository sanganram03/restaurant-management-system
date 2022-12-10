<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Food;
use App\Models\Foodchef;
use App\Models\Reservation;
use App\Models\Order;
use Notification;



class AdminController extends Controller
{

    public function users()
    {
        $data=user::all();
        return view("admin.users",compact("data"));
    }


    public function approved($id)
    {
        $data=User::find($id);
        $data->usertype='1';
        $data->save();
        return redirect()->back();

    }
    public function remove($id)
    {
        $data=User::find($id);
        $data->usertype='0';
        $data->save();
        return redirect()->back();

    }
    public function delete($id)
    {
        $data=User::find($id);
        $data->Delete();
        return redirect()->back();

    }
    public function foods()
    {
        $data=food::all();
        return view('admin.foods',compact("data"));

    }
    public function deletefood($id)
    {
        $data=food::find($id);
        $data->Delete();
        return redirect()->back();

    }
    public function upload(Request $request)
    {
        {
            $food=new food;
            $image=$request->file('image');
            $ext= $image->getClientOriginalExtension();
            $imagename=time().'.'.$ext;
                    $destinationPath = public_path('/foodimage');
            $image->move($destinationPath,$imagename);
            $food->image=$imagename;
            $food->title=$request->title;
            $food->price=$request->price;
            $food->description=$request->description;


            $food->save();

            return redirect()->back()->with('message', 'food Added Successfully');

        }
    }
    public function foodchefs()
    {
        $data=foodchef::all();
        return view('admin.chef',compact("data"));
    }
    public function reservation(Request $request)
    {
        {
            $reservation=new reservation;

                $reservation->name=$request->name;
                $reservation->email=$request->email;
                $reservation->phone=$request->phone;
                $reservation->guest=$request->guest;
                $reservation->date=$request->date;
                $reservation->time=$request->time;
                $reservation->message=$request->message;


                $reservation->save();

            return redirect()->back()->with('message', 'Reservation Added Successfully');

        }
    }
    public function viewreservation()
    {
        $reservation=reservation::all();
        return view('admin.viewreservation',compact("reservation"));

    }

    public function approvreserve($id)
    {
        $data=reservation::find($id);
        $data->status='Approved';
        $data->save();
        return redirect()->back();

    }
        public function rejectreserve($id)
    {
        $data=reservation::find($id);
        $data->status='Reject';
        $data->save();
        return redirect()->back();

    }
    public function reservestatus($id)
    {
        return view('admin.statusreserv');
    }


    public function addfoodchefs(Request $request)
    {
        {
            $foodchefs=new foodchef;
            $image=$request->file('image');
            $ext= $image->getClientOriginalExtension();
            $imagename=time().'.'.$ext;
                    $destinationPath = public_path('/foodchefsimage');
            $image->move($destinationPath,$imagename);
            $foodchefs->name=$request->name;
            $foodchefs->image=$imagename;
            $foodchefs->speciality=$request->speciality;
            $foodchefs->fb=$request->fb;
            $foodchefs->tweeter=$request->tweeter;
            $foodchefs->insta=$request->insta;


            $foodchefs->save();

            return redirect()->back()->with('message', 'Chef Added Successfully');

        }
    }
    public function deletechefs($id)
    {
        $chef=foodchef::find($id);
        $chef->Delete();
        return redirect()->back();
    }
    public function vieworder()
    {
        $data=order::all();
        return view('admin.vieworder',compact("data"));
    }

}

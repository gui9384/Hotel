<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RoomType;
use App\Models\Room;
use App\Models\BookArea;
use Carbon\Carbon;
class RoomTypeController extends Controller
{
    public function RoomTypeList(){
        $allData = RoomType::orderby('id','desc')->get();
        return view('backend.allroom.roomtype.view_roomtype', compact('allData'));
       }
    public function AddRoomType(){
        return view('backend.allroom.roomtype.add_roomtype');
    }public function RoomTypeStore(Request $request){
       $roomtype_id=  RoomType::insertGetId([
            'name' => $request->name,
            'created_at' => Carbon::now(),
        ]);
        Room::insert([
            'roomtype_id' =>$roomtype_id,
        ]);
        $notification = array(
            'message' => 'Roomtype Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('room.type.list')->with($notification);
    }

    }

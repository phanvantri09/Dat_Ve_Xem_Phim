<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Location;
use App\Http\Requests\addroom;
class RoomController extends Controller
{
    public function list(){
        $data = Room::all();
        return view('admin.room.list',compact('data'));
    }
    public function add(){
        return view('admin.room.add');
    }
    public function postAdd(addroom $request){
        $amount = $request->amount;
        $data = new Room();
        $data->name = $request->name;
        $data->amount = $request->amount;
        $data->save();
        $id = $data->id;
        for ($key=0; $key < $amount ; $key++) { 
            $loca = new Location;
            $loca->id_room = $id;
            if($key+1<=10){
                $loca->name = 'A'.$key+1;
            }
            if($key+1<=20 && $key+1>10){
                $loca->name = 'B'.$key+1;
            }
            if($key+1<=30 && $key+1>20){
                $loca->name = 'C'.$key+1;
            }
            if($key+1<=40 && $key+1>30){
                $loca->name = 'D'.$key+1;
            }
            if($key+1<=50 && $key+1>40){
                $loca->name = 'E'.$key+1;
            }
            if($key+1<=60 && $key+1>50){
                $loca->name = 'F'.$key+1;
            }
            if($key+1<=70 && $key+1>60){
                $loca->name = 'G'.$key+1;
            }
            if($key+1>70){
                $loca->name = 'H'.$key+1;
            }
            $loca->save();
        }
        return redirect()->route('list.room')->with('thongbao','Thêm thành công');
    }
    public function edit($id){
        $data = Room::find($id);
        return view('admin.room.editt',compact(['data','id']));
    }
    public function postEdit(addroom $request){
        $amount = $request->amount;
        $loca = Location::where('id_room', '=',$request->id)->get();
        $key = count($loca);
        //dd($count);
        if($request->amount > $key)
        {
            for ($key; $key < $amount ; $key++) { 
                $loca = new Location;
                $loca->id_room = $request->id;
                if($key+1<=10){
                    $loca->name = 'A'.$key+1;
                }
                if($key+1<=20 && $key+1>10){
                    $loca->name = 'B'.$key+1;
                }
                if($key+1<=30 && $key+1>20){
                    $loca->name = 'C'.$key+1;
                }
                if($key+1<=40 && $key+1>30){
                    $loca->name = 'D'.$key+1;
                }
                if($key+1<=50 && $key+1>40){
                    $loca->name = 'E'.$key+1;
                }
                if($key+1<=60 && $key+1>50){
                    $loca->name = 'F'.$key+1;
                }
                if($key+1<=70 && $key+1>60){
                    $loca->name = 'G'.$key+1;
                }
                if($key+1>70){
                    $loca->name = 'H'.$key+1;
                }
                $loca->save();
            }
        }
        else{
            for ($amount ;$amount < $key ; $amount++) { 
                $id = $loca[$amount]->id;
                $lo = Location::find($id);
                $lo->delete();
            }
        }
        $id =$request->id;
        $data = new Room;
        $data = Room::find($id);
        $data->amount = $request->amount;
        $data->name = $request->name;
        $data->save();
        return redirect()->route('list.room')->with('thongbao','Sửa thành công');
    }
    public function delete($id)
    {
    	$data = Room::find($id);
    	$data->delete();
    	return redirect()->route('list.room')->with('thongbao','Xóa thành công');
    }
}

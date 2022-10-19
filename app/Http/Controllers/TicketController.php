<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Location;
use App\Models\State;

use App\Models\Ticket;

use App\Http\Requests\addticket;

use App\Http\Requests\editticket;
class TicketController extends Controller
{
    public function list(){
        $data1 = Room::all();
        $data = Ticket::all();
        return view('admin.ticket.list',compact(['data','data1']));
    }
    public function add(){
        $data = Room::all();
        return view('admin.ticket.add',compact(['data']));
    }
    public function postAdd(addticket $request){
        // xử lí state
        $room = new Room;
        $room = $room->find($request->id_room);
        $amount = $room->amount;
        $data = new Ticket();
        if($request->has('img'))
        {
            $img1 = $request->img;
            $extension = $request->img->extension();
            $img1Name = time().'-ticket.'.$extension;
            $img1->move(public_path('imgUploads'), $img1Name);
            $request->img = $img1Name;
            $data->img = $request->img;
        }
        $data->id_room = $request->id_room;
        $data->price = $request->price;
        $data->content = $request->content;
        $data->name_film = $request->name_film;
        $data->link = $request->link;
        $data->time = $request->time;
        $data->save();
        $id_ticket = $data->id;
        for ($key=0; $key < $amount ; $key++) { 
            $loca = new State;
            $loca->id_room = $room->id;
            $loca->id_ticket = $id_ticket;
            $loca->state = 0;
            $loca->save();
        }
        return redirect()->route('list.ticket')->with('thongbao','Thêm thành công');
    }
    public function edit($id){
        $data1 = Room::all();
        $data = Ticket::find($id);
        return view('admin.ticket.edit',compact(['data','id','data1']));
    }
    public function postEdit(editticket $request){
        $id_ticket = $request->id_ticket;
        if($request->id_room != $request->id_room_old){
            // xóa state id_room, id_ticket
            $state = State::where('id_room','=',$request->id_room_old)->where('id_ticket','=',$request->id_ticket)->delete();
            //đổi room tạo mới state 
            $room = new Room;
            $room = $room->find($request->id_room);
            $amount = $room->amount;
            for ($key=0; $key < $amount ; $key++) { 
                $loca = new State;
                $loca->id_room = $room->id;
                $loca->id_ticket = $id_ticket;
                $loca->state = 0;
                $loca->save();
            }
        }
        
        $data = Ticket::find($id_ticket);
        if($request->has('img'))
        {
            $img1 = $request->img;
            $extension = $request->img->extension();
            $img1Name = time().'-ticket.'.$extension;
            $img1->move(public_path('imgUploads'), $img1Name);
            $request->img = $img1Name;
            $data->img = $request->img;
        }
        $data->id_room = $request->id_room;
        $data->price = $request->price;
        $data->content = $request->content;
        $data->name_film = $request->name_film;
        $data->link = $request->link;
        if(!empty($request->time)){
            $data->time = $request->time;
        }
        $data->save();
        return redirect()->route('list.ticket')->with('thongbao','Sửa thành công');
    }
    public function delete($id)
    {
        $state = State::where('id_ticket','=',$id)->delete();
    	$data = Ticket::find($id);

    	$data->delete();
    	return redirect()->route('list.ticket')->with('thongbao','Xóa thành công');
    }
    public function check($id){
        $data= State::find($id);
        $data->state = 2;
        $data->save();
        return redirect()->back()->with('thongbao','Thành công');
    }
    public function change($id){
        $data= State::find($id);
        $data->state = 1;
        $data->save();
        return redirect()->back()->with('thongbao','Thành công');
    }
    public function stateticket($id){
        $ticket = Ticket::find($id);
        $room = Room::find($ticket->id_room);
        $location = Location::where('id_room','=',$room->id)->get();
        $amount = $room->amount;
        $lo_f = $location[0]->id;

        $state = State::where('id_ticket','=',$ticket->id)->get();
        $st_f = $state[0]->id;

        return view('admin.ticket.location',compact(['amount','lo_f','st_f','state','location','room','ticket']));
    }

}



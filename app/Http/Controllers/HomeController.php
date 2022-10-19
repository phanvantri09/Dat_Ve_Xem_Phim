<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\User;

use App\Models\Location;
use App\Models\State;
use Illuminate\Support\Facades\Auth;
use App\Models\Ticket;
use App\Models\Book;
use App\Http\Requests\addbook; 

class HomeController extends Controller
{
    public function index(){
        $ticket = Ticket::all();
        return view('home.content.home', compact(['ticket']));
    }
    public function listticket(){
        $ticket = Ticket::limit(10)->get();
        return view('home.content.listticket', compact(['ticket']));
    }
    public function search(Request $request){
        $key = $request->key;
        $ticket = Ticket::where('name_film','like','%'.$key.'%')->orWhere('content','like','%'.$key.'%')->orWhere('time','like','%'.$key.'%')->get();
        return view('home.content.listticket', compact(['ticket']));
    }
    public function ticket($id){
        $ticket = Ticket::find($id);
        return view('home.content.ticket', compact(['ticket']));
    }
    public function join(){
        return view('home.content.join');
    }
    public function contact(){
        return view('home.content.contact');
    }
    public function checkout(){
        $id = Auth::user()->id;
        $data = Book::where('id_user','=',$id)->get();
        
        if(isset($data[0])){
            $id_ticket = $data[0]->id_ticket;
            $tk = Ticket::find($id_ticket);
            $id_room = $tk->id_room;
            $roomm = Room::find($id_room);
            $amount = $roomm->amount;
            $state = State::where('id_room','=',$id_room)->where('id_ticket','=',$id_ticket)->get();
            $loca = Location::where('id_room','=',$id_room)->get();
            $id_lo_f = $loca[0]->id;
            $id_sta_f = $state[0]->id;


            $ticket = Ticket::all();
            $room = Room::all();
            $location = Location::all();
            // $loca = explode(',',$data->location);
        
            return view('home.content.checkout', compact(['data','ticket','room', 'location','id_lo_f','id_sta_f']));
        }
        $nulll = 0;
        return view('home.content.checkout', compact(['nulll']));
    }
    public function book($id){
        
        $ticket = Ticket::find($id);
        $room = Room::find($ticket->id_room);
        $location = Location::where('id_room','=',$room->id)->get();
        $state = State::where('id_room','=',$room->id)->where('id_ticket','=',$ticket->id)->get();
        return view('home.content.book', compact(['ticket','room','location','state']));
    }
    public function postbook(addbook $request){
        $id_ticket = $request->id_ticket;
        $tickett = Ticket::find($id_ticket);
        $id_user = Auth::user()->id;
        $dataa = Book::where('id_user','=',$id_user)->where('id_ticket','=',$id_ticket)->get();
        if(isset($dataa[0])){
            return redirect()->back()->with('thongbao','Đã đặt vé rồi');
        }
        $data = new Book;
        $data->id_user = $id_user;
        $data->id_ticket = $id_ticket;
        $data->location = implode(',', $request->location);
        $data->numberphone = $request->numberphone;
        $data->save();
        $locatiom = $request->location;
        //có room có ticket phải chuyển trạng thái lại. chỉ láy dc id room láy dc id_location 
        foreach ($locatiom as $key => $lo) {
            $location = State::find($lo);
            $location->state = 1;
            $location->save();
        }
        return redirect()->route('home')->with('thongbao','book oke');
    }
}

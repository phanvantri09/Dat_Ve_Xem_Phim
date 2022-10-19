<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\login;
use App\Http\Requests\register;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{


    public function login(){
        return view('login');
    }
    public function register(){
        return view('register');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
    public function postlogin(login $request){
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            $user = User::where(["email" => $request->email])->first();
            $level = $user->level;
            Auth::login($user);
            if($level == 1){
                return redirect()->route('list.room')->with('thongbao','Đăng nhập admin thành công');
            }
            elseif($level == 0){
                return redirect()->route('home')->with('thongbao','Đăng nhập trang chủ thành công');
            }
        }
        else
        {
            return redirect()->route('login')->with('thongbao','Đăng nhập không thành công' );
        }
    }
    public function postregister(register $request){
        //dd($request->all());
        $users = new User();
        $users->name= $request->name;
    	$users->email= $request->email;
    	$users->password= bcrypt($request->password);
    	$users->level= 0;
    	$users->save();
    	return redirect()->route('login')->with('thongbao','Đăng kí thành công');
    
    }
    public function list(){
        $data = User::all();
        return view('admin.user.list',compact('data'));
    }
    public function add(){
        return view('admin.user.add');
    }
    public function postAdd(register $request){
        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password= bcrypt($request->password);
        $data->level = $request->level;
        $data->save();
        return redirect()->route('list.user')->with('thongbao','Thêm thành công');
    }
    public function edit($id){
        $data = User::find($id);
        return view('admin.user.edit',compact(['data','id']));
    }
    public function postEdit(register $request){
        $id =$request->id;
        $data = new User;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        if(!empty($request->password))
        {
            $data->password= bcrypt($request->password);
        }
        $data->level = $request->level;
        $data->save();
        return redirect()->route('list.user')->with('thongbao','Sửa thành công');
    }
    public function delete($id)
    {
    	$data = User::find($id);
    	$data->delete();
    	return redirect()->route('list.user')->with('thongbao','Xóa thành công');
    }
}

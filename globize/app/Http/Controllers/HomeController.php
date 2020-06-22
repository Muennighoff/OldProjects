<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;


class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\  
     */
    public function index() {
        $userId = Auth::id();
        $userName = Auth::user()->name;
        $latitude = Auth::user()->lat;
        $longitude = Auth::user()->lng;
        $nameList = DB::select('SELECT users.name, users.lat, users.lng FROM users, friends WHERE (users.id = friends.user_id1 AND friends.user_id2 = :user_id1) OR (users.id = friends.user_id2 AND friends.user_id1 = :user_id2)', ['user_id1' => $userId, 'user_id2' => $userId]);
        return view('home', ['friends' => json_decode(json_encode($nameList), true), 'currentUser' => $userName, 'latitude' => $latitude, 'longitude' => $longitude]);
    }

    public function location() {
        $userId = Auth::id();
        return view('location', ['currentUser' => $userId]);
    }
    
    public function search(Request $request){
        if($request->ajax()){
            $query = $request->get('query');
            if($query != ''){
                $data = DB::table('users')
                ->where('email', 'like', '%'.$query.'%')
                ->get();
            }
            $total_row = $data->count();
            $user_data = array(
                'table_data' => $data,
                'total_data' => $total_row
            );
            echo json_encode($user_data);
        }
    }

    public function friend_request(Request $request){
        if($request->ajax()){
            $id = $request->get('id');
            if($id != ''){
                $receipter_id = $id;
                $user = Auth::user();
                $requester_id = $user->id;
                
                DB::table('friends')->insert(
                    ['user_id1' => $requester_id, 'user_id2' => $receipter_id]
                );
            }
        }
    }

    public function invite_to_group(Request $request){
        if($request->ajax()){
            $id = $request->get('id');
            if($id != ''){
                $receipter_id = $id;
                $user = Auth::user();
                $requester_id = $user->id;
                $group = DB::table('group')
                ->where('creater_id', '=', $requester_id)
                ->get();
                $group_id=$group[0]->id;
                DB::table('friends')->where([
                    ['user_id1', '=', $requester_id],
                    ['user_id2', '=', $receipter_id]
                 ])->update(
                    ['group_id' => $group_id]
                );
            }
        }
    }

    public function create_group(Request $request){
        if($request->ajax()){
            $group_name = $request->get('group_name');
            if($group_name != ''){
                $user = Auth::user();
                $creater_id = $user->id;
                
                DB::table('group')->insert(
                    ['group_name' => $group_name, 'creater_id' => $creater_id]
                );
            }
            $creater_friends=DB::table('friends')
            ->where('user_id1','=', $creater_id)
            ->get();
            $friends = DB::select('SELECT users.* FROM users, friends WHERE (users.id = friends.user_id1 AND friends.user_id2 = :user_id1) OR (users.id = friends.user_id2 AND friends.user_id1 = :user_id2)', ['user_id1' => $creater_id, 'user_id2' => $creater_id]);
            echo json_encode($friends);
        }
    }
}


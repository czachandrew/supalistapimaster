<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserList;
use Log;

class UserListController extends Controller
{
    //

    public function create(Request $request){
        $data = $request->all();
        $list = UserList::create($data);
        if(array_key_exists('items', $data)){
            //add the items
            
            
        }
        $list->refresh();
        $list->items;
        return $list;
    }

    public function load(UserList $list){
        $list->load('items'); 
        return $list; 
    }

    public function list(){
        Log::info("We are getting a list of stuff ");
        $lists = UserList::all();

        Log::info($lists);
        return $lists->load('associatedItems')->toJson();
    }

    public function delete(UserList $list){
        $list->delete();
        return ["success" => 'List deleted'];
    }


}

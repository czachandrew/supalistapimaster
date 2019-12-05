<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\UserList;

class ListItem extends Model
{
    //id, title, description, user_id, complete, list_id
    protected $guarded = [];

    // protected $with = ['listIds'];

    protected $appends = ['listIds'];

    public function owner(){
        return $this->belongsTo('App\User');
    }

    public function list(){
        return $this->belongsTo('App\UserList', 'list_id');
    }

    public function lists(){
        return $this->belongsToMany('App\UserList','item_list','item_id','list_id');
    }

    public function getListIdsAttribute(){
        return $this->lists->pluck('id');
    }

    public function addToList(UserList $list){
        $this->lists()->attach($list);
    }

    public function scopeActive($query){
        return $query->where('complete', 0);
    }

    public function complete(){
        $this->complete = 1; 
        //delete all the associated records
        $this->save();
        return $this;
    }
}

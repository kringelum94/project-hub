<?php

namespace App;

use App\Activity;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    public function path(){
        return "/projects/{$this->id}";
    }
    public function creator(){
        return $this->belongsTo(User::class);
    }

    public function tasklists(){
        return $this->hasMany(Tasklist::class);
    }

    public function addTasklist($name){
        return $this->tasklists()->create(compact('name'));
    }

    public function recordActivity($description){
        $this->activity()->create(compact('description'));
    }

    public function activity(){
        return $this->hasMany(Activity::class);
    }
}

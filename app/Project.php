<?php

namespace App;

use App\Activity;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use RecordsActivity;

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

    public function invite(User $user){
        return $this->members()->attach($user);
    }

    public function members(){
        return $this->belongsToMany(User::class, 'project_members')->withTimestamps();
    }
}

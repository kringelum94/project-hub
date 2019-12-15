<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasklist extends Model
{
    use RecordsActivity;

    protected $guarded = [];

    protected $touches = ['project'];

    public function tasks(){
        return $this->hasMany(Task::class);
    }

    public function addTask($attributes){
        return $this->tasks()->create($attributes);
    }

    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function path(){
        return "/projects/{$this->project->id}/tasks/{$this->id}";
    }
}


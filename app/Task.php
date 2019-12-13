<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];

    protected $touches = ['tasklist'];

    public function tasklist(){
        return $this->belongsTo(Tasklist::class);
    }

    public function complete(){
        $this->update(['completed' => true]);
        $this->tasklist->project->recordActivity('completed_task');
    }

    public function incomplete(){
        $this->update(['completed' => false]);
        $this->tasklist->project->recordActivity('incompleted_task');
    }
}

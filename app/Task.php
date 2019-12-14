<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use RecordsActivity;

    protected $guarded = [];

    protected static $recordableEvents = ['created', 'deleted'];

    protected $touches = ['tasklist'];

    public function tasklist(){
        return $this->belongsTo(Tasklist::class);
    }

    public function complete(){
        $this->update(['completed' => true]);
        $this->recordActivity('completed_task');
    }

    public function incomplete(){
        $this->update(['completed' => false]);
        $this->recordActivity('incompleted_task');
    }
}

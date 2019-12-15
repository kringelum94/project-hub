<?php

namespace App;
use Illuminate\Support\Arr;

trait RecordsActivity
{
    public $oldAttributes = [];

    public static function bootRecordsActivity(){
        foreach(self::recordableEvents() as $event){
            static::$event(function ($model) use ($event){
                $model->recordActivity($model->activityDescription($event));
            });
            if($event === 'updated'){
                static::updating(function ($model){
                    $model->oldAttributes = $model->getOriginal();
                });
            }
        }
    }

    protected function activityDescription($description){
        return "{$description}_" . strtolower(class_basename($this));
    }

    /**
     * Record activity for a model
     * 
     * @param string $description
     */
    public function recordActivity($description){
        if(class_basename($this) === 'Project'){
            $id = $this->id;
        } else if(class_basename($this) === 'Task'){
            $id = $this->tasklist->project_id;
        } else if(class_basename($this) === 'Tasklist'){
            $id = $this->project_id;
        }
        $this->activity()->create([
            'user_id' => $this->activityOwner()->id,
            'description' => $description,
            'changes' => $this->activityChanges(),
            'project_id' => $id
        ]);
    }

    protected function activityOwner(){
        if(auth()->check()){
            return auth()->user();
        }

        if(class_basename($this) === 'Project'){
            return $this->creator;
        }

        return $this->project->creator;
    }

    public function activity(){
        return $this->morphMany(Activity::class, 'subject')->latest();
    }

    /**
     * Record activity changes for a project
     * 
     */
    public function activityChanges(){
        if($this->wasChanged()) {
            return [
                'before' => Arr::except(array_diff($this->oldAttributes, $this->getAttributes()), 'updated_at'),
                'after' => Arr::except($this->getChanges(), 'updated_at')
            ];
        }
    }

    protected static function recordableEvents(){
        if(isset(static::$recordableEvents)){
            return static::$recordableEvents;
        }
        return ['created', 'updated'];
    }
}
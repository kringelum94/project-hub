{{ auth()->user() == $activity->user ? 'You' : $activity->user->username }} updated the task: "{{isset($activity->subject->description) ? $activity->subject->description : 'DELETED' }}"

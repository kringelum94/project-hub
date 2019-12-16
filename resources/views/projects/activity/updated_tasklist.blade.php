{{ auth()->user() == $activity->user ? 'You' : $activity->user->username }} updated the list: "{{isset($activity->subject->description) ? $activity->subject->description : 'DELETED' }}"

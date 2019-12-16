@if(count($activity->changes['after']) == 1)
    {{ auth()->user() == $activity->user ? 'You' : $activity->user->username }} updated the {{ key($activity->changes['after']) }} of the project
@else
{{ auth()->user() == $activity->user ? 'You' : $activity->user->username }} updated the title and description of the project
@endif
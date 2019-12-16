<div class="mb-4">
    <h5 class="text-green font-medium">Latest activity</h5>
    @foreach ($project->activity->take(10) as $activity)
        <p class="text-grey font-medium">
            @include ("projects.activity.{$activity->description}") -
            <span class="text-green text-sm">{{ $activity->created_at->diffForHumans() }}</span>
        </p>
    @endforeach
</div>
    <div class="box relative" style="height: 250px">
        <h2 class="title"><a href="{{$project->path()}}">{{ Str::limit($project->title, 25) }}<span class="box-link"></span></a></h2>
        <div class="text-grey text-lg font-medium">{{ wordwrap(Str::limit($project->description, 100), 35, "\n", true) }}</div>
    </div>
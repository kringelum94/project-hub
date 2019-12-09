    <div class="box" style="height: 200px">
        <h3 class="font-bold text-green text-2xl mb-4"><a href=" {{$project->path()}} ">{{ $project->title }}</a></h3>
        <div class="text-grey text-lg font-medium">{{ Str::limit($project->description, 150) }}</div>
    </div>
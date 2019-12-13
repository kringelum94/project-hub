@extends('layouts.app')

@section('content')
    <header class="flex justify-between items-center w-full mb-3 py-4">
            <div class="flex items-center">
                <p class="text-grey no-underline text-lg font-bold">
                <a href="/projects">My projects</a> / <a href="{{ $project->path() }}">{{ $project->title }}</a> / Tasks
                </p>
                <span class="mx-6 text-grey no-underline text-lg font-medium">|</span>
                <a href="{{ $project->path() }}/tasks/create" class="button">Add list</a>
            </div>
            <div>
                <a href="{{ $project->path() }}" class="back-link flex items-center">Go back</a>
            </div>
    </header>

    <h2 class="title-big">Tasks</h2>

    @forelse ($project->tasklists as $tasklist)
    <div class="box mb-6">
        <table class="table-fixed w-full -mt-4">
            <thead class="border-b-2 border-grey">
                <tr>
                <th class="pr-4 py-2 flex items-center w-8/12"><h2 class="text-green font-bold text-2xl mr-4">{{ $tasklist->name }}</h2>
                <a href="{{ $project->path() }}/tasks/{{ $tasklist->id }}/create"><i class="fas fa-plus text-xl text-grey mr-4"></i></a>
                <i class="fas fa-pen text-lg text-grey mr-4"></i>
                <i class="fas fa-trash text-lg text-grey mr-4"></i></th>
                <th class="px-4 py-2 w-1/12"></th>
                <th class="px-4 py-2 text-center w-1/12 text-md text-grey font-medium">Member</th>
                <th class="px-4 py-2 text-center w-1/12 text-md text-grey font-medium">Priority</th>
                <th class="px-4 py-2 text-center w-1/12 text-md text-grey font-medium">Due date</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tasklist->tasks as $task)
                    <tr class="border-b-2 border-grey {{ $task->completed ? 'opacity-50' : '' }}">
                    <td class="pl-3 pr-4 py-2 flex items-center">
                        <form method="POST" action="{{ $project->path() . '/task/' . $task->id }}">
                            @method('PATCH')
                            @csrf
                            <input type="checkbox" name="completed" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                        </form>
                        <span class="text-lg text-grey font-medium ml-2">{{ $task->description }}</span>
                    </td>
                        <td class="px-4 py-2">
                            <i class="fas fa-pen text-lg text-grey mr-4"></i>
                            <i class="fas fa-trash text-lg text-grey ml-4"></i>
                        </td>
                        <td class="px-4 py-2 text-center"><i class="fas fa-user-circle text-lg text-grey"></i></td>
                        <td class="px-4 py-2 text-center text-lg text-grey font-medium">--</td>
                        <td class="px-4 py-2 text-center text-lg text-grey font-medium">--</td>
                    </tr>
                @empty
                    <tr class="border-b-2 border-grey">
                        <td class="pl-3 pr-4 py-2"><span class="text-lg text-grey font-medium ml-2">No tasks yet. Click the "+" button to add one</span></td>
                        <td class="pl-3 pr-4 py-2"></td>
                        <td class="pl-3 pr-4 py-2"></td>
                        <td class="pl-3 pr-4 py-2"></td>
                        <td class="pl-3 pr-4 py-2"></td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @empty
    <div class="grey-text font-bold text-lg">No tasklists yet. Click the "Add list" button to get started.</div>
    @endforelse

@endsection
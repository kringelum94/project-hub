@extends('layouts.app')
@section('content')

{{-- {{ dd($project->members->find(Auth::user)) }} --}}

<group-chat :project="{{ $project }}" :key="{{ $project->id }}"></group-chat>

@endsection
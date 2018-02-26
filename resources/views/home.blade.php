@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <p>You are logged in!</p>
                        @include('projects/_createProjectsModel')
                        <div class="row">
                            @if($projects->count() > 0)
                                @foreach($projects as $project)
                                    <div class="col-sm-6 col-md-3">
                                        <div class="thumbnail">
                                            @if($project->thumbnail)
                                                <img src="{{ asset('thumbnail/'.$project->thumbnail) }}" alt="...">
                                            @else
                                                <img src="{{ asset('thumbnail/default.jpg') }}" alt="{{ $project->name }}">
                                            @endif
                                            <div class="caption">
                                                <h5 class="text-center">{{ $project->name }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
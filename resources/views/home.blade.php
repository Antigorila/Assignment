@extends('layouts.app')

@section('content')

<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<div class="nav-side-menu">
    <div class="brand"><h3>Categories</h3></div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
    <div class="menu-list">
        @foreach (\App\Models\Category::all() as $category)
        <li data-toggle="collapse" data-target="#{{ $category->id }}" class="collapsed">
            <a href="#"><i class="fa fa-book fa-lg"></i> {{ $category->category_name }} <span class="arrow"></span></a>
        </li>
        <ul class="sub-menu collapse" id="{{ $category->id }}">
            @foreach ($category->tasks as $task)
            <form action="{{ route('tasks.show', $task) }}" method="GET">
                    <li><button type="submit" class="btn taskButton"><p class="feher">{{ $task->assignment_title }}</p></button></li>
            </form>
            @endforeach
        </ul>
        @endforeach
        @if (Auth::user()->rank === "teacher")
        <li data-toggle="collapse" data-target="#new" class="collapsed">
            <a href="#"><i class="fa fa-plus fa-lg"></i> Add new <span class="arrow"></span></a>
        </li>
        <ul class="sub-menu collapse" id="new">
            <form action="{{ route('categories.create') }}" method="GET">
                <li><button type="submit" class="btn taskButton"><p class="feher">Add new category</p></button></li>
            </form>
            <form action="{{ route('tasks.create') }}" method="GET">
                <li><button type="submit" class="btn taskButton"><p class="feher">Add new task</p></button></li>
            </form>
        </ul>
        @endif
    </div>
</div>


@endsection

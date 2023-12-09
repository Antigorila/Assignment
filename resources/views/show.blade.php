@include('home')

<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ $task->assignment_title }}</h4>     
            <p class="card-text">{{ $task->assignment }}</p>
        </div>
    </div>
</div>

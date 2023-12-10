@include('home')

<div class="container text-center">
    <div class="card">
        <div class="card-body">
            <div class="container text-center">
                <h3 class="text-center card-title">Add new task</h3>
            </div>
            <br/>
            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf
                <div class="container text-center">
                    <p>Select category: </p>
                    <select name="category_id" id="category_id">
                        @foreach (\App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="form-group text-center">
                    <label for="assignment_title">Assignment title</label>
                    <input type="text" class="form-control" id="assignment_title" placeholder="Enter title" name="assignment_title">
                </div>
                <br>
                <div class="form-group text-center">
                    <label for="description">Assignment description</label>
                    <input type="text" class="form-control" placeholder="Enter description" id="description" name="description">
                </div>
                <br>
                <div class="form-group text-center">
                    <label for="assignment">Assignment</label>
                    <input class="form-control" type="text" placeholder="Enter task" id="assignment" name="assignment">
                    <p><i>Place one or more '_' where you want to have a missing part. This will also say the lenght of it</i></p>
                </div>
                <br>
                <div class="form-group text-center">
                    <label for="answer">Answer</label>
                    <input class="form-control" type="text" placeholder="Enter answer" id="answer" name="answer">
                </div>
                <br>
                <div class="container text-center">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
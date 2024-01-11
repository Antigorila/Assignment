@include('home')
<div class="container" align="center">
    <div class="card-kerd">
        <div class="card-body">
            <div>
                <h3 class="card-title" style="text-align: center;">Add new task</h3>
            </div>
            <br/>
            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf
                <div>
                    <p style="text-align: center;">Select category: </p>
                    <select name="category_id" id="category_id">
                        @foreach (\App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <label for="assignment_title" style="text-align: center;">Assignment title</label>
                    <input type="text" class="form-control" id="assignment_title" placeholder="Enter title" name="assignment_title">
                </div>
                <br>
                <div class="form-group">
                    <label for="description" style="text-align: center;">Assignment description</label>
                    <input type="text" class="form-control" placeholder="Enter description" id="description" name="description">
                </div>
                <br>
                <div class="form-group">
                    <label for="assignment" style="text-align: center;">Assignment</label>
                    <input class="form-control" type="text" placeholder="Enter task" id="assignment" name="assignment">
                    <p style="text-align: center;"><i>Place one or more '_' where you want to have a missing part. This will also say the lenght of it</i></p>
                </div>
                <br>
                <div class="form-group">
                    <label for="answer" style="text-align: center;">Answer</label>
                    <input class="form-control" type="text" placeholder="Enter answer" id="answer" name="answer">
                </div>
                <br>
                <div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('home')
<div class="container" align="center">
    <div class="card-kerd">
        <div class="card-body">
            <h3 class="text-center card-title">Add new category</h3>
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="categoryName" style="text-align: center;">Category Name:</label>
                    <input type="text" class="form-control" id="categoryName" name="category_name">
                </div>
                <button type="submit" class="btn btn-primary">Add Category</button>
            </form>
        </div>
    </div>
</div>

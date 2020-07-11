<a href="{{ route('admin.categories.show', $model->id) }}" class="btn btn-info">Show</a>
<a href="{{ route('admin.categories.edit', $model->id) }}" class="btn btn-dark">Edit</a>
<button type="button" class="btn btn-danger delete"
    data-url="{{ route('admin.categories.destroy', $model->id) }}">Delete</button>

<a href="{{ route('admin.users.show', $model->id) }}" class="btn btn-info">Show</a>
<a href="{{ route('admin.users.edit', $model->id) }}" class="btn btn-dark">Edit</a>
<button type="button" class="btn btn-danger delete"
    data-url="{{ route('admin.users.destroy', $model->id) }}">Delete</button>

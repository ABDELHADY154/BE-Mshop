<a href="{{ route('admin.clients.show', $model->id) }}" class="btn btn-info">Show</a>
<a href="{{ route('admin.clients.edit', $model->id) }}" class="btn btn-dark">Edit</a>
<button type="button" class="btn btn-danger delete"
    data-url="{{ route('admin.clients.destroy', $model->id) }}">Delete</button>

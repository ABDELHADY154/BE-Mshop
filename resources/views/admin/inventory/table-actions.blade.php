<a href="{{ route('admin.inventories.show', $model->id) }}" class="btn btn-info">Show</a>
<a href="{{ route('admin.inventories.edit', $model->id) }}" class="btn btn-dark">Edit</a>
<button type="button" class="btn btn-danger delete"
    data-url="{{ route('admin.inventories.destroy', $model->id) }}">Delete</button>

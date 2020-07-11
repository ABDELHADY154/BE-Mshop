<a href="{{ route('admin.orders.show', $model->id) }}" class="btn btn-info">Show</a>
<a href="{{ route('admin.orders.edit', $model->id) }}" class="btn btn-dark">Edit</a>
<button type="button" class="btn btn-danger delete"
    data-url="{{ route('admin.orders.destroy', $model->id) }}">Delete</button>

<a href="{{ route('admin.products.show', $model->id) }}" class="btn btn-info">Show</a>
<a href="{{ route('admin.products.edit', $model->id) }}" class="btn btn-dark">Edit</a>
<button type="button" class="btn btn-danger delete"
    data-url="{{ route('admin.products.destroy', $model->id) }}">Delete</button>

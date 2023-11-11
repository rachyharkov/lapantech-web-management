<td>
    <a href="{{ route('admin.posts.edit', $model->id) }}" class="btn btn-primary btn-sm">Edit</a>
    <form action="{{ route('admin.posts.destroy', $model->id) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
    </form>
</td>

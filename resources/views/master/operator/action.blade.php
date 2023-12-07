<div class="d-flex">
    <a href="{{ route('operator.edit', $id) }}" class="ml-2 btn btn-warning"><span class="fas fa-edit"></span></a>

    <form class="inline-block" action="{{ route('operator.destroy', $id) }}" method="POST">
        @csrf
        @method("delete")

        <button class="ml-2 btn btn-danger"><span class="fas fa-trash"></span></button>
    </form>
</div>
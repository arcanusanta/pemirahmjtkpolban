<div class="d-flex">
    <form class="inline-block" action="{{ route('voter.study-program.destroy', $id) }}" method="POST">
        @csrf
        @method("delete")

        <button class="ml-2 btn btn-danger"><span class="fas fa-trash"></span></button>
    </form>
</div>
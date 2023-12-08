@canany(['Study Program Delete'])
    <div class="d-flex">
        @can('Study Program Delete')
            <form class="inline-block" action="{{ route('study-program.destroy', $id) }}" method="POST">
                @csrf
                @method("delete")

                <button class="ml-2 btn btn-danger"><span class="fas fa-trash"></span></button>
            </form>
        @endcan
    </div>
@endcanany
@canany(['Grade Delete'])
    <div class="d-flex">
        @can('Grade Delete')
            <form class="inline-block" action="{{ route('grade.destroy', $id) }}" method="POST">
                @csrf
                @method("delete")

                <button class="ml-2 btn btn-danger"><span class="fas fa-trash"></span></button>
            </form>
        @endcan
    </div>
@endcanany
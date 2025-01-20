<li class="d-flex justify-content-between align-items-center">
    <h3 class="smallTitle "><strong>{{ $class->name }}</strong></h3>
    <form action="{{ route('admin.classrooms.delete', ['id' => $class->id]) }}" method="post" class="d-flex justify-content-end">
        @csrf
        <button type="submit" class="btn"><i class="las la-trash icon Bad"></i></button>
    </form>
</li>
<li class="d-flex justify-content-flex-start align-items-center">
    <figure class="d-flex">
        <i class="lar la-user productImage bigIcon"></i>
        <figcaption class="normalTextBold maxLenght">{{ $user->username }}</figcaption>
    </figure>
    <aside class="actions">
        <form action="{{ route('admin.user.edit') }}" method="get" class="col-1">
            <input type="hidden" name="id" value="{{ $user->id }}">
            @csrf
            <button type="submit" class="btn"><i class="las la-pen icon "></i></button>
        </form>
    </aside>
</li>
<hr />

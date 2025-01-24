<li class="d-flex justify-content-flex-start align-items-center">
    <figure class="d-flex">
        <i class="lar la-user productImage bigIcon"></i>
        <figcaption class="normalTextBold maxLenght">{{ $user->username }}</figcaption>
    </figure>
    <aside class="actions">
        <button type="submit" class="btn" data-bs-toggle="offcanvas" data-bs-target={{ "#user".$user->id }}><i class="las la-pen icon "></i></button>
    </aside>
    <div class="offcanvas offcanvas-end" tabindex="-1" id={{ "user".$user->id }} aria-labelledby="classroomsLabel">
        <div class="offcanvas-header">
            <button type="button" class="btn-close offCanvasButton" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="overflow-auto container main ">
            <x-discount-and-delete-user-panel :user="$user" />
        </div>
    </div>
</li>
<hr />

<li class="d-flex justify-content-flex-start align-items-center">
    <figure class="d-flex">
        <i class="lar la-user productImage bigIcon"></i>
        <figcaption class="normalTextBold maxLenght">{{ $user->username }}</figcaption>
    </figure>
    <aside class="actions">
        <button type="submit" class="btn" data-bs-toggle="offcanvas" data-bs-target={{ "#user".$user->id }}><i class="las la-pen icon "></i></button>
    </aside>
    
</li>

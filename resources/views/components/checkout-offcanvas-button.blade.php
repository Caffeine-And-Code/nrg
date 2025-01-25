<button data-bs-toggle="offcanvas" data-bs-target="#checkout" class="iconButton checkoutButton">
    <i class="las la-shopping-cart icon"></i>
</button>
<div class="offcanvas offcanvas-end" tabindex="-1" id="checkout" aria-labelledby="classroomsLabel">
    <div class="offcanvas-header">
        <button type="button" class="btn-close offCanvasButton" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="overflow-auto container main ">
        <x-checkout :checkout="$checkout" />
    </div>
</div>
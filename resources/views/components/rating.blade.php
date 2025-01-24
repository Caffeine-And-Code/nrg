<div class="d-flex flex-row">
    @for($i = 0; $i < $rating; $i++)
        <i class="bi bi-star-fill"></i>
    @endfor
        @for($i = $rating; $i < 5; $i++)
            <i class="bi bi-star"></i>
        @endfor
</div>

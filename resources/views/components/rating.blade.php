<ul class="d-flex flex-row p-0 gap-1 fullWidth">
    @for($i = 0; $i < $rating; $i++)
        <il>
            <i class="bi bi-star-fill icon"></i>
        </il>
    @endfor
        @for($i = $rating; $i < 5; $i++)
        <il>
            <i class="bi bi-star icon"></i>
        </il>    
        @endfor
    </ul>


<div
    class="singleNews"
    {{-- TODO: REMOVE THIS LINE AND CHANGE IT WITH SOMEOTHER METHOD TO SET THE IMAGE PATH --}}
    style="background-image: url('{{ $newsItem->image_path }}');"
>
    <form
        class="overlay"
        action="{{ route('admin.news.destroy', $newsItem->id) }}"
        method="post"
    >
        @csrf
        <button type="submit" class="deleteNewsBtn">
            <i class="las la-trash deleteNewsIcon"></i>
        </button>
    </form>
</div>

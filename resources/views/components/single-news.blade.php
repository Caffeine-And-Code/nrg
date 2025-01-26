
<div
    class="singleNews {{ "News".$newsItem->id }}"
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

@vite('resources/css/components/adminSingleNews.css')
<div class="singleNews" style="background-image: url('{{ $newsItem->image }}');">
    <form class="overlay" action="{{ route('seller.news.destroy', $newsItem->id) }}" method="post">
        @csrf
        <button type="submit" class="deleteNewsBtn"> 
            <i class="las la-trash deleteNewsIcon"></i>
        </button >
    </form>
</div>
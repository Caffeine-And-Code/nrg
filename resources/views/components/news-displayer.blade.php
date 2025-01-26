@vite('/resources/js/adminJs/newsCreateHandler.js')
@vite(['resources/js/app.js'])
@vite('resources/css/components/adminSingleNews.css')

<h2 class="title textShadow">{{ __("messages.News_Editor") }}</h2>
<div class="newsContainer" id="newsContainer">
    @foreach ($news as $newsItem)
        <x-single-news :newsItem="$newsItem" />
    @endforeach

    <div class="plusIcon" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        <i class="las la-plus-circle"></i>
    </div>

    

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ __("messages.CreateNews") }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-footer modal-dialog-scrollable p-3 dialog">
                    <h1 class="smallTitle mb-4">{{ __("messages.ImportPhoto") }}</h1>
                    <div class="input-group mb-3">
                        <label class="d-none" for="newImage">{{ __("messages.ImportPhoto") }}</label>
                        <input type="file" class="customFileInput"
                            aria-label="Upload" accept="image/*" multiple required name="image" id="newImage">
                    </div>
                    <button type="button" class="customSmallButton btn mb-2 cancelButton"
                        data-bs-dismiss="modal">{{ __("messages.Close") }}</button>
                    <button type="submit" class="customSmallButton btn mb-2 createButton"
                    data-bs-dismiss="modal" id="newsCreate">{{ __("messages.Create") }}</button>

                </div>
            </div>
        </div>
    </div>
</div>

<hr />
    <div class="row justify-content-around">
        <form action="{{ route("admin.settings") }}" class="col-5" method="GET">
            @csrf
            <button class="customButton btn mb-2 neutralButton fullWidth">{{ __("messages.Back") }}</button>
        </form>
        <button  type="button" class="customButton btn mb-2 createButton col-5 confirmNews" id="confirmNews">{{ __("messages.Confirm") }}</button>
        
    </div>
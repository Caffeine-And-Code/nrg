@vite('/resources/js/adminJs/newsCreateHandler.js')
@vite(['resources/js/app.js'])
@vite('resources/css/components/adminSingleNews.css')

<h1 class="title textShadow" translate="News_Editor"></h1>
<div class="newsContainer" id="newsContainer">
    @foreach ($news as $newsItem)
        <x-single-news :newsItem="$newsItem" />
    @endforeach

    <div class="plusIcon" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        <i class="las la-plus-circle"></i>
    </div>

    

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel" translate="CreateNews"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-footer modal-dialog-scrollable p-3 dialog">
                    <h1 class="smallTitle mb-4" translate="ImportPhoto"></h1>
                    <div class="input-group mb-3">
                        <input type="file" class="customFileInput" aria-describedby="inputFile"
                            aria-label="Upload" accept="image/*" multiple required name="image" id="newImage">
                    </div>
                    <button type="button" class="customSmallButton btn mb-2 cancelButton"
                        data-bs-dismiss="modal" translate="Close"></button>
                    <button type="submit" class="customSmallButton btn mb-2 createButton"
                    data-bs-dismiss="modal" translate="Create" id="newsCreate"></button>

                </div>
            </div>
        </div>
    </div>
</div>

<hr />
    <section class="row justify-content-around">
        <form action="{{ route("admin.settings") }}" class="col-5" method="GET">
            @csrf
            <button class="customButton btn mb-2 neutralButton fullWidth" translate="Back"></button>
        </form>
        <button class="customButton btn mb-2 createButton col-5" id="confirmNews" translate="Confirm"></button>
        
</section>
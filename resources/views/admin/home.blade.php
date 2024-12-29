<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Admin</title>
    @vite('/resources/js/themeManager.js')
    @vite('/resources/js/translations/translation.js')
    @vite('/resources/css/app.css')
    @vite("/resources/css/views/home.css")
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
</head>
  <body>
    <x-nav-bar title="Orders" />
    <main class="container mt-5 main">
      <section> 
        <h1 class="title textShadow" translate="News"></h1>
        <div class="newsContainer">
          @foreach($news as $newsItem)
            <x-single-news :newsItem="$newsItem" />
          @endforeach 
          <div class="plusIcon" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <i class="las la-plus-circle" ></i>
          </div> 
          
          <!-- Modal -->
          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="staticBackdropLabel" translate="CreateNews"></h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="modal-footer modal-dialog-scrollable p-3 dialog" action="{{ route('admin.news.store') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <h1 class="smallTitle mb-4" translate="ImportPhoto"></h1>
                  <div class="input-group mb-3">
                    <input type="file" class="customFileInput" aria-describedby="inputFile" aria-label="Upload" accept="image/*" required name="image">
                  </div>
                  <button type="button" class="customSmallButton btn mb-2 cancelButton" data-bs-dismiss="modal" translate="Close"></button>
                  <button type="submit" class="customSmallButton btn mb-2 createButton" translate="Create"></button>
                  
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    
    <x-navigation-footer mode="admin" /> 
  </body>
</html>
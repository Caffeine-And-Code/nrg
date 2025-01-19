
@vite('/resources/js/changeTheme.js')
@vite('/resources/js/changeLanguage.js')

<section class="col-12">
    <h1 class="title textShadow" translate="Settings"></h1>
    <ul class="list-group list-group-flush">
        <li class="list-group-item pb-4 pt-4">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 smallTitle" translate="ThemeChanger"></h5>
                <div class="btn-group radioGroup" role="group" aria-label="Theme changer">
                    <input type="radio" class="btn-check" name="btnradio" id="LIGHT" autocomplete="off">
                    <label class="btn" for="LIGHT" translate="LIGHT" id ="LIGHT-label"></label>

                    <input type="radio" class="btn-check" name="btnradio" id="DARK" autocomplete="off">
                    <label class="btn" for="DARK" translate="DARK" id ="DARK-label"></label>
                </div>
            </div>
        </li>
        <li class="list-group-item pb-4 pt-4">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 smallTitle" translate="Translation"></h5>
                <div class="btn-group radioGroup" role="group" aria-label="Language changer">
                    <input type="radio" class="btn-check" name="btnradio" autocomplete="off">
                    @if (session('locale') == 'it')
                        <label class="btn selected" for="IT" translate="Italian" id="IT"></label>
                    @else
                        <label class="btn" for="IT" translate="Italian" id="IT"></label>
                    @endif

                    <input type="radio" class="btn-check" name="btnradio" autocomplete="off">
                    @if (session('locale') == 'en')
                        <label class="btn selected" for="EN" translate="English" id="EN"></label>
                    @else
                        <label class="btn" for="EN" translate="English" id="EN"></label>
                    @endif
                </div>
            </div>
        </li>
        <li class="list-group-item pb-4 pt-4">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 smallTitle" translate="Logout"></h5>
                <form action="{{ route('admin.logout') }}" method="get">
                    @csrf
                    <button type="submit" class="btn btn-danger" translate="Exit"></button>
                </form>
            </div>
        </li>
        <li class="list-group-item pb-4 pt-4">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 smallTitle" translate="RemoveAdmin"></h5>
                <form action="{{ route('admin.destroyMe') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger" translate="Delete"></button>
                </form>
            </div>
        </li>
    </ul>
</section>
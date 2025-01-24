
@vite('/resources/js/changeTheme.js')
@vite('/resources/js/changeLanguage.js')

<section class="col-12">
    <h1 class="title textShadow" translate="Settings"></h1>
    <ul class="list-group list-group-flush">
        <li class="list-group-item pb-4 pt-4">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 smallTitle">{{ __("messages.ThemeChanger") }}</h5>
                <div class="btn-group radioGroup" role="group" aria-label="Theme changer">
                    <input type="radio" class="btn-check" name="btnradio" id="LIGHT" autocomplete="off">
                    <label class="btn" for="LIGHT" id ="LIGHT-label">{{ __("messages.LIGHT") }}</label>

                    <input type="radio" class="btn-check" name="btnradio" id="DARK" autocomplete="off">
                    <label class="btn" for="DARK" id ="DARK-label">{{ __("messages.DARK") }}</label>
                </div>
            </div>
        </li>
        <li class="list-group-item pb-4 pt-4">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 smallTitle">{{ __("messages.Translation") }}</h5>
                <div class="btn-group radioGroup" role="group" aria-label="Language changer">
                    <input type="radio" class="btn-check" name="btnradio" autocomplete="off">
                    @if (App::isLocale('it'))
                        <label class="btn selected IT" for="IT" id="IT">{{ __("messages.Italian") }}</label>
                    @else
                        <label class="btn IT" for="IT" id="IT">{{ __("messages.Italian") }}</label>
                    @endif

                    <input type="radio" class="btn-check" name="btnradio" autocomplete="off">
                    @if (App::isLocale('en'))
                        <label class="btn selected EN" for="EN" id="EN">{{ __("messages.English") }}</label>
                    @else
                        <label class="btn EN" for="EN" id="EN">{{ __("messages.English") }}</label>
                    @endif
                </div>
            </div>
        </li>
        <li class="list-group-item pb-4 pt-4">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 smallTitle">{{ __("messages.Logout") }}</h5>
                <form action="{{ route('admin.logout') }}" method="get">
                    @csrf
                    <button type="submit" class="btn normalButton">{{ __("messages.Exit") }}</button>
                </form>
            </div>
        </li>
        <li class="list-group-item pb-4 pt-4">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 smallTitle">{{ __("messages.RemoveAdmin") }}</h5>
                <form action="{{ route('admin.destroyMe') }}" method="post">
                    @csrf
                    <button type="submit" class="btn normalButton">{{ __("messages.Delete") }}</button>
                </form>
            </div>
        </li>
    </ul>
</section>
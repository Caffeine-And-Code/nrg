
@vite('/resources/js/changeTheme.js')
@vite('/resources/js/changeLanguage.js')

<section class="col-12">
    <h3 class="title textShadow">{{ __("messages.Settings") }}</h3>
    <ul class="list-group list-group-flush">
        <li class="list-group-item pb-4 pt-4">
            <div class="d-flex w-100 justify-content-between flex-wrap">
                <h4 class="mb-1 smallTitle">{{ __("messages.ThemeChanger") }}</h4>
                <div class="btn-group radioGroup" role="group" aria-label="Theme changer">
                    <input type="radio" class="btn-check" name="btnradio" id="LIGHT" >
                    <label class="btn LIGHT-label" for="LIGHT">{{ __("messages.LIGHT") }}</label>

                    <input type="radio" class="btn-check" name="btnradio" id="DARK" >
                    <label class="btn DARK-label" for="DARK">{{ __("messages.DARK") }}</label>
                </div>
            </div>
        </li>
        <li class="list-group-item pb-4 pt-4">
            <div class="d-flex w-100 justify-content-between flex-wrap">
                <h5 class="mb-1 smallTitle">{{ __("messages.Translation") }}</h5>
                <div class="btn-group radioGroup" role="group" aria-label="Language changer">
                    
                    <input type="radio" class="btn-check" name="btnradio" id="radioItalian">
                    @if (App::isLocale('it'))
                        <label class="btn selected IT" for="radioItalian" id="IT">{{ __("messages.Italian") }}</label>
                    @else
                        <label class="btn IT" for="radioItalian" id="IT">{{ __("messages.Italian") }}</label>
                    @endif

                    <input type="radio" class="btn-check" name="btnradio" id="radioEnglish">
                    @if (App::isLocale('en'))
                        <label class="btn selected EN" for="radioEnglish"  id="EN">{{ __("messages.English") }}</label>
                    @else
                        <label for="radioEnglish" class="btn EN" id="EN">{{ __("messages.English") }}</label>
                    @endif
                </div>
            </div>
        </li>
        {{-- check if the current logged user is an admin --}}
        @php
            $isAdmin = Auth::guard('admin')->check();
        @endphp
        @if ($isAdmin == 0)
        <li class="list-group-item pb-4 pt-4">
            <div class="d-flex w-100 justify-content-between">
                <h6 class="mb-1 smallTitle">{{ __("messages.Logout") }}</h6>
                <form action="{{ route('user.logout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn normalButton">{{ __("messages.Exit") }}</button>
                </form>
            </div>
        </li>
        <li class="list-group-item pb-4 pt-4">
            <div class="d-flex w-100 justify-content-between">
                <p class="mb-1 smallTitle">{{ __("messages.DeleteUser") }}</p>
                <form action="{{ route('user.destroyMe') }}" method="post">
                    @csrf
                    <button type="submit" class="btn normalButton">{{ __("messages.Delete") }}</button>
                </form>
            </div>
        </li>
        @else
        <li class="list-group-item pb-4 pt-4">
            <div class="d-flex w-100 justify-content-between">
                <h6 class="mb-1 smallTitle">{{ __("messages.Logout") }}</h6>
                <form action="{{ route('admin.logout') }}" method="get">
                    @csrf
                    <button type="submit" class="btn normalButton">{{ __("messages.Exit") }}</button>
                </form>
            </div>
        </li>
        <li class="list-group-item pb-4 pt-4">
            <div class="d-flex w-100 justify-content-between">
                <p class="mb-1 smallTitle">{{ __("messages.RemoveAdmin") }}</p>
                <form action="{{ route('admin.destroyMe') }}" method="post">
                    @csrf
                    <button type="submit" class="btn normalButton">{{ __("messages.Delete") }}</button>
                </form>
            </div>
        </li>
        @endif
    </ul>
</section>
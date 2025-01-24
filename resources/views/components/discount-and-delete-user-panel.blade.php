@vite('/resources/css/components/userPanel.css')
<section class="d-flex justify-content-between userInfo">
    <h1 class="title textShadow">{{ $user->username }}</h1>
    <form
        action="{{ route('admin.user.delete', ['id' => $user->id]) }}"
        method="post"
    >
        @csrf
        <button type="submit" class="btn">
            <i class="las la-trash icon Bad"></i>
        </button>
    </form>
</section>
<hr />
<section class="userInfo">
    <h3 class="normalTextBold">Email</h3>
    <p class="normalTextRegular">{{ $user->email }}</p>
    <h3 class="normalTextBold">{{ __("messages.LastAccess") }}</h3>
    <p class="normalTextRegular">{{ $user->last_access }}</p>
    <h3 class="normalTextBold">{{ __("messages.TotalSpent") }}</h3>
    <p class="normalTextRegular">€ {{ $user->total_spent }}</p>
    <h3 class="normalTextBold">{{ __("messages.DiscountPortfolio") }}</h3>
    <p class="normalTextRegular">€ {{ $user->discount_portfolio }}</p>
</section>
<section>
    <form
        action="{{ route('admin.user.addDiscount', ['id' => $user->id]) }}"
        method="post"
        class="col-12 mb-5"
    >
        @csrf
        <div class="input-group mb-4 inputContainerShadow align-items-center">
            <span class="slideToLeft">
                <i class="las la-euro-sign icon"></i>
            </span>
            <input
                class="form-control col-sm-10 col-md-11 col-10 customInput"
                type="number"
                name="discount"
                min="1"
                max="200"
                placeholder={{ __("messages.Discount") }}
                required
            />
        </div>
        <hr />
        <section class="row justify-content-around">
            <a
            href="{{ route('admin.settings') }}"
                class="customButton btn mb-2 neutralButton col-5"
            >{{ __("messages.Back") }}</a>
            <button
                class="customButton btn mb-2 createButton col-5"
            >{{ __("messages.Add") }}</button>
        </section>
    </form>
</section>

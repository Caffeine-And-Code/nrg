@vite('/resources/css/components/userPanel.css')
<section class="d-flex justify-content-between userInfo">
    <h2 class="title textShadow">{{ $user->username }}</h2>
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
<article class="userInfo">
    <h2 class="normalTextBold">Email</h2>
    <p class="normalTextRegular">{{ $user->email }}</p>
    <h3 class="normalTextBold">{{ __("messages.LastAccess") }}</h3>
    <p class="normalTextRegular">{{ $user->last_access }}</p>
    <h3 class="normalTextBold">{{ __("messages.TotalSpent") }}</h3>
    <p class="normalTextRegular">€ {{ $user->total_spent }}</p>
    <h3 class="normalTextBold">{{ __("messages.DiscountPortfolio") }}</h3>
    <p class="normalTextRegular">€ {{ $user->discount_portfolio }}</p>
</article>
<div>
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
            <label for={{ "discount".$user->id }} class="d-none">{{ __("messages.Discount") }}</label>
            <input
                class="form-control col-sm-10 col-md-11 col-10 customInput"
                type="number"
                name="discount"
                min="1"
                max="200"
                id={{ "discount".$user->id }}
                placeholder={{ __("messages.Discount") }}
                required
            />
        </div>
        <hr />
        <div class="row justify-content-around">
            <a
            href="{{ route('admin.settings') }}"
                class="customButton btn mb-2 neutralButton col-5"
                title="{{ __("messages.Back") }}"
            >{{ __("messages.Back") }}</a>
            <button
                class="customButton btn mb-2 createButton col-5"
            >{{ __("messages.Add") }}</button>
        </div>
    </form>
</div>

@vite('/resources/css/components/userPanel.css')
<section class="d-flex justify-content-between userInfo">
    <h1 class="title textShadow">{{ $user->username }}</h1>
    <form action="{{ route('admin.user.delete', ['id' => $user->id]) }}" method="post">
        @csrf
        <button type="submit" class="btn "><i class="las la-trash icon Bad"></i></button>
    </form>
</section>
<hr />
<section class="userInfo">
    <h3 class="normalTextBold" translate="Email"></h3>
    <p class="normalTextRegular">{{ $user->email }}</p>
    <h3 class="normalTextBold" translate="UniboRegNumber"></h3>
    <p class="normalTextRegular"></p>
    <h3 class="normalTextBold" translate="LastAccess"></h3>
    <p class="normalTextRegular">{{ $user->last_access }}</p>
    <h3 class="normalTextBold" translate="TotalSpent"></h3>
    <p class="normalTextRegular">€ {{ $user->total_spent }}</p>
    <h3 class="normalTextBold" translate="DiscountPortfolio"></h3>
    <p class="normalTextRegular">€ {{ $user->discount_portfolio }}</p>
</section>
<section>

</section>

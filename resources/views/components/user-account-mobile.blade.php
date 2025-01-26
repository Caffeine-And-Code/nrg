<section class="mobile user-components mt-5"> 
    <x-user-orders-displayer :orders="$orders"/>
    <x-user-fidelitymeter :user="$user" :fdmeter="$fmTarget" :fdprize="$fmPrize"/>
    <x-user-account-settings :user="$user"/>
</section>
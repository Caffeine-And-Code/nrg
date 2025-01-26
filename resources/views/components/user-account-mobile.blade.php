<section class="mobile user-components mt-5"> 
    <section class="container justify-content-center mb-5"> 
        <x-user-orders-displayer :orders="$orders"/>
    </section>
    <section class="container justify-content-center mb-5"> 
        <x-user-fidelitymeter :user="$user" :fdmeter="$fmTarget" :fdprize="$fmPrize"/>
    </section>
</section>
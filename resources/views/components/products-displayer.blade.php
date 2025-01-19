<h1 class="title textShadow" translate="Products"></h1>
<x-generic-search-bar searchRoute="" buttonRoute="product/add" mode="admin" />
<ul class="list-group">
    @foreach ($products as $product)
    <li class="list-group-item">
        <x-single-product :product="$product" />
    </li>
    @endforeach
</ul>

@vite("resources/css/components/ProductDisplayer.css")
<h2 class="title textShadow">{{ __("messages.Products") }}</h2>
<x-generic-search-bar searchRoute="admin.product.search" buttonRoute="product/add" mode="admin" />
<ul class="listContainer">
    @forelse ($products as $product)
    <x-single-product :product="$product" />
    @empty
    <x-generic-empty-search-result nameToDisplay="Products" goBackRoute="admin.settings"/>
    @endforelse 
</ul>

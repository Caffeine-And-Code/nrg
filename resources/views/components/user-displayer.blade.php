<h1 class="title textShadow" translate="Users"></h1>
<x-generic-search-bar searchRoute="admin.users.search" mode="admin" buttonRoute="" />
<ul class="listContainer">
    @forelse ($users as $user)
    <x-single-user :user="$user" />
    @empty
    <x-generic-empty-search-result nameToDisplay="Users" goBackRoute="admin.settings"/>
    @endforelse 
</ul>
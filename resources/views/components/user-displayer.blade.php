<h2 class="title textShadow">{{ __("messages.Users") }}</h2>
<x-generic-search-bar searchRoute="admin.users.search" mode="admin" buttonRoute="" />
<ul class="listContainer">
    @forelse ($users as $user)
    <x-single-user :user="$user" />
    @empty
    <x-generic-empty-search-result nameToDisplay="Users" goBackRoute="admin.settings"/>
    @endforelse 
</ul>
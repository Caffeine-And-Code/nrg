
@switch($status)
    @case(0)
    <i class="las la-seedling orderImage"></i>
        @break
    @case(1)
    <i class="las la-money-bill-wave orderImage"></i>
        @break
    @case(2)
    <i class="las la-window-close orderImage"></i>
        @break
    @case(3)
    <i class="las la-truck orderImage"></i>
        @break
    @default
    <i class="las la-check-circle orderImage"></i>
    @endswitch
<link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
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
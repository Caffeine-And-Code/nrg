@vite("/resources/css/components/classroomsDisplayer.css")
@vite("/resources/js/adminJs/classroomsDisplayerHandler.js")

@vite(['resources/js/app.js'])
<h1 class="title textShadow ">{{ __("messages.Classrooms") }}</h1>
<hr />
<section class="entriesTable mb-5"> 
    <ul class="list" id="classList">
        @foreach ($classes as $class)
            <x-single-class-row :class="$class" />
        @endforeach
    </ul>
</section>

<div class="container col centerCol mb-5">
    <div class="input-group mb-4 inputContainerShadow align-items-center">
        <span class="slideToLeft">
            <i class="las la-align-left icon"></i>
        </span>
        <input
            class="form-control col-sm-10 col-md-11 col-10 customInput"
            type="text"
            id="classNumber"
            placeholder="{{ __("messages.Classnumber") }}"
            required
        />
    </div>
            <button
                class="customButton col-12 btn"
                id="addClassroomBtn"
            >{{ __("messages.Add") }}</button>
</div>

<div 
class="col-12 mb-5">
    <hr />
    <div class="row justify-content-around">
        <a
        href="{{ route('admin.settings') }}"
            class="customButton btn mb-2 neutralButton col-5"
        >{{ __("messages.Back") }}</a>
        <button
            class="customButton btn mb-2 createButton col-5"
            id="confirmClasses"
        >{{ __("messages.Confirm") }}</button>
    </div>
</div>
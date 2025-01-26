@vite('/resources/css/components/dailySpinDisplayer.css')
@vite('/resources/js/adminJs/dailySpinDisplayerHandler.js')
@vite(['resources/js/app.js'])

<section class="d-flex flex-row justify-content-between">
    <h2 class="title textShadow">{{ __("messages.SpinOptions") }}</h2>
    <p class="smallTitle title">(min:4)</p>
</section>

<table class="table entriesTable mb-5">
    <thead>
        <tr>
            <th scope="col" id="TEXTHEADER">{{ __("messages.Text") }}</th>
            <th scope="col" id="DISCOUNTHEADER">{{ __("messages.DiscountApplied") }}</th>
            <th scope="col" id="EMPTYHEADER"></th>
        </tr>
    </thead>
    <tbody id="entriesTableBody">
        @foreach ($entries as $entry)
        <tr class="entryRow">
            @mobile
            <td id={{ "entryText".$entry->id }}>
                {{ strlen($entry->text) > 15 ? substr($entry->text,0,15)."..." :
                $entry->text }}
            </td>
            @elsemobile
            <td id={{ "entryText".$entry->id }}>{{ $entry->text }}</td>
            @endmobile
            <td id={{ "PREZEL".$entry->id }}>€{{ $entry->prize }}</td>
            <td id={{ "ActionDAILY".$entry->id }}>
                <form
                    action="{{ route('admin.dailySpin.delete', ['id' => $entry->id]) }}"
                    method="post"
                    class="d-flex justify-content-end"
                >
                    @csrf
                    <button type="submit" class="btn">
                        <i class="las la-trash actionInTable Bad"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="container col centerCol mb-5">
    <div class="input-group mb-4 inputContainerShadow align-items-center">
        <span class="slideToLeft">
            <i class="las la-euro-sign icon"></i>
        </span>
        <label for="text" class="d-none">{{ __("messages.Text") }}</label>
        <input class="form-control col-sm-10 col-md-11 col-10 customInput"
        type="text" id="text" placeholder={{ __("messages.Text") }} required />
    </div>
    <div class="mb-5 col-12 row justify-content-between">
        <div
            class="inputgroup inputContainerShadow align-items-center col-12 col-xs-5 mb-4 p-0"
        >
            <span class="slideToLeft">
                <i class="las la-euro-sign icon"></i>
            </span>
            <label for="discount" class="d-none">{{ __("messages.DiscountApplied") }}</label>
            <input class="form-control col-sm-10 col-md-11 col-10 customInput"
            type="number" min="0" step="0.1" id="discount" placeholder={{
            __("messages.DiscountApplied") }} required />
        </div>
        <button class="customButton col-12 col-xs-5 btn" id="addEntryBtn">
            {{ __("messages.Add") }}
        </button>
    </div>
</div>

<div class="col-12 mb-5">
    <hr />
    <div class="row justify-content-around">
        <a
            href="{{ route('admin.settings') }}"
            class="customButton btn mb-2 neutralButton col-5"
            title="{{ __("messages.Back") }}"
        >
            {{ __("messages.Back") }}
        </a>
        <button
            class="customButton btn mb-2 createButton col-5"
            id="confirmSpinOptions"
        >
            {{ __("messages.Confirm") }}
        </button>
    </div>
</div>

@vite('/resources/css/components/dailySpinDisplayer.css')
@mobile
@vite('/resources/js/adminJs/dailySpinDisplayerHandler.js')
@elsemobile
@vite('/resources/js/adminJs/mobileAdjustmentsSpinDisplayer.js')
@endmobile

@vite(['resources/js/app.js'])
<h1 class="title textShadow" translate="SpinOptions"></h1>
<section class="entriesTable mb-5">
    <table class="table ">
        <thead>
            <tr>
                <th scope="col" translate="Text"></th>
                <th scope="col" translate="Prize"></th>
                <th scope="col"></th>
                
            </tr>
        </thead>
        <tbody id="entriesTableBody" >
            @foreach ($entries as $entry)    
                <tr class="entryRow">
                    @mobile
                    <th scope="row">{{ strlen($entry->text) > 15 ? substr($entry->text,0,15)."..." : $entry->text }}</th>
                    @elsemobile
                    <th scope="row">{{ $entry->text }}</th>
                    @endmobile
                    <td>{{ $entry->prize }}</td>
                    <td>
                        <form action="{{ route('admin.dailySpin.delete', ['id' => $entry->id]) }}" method="post" class="d-flex justify-content-end">
                            @csrf
                            <button type="submit" class="btn"><i class="las la-trash actionInTable Bad"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</section>

<section class="container col centerCol mb-5">
        <div class="input-group mb-4 inputContainerShadow align-items-center">
            <span class="slideToLeft">
                <i class="las la-euro-sign icon"></i>
            </span>
            <input
                class="form-control col-sm-10 col-md-11 col-10 customInput"
                type="text"
                id="text"
                placeholder="Text"
                required
            />
        </div>
        <section class="mb-5 col-12 row justify-content-between">
                <div class="inputgroup inputContainerShadow align-items-center col-6 ">
                    <span class=" slideToLeft">
                        <i class="las la-euro-sign icon"></i>
                    </span>
                    <input class="form-control col-sm-10 col-md-11 col-10  customInput" type="number" min="0" step="0.1" id="discount" placeholder="Discount" required  />

                </div>
                <button
                    class="customButton col-5 btn"
                    id="addEntryBtn"
                    translate="Add"
                ></button>
        </section>
</section>

<section 
class="col-12 mb-5">
        @csrf
        <hr />
        <div class="row justify-content-around">
            <a
            href="{{ route('admin.settings') }}"
                class="customButton btn mb-2 neutralButton col-5"
                translate="Back"
            ></a>
            <button
                class="customButton btn mb-2 createButton col-5"
                id="confirmSpinOptions"
                translate="Confirm"
            ></button>
        </div>
</section>
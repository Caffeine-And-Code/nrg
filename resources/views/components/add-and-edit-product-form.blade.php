@vite('/resources/js/adminJs/productFormHandler.js')
@vite('/resources/css/views/productForm.css')
<link
    rel="stylesheet"
    href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css"
/>
<form action="{{ route('admin.product.add') }}" method="post" class="col-12 mb-5" enctype="multipart/form-data">
    <h1 class="title text mb-5" translate="Add/Edit a Product"></h1>
    @csrf
    <section class="mb-4 centerRow justify-content-start">
        <input type="file" id="imageInput" class="d-none" accept="image/*" name="image" />
        
        <img id="imagePreview" class="ImagePreview cover"  alt="Product Image"/>
        <button type="button" id="selectImageButton" class="btn"><i class="las la-pen icon Active"></i></button>
        <button type="button" id="removeImage" class="btn"><i class="las la-trash icon Bad"></i></button>
    </section>

    <div class="input-group mb-4 inputContainerShadow align-items-center">
        <span class=" slideToLeft">
            <i class="las la-hamburger icon"></i>
        </span>
        <input class="form-control col-sm-10 col-md-11 col-10  customInput" type="text" name="name" placeholder="Product Name" required >
    </div>

    <div class="input-group mb-4 inputContainerShadow  tallInput">
        <span class="slideToLeft justify-content-center">
            <i class="las la-align-left icon"></i>
        </span>
        <textarea placeholder="Product Description" rows="4" cols="50"class="form-control col-sm-10 col-md-11 col-10  customInput tallInput" name="description" required></textarea>
    </div>

    <section class="mb-4 justify-content-around">
            <div class="input-group mb-4 inputContainerShadow align-items-center col-12 col-sm-5 ">
                <span class="slideToLeft ">
                    <i class="las la-euro-sign icon"></i>
                </span>
                <input class="noMarginLeftInput form-control col-sm-10 col-md-11 col-lg-10  customInput" type="number" min="0.1" step="0.1" name="price" placeholder="Price" required>
            </div>
            <div class="input-group inputContainerShadow align-items-center col-12 col-sm-5">
                <span class="slideToLeft ">
                    <i class="las la-beer icon"></i>
                </span>
                <select class="noMarginLeftInput form-control col-sm-10 col-md-11 col-10  customInput" name="type" placeholder="Type" required>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                    <option value="null" selected disabled translate="Choose a Type"></option>
                </select>
            </div>
    </section>
        
    <div class="input-group mb-5 inputContainerShadow align-items-center">
        <span class="slideToLeft ">
            <i class="las la-percent icon"></i>
        </span>
        <input class="form-control col-sm-10 col-md-11 col-10  customInput" type="number" min="0" step="0.1" name="perc_discount" placeholder="Discount" >
    </div>

    <hr />
    <section class="mb-5 row justify-content-around">
        <button type="button" class="customButton btn mb-2 neutralButton col-5" translate="Close" id="goBack"></button>    
        <button type="submit" class="customButton btn mb-2 createButton col-5"  translate="Confirm"></button>
    </section>
</form> 
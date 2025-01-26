@vite('/resources/js/adminJs/productFormHandler.js')
@vite('/resources/css/views/productForm.css')
@php
    $randomNumber = rand(0, 100000);
@endphp
<link
    rel="stylesheet"
    href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css"
/>
<form action="{{ $product ? route('admin.product.edit', ["id" => $product->id]) : route('admin.product.add') }}" method="post" class="col-12 mb-5" enctype="multipart/form-data">
    <h3 class="title smallTitle textShadow text mb-5" >{{ __("messages.Add/Edit a Product") }}</h3>
    @csrf
    <div class="mb-4 centerRow justify-content-start">
        <label class="d-none" for={{ "imageShower__".$randomNumber }} >{{ __("messages.Image") }}</label>
        <input type="file" class="d-none imageInput" accept="image/*" name="image" id={{ "imageShower__".$randomNumber }} />
        @if ($product)
            <img src="{{ asset('images/products/'.basename($product->image)) }}" alt="Product Image" class="ImagePreview cover imagePreview" />
        @else
            <img  class="ImagePreview cover imagePreview"  alt="Product Image"/>
        @endif
        <button type="button" class="btn selectImageButton"><i class="las la-pen icon Active "></i></button>
        <button type="button" class="removeImage btn"><i class="las la-trash icon Bad"></i></button>
    </div>

    <div class="input-group mb-4 inputContainerShadow align-items-center">
        <span class=" slideToLeft">
            <i class="las la-hamburger icon"></i>
        </span>
        @if ($product)
        <label for={{ "productNamePlease".$product->getId() }} class="d-none">{{ __("messages.ProductName") }}</label>
            <input class="form-control col-sm-10 col-md-11 col-10  customInput" type="text" name="name" id={{ "productNamePlease".$product->getId() }} value="{{ $product->name }}" placeholder={{ __("messages.ProductName") }} required >
        @else
        <label for="productNamePlease" class="d-none">{{ __("messages.ProductName") }}</label>
        <input class="form-control col-sm-10 col-md-11 col-10  customInput" type="text" name="name" id="productNamePlease" placeholder={{ __("messages.ProductName") }} required >
        @endif
    </div>

    <div class="input-group mb-4 inputContainerShadow  tallInput">
        <span class="slideToLeft justify-content-center">
            <i class="las la-align-left icon"></i>
        </span>
        @if ($product)
        <label for={{ "description".$product->getId() }} class="d-none">{{ __("messages.ProductDescription") }}</label>
            <textarea placeholder={{ __("messages.ProductDescription") }} rows="4" cols="50"class="form-control col-sm-10 col-md-11 col-10  customInput tallInput" id={{ "description".$product->getId() }} name="description" required>{{ $product->description }}</textarea>
        @else
        <label for="description" class="d-none">{{ __("messages.ProductDescription") }}</label>
        <textarea placeholder={{ __("messages.ProductDescription") }} rows="4" cols="50"class="form-control col-sm-10 col-md-11 col-10  customInput tallInput" id="description" name="description" required></textarea>

        @endif
    </div>

    <div class="mb-4 justify-content-around">
            <div class="input-group mb-4 inputContainerShadow align-items-center col-12 col-sm-5 ">
                <span class="slideToLeft ">
                    <i class="las la-euro-sign icon"></i>
                </span>
                @if ($product)
                <label for={{ "price".$product->getId() }} class="d-none">{{ __("messages.Price") }}</label>
                    <input class="noMarginLeftInput form-control col-sm-10 col-md-11 col-lg-10  customInput" type="number" min="0.1" step="0.1" name="price" id={{ "price".$product->getId() }} value="{{ $product->price }}" placeholder={{ __("messages.Price") }} required>
                @else
                <label for="price" class="d-none">{{ __("messages.Price") }}</label>
                    <input class="noMarginLeftInput form-control col-sm-10 col-md-11 col-lg-10  customInput" type="number" min="0.1" step="0.1" id="price" name="price" placeholder={{ __("messages.Price") }} required>
                @endif
            </div>
            <div class="input-group inputContainerShadow align-items-center col-12 col-sm-5">
                <span class="slideToLeft ">
                    <i class="las la-beer icon"></i>
                </span>
                
                @if ($product)
                <label for={{ "type".$product->getId() }} class="d-none">{{ __("messages.ChooseaType") }}</label>
                <select class="noMarginLeftInput form-control col-sm-10 col-md-11 col-10  customInput" id={{ "type".$product->getId() }} name="type" required>
                    <option value="">{{ __("messages.Type") }}</option>
                    @foreach ($types as $type)
                        @if ($type->id == $product->type_id)
                            <option value="{{ $type->id }}" selected>{{ $type->name }}</option>
                        @else
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endif
                    @endforeach
                </select>
                @else
                <label for="type" class="d-none">{{ __("messages.ChooseaType") }}</label>
                    <select class="noMarginLeftInput form-control col-sm-10 col-md-11 col-10  customInput" name="type" id="type" placeholder={{ __("messages.Type") }} required>
                        <option value="" selected >{{ __("messages.Type") }}</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                @endif
            </div>
        </div>
        
    <div class="input-group mb-5 inputContainerShadow align-items-center">
        <span class="slideToLeft ">
            <i class="las la-percent icon"></i>
        </span>
        @if ($product)
        <label for={{ "percDiscount".$product->getId() }} class="d-none">{{ __("messages.Discount") }}</label>
        <input class="form-control col-sm-10 col-md-11 col-10  customInput" type="number" min="0" max="100" name="perc_discount" id={{ "percDiscount".$product->getId() }} value="{{ $product->perc_discount }}" placeholder={{ __("messages.Discount") }} required>
        @else
        <label for="percDiscount" class="d-none">{{ __("messages.Discount") }}</label>
            <input class="form-control col-sm-10 col-md-11 col-10  customInput" type="number" min="0" step="1" max="100" name="perc_discount" id="percDiscount" placeholder={{ __("messages.Discount") }} >
        @endif    
    </div>

    <hr />
    <div class="mb-5 row justify-content-around">
        <button type="button" class="customButton btn mb-2 neutralButton col-5 goBack" >{{ __("messages.Close") }}</button>    
        <button type="submit" class="customButton btn mb-2 createButton col-5" >{{ __("messages.Confirm") }}</button>
    </div>
</form> 
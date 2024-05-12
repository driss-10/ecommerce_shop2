@extends('layouts.app')

@section('title' , 'About Us')

@section('content')

<!-- Shop Details Section Begin -->
<form action="{{url('Product/addCart' )}}" method="post">
    <input type="hidden" name="Product_id" value="{{$getProduct->id }}">
        @csrf
<section class="shop-details">
    
      
        <div class="product__details__pic">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__breadcrumb">
                            <a href="/">Home</a>


                            <span>Product Details</span>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-3 col-md-3">

                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                @foreach ($getProduct->getImage as $image)
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="{{$image->getLogo()}}">
                                    </div>
                                </a>
                                @endforeach
                            </li>

                        </ul>

                    </div>

                    <div class="col-lg-6 col-md-9">
                        <div class="tab-content">

                            @php
                            $getProductImages = $getProduct->getImageSingle($getProduct->id);
                            @endphp
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                @if (!empty($getProductImages) && !empty($getProductImages->getLogo()))
                                <div class="product__details__pic__item">
                                    <img id='image_name' src="{{$getProductImages->getLogo()}}" alt="">
                                </div>
                            </div>

                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="product__details__content">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="product__details__text">
                            <h4>{{$getProduct->title}}</h4>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <span> - 5 Reviews</span>
                            </div>
                            <h3>${{number_format($getProduct->price,2)}} <span>${{number_format($getProduct->old_price,2)}}</span></h3>
                            <p>{{$getProduct->shipping_returns}}</p>
                            <div class="product__details__option">
                                @if (!empty($getProduct->getSize->count()))
                                <div class="product__details__option__size">
                                    <select name="size_id" id="size_id" require>
                                        <option>Select a Size</option>
                                        @foreach ($getProduct->getSize as $size)
                                        <option value="{{ $size->name }}">
                                            {{ $size->name }}
                                            @if (!empty($size->price))
                                            {{ number_format($size->price, 2) }}$
                                            @endif
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                @endif

                                @if (!empty($getProduct->getColor->count()))
                                <div class="product__details__option__color">

                                    <!--                            @foreach ($getProduct->getColor as $color)
                                <label style="background: {{$color->getColor->code}};" class="c-1" for="color_id">
                                    <input type="radio" id="{color_id" name="color_id" value="{{$color->getColor->id}}">
                                </label>

                                @endforeach -->
                                    <select name="color_id" id="color_id">
                                        <option>Select a Color</option>
                                        @foreach ($getProduct->getColor as $color)
                                        <option value="{{$color->getColor->id}}"> {{$color->getColor->name}}</option>
                                        @endforeach
                                    </select>

                                </div>

                                @endif
                            </div>
                            <div class="product__details__cart__option">

                                <input type="hidden" name="product_is" value=' {{$getProduct->id}}'>

                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="number" data-decimal="0" value="1" min='1' max='100' id='quantity' name="quantity" require step="1">
                                    </div>
                                </div>
                                <button type="submit" class="primary-btn">add to cart</button>
                                @if(session()->has('message'))

                                {{session()->get('message')}}
                                @endif
                            </div>
                            <div class="product__details__btns__option">
                                <a href="#"><i class="fa fa-heart"></i> add to wishlist</a>
                                <a href="#"><i class="fa fa-exchange"></i> Add To Compare</a>
                            </div>
                            <div class="product__details__last__option">
                                <h5><span>Guaranteed Safe Checkout</span></h5>
                                <img src="{{url('')}}/img/shop-details/details-payment.png" alt="">
                                <ul>
                                    <li><span>SKU:</span> {{$getProduct->sku}}</li>
                                    <li><span>Categories:</span> {{ $getProduct->getCategory->name }}</li>


                                </ul>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tabs-5" role="tab">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-6" role="tab">Customer
                                        Previews(5)</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-7" role="tab">Additional
                                        information</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-5" role="tabpanel">
                                    <div class="product__details__tab__content">
                                        <p class="note">{{$getProduct->description}}</p>
                                        <div class="product__details__tab__content__item">
                                            <h5>Products Infomation</h5>
                                            <p>{{$getProduct->additional_information}}</p>

                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane" id="tabs-6" role="tabpanel">
                                    <div class="product__details__tab__content">
                                        <div class="product__details__tab__content__item">
                                            <h5>Products Infomation</h5>
                                            <p>{{$getProduct->additional_information}}</p>

                                        </div>
                                        <div class="product__details__tab__content__item">
                                            <h5>Material used</h5>
                                            <p>Polyester is deemed lower quality due to its none natural quality’s. Made
                                                from synthetic materials, not natural like wool. Polyester suits become
                                                creased easily and are known for not being breathable. Polyester suits
                                                tend to have a shine to them compared to wool and cotton suits, this can
                                                make the suit look cheap. The texture of velvet is luxurious and
                                                breathable. Velvet is a great choice for dinner party jacket and can be
                                                worn all year round.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tabs-7" role="tabpanel">
                                    <div class="product__details__tab__content">
                                        <p class="note">{{$getProduct->description}}</p>
                                        <div class="product__details__tab__content__item">
                                            <h5>Products Infomation</h5>
                                            <p>{{$getProduct->additional_information}}</p>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    

</section>
</form>
<!-- Shop Details Section End -->

<!-- Related Section Begin -->
<section class="related spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="related-title">Related Product</h3>
            </div>
        </div>
        <div class="row">
            @foreach ($getRelatedProduct as $value )
            @php
            $getProductImages = $value->getImageSingle($value->id);
            @endphp

            <div class="col-lg-3 col-md-6 col-sm-6 col-sm-6">
                <div class="product__item">
                    @if (!empty($getProductImages) && !empty($getProductImages->getLogo()))
                    <div class="product__item__pic set-bg">
                        <!-- <div class="product__item__pic set-bg" data-setbg="{{$getProductImages->getLogo()}}"> -->
                        <img class="product__item__pic set-bg" src="{{$getProductImages->getLogo()}}">
                        @endif

                        <ul class="product__hover">
                            <li><a href="#"><img src="{{url('')}}/img/icon/heart.png" alt=""></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <a href="{{url($value->category_slug. '/' .$value->sub_category_slug)}}">
                            <h5>{{$value->sub_category_name}}</h5>
                        </a>

                        <a href="{{url($value->slug)}}">
                            <h6>{{$value->title}}</h6>
                        </a>
                        <div class="rating">
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <h5>${{number_format($value->price,2)}}</h5>
                        <div class="product__color__select">
                            <label for="pc-4">
                                <input type="radio" id="pc-4">
                            </label>
                            <label class="active black" for="pc-5">
                                <input type="radio" id="pc-5">
                            </label>
                            <label class="grey" for="pc-6">
                                <input type="radio" id="pc-6">
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach


        </div>
    </div>
   
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).click(function() {
            var price = $('.getSizePrice', this).attr('data-price');
            console.log(price);
        });
    </script> -->
</section>

<!-- Related Section End -->



@endsection
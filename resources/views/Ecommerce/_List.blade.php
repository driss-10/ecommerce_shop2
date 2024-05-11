<div>
    @if(!empty($getProduct))
    <div class="row">
        @foreach ($getProduct as $value)
        @php
        $getProductImages = $value->getImageSingle($value->id);
        @endphp
        <div class="col-lg-4 col-md-6 col-sm-6">
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
                    
                        <p href="{{url($value->category_slug. '/' .$value->sub_category_slug)}}">
                            <h5>{{$value->sub_category_name}}</h5>
                        </p>
                    

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
    @endif

</div>
</div>
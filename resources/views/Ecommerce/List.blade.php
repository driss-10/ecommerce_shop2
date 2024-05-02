@extends('layouts.app')



@section('content')
<!-- Breadcrumb Section Begin -->

<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <div class="breadcrumb__text">
                    @if (!empty($getSubCategory))
                    <h4 class="text-center">{{$getSubCategory->name}}</h4>
                    @else
                    <h4 class="text-center">{{$getCategory->name}}</h4>
                    @endif

                    <div class="breadcrumb__links">
                        <a href="/">Home</a>
                        <a href="/Shop">Shop</a>
                        @if (!empty($getSubCategory))
                        <span><a href="{{url($getCategory->slug)}}">{{$getCategory->name}}</a></span>
                        <span>{{$getSubCategory->name}}</span>
                        @else
                        <span>{{$getCategory->name}}</span>
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shop Section Begin -->
<section class="shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="shop__sidebar">
                    <div class="shop__sidebar__search">
                        <form action="" id="FilterForm">
                            {{csrf_field()}}
                            <input type="text" placeholder="Search...">
                            <button type="submit"><span class="icon_search"></span></button>
                        </form>
                    </div>
                    <div class="shop__sidebar__accordion">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                                </div>
                                <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        @php
                                        $getCategoryHeader =App\Models\CategoryModel::getRecordMenu();

                                        @endphp
                                        <div class="shop__sidebar__categories">
                                            <ul class="nice-scroll">
                                                @foreach ($getCategoryHeader as $value)

                                                <li><a href="{{url('/List/'.$value->slug  )}}">{{$value->name}}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseTwo">Branding</a>
                                </div>
                                <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__brand">
                                            @foreach ($getBrand as $B_value )
                                            
                                                <ul class="form-check" style="padding-left: 10px">


                                                <input class="form-check-input ChangeBrand" type="checkbox" id='brand-{{$B_value->id}}' value='{{$B_value->id}}'>
                                                <label class="form-check-label ChangeBrand" for="brand-{{$B_value->id}}">
                                                    {{$B_value->name}}
                                                </label>
                                            </ul>


                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseThree">Filter Price</a>
                                </div>
                                <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__price">
                                            <ul>
                                                <li><a href="#">$0.00 - $50.00</a></li>
                                                <li><a href="#">$50.00 - $100.00</a></li>
                                                <li><a href="#">$100.00 - $150.00</a></li>
                                                <li><a href="#">$150.00 - $200.00</a></li>
                                                <li><a href="#">$200.00 - $250.00</a></li>
                                                <li><a href="#">250.00+</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseFour">Size</a>
                                </div>
                                <div id="collapseFour" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__size">
                                            <label for="xs">xs
                                                <input type="radio" id="xs">
                                            </label>
                                            <label for="sm">s
                                                <input type="radio" id="sm">
                                            </label>
                                            <label for="md">m
                                                <input type="radio" id="md">
                                            </label>
                                            <label for="xl">xl
                                                <input type="radio" id="xl">
                                            </label>
                                            <label for="2xl">2xl
                                                <input type="radio" id="2xl">
                                            </label>
                                            <label for="xxl">xxl
                                                <input type="radio" id="xxl">
                                            </label>
                                            <label for="3xl">3xl
                                                <input type="radio" id="3xl">
                                            </label>
                                            <label for="4xl">4xl
                                                <input type="radio" id="4xl">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseFive">Colors</a>
                                </div>
                                <div id="collapseFive" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__color">
                                            @foreach ($getColor as $_color )

                                            <a href="javascript:;" id='{{ $_color->id}}' data-val='0' class='ChangeColor' style="background: {{$_color->code}};"><span>{{$_color->name}}</span> </a>

                                            @endforeach


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseSix">Tags</a>
                                </div>
                                <div id="collapseSix" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__tags">
                                            <a href="#">Product</a>
                                            <a href="#">Bags</a>
                                            <a href="#">Shoes</a>
                                            <a href="#">Fashio</a>
                                            <a href="#">Clothing</a>
                                            <a href="#">Hats</a>
                                            <a href="#">Accessories</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="shop__product__option">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="shop__product__option__left">
                                <p>Showing 1–12 of 126 results</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="shop__product__option__right">
                                <p>Sort by Price:</p>
                                <select>
                                    <option value="">Low To High</option>
                                    <option value="">$0 - $55</option>
                                    <option value="">$55 - $100</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($getProduct as $value)
                    @php
                    $getProductImages =$value->getImageSingle($value->id)
                    @endphp
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            @if (!empty($getProductImages) && !empty($getProductImages->getLogo()))
                            <div class="product__item__pic set-bg" data-setbg="{{$getProductImages->getLogo()}}">

                                @endif
                                <ul class="product__hover">
                                    <li><a href="#"><img src="{{url('')}}/img/icon/heart.png" alt=""></a></li>

                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6>{{$value->sub_category_name}}</h6>
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
                <div class="row">
                    <div class="col-lg-12">
                        <div class="">
                            {!! $getProduct->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <script>
        $('.ChangeBrand').change(function() {
            var ids = '';
            $('.ChangeBrand').each(function() {
                if (this.checked) {
                    var id = $(this).val();
                    ids += id + ',';
                }
            });
            $('#get_brand_id').val(ids);
            FilterForm();


        });

        $('.ChangeColor').click(function() {
            var id = $(this).attr('id');
            var status = $(this).attr('data-val');
            if (status == 0) {
                $(this).attr('data-val', 1);
                $(this).addClass('active-color');
            } else {
                $(this).attr('data-val', 0);
                $(this).removeClass('active-color');
            }
            var ids = '';
            $('.ChangeColor').each(function() {
                var status = $(this).attr('data-val');
                if (status == 1) {
                    var id = $(this).attr('id');
                    ids += id + ',';
                }
            });
            console.log(ids);
            $('#get_color_id').val(ids);
            FilterForm();

        });

        function FilterForm() {
            $.ajax({
                type: "get", // Use POST method
                url: "{{ route('getPoductAjax') }}",
                data: $('#FilterForm').serialize(),
                dataType: "json",
                success: function(data) {
                    // Handle success response
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    console.error(error);
                }
            });

        }
    </script>



</section>
<!-- Shop Section End -->



@endsection
@section('script')

@endsection
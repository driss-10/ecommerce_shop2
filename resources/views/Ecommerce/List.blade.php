@extends('layouts.app')



@section('content')
<!-- Breadcrumb Section Begin -->
<link rel="stylesheet" href="{{url('')}}/tt/nouislider.min.css">
<script src="{{url('')}}/tt/main.js"></script>

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
                        <form action="" id="FilterForm" method="post">
                            {{csrf_field()}}
                            <input type="text" placeholder="Search...">
                            <button type="submit"><span class="icon_search"></span></button>
                            <input type="text" name="sub_category_id" id="get_category_id">
                            <input type="text" name="brand_id" id="get_brand_id">
                            <input type="text" name="color_id" id="get_color_id">
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
                                        <!--    @php
                                        $getCategoryHeader =App\Models\CategoryModel::getRecordMenu();

                                        @endphp -->
                                        <div class="pp">


                                            @foreach ($getSubCategoryFillter as $c_value )

                                            <ul class="form-check">


                                                <input class="form-check-input ChangeCategory" type="checkbox" value="{{$c_value->id}}" id='{{$c_value->id}}' value='{{$c_value->id}}'>
                                                <label class="form-check-label " for="{{$c_value->id}}">

                                                    {{$c_value->name}}<span>({{$c_value->TotalProduct()}})</span>
                                                </label>
                                            </ul>


                                            @endforeach
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
                                        <div class="shop__sidebar__brand pp">
                                            @foreach ($getBrand as $B_value )

                                            <ul class="form-check">


                                                <input class="form-check-input ChangeBrand" type="checkbox" id='{{$B_value->id}}' value='{{$B_value->id}}'>
                                                <label class="form-check-label ">
                                                    {{$B_value->name}}
                                                </label>
                                            </ul>


                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--              <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseThree">Filter Price</a>
                                </div>
                                <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="collapse show" id="widget-5">
                                            <div class="widget-body">
                                                <div class="filter-price">
                                                    <div class="filter-price-text">
                                                        Price Range:
                                                        <span id="filter-price-range"></span>
                                                    </div>

                                                    <div id="price-slider"></div>
                                                </div>
                                            </div><
                                        </div>
                                    </div>
                                </div>
                            </div>-->
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
                            <!--  <div class="card">
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
                            </div> -->
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
                <div id="getProductAjax">
                    @include('Ecommerce._List')
                    <div class="row">
                        <div class="col-lg-12">


                            <div style=" display: flex;justify-content: center;align-items: center;">
                                {{$getProduct->links() }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <script>
            $('.ChangeCategory').change(function() {
                var ids = '';
                $('.ChangeCategory').each(function() {
                    if (this.checked) {
                        var id = $(this).val();
                        ids += id + ',';
                    }
                });
                $('#get_category_id').val(ids);
                FilterForm();


            });
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
            var xhr;

            function FilterForm() {
                if (xhr && xhr.readyState != 1) {
                    xhr.abort();

                }
                xhr = $.ajax({
                    type: "POST", // Use POST method
                    url: "{{ url('get_Poduct_Ajax') }}",
                    data: $('#FilterForm').serialize(),
                    dataType: "json",
                    success: function(data) {
                        $('#getProductAjax').html(data.success)
                    },
                    error: function(data) {
                        // Handle error response

                    }
                });

            }
            /*  if (typeof noUiSlider === 'object') {
                 var priceSlider = document.getElementById('price-slider');
                 noUiSlider.create(priceSlider, {
                     start: [0, 750],
                     connect: true,
                     step: 50,
                     margin: 200,
                     range: {
                         'min': 0,
                         'max': 1000
                     },
                     tooltips: true,
                     format: wNumb({
                         decimals: 0,
                         prefix: '$'
                     })
                 });

                 // Update Price Range
                 priceSlider.noUiSlider.on('update', function(values, handle) {
                     $('#filter-price-range').text(values.join(' - '));
                 });
             } */
        </script>


</section>
<!-- Shop Section End -->



@endsection
@section('script')

@endsection
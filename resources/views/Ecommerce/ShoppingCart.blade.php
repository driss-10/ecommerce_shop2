@extends('layouts.app')
@section('title' ,'Shopping Cart')

@section('content')
@php
use App\Models\Cart;
use Gloudemans\Shoppingcart\Facades\Cart as ShoppingCart;



@endphp
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Shopping Cart</h4>
                    <div class="breadcrumb__links">
                        <a href="/">Home</a>
                        <a href="/Shop">Shop</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
    <div class="container">

        <div class="row">

            <div class="col-lg-8">
                <div class="shopping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Total</th>

                                <th></th>
                            </tr>
                            @foreach ($cartItems as $item)
                            @php
                            $price = $item['price'] ?? 0;
                            $productId = $item['id'] ?? null; // Ensure 'id' exists, otherwise default to null
                            $getCartProduct = null; // Initialize $getCartProduct
                            if ($productId) {
                            $getCartProduct = App\Models\ProductModel::getSingle($productId);
                            }
                            $getProductImage = $getCartProduct ? $getCartProduct->getImageSingle($getCartProduct->id) : null;
                            @endphp
                        </thead>

                        <tbody>
                            <tr>
                                <td class="product__cart__item">
                                    <div class="product__cart__item__pic">
                                        <img src="{{ $getProductImage->getLogo()}}" width="90px" height="90px" alt="">
                                        <img src="" alt="">
                                    </div>

                                    <div class="product__cart__item__text">
                                        <h6>{{$getCartProduct->title}}</h6>
                                        <h5>{{ collect(Cart::getContent())->count() }}</h5>
                                        <h5>${{ number_format($getCartProduct->price  * $item['quantity'] ,2)}}</h5>
                                    </div>

                                </td>
                                <td class="quantity__item">
                                    <div class="quantity">
                                        <div class="pro-qty-2">
                                            <input type="text" value="{{ $item['quantity']}}">
                                        </div>
                                    </div>
                                </td>
                                <td class="cart__price">${{ number_format($getCartProduct->price ,2)}}</td>
                                <td class="cart__close">
                                    <a href="{{ url('/Cart/delete',$getCartProduct->id ) }}">
                                        <i class="fa fa-close"></i>
                                    </a>
                                </td>
                                


                            </tr>

                        </tbody>
                        @endforeach

                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn">
                            <a href="#">Continue Shopping</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn update__btn">
                            <a href="#"><i class="fa fa-spinner"></i> Update cart</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cart__discount">
                    <h6>Discount codes</h6>
                    <form action="#">
                        <input type="text" placeholder="Coupon code">
                        <button type="submit">Apply</button>
                    </form>
                </div>
                <div class="cart__total">
                    <h6>Cart total</h6>

                    <ul>
                        <li>Subtotal <span>$ {{(number_format(Cart::getSubTotal() ,2))}}</span></li>
                        <li>Total <span>$ {{(number_format(Cart::getSubTotal() ,2))}}</span></li>


                    </ul>

                    <a href="#" class="primary-btn">Proceed to checkout</a>
                </div>
            </div>

        </div>

    </div>

</section>
<!-- Shopping Cart Section End -->

@endsection
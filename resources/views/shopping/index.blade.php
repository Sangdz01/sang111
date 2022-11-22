@extends('layouts.app')
@section('title', 'Cart')
@section('content')
<!-- breadcrumbs area start -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="container-inner">
                    <ul>
                        <li class="home">
                            <a href="{{ route('home') }}">Home</a>
                            <span><i class="fa fa-angle-right"></i></span>
                        </li>
                        <li class="category3"><span>Shopping Cart</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumbs area end -->
<!-- Shopping Table Container -->
<div class="cart-area-start">
    <div class="container">
        <div class="area-title" style="margin-top: 0; margin-bottom: 20px">
            <h2>My Shopping Cart</h2>
        </div>
        <!-- Shopping Cart Table -->
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="cart-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product</th>
                                <th>Product name</th>
                                <th>Unit Price</th>
                                <th>Qty</th>
                                <th>Subtotal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 ?>
                            @foreach ($products as $key => $product)
                            <tr>
                                <td><a href="">{{ $i }}</a></td>
                                <td>
                                    <a href="{{ route('get.detail.product', [$product->options->slug, $product->id]) }}"><img src="{{ asset(pare_url_file($product->options->avatar)) }}" class="" alt=""/></a>
                                </td>
                                <td>
                                    <a href="{{ route('get.detail.product', [$product->options->slug, $product->id]) }}"><h6>{{ $product->name }}</h6></a>
                                    
                                </td>
                                <td>
                                    <div class="cart-price">{{ number_format($product->price,'0','','.',).' VND' }}</div>
                                </td>
                                <td>
                                    <form>
                                        <input type="number" placeholder="1" min="1" value="{{ $product->qty }}">
                                    </form>
                                </td>
                                <td>
                                    <div class="cart-subtotal">{{ number_format($product->qty * $product->price,'0','','.',).' VND' }}</div>
                                </td>
                                <td><a href="{{ route('delete.shopping.cart', $key) }}"><i class="fa fa-times"></i></a></td>
                            </tr>
                            <?php $i++ ?>
                            @endforeach
                            <tr>
                                <td class="actions-crt" colspan="5"><h4>Total order amount</h4></td>
                                <td class="actions-crt" colspan="2">
                                    <h5>{{ Cart::subtotal(0, 3) }} VND</h5>
                                </td>
                            </tr>
                            <tr>
                                <td class="actions-crt" colspan="5"><h4>Payment orders</h4></td>
                                <td class="actions-crt" colspan="2">
                                    <?php
                                    $total = Cart::subtotal(0, 3);   
                                    ?>
                                    @if ( $total > 0)
                                    <div class="">
                                        <div class=" align-right"><a class="cbtn" href="{{ route('get.form.pay') }}"><i class="fa fa-mouse-pointer"></i> Click here</a></div>
                                    </div>
                                    @else
                                    <div class="">
                                        <div class=" align-right cbtn"><a class="cbtn" href=""><i class="fa fa-mouse-pointer"></i> Click here</a></div>
                                    </div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="actions-crt" colspan="7">
                                    <div class="">
                                        <div class="col-md-4 col-sm-4 col-xs-4 align-left"><a class="cbtn" href="{{ route('home') }}">Continue Shopping</a></div>
                                        <div class="col-md-4 col-sm-4 col-xs-4 align-center"><a class="cbtn" href="#">UPDATE SHOPPING CART</a></div>
                                        <div class="col-md-4 col-sm-4 col-xs-4 align-right"><a class="cbtn" href="#">CLEAR SHOPPING CART</a></div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Shopping Cart Table -->
    </div>
</div>
@stop
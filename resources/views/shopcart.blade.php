@extends('layouts.navbarHome')

@section('content')
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping_cart_table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="col-lg-6">Products</th>
                                    <th class="col-lg-2">Price</th>
                                    <th class="col-lg-2">Quantity</th>
                                    <th class="col-lg-3">Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="shoping_cart_item">
                                        <img src="img/cart/cart-1.jpg" alt="">
                                        <h5>Semanggi Stik</h5>
                                    </td>
                                    <td class="fw-bold">
                                        Rp 10.000
                                    </td>
                                    <td class="shoping_cart_quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="1">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping_cart_total">
                                        Rp 20.000
                                    </td>
                                    <td class="">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="shoping_cart_item">
                                        <img src="img/cart/cart-2.jpg" alt="">
                                        <h5>Mie Semanggi</h5>
                                    </td>
                                    <td class="shoping_cart_price">
                                        Rp 35.000
                                    </td>
                                    <td class="shoping_cart_quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="1">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping_cart_total">
                                        Rp 35.000
                                    </td>
                                    <td class="">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="shoping_cart_item">
                                        <img src="img/cart/cart-3.jpg" alt="">
                                        <h5>Kue Dahlia Semanggi</h5>
                                    </td>
                                    <td class="shoping_cart_price">
                                        Rp 35.000
                                    </td>
                                    <td class="">
                                        <div class="">
                                            <div class="pro-qty">
                                                <input type="number" id="quantity" style="width: 4cm" name="quantity">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping_cart_total">
                                        Rp 35.000
                                    </td>
                                    <td class="">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="mt-4">
                        <a href="#" class="btn btn-primary btn-cart">CONTINUE SHOPPING</a>
                        <a href="#" class="btn btn-primary btn-cart" style="margin-left: 20cm"><span class="icon_loading"></span>
                            Upadate Cart</a>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span>Rp 90.000</span></li>
                            <li>Total <span>Rp 90.000</span></li>
                        </ul>
                        <a href="/checkout" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

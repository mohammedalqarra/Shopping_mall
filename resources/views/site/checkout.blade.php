@extends('site.master')

@section('title', 'shop | ' . config('app.name'))

@section('content')

    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content">
                        <h1 class="page-name">checkout</h1>
                        <ol class="breadcrumb">
                            <li><a href="{{ route('site.index') }}">Home</a></li>
                            <li class="active">checkout</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="page-wrapper">
        <div class="checkout shopping">
           <div class="container">
              <div class="row">
                 <div class="col-md-8">
                    {{-- <div class="block billing-details">
                       <h4 class="widget-title">Billing Details</h4>
                       <form class="checkout-form">
                          <div class="form-group">
                             <label for="full_name">Full Name</label>
                             <input type="text" class="form-control" id="full_name" placeholder="">
                          </div>
                          <div class="form-group">
                             <label for="user_address">Address</label>
                             <input type="text" class="form-control" id="user_address" placeholder="">
                          </div>
                          <div class="checkout-country-code clearfix">
                             <div class="form-group">
                                <label for="user_post_code">Zip Code</label>
                                <input type="text" class="form-control" id="user_post_code" name="zipcode" value="">
                             </div>
                             <div class="form-group">
                                <label for="user_city">City</label>
                                <input type="text" class="form-control" id="user_city" name="city" value="">
                             </div>
                          </div>
                          <div class="form-group">
                             <label for="user_country">Country</label>
                             <input type="text" class="form-control" id="user_country" placeholder="">
                          </div>
                       </form>
                    </div>
                    <div class="block">
                       <h4 class="widget-title">Payment Method</h4>
                       <p>Credit Cart Details (Secure payment)</p>
                       <div class="checkout-product-details">
                          <div class="payment">
                             <div class="card-details">
                                <form class="checkout-form">
                                   <div class="form-group">
                                      <label for="card-number">Card Number <span class="required">*</span></label>
                                      <input id="card-number" class="form-control" type="tel" placeholder="•••• •••• •••• ••••">
                                   </div>
                                   <div class="form-group half-width padding-right">
                                      <label for="card-expiry">Expiry (MM/YY) <span class="required">*</span></label>
                                      <input id="card-expiry" class="form-control" type="tel" placeholder="MM / YY">
                                   </div>
                                   <div class="form-group half-width padding-left">
                                      <label for="card-cvc">Card Code <span class="required">*</span></label>
                                      <input id="card-cvc" class="form-control" type="tel" maxlength="4" placeholder="CVC">
                                   </div>
                                   <a href="confirmation.html" class="btn btn-main mt-20">Place Order</a>
                                </form>
                             </div>
                          </div>
                       </div>
                    </div> --}}
                    <p class="text-center mb-5">Chechout from will be here...</p>
                    <script src="https://eu-test.oppwa.com/v1/paymentWidgets.js?checkoutId={{ $id }}"></script>
                    <form action="{{ route('site.payment') }}" class="paymentWidgets" data-brands="VISA MASTER AMEX MADA"></form>
                    {{-- <div id="smart-button-container">
                        <div style="text-align: center;">
                          <div id="paypal-button-container"></div>
                        </div>
                      </div>
                    <script src="https://www.paypal.com/sdk/js?client-id=sb&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
                    <script>
                      function initPayPalButton() {
                        paypal.Buttons({
                          style: {
                            shape: 'rect',
                            color: 'blue',
                            layout: 'vertical',
                            label: 'checkout',

                          },

                          createOrder: function(data, actions) {
                            return actions.order.create({
                              purchase_units: [{"amount":{"currency_code":"USD","value":1}}]
                            });
                          },

                          onApprove: function(data, actions) {
                            return actions.order.capture().then(function(orderData) {

                              // Full available details
                              console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

                              // Show a success message within this page, e.g.
                              const element = document.getElementById('paypal-button-container');
                              element.innerHTML = '';
                              element.innerHTML = '<h3>Thank you for your payment!</h3>';

                              // Or go to another URL:  actions.redirect('thank_you.html');

                            });
                          },

                          onError: function(err) {
                            console.log(err);
                          }
                        }).render('#paypal-button-container');
                      }
                      initPayPalButton();
                    </script> --}}

                 </div>
                 <div class="col-md-4">
                    <div class="product-checkout-details">
                       <div class="block">
                          <h4 class="widget-title">Order Summary</h4>
                          <div class="media product-card">
                             <a class="pull-left" href="product-single.html">
                                <img class="media-object" src="images/shop/cart/cart-1.jpg" alt="Image">
                             </a>
                             <div class="media-body">
                                <h4 class="media-heading"><a href="product-single.html">Ambassador Heritage 1921</a></h4>
                                <p class="price">1 x $249</p>
                                <span class="remove">Remove</span>
                             </div>
                          </div>
                          <div class="discount-code">
                             <p>Have a discount ? <a data-toggle="modal" data-target="#coupon-modal" href="#!">enter it here</a></p>
                          </div>
                          <ul class="summary-prices">
                             <li>
                                <span>Subtotal:</span>
                                <span class="price">$190</span>
                             </li>
                             <li>
                                <span>Shipping:</span>
                                <span>Free</span>
                             </li>
                          </ul>
                          <div class="summary-total">
                             <span>Total</span>
                             <span>$250</span>
                          </div>
                          <div class="verified-icon">
                             <img src="images/shop/verified.png">
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
@stop

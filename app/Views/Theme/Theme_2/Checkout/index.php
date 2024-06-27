<section class="main-container checkout">
    <div class="container">
        <form id="checkout-form" action="<?php echo base_url('checkout_action') ?>" method="post">
            <div class="row">
                <div class="col-lg-12 ">
                    <?php if (session()->getFlashdata('message') !== NULL) : echo session()->getFlashdata('message'); endif; ?>
                </div>
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="title-checkout">
                        <label class="btn bg-custom-color text-white w-100 rounded-0">
                            <svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="22" viewBox="0 0 16 22"
                                    fill="none">
                                <path
                                        d="M13.9583 3.66699H2.04167C1.53541 3.66699 1.125 4.0774 1.125 4.58366V19.2503C1.125 19.7566 1.53541 20.167 2.04167 20.167H13.9583C14.4646 20.167 14.875 19.7566 14.875 19.2503V4.58366C14.875 4.0774 14.4646 3.66699 13.9583 3.66699Z"
                                        stroke="white" stroke-width="2" stroke-linejoin="round"/>
                                <path
                                        d="M5.24967 1.8335V4.5835M10.7497 1.8335V4.5835M4.33301 8.7085H11.6663M4.33301 12.3752H9.83301M4.33301 16.0418H7.99967"
                                        stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span class="text-label">Order Summary</span></label>
                    </div>
                    <div class="checkout-items mb-4">

                        <?php
                        $jdata = array();
                        foreach (Cart()->contents() as $val) { ?>
                            <div class="list-item d-flex gap-2 mb-2">
                                <div class="d-flex gap-2 bg-gray p-2 rounded-2 pro-bg-check">
                                    <?php
                                    $img = get_data_by_id('image', 'cc_products', 'product_id', $val['id']);
                                    $des = get_data_by_id('description', 'cc_product_description', 'product_id', $val['id']);
                                    ?>
                                    <?php echo image_view('uploads/products', $val['id'], '100_' . $img, 'noimage.png', 'img-fluid w-h-100') ?>
                                    <div>
                                        <p class="fw-semibold mb-2"><?php echo $val['name']; ?></p>
                                        <!--                                        <p class="lh-sm">-->
                                        <!--                                            <small>-->
                                        <?php //echo product_id_by_rating($val['id'], '1'); ?><!--</small>-->
                                        <!--                                        </p>-->
                                        <div class="d-flex justify-content-between mt-3 border">
                                            <button type="button" class="btn btn-sm w-100 p-0 "
                                                    onclick="plusItem('<?php echo $val['rowid']; ?>')" id="minus-btn"><i
                                                        class="fa fa-plus"></i></button>
                                            <input type="text" id="qty_input" name="qty"
                                                   class="border text-center item_<?php echo $val['rowid']; ?>"
                                                   value="<?php echo $val['qty']; ?>" min="1" style="width:45px">
                                            <button type="button" class="btn btn-sm w-100 p-0"
                                                    onclick="minusItem('<?php echo $val['rowid']; ?>')" id="plus-btn"><i
                                                        class="fa fa-minus"></i></button>

                                        </div>
                                        <div class="text-center mt-2">
                                            <button type="button" class="btn bg-custom-color text-white btn-sm"
                                                    id="btn_<?php echo $val['rowid']; ?>" style="display:none;"
                                                    onclick="updateQty('<?php echo $val['rowid']; ?>')">
                                                Update
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="remove bg-gray px-3 py-2 rounded-2 align-items-center d-flex pro-bg-check">
                                    <a href="javascript:void(0)"
                                       onclick="removeCart('<?php echo $val['rowid']; ?>',this)"><i
                                                class="fa-solid fa-trash-can"></i></a>
                                </div>
                            </div>
                            <?php
//                            $jdata[] =  ['name' => $val['name'],'id' => $val['id'],'price' => $val['price'],'quantity' => $val['qty'],'brand' => 'Google','category' =>'Apparel','variant'=> 'Gray'];
                            $brand_id = get_data_by_id('brand_id', 'cc_products', 'product_id', $val['id']);
                            $brand = get_data_by_id('name', 'cc_brand', 'brand_id', $brand_id);
                            $jdata[] = [
                                "item_id" => $val['id'],
                                "item_name" => $val['name'],
                                "item_brand" => $brand,
                                "item_category" => "Apparel",
                                "item_category2" => "Adult",
                                "item_category3" => "Shirts",
                                "item_category4" => "Crew",
                                "item_category5" => "Short sleeve",
                                "item_variant" => 'green',
                                "price" => $val['price'],
                                "quantity" => $val['qty']
                            ];

                        } ?>

                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <p class="check-title">address</p>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mb-4">
                                <label class="w-100" for="name">Name</label>
                                <input class="form-control rounded-0" type="text" name="payment_firstname"
                                       id="name" placeholder="Name" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mb-4">
                                <label class="w-100" for="payment_phone">Phone</label>
                                <input class="form-control rounded-0" type="number" id="payment_phone"
                                       name="payment_phone" placeholder="Phone" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mb-4">
                                <label class="w-100" for="address">Address</label>
                                <input class="form-control rounded-0" type="text" name="payment_address_1"
                                       id="payment_address_1"
                                       placeholder="Address" required>
                            </div>
                        </div>

                    </div>

                    <div id="rel">
                        <div class="summery" id="ship_reload">

                            <?php $disc = 0;
                            $total = (isset(newSession()->coupon_discount)) ? Cart()->total() - $disc : Cart()->total(); ?>

                            <div class="title-checkout">
                                <label class="btn bg-custom-color text-white w-100 rounded-0">
                                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                                d="M0 4.125V5.5H13.0625V15.8125H8.83025C8.52362 14.6307 7.46075 13.75 6.1875 13.75C4.91425 13.75 3.85138 14.6307 3.54475 15.8125H2.75V12.375H1.375V17.1875H3.54475C3.85138 18.3693 4.91425 19.25 6.1875 19.25C7.46075 19.25 8.52362 18.3693 8.83025 17.1875H14.5448C14.8514 18.3693 15.9143 19.25 17.1875 19.25C18.4607 19.25 19.5236 18.3693 19.8302 17.1875H22V11.5802L21.9567 11.4723L20.5817 7.34731L20.4325 6.875H14.4375V4.125H0ZM0.6875 6.875V8.25H6.875V6.875H0.6875ZM14.4375 8.25H19.4432L20.625 11.7734V15.8125H19.8302C19.5236 14.6307 18.4607 13.75 17.1875 13.75C15.9143 13.75 14.8514 14.6307 14.5448 15.8125H14.4375V8.25ZM1.375 9.625V11H5.5V9.625H1.375ZM6.1875 15.125C6.95544 15.125 7.5625 15.7321 7.5625 16.5C7.5625 17.2679 6.95544 17.875 6.1875 17.875C5.41956 17.875 4.8125 17.2679 4.8125 16.5C4.8125 15.7321 5.41956 15.125 6.1875 15.125ZM17.1875 15.125C17.9554 15.125 18.5625 15.7321 18.5625 16.5C18.5625 17.2679 17.9554 17.875 17.1875 17.875C16.4196 17.875 15.8125 17.2679 15.8125 16.5C15.8125 15.7321 16.4196 15.125 17.1875 15.125Z"
                                                fill="white"/>
                                    </svg>
                                    <span class="text-label">Shipping Method</span></label>
                            </div>

                            <div class="group-check ">

                                <div class="d-flex flex-column">


                                    <?php if (!empty($check_free_delivery)) { ?>
                                        <div class="d-flex justify-content-between mt-3">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="radio" name="shipping_method"
                                                           oninput="shippingChargeNew(this.value)" id="shipping_method"
                                                           value="<?php echo get_data_by_id('value', 'cc_shipping_settings', 'label', 'in_dhaka') ?>"
                                                           required>
                                                    Inside of Dhaka
                                                </label>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-between mt-3">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="radio" name="shipping_method"
                                                           oninput="shippingChargeNew(this.value)" id="shipping_method"
                                                           value="<?php echo get_data_by_id('value', 'cc_shipping_settings', 'label', 'out_dhaka') ?>"
                                                           required>
                                                    Outside of Dhaka
                                                </label>
                                            </div>
                                        </div>
                                    <?php } ?>

                                </div>

                                <div class="d-flex justify-content-between mt-3">
                                    <span>Shipping charge</span>
                                    <span id="chargeShip"><?php echo currency_symbol(0) ?></span>
                                    <input type="hidden" name="shipping_charge" id="shipping_charge" value="0">
                                </div>
                            </div>

                            <div class="total py-3 group-check mb-4" style="border-top: unset !important;">
                                <div class="d-flex justify-content-between fw-bold">
                                    <span>Total</span>
                                    <span id="total"><?php echo currency_symbol($total) ?></span>
                                    <input type="hidden" id="totalamo" value="<?php echo $total ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="title-checkout">
                        <label class="btn bg-custom-color text-white w-100 rounded-0">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M18.333 3.6665H3.66634C2.64884 3.6665 1.84217 4.48234 1.84217 5.49984L1.83301 16.4998C1.83301 17.5173 2.64884 18.3332 3.66634 18.3332H18.333C19.3505 18.3332 20.1663 17.5173 20.1663 16.4998V5.49984C20.1663 4.48234 19.3505 3.6665 18.333 3.6665ZM18.333 16.4998H3.66634V10.9998H18.333V16.4998ZM18.333 7.33317H3.66634V5.49984H18.333V7.33317Z"
                                        fill="white"/>
                            </svg>
                            <span class="text-label">Payment Method</span></label>
                    </div>
                    <div class="payment-method group-check mb-4 pb-4">
                        <?php foreach (get_all_data_array('cc_payment_method') as $pay) {
                            if ($pay->status == '1') { ?>
                                <div class="d-flex justify-content-between mt-3">
                                    <div class="form-check"><label class="form-check-label"><input
                                                    class="form-check-input"
                                                    onclick="instruction_view(this.value,'<?php echo $pay->code; ?>'),cardForm('<?php echo $pay->code; ?>')"
                                                    type="radio" name="payment_method" id="payment_method"
                                                    value="<?php echo $pay->payment_method_id; ?>" checked required>
                                            <?php echo !empty($pay->image) ? image_view('uploads/payment', '', $pay->image, 'noimage.png', 'img-payment') : $pay->name; ?>
                                        </label></div>
                                </div>
                            <?php }
                        } ?>

                    </div>


                    <!-- payment paypal input -->

                    <input type="hidden" name="amount" id="shipping_tot" value="<?php echo $total ?>">
                    <p>
                        <button type="submit" class="btn btn-success text-white w-100 rounded-0">Confirm
                            Order
                        </button>
                    </p>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </form>
    </div>
</section>

<script>
    window.dataLayer = window.dataLayer || [];
    // add to cart
    dataLayer.push({ecommerce: null});  // Clear the previous ecommerce object.
    dataLayer.push({
        event: "add_to_cart",
        ecommerce: {
            currency: "BDT",
            value: <?php echo $total ?>,
            items: [
                <?php print json_encode($jdata);?>
            ]
        }
    })


</script>
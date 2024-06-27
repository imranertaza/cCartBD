
<?php
    if (isset($_SESSION['order_id'])) {

        $jdata = array();
        foreach ($orderItem as $val) {
            $brand_id = get_data_by_id('brand_id', 'cc_products', 'product_id', $val->product_id);
            $brand = get_data_by_id('name', 'cc_brand', 'brand_id', $brand_id);
            $jdata[] = [
                "item_id" => $val->product_id,
                "item_name" => $val->name,
                "item_brand" => $brand,
                "item_category" => "Apparel",
                "item_category2" => "Adult",
                "item_category3" => "Shirts",
                "item_category4" => "Crew",
                "item_category5" => "Short sleeve",
                "item_variant" => 'green',
                "price" => $val->final_price,
                "quantity" => $val->quantity
            ];
        }

        $charge = $order->shipping_charge;
        $total = $order->final_amount;
        $finalAm = 0;
        $tax = 0;
        if (!empty($charge)){
           $amount = $total-$charge;
           $tax = ($amount*5)/100;
           $finalAm = $amount-$tax;
        }else{
            $charge = get_data_by_id('value','cc_shipping_settings','label','out_dhaka');
            $amount = $total-$charge;
            $tax = ($amount*5)/100;
            $finalAm = $amount-$tax;
        }
    }
?>


<section class="main-container checkout" id="tableReload">
    <div class="container">
        <div class="row">
<!--            <div class="col-md-6 text-center">-->
<!--                <img src="--><?php //echo base_url()?><!--/assets/img/success.svg" alt="success">-->
<!--            </div>-->
            <div class="col-md-3 text-center"></div>
            <div class="col-md-6 text-center align-self-center">
                <div class="message">
                    <img src="<?php echo base_url()?>/assets/img/suc_si.svg" alt="success">
                    <p class="suc-title">Done !</p>
                    <p class="suc-message">Your order successfully placed</p>
                    <a href="<?php echo base_url()?>" class="btn bg-black text-white mt-3" style="width:175px;" ><img src="<?php echo base_url()?>/assets/img/aroue.svg" alt="success"> Back to home</a>
                    <br>
                    <br>
                    <b>আপনার অর্ডারের ট্রাকিং অথবা বর্তমান অবস্থা জানতে আমাদের গ্রুপে জয়েন করুন।</b>
                    <br>
                    <a href="https://chat.whatsapp.com/H0Fiyen0gp26M5H3hTFTdB" target="_blank" style="color: #00A650;" ><b>Whatsapp Group</b></a>
                    <br>
                    <b>এছাড়াও আপনার মূল্যবান মতামত ও অভিযোগ থাকলে আমাদেরকে জানাতে পারেন এই গ্রুপের মাধ্যমে।</b>
                    <br>
                    <a href="https://www.facebook.com/groups/1025451975373703" target="_blank" style="color: #00A650;" ><b>Facebook Group</b></a>
                    <br>
                    <b>আরো কালেকশন দেখতে আমাদের ওয়েবসাইট ভিজিট করতে পারেন।</b>
                    <br>
                    <a href="https://deshirotno.com/" target="_blank" style="color: #00A650;" ><b>Website</b></a>
                    <br>
                </div>
            </div>
            <div class="col-md-3 text-center"></div>
        </div>
    </div>
</section>
<?php if (isset($_SESSION['order_id'])) { ?>
<script>
    window.dataLayer = window.dataLayer || [];
    dataLayer.push({ ecommerce: null });  // Clear the previous ecommerce object.
    dataLayer.push({
        event: "purchase",
        customer: {
            id: "7261873635642",
            first_name: "Mr",
            last_name: "<?php echo $order->payment_firstname;?>",
            full_name: "Mr <?php echo $order->payment_firstname;?>",
            email: "<?php echo $order->payment_email;?>",
            phone: "<?php echo $order->payment_phone;?>",
            address: {
                address_summary: "<?php echo $order->payment_address_1;?>",
                address1: "<?php echo $order->payment_address_1;?>",
                address2: "",
                city: "<?php echo $order->payment_address_1;?>",
                street: "<?php echo $order->payment_address_1;?>",
                zip_code: "",
                company: "",
                country: "Bangladesh",
                province: ""
            }
        },
        ecommerce: {
            transaction_id: "<?php echo $order->order_id;?>",
            value: "<?php echo $finalAm;?>",
            tax: "<?php echo $tax;?>",
            shipping: "<?php echo $charge;?>",
            currency: "BDT",
            items: <?php print json_encode($jdata);?>
        }
    });
</script>
<?php } unset($_SESSION['order_id']); ?>

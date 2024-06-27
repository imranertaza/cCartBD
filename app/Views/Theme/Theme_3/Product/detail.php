<main class="main_sec_details">
    <div class="container">
        <div class="content_box">
            <div class="setting_for_chackOut">
                <div class="row ">
                    <!--image showing -->
                    <div class="col-md-6">
                        <div class="showing_image_area">
                            <div class="showing_image position-relative overflow-hidden" id="coverIMg">
                                <?php echo image_view('uploads/products', $products->product_id, '437_' . $products->image, 'noimage.png', 'img-fluid' ,'cover') ?>
                                <span class="lanse" leance id="lance" style="background: url('<?php echo base_url()?>/assets/assets_fl/tile._CB483369110_.gif');"></span>
                            </div>
                        </div>

                        <div class="position-relative">
                            <div class="provious" id="provious"><svg width="23px" height="28px"
                                                                     viewBox="0 0 1024 1024" class="icon" version="1.1"
                                                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                            d="M768 903.232l-50.432 56.768L256 512l461.568-448 50.432 56.768L364.928 512z"
                                            fill="#000000" />
                                </svg></div>
                            <div class="next" id="next"><svg width="23px" height="28px" viewBox="0 0 1024 1024"
                                                             class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M256 120.768L306.432 64 768 512l-461.568 448L256 903.232 659.072 512z"
                                          fill="#000000" />
                                </svg></div>
                            <div class="sub-p-img mt-3 row" id="sliderIMG">

                                <div class="sub_img">
                                    <div class="other-image">
                                        <?php echo image_view('uploads/products', $products->product_id, '437_' . $products->image, 'noimage.png', 'img-opt') ?>
                                    </div>
                                </div>

                                <?php
                                if (!empty($proImg)) {
                                    foreach ($proImg as $imgval) {
                                        echo '<div class="sub_img"><div class="other-image">' . multi_image_view('uploads/products', $imgval->product_id, $imgval->product_image_id, '437_' . $imgval->image, 'noimage.png', 'img-opt') . '</div></div>';
                                    }
                                }
                                ?>


                            </div>
                        </div>
                    </div>
                    <!--image details showing -->
                    <div class="col-md-6">
                        <form id="addto-cart-form" action="<?php echo base_url('addtocartdetail') ?>" method="post">
                            <?php
                                $stock = get_data_by_id('quantity', 'cc_products', 'product_id', $products->product_id);
                                $brand = get_data_by_id('name', 'cc_brand', 'brand_id', $products->brand_id);
                            ?>
                        <div class="product-settings position-relative">
                            <div id="zoomViewContainer">
                                <div id="zoom-view"></div>
                            </div>
                            <div class="product-title">
                                <h4><?php echo $products->name; ?></h4>
                            </div>
                            <div class="reatings-area">
                                <?php echo product_id_by_rating($products->product_id, '1'); ?>

                            </div>

                            <div class="stock-showing mt-3 mb-6">
                                <?php if (!empty($stock)) { ?>
                                <span>IN STOCK <span class="num-stock">(<?php echo $stock; ?>)</span></span>
                                <?php } else { ?>
                                <span>OUT OF STOCK</span>
                                <?php } ?>
                            </div>

                            <div class="product-detiles-setup">
                                <!--Brand name -->
                                <div class="row mb-6">
                                    <div class="col-4">
                                        <div class="title-drand">
                                            <span>Brand</span>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="brand-name">
                                            <span><?php echo $brand;?></span>
                                        </div>
                                    </div>
                                </div>
                                <!--product color -->

                                <div class="row mb-6">
                                    <?php echo $option;?>
                                </div>

<!--                                <div class="row mb-6">-->
<!--                                    <div class="col-4 ">-->
<!--                                        <div class="title-drand">-->
<!--                                            <span>color</span>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="col-8">-->
<!--                                        <div class="product-color">-->
<!--                                            <ul>-->
<!--                                                <li>-->
<!--                                                    <input type="radio" class="btn-check-dtl" name="color"-->
<!--                                                           id="option_1">-->
<!--                                                    <label class="btn12" for="option_1">Blue</label>-->
<!--                                                </li>-->
<!--                                                <li>-->
<!--                                                    <input type="radio" class="btn-check-dtl" name="color"-->
<!--                                                           id="option_2">-->
<!--                                                    <label class="btn12" for="option_2">Yellow</label>-->
<!--                                                </li>-->
<!--                                                <li>-->
<!--                                                    <input type="radio" class="btn-check-dtl" name="color"-->
<!--                                                           id="option_3">-->
<!--                                                    <label class="btn12" for="option_3">Purple</label>-->
<!--                                                </li>-->
<!--                                                <li>-->
<!--                                                    <input type="radio" class="btn-check-dtl" name="color"-->
<!--                                                           id="option_4">-->
<!--                                                    <label class="btn12" for="option_4">Brown</label>-->
<!--                                                </li>-->
<!--                                                <li>-->
<!--                                                    <input type="radio" class="btn-check-dtl" name="color"-->
<!--                                                           id="option_5">-->
<!--                                                    <label class="btn12" for="option_5">red</label>-->
<!--                                                </li>-->
<!--                                            </ul>-->
<!---->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
                                <!--product sizes -->
<!--                                <div class="row  mb-6">-->
<!--                                    <div class="col-4">-->
<!--                                        <div class="title-drand">-->
<!--                                            <span>Size</span>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="col-8">-->
<!--                                        <div class="product-size">-->
<!--                                            <ul>-->
<!--                                                <li>-->
<!--                                                    <input type="radio" class="btn-check-dtl" name="size"-->
<!--                                                           id="size-option1">-->
<!--                                                    <label class="btn12" for="size-option1">12</label>-->
<!--                                                </li>-->
<!--                                                <li>-->
<!--                                                    <input type="radio" class="btn-check-dtl" name="size"-->
<!--                                                           id="size-option2">-->
<!--                                                    <label class="btn12" for="size-option2">40</label>-->
<!--                                                </li>-->
<!--                                                <li>-->
<!--                                                    <input type="radio" class="btn-check-dtl" name="size"-->
<!--                                                           id="size-option3">-->
<!--                                                    <label class="btn12" for="size-option3">25</label>-->
<!--                                                </li>-->
<!--                                                <li>-->
<!--                                                    <input type="radio" class="btn-check-dtl" name="size"-->
<!--                                                           id="size-option4">-->
<!--                                                    <label class="btn12" for="size-option4">45</label>-->
<!--                                                </li>-->
<!--                                                <li>-->
<!--                                                    <input type="radio" class="btn-check-dtl" name="size"-->
<!--                                                           id="size-option5">-->
<!--                                                    <label class="btn12" for="size-option5">50</label>-->
<!--                                                </li>-->
<!--                                            </ul>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->

                                <div class="user-desition-quantity">
                                    <div class="quantity-change">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text rounded-0 cal-btn"
                                                                  id="q-dri">-</span>
                                                    </div>
                                                    <input type="text" name="qty" class="form-control text-center"
                                                           id="quantityCount" value="1">
                                                    <div class="input-group-append">
                                                            <span id="q-inc"
                                                                  class="input-group-text rounded-0 cal-btn">+</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="product-price text-end" id="priceVal">
                                                    <?php $spPric = get_data_by_id('special_price', 'cc_product_special', 'product_id', $products->product_id);
                                                    if (empty($spPric)) { ?>
                                                        <?php $pp = $products->price;    echo currency_symbol($products->price); ?>
                                                    <?php } else { ?>
                                                        <small class="off-price-det">
                                                            <del><?php echo currency_symbol($products->price); ?></del> </small>
                                                        <?php echo currency_symbol($spPric);$pp = $spPric;?>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="user-desition">
                                    <div class="row">
                                        <div class="col-6">
                                            <?php if (!empty($stock)) { ?>
                                            <div class="addto-card-2btn">
                                                <input type="hidden" name="product_id" value="<?php echo $products->product_id ?>"
                                                       required>
                                                <button type="submit" class="btn rounded-0" onclick="addToCartdetail(),buyNow()">
                                                    Buy Now
                                                </button>
                                            </div>
                                            <?php } ?>

                                            <?php if (modules_key_by_access('compare') == 1) { ?>
                                            <div class="addto-card-3btn">
                                                <a href="javascript:void(0)" class="btn rounded-0" onclick="addToCompare(<?php echo $products->product_id ?>)" >
                                                        <span>
                                                            <svg width="16" height="14" viewBox="0 0 16 14" fill="none">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                      d="M7.38892 11.3667L6.11892 10.2555L6.78892 9.64299L8.91892 11.5067V12.1192L6.78892 13.983L6.07892 13.3617L7.34892 12.2505H5.49892C5.17024 12.2517 4.84456 12.1959 4.54065 12.0863C4.23673 11.9768 3.96061 11.8157 3.7282 11.6124C3.49579 11.409 3.31169 11.1674 3.18652 10.9015C3.06136 10.6356 2.99759 10.3506 2.99892 10.063V5.20675C2.5198 5.11749 2.07943 4.91118 1.72892 4.61175C1.38078 4.30397 1.14393 3.91331 1.0479 3.48851C0.951868 3.06371 1.00091 2.62357 1.18892 2.223C1.37866 1.82378 1.69936 1.48272 2.1105 1.24288C2.52164 1.00305 3.00479 0.875207 3.49892 0.875495C3.84188 0.869044 4.18256 0.925683 4.49892 1.04175C4.80197 1.15083 5.07732 1.31139 5.30903 1.51414C5.54075 1.7169 5.72425 1.95782 5.84892 2.223C5.98192 2.50037 6.04592 2.79875 6.03892 3.098C6.03904 3.60228 5.84003 4.09111 5.47557 4.48177C5.11112 4.87242 4.6036 5.14089 4.03892 5.24174V10.0542C4.03892 10.4023 4.19695 10.7362 4.47826 10.9823C4.75956 11.2285 5.14109 11.3667 5.53892 11.3667H7.38892ZM2.70892 4.14799C2.99744 4.31619 3.34363 4.39174 3.68862 4.3618C4.03362 4.33187 4.35611 4.19829 4.60125 3.98379C4.84639 3.76929 4.99905 3.48711 5.03327 3.18524C5.06748 2.88337 4.98114 2.58045 4.78892 2.328C4.62118 2.11055 4.38497 1.94035 4.10892 1.838C3.83644 1.74088 3.5372 1.71652 3.24892 1.768C2.95693 1.8174 2.68852 1.94213 2.47823 2.12614C2.26793 2.31015 2.12538 2.54501 2.06892 2.8005C2.01009 3.05274 2.03793 3.31457 2.14892 3.553C2.26592 3.79537 2.45992 4.00187 2.70892 4.14799ZM13.0389 9.66049C13.5189 9.74624 13.9609 9.95362 14.3089 10.2555C14.7166 10.6144 14.9702 11.0856 15.0267 11.5892C15.0832 12.0929 14.9391 12.5982 14.6189 13.0196C14.4132 13.2879 14.1422 13.5131 13.8253 13.6788C13.5083 13.8446 13.1534 13.9468 12.7859 13.9782C12.4184 14.0097 12.0476 13.9695 11.6999 13.8606C11.3523 13.7517 11.0366 13.5767 10.7754 13.3484C10.5143 13.12 10.3142 12.8438 10.1895 12.5397C10.0648 12.2356 10.0187 11.9111 10.0544 11.5896C10.0901 11.268 10.2068 10.9574 10.396 10.6799C10.5853 10.4025 10.8424 10.1652 11.1489 9.98512C11.4179 9.82587 11.7199 9.71562 12.0389 9.66137V4.80424C12.0389 4.45615 11.8809 4.12231 11.5996 3.87617C11.3183 3.63003 10.9367 3.49175 10.5389 3.49175H8.68892L9.95892 4.603L9.24892 5.22425L7.11892 3.3605V2.748L9.24892 0.884245L9.95892 1.5055L8.68892 2.61675H10.5389C10.8676 2.61559 11.1933 2.67138 11.4972 2.7809C11.8011 2.89042 12.0772 3.05151 12.3096 3.25487C12.542 3.45823 12.7261 3.69984 12.8513 3.96576C12.9765 4.23168 13.0402 4.51665 13.0389 4.80424V9.66049ZM12.6879 13.1106C12.9451 13.088 13.1913 13.0077 13.4026 12.8773C13.6139 12.7469 13.783 12.571 13.8937 12.3666C14.0044 12.1622 14.0528 11.9362 14.0343 11.7106C14.0157 11.4849 13.9309 11.2673 13.7879 11.0789C13.6202 10.8614 13.384 10.6912 13.1079 10.5889C12.8357 10.4919 12.5369 10.4676 12.2489 10.5189C11.9569 10.5683 11.6885 10.693 11.4782 10.877C11.2679 11.061 11.1254 11.2959 11.0689 11.5514C11.0101 11.8036 11.0379 12.0654 11.1489 12.3039C11.2718 12.5655 11.4881 12.7854 11.7654 12.9308C12.0427 13.0761 12.3663 13.1392 12.6879 13.1106Z"
                                                                      fill="#444444" />
                                                            </svg>
                                                        </span>
                                                    <span>Add to Compare</span>
                                                </a>
                                            </div>
                                            <?php } ?>
                                        </div>

                                        <!--===-->
                                        <div class="col-6">
                                            <?php if (!empty($stock)) { ?>
                                            <div class="addto-card-4btn">
                                                <input type="hidden" name="product_id" value="<?php echo $products->product_id ?>"
                                                       required>
                                                <button type="submit" class="btn rounded-0" onclick="addToCartdetail()">
                                                    Add to Cart
                                                </button>
                                            </div>
                                            <?php } ?>

                                            <?php if (modules_key_by_access('wishlist') == 1) { ?>
                                            <div class="addto-card-3btn">
                                                <?php if (!isset(newSession()->isLoggedInCustomer)) { ?>
                                                    <a href="<?php echo base_url('login'); ?>"
                                                       class="btn rounded-0">
                                                        <span><svg width="15" height="14" viewBox="0 0 15 14"
                                                                   fill="none">
                                                                <path d="M7.49935 12.251L6.65352 11.4927C5.67157 10.608 4.85977 9.84479 4.2181 9.20312C3.57643 8.56146 3.06602 7.98532 2.68685 7.47471C2.30768 6.96449 2.04285 6.49548 1.89235 6.06771C1.74185 5.63993 1.6664 5.20243 1.66602 4.75521C1.66602 3.84132 1.97227 3.07812 2.58477 2.46562C3.19727 1.85312 3.96046 1.54687 4.87435 1.54688C5.3799 1.54688 5.86115 1.65382 6.3181 1.86771C6.77504 2.0816 7.16879 2.38299 7.49935 2.77187C7.8299 2.38299 8.22365 2.0816 8.6806 1.86771C9.13754 1.65382 9.61879 1.54688 10.1243 1.54688C11.0382 1.54688 11.8014 1.85312 12.4139 2.46562C13.0264 3.07812 13.3327 3.84132 13.3327 4.75521C13.3327 5.20243 13.2572 5.63993 13.1063 6.06771C12.9555 6.49548 12.6906 6.96449 12.3118 7.47471C11.9327 7.98532 11.4223 8.56146 10.7806 9.20312C10.1389 9.84479 9.32713 10.608 8.34518 11.4927L7.49935 12.251ZM7.49935 10.676C8.43268 9.83993 9.20074 9.12282 9.80352 8.52471C10.4063 7.9266 10.8827 7.40665 11.2327 6.96487C11.5827 6.52232 11.8257 6.12837 11.9618 5.78304C12.098 5.43771 12.166 5.0951 12.166 4.75521C12.166 4.17187 11.9716 3.68576 11.5827 3.29687C11.1938 2.90799 10.7077 2.71354 10.1243 2.71354C9.6674 2.71354 9.24449 2.84226 8.8556 3.09971C8.46671 3.35715 8.19935 3.68537 8.05352 4.08437H6.94518C6.79935 3.68576 6.53199 3.35754 6.1431 3.09971C5.75421 2.84187 5.33129 2.71315 4.87435 2.71354C4.29102 2.71354 3.8049 2.90799 3.41602 3.29687C3.02713 3.68576 2.83268 4.17187 2.83268 4.75521C2.83268 5.09548 2.90074 5.43829 3.03685 5.78362C3.17296 6.12896 3.41602 6.52271 3.76602 6.96487C4.11602 7.40704 4.5924 7.92718 5.19518 8.52529C5.79796 9.1234 6.56602 9.84032 7.49935 10.676Z"
                                                                      fill="#444444" />
                                                            </svg>
                                                        </span>
                                                        <span>Add to Whislist</span>
                                                    </a>
                                                <?php } else { ?>
                                                    <a href="javascript:void(0)" class="btn rounded-0">
                                                            <span><svg width="15" height="14" viewBox="0 0 15 14"
                                                                       fill="none">
                                                                    <path d="M7.49935 12.251L6.65352 11.4927C5.67157 10.608 4.85977 9.84479 4.2181 9.20312C3.57643 8.56146 3.06602 7.98532 2.68685 7.47471C2.30768 6.96449 2.04285 6.49548 1.89235 6.06771C1.74185 5.63993 1.6664 5.20243 1.66602 4.75521C1.66602 3.84132 1.97227 3.07812 2.58477 2.46562C3.19727 1.85312 3.96046 1.54687 4.87435 1.54688C5.3799 1.54688 5.86115 1.65382 6.3181 1.86771C6.77504 2.0816 7.16879 2.38299 7.49935 2.77187C7.8299 2.38299 8.22365 2.0816 8.6806 1.86771C9.13754 1.65382 9.61879 1.54688 10.1243 1.54688C11.0382 1.54688 11.8014 1.85312 12.4139 2.46562C13.0264 3.07812 13.3327 3.84132 13.3327 4.75521C13.3327 5.20243 13.2572 5.63993 13.1063 6.06771C12.9555 6.49548 12.6906 6.96449 12.3118 7.47471C11.9327 7.98532 11.4223 8.56146 10.7806 9.20312C10.1389 9.84479 9.32713 10.608 8.34518 11.4927L7.49935 12.251ZM7.49935 10.676C8.43268 9.83993 9.20074 9.12282 9.80352 8.52471C10.4063 7.9266 10.8827 7.40665 11.2327 6.96487C11.5827 6.52232 11.8257 6.12837 11.9618 5.78304C12.098 5.43771 12.166 5.0951 12.166 4.75521C12.166 4.17187 11.9716 3.68576 11.5827 3.29687C11.1938 2.90799 10.7077 2.71354 10.1243 2.71354C9.6674 2.71354 9.24449 2.84226 8.8556 3.09971C8.46671 3.35715 8.19935 3.68537 8.05352 4.08437H6.94518C6.79935 3.68576 6.53199 3.35754 6.1431 3.09971C5.75421 2.84187 5.33129 2.71315 4.87435 2.71354C4.29102 2.71354 3.8049 2.90799 3.41602 3.29687C3.02713 3.68576 2.83268 4.17187 2.83268 4.75521C2.83268 5.09548 2.90074 5.43829 3.03685 5.78362C3.17296 6.12896 3.41602 6.52271 3.76602 6.96487C4.11602 7.40704 4.5924 7.92718 5.19518 8.52529C5.79796 9.1234 6.56602 9.84032 7.49935 10.676Z"
                                                                            fill="#444444" />
                                                                </svg>
                                                            </span>
                                                        <span>Add to Whislist</span>
                                                    </a>
                                                <?php } ?>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <!--===-->
<!--            <div class="service-nifo-area">-->
<!--                <div class="service-nifo-container">-->
<!--                    <ul>-->
<!--                        <li>-->
<!--                            <a href="#">-->
<!--                                    <span class="icon">-->
<!--                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">-->
<!--                                            <path-->
<!--                                                    d="M22.221 15.7671L21.997 14.6421H19.483L19.083 15.7591L17.068 15.7631C18.363 12.6501 19.325 10.3451 19.952 8.84614C20.116 8.45414 20.407 8.25414 20.836 8.25714C21.164 8.26014 21.699 8.26014 22.442 8.25814L24 15.7641L22.221 15.7671ZM20.049 13.1011H21.669L21.064 10.2811L20.049 13.1011ZM7.06 8.25614L9.086 8.25814L5.954 15.7681L3.903 15.7661C3.38725 13.7825 2.87792 11.7971 2.375 9.81014C2.275 9.41414 2.077 9.13714 1.696 9.00614C1.13333 8.81755 0.56794 8.6372 0 8.46514L0 8.25814H3.237C3.797 8.25814 4.124 8.52914 4.229 9.08514C4.335 9.64214 4.601 11.0611 5.029 13.3391L7.06 8.25614ZM11.87 8.25814L10.269 15.7671L8.34 15.7641L9.94 8.25614L11.87 8.25814ZM15.78 8.11914C16.357 8.11914 17.084 8.29914 17.502 8.46514L17.164 10.0211C16.786 9.86914 16.164 9.66414 15.641 9.67114C14.881 9.68414 14.411 10.0031 14.411 10.3091C14.411 10.8071 15.227 11.0581 16.067 11.6021C17.025 12.2221 17.152 12.7791 17.14 13.3851C17.127 14.6401 16.067 15.8791 13.831 15.8791C12.811 15.8641 12.443 15.7791 11.611 15.4831L11.963 13.8591C12.81 14.2131 13.169 14.3261 13.893 14.3261C14.556 14.3261 15.125 14.0581 15.13 13.5911C15.134 13.2591 14.93 13.0941 14.186 12.6841C13.442 12.2731 12.398 11.7051 12.412 10.5621C12.429 9.10014 13.814 8.11914 15.78 8.11914Z"-->
<!--                                                    fill="#2E2E2E" />-->
<!--                                        </svg>-->
<!--                                    </span>-->
<!--                                <span class="text">Accept payments online</span>-->
<!--                            </a>-->
<!--                        </li>-->
<!---->
<!--                        <li>-->
<!--                            <a href="#">-->
<!--                                    <span class="icon">-->
<!--                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">-->
<!--                                            <path d="M3 12H12V13.5H3V12ZM1.5 8.25H9V9.75H1.5V8.25Z" fill="#2E2E2E" />-->
<!--                                            <path-->
<!--                                                    d="M22.4388 12.4545L20.1888 7.2045C20.131 7.06956 20.0349 6.95455 19.9124 6.87375C19.7899 6.79295 19.6463 6.74992 19.4995 6.75H17.2495V5.25C17.2495 5.05109 17.1705 4.86032 17.0299 4.71967C16.8892 4.57902 16.6984 4.5 16.4995 4.5H4.49952V6H15.7495V15.417C15.4078 15.6154 15.1087 15.8796 14.8695 16.1942C14.6303 16.5088 14.4558 16.8676 14.356 17.25H9.64302C9.46047 16.543 9.02635 15.9269 8.42201 15.517C7.81768 15.1072 7.08463 14.9319 6.36027 15.0239C5.63591 15.1159 4.96997 15.4689 4.48728 16.0168C4.00459 16.5647 3.73828 17.2698 3.73828 18C3.73828 18.7302 4.00459 19.4353 4.48728 19.9832C4.96997 20.5311 5.63591 20.8841 6.36027 20.9761C7.08463 21.0681 7.81768 20.8928 8.42201 20.483C9.02635 20.0731 9.46047 19.457 9.64302 18.75H14.356C14.5192 19.3937 14.8923 19.9646 15.4164 20.3724C15.9404 20.7802 16.5855 21.0016 17.2495 21.0016C17.9136 21.0016 18.5586 20.7802 19.0827 20.3724C19.6067 19.9646 19.9799 19.3937 20.143 18.75H21.7495C21.9484 18.75 22.1392 18.671 22.2799 18.5303C22.4205 18.3897 22.4995 18.1989 22.4995 18V12.75C22.4996 12.6484 22.4789 12.5479 22.4388 12.4545ZM6.74952 19.5C6.45285 19.5 6.16284 19.412 5.91616 19.2472C5.66949 19.0824 5.47723 18.8481 5.3637 18.574C5.25017 18.2999 5.22046 17.9983 5.27834 17.7074C5.33622 17.4164 5.47908 17.1491 5.68886 16.9393C5.89864 16.7296 6.16591 16.5867 6.45688 16.5288C6.74785 16.4709 7.04945 16.5006 7.32354 16.6142C7.59763 16.7277 7.8319 16.92 7.99672 17.1666C8.16155 17.4133 8.24952 17.7033 8.24952 18C8.24912 18.3977 8.09096 18.779 7.80974 19.0602C7.52852 19.3414 7.14722 19.4996 6.74952 19.5ZM17.2495 8.25H19.0045L20.6125 12H17.2495V8.25ZM17.2495 19.5C16.9528 19.5 16.6628 19.412 16.4162 19.2472C16.1695 19.0824 15.9772 18.8481 15.8637 18.574C15.7502 18.2999 15.7205 17.9983 15.7783 17.7074C15.8362 17.4164 15.9791 17.1491 16.1889 16.9393C16.3986 16.7296 16.6659 16.5867 16.9569 16.5288C17.2479 16.4709 17.5495 16.5006 17.8235 16.6142C18.0976 16.7277 18.3319 16.92 18.4967 17.1666C18.6615 17.4133 18.7495 17.7033 18.7495 18C18.7491 18.3977 18.591 18.779 18.3097 19.0602C18.0285 19.3414 17.6472 19.4996 17.2495 19.5ZM20.9995 17.25H20.143C19.9778 16.6076 19.6041 16.0381 19.0804 15.6309C18.5568 15.2238 17.9128 15.0018 17.2495 15V13.5H20.9995V17.25Z"-->
<!--                                                    fill="#2E2E2E" />-->
<!--                                        </svg>-->
<!--                                    </span>-->
<!--                                <span class="text">Free Delivery</span>-->
<!--                            </a>-->
<!--                        </li>-->
<!---->
<!--                        <li>-->
<!--                            <a href="#">-->
<!--                                    <span class="icon">-->
<!--                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">-->
<!--                                            <path d="M6.5 4L3 7L6.5 10.5" stroke="#2E2E2E" stroke-width="2"-->
<!--                                                  stroke-linecap="round" stroke-linejoin="round" />-->
<!--                                            <path-->
<!--                                                    d="M3 7H14.497C17.9385 7 20.861 9.81 20.995 13.25C21.137 16.885 18.1335 20 14.497 20H5.999"-->
<!--                                                    stroke="#2E2E2E" stroke-width="2" stroke-linecap="round"-->
<!--                                                    stroke-linejoin="round" />-->
<!--                                        </svg>-->
<!--                                    </span>-->
<!--                                <span class="text">24 months warranty</span>-->
<!--                            </a>-->
<!--                        </li>-->
<!---->
<!--                        <li>-->
<!--                            <a href="#">-->
<!--                                    <span class="icon">-->
<!--                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">-->
<!--                                            <path-->
<!--                                                    d="M11.0669 8.0049L11.2509 7.9999H18.7509C19.5809 7.99983 20.3794 8.3173 20.9828 8.88721C21.5862 9.45711 21.9487 10.2363 21.9959 11.0649L22.0009 11.2499V18.7499C22.001 19.58 21.6833 20.3787 21.1132 20.9821C20.5431 21.5855 19.7637 21.9479 18.9349 21.9949L18.7509 21.9999H11.2509C10.4208 22 9.62207 21.6823 9.01867 21.1122C8.41526 20.5421 8.0529 19.7627 8.0059 18.9339L8.0009 18.7509V11.2509C8.00084 10.4208 8.31845 9.62207 8.88857 9.01867C9.45869 8.41526 10.2381 8.0529 11.0669 8.0059V8.0049ZM18.7509 9.4999H11.2509C10.8117 9.49991 10.3886 9.66507 10.0655 9.96258C9.74243 10.2601 9.54304 10.6682 9.5069 11.1059L9.5009 11.2499V18.7499C9.50094 19.1892 9.66623 19.6125 9.96395 19.9356C10.2617 20.2587 10.67 20.458 11.1079 20.4939L11.2509 20.4999H18.7509C19.1902 20.4999 19.6135 20.3346 19.9366 20.0368C20.2597 19.7391 20.459 19.3308 20.4949 18.8929L20.5009 18.7499V11.2499C20.5009 10.7858 20.3165 10.3406 19.9883 10.0125C19.6601 9.68427 19.215 9.4999 18.7509 9.4999ZM15.0009 11.0009C15.1998 11.0009 15.3906 11.0799 15.5312 11.2206C15.6719 11.3612 15.7509 11.552 15.7509 11.7509V14.2489H18.2509C18.4498 14.2489 18.6406 14.3279 18.7812 14.4686C18.9219 14.6092 19.0009 14.8 19.0009 14.9989C19.0009 15.1978 18.9219 15.3886 18.7812 15.5292C18.6406 15.6699 18.4498 15.7489 18.2509 15.7489H15.7509V18.2509C15.7509 18.4498 15.6719 18.6406 15.5312 18.7812C15.3906 18.9219 15.1998 19.0009 15.0009 19.0009C14.802 19.0009 14.6112 18.9219 14.4706 18.7812C14.3299 18.6406 14.2509 18.4498 14.2509 18.2509V15.7489H11.7509C11.552 15.7489 11.3612 15.6699 11.2206 15.5292C11.0799 15.3886 11.0009 15.1978 11.0009 14.9989C11.0009 14.8 11.0799 14.6092 11.2206 14.4686C11.3612 14.3279 11.552 14.2489 11.7509 14.2489H14.2509V11.7509C14.2509 11.552 14.3299 11.3612 14.4706 11.2206C14.6112 11.0799 14.802 11.0009 15.0009 11.0009ZM15.5829 4.2339L15.6349 4.4109L16.3279 6.9989H14.7749L14.1869 4.7989C14.1275 4.57679 14.0249 4.36856 13.885 4.18613C13.745 4.00369 13.5705 3.85061 13.3714 3.73564C13.1723 3.62067 12.9525 3.54606 12.7245 3.51608C12.4966 3.48609 12.265 3.50132 12.0429 3.5609L4.7989 5.5029C4.37603 5.6163 4.01102 5.88408 3.77591 6.25341C3.5408 6.62273 3.45266 7.06677 3.5289 7.4979L3.5609 7.6459L5.5029 14.8899C5.59399 15.2303 5.78572 15.5353 6.053 15.7649C6.32028 15.9945 6.65066 16.1381 7.0009 16.1769V17.6829C6.35072 17.6441 5.72716 17.4111 5.21099 17.0138C4.69483 16.6166 4.30984 16.0735 4.1059 15.4549L4.0539 15.2789L2.1129 8.0339C1.8979 7.23227 1.99773 6.37877 2.39193 5.6484C2.78612 4.91803 3.4448 4.36614 4.2329 4.1059L4.4109 4.0539L11.6549 2.1129C12.4565 1.8979 13.31 1.99773 14.0404 2.39193C14.7708 2.78612 15.3227 3.4458 15.5829 4.2339Z"-->
<!--                                                    fill="#2E2E2E" />-->
<!--                                        </svg>-->
<!--                                    </span>-->
<!--                                <span class="text">30 days cancellation</span>-->
<!--                            </a>-->
<!--                        </li>-->
<!---->
<!--                        <li>-->
<!--                            <a href="#">-->
<!--                                    <span class="icon">-->
<!--                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">-->
<!--                                            <path-->
<!--                                                    d="M6.54 5C6.6 5.89 6.75 6.76 6.99 7.59L5.79 8.79C5.38 7.59 5.12 6.32 5.03 5H6.54ZM16.4 17.02C17.25 17.26 18.12 17.41 19 17.47V18.96C17.68 18.87 16.41 18.61 15.2 18.21L16.4 17.02ZM7.5 3H4C3.45 3 3 3.45 3 4C3 13.39 10.61 21 20 21C20.55 21 21 20.55 21 20V16.51C21 15.96 20.55 15.51 20 15.51C18.76 15.51 17.55 15.31 16.43 14.94C16.3307 14.904 16.2256 14.887 16.12 14.89C15.86 14.89 15.61 14.99 15.41 15.18L13.21 17.38C10.3754 15.9304 8.06961 13.6246 6.62 10.79L8.82 8.59C9.1 8.31 9.18 7.92 9.07 7.57C8.69065 6.41806 8.49821 5.2128 8.5 4C8.5 3.45 8.05 3 7.5 3Z"-->
<!--                                                    fill="#2E2E2E" />-->
<!--                                        </svg>-->
<!--                                    </span>-->
<!--                                <span class="text">Contact us</span>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--            </div>-->
            <!--==-->

            <div class="detiles-section">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="detiles-text-contant">
                            <div class="headding-text">
                                <h3>About this item</h3>
                            </div>
                            <div class="text-list" id="TextLIst">
                                <?php echo $products->description; ?>
                            </div>
                            <?php if (!empty($products->description)){ ?>
                            <div class="readMore">
                                <span id="SeenMmore">See More Product Details</span>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="image-contant">
                            <?php echo image_view('uploads/products', $products->product_id, '437_' . $products->image, 'noimage.png', 'img-fluid w-100') ?>
                        </div>
                    </div>
                </div>
            </div>

            <!--###-->

            <div class="related-product-area">
                <div class="related-product-content">
                    <div class="related-product-headding">
                        <span>Related Product</span>
                    </div>
                </div>
                <div class="related-products">
                    <div class="row">
                        <?php if (!empty($relProd)) { foreach ($relProd as $rPro) { ?>
                        <div class="col-6 col-lg-2 col-sm-4">
                            <div class="card rounded-0">
                                <div class="r-product">
                                    <a href="<?php echo base_url('detail/' . $rPro->product_id) ?>"><?php echo image_view('uploads/products', $rPro->product_id, '191_' . $rPro->image, 'noimage.png', 'card-img-top rounded-0') ?></a>


                                    <h5 class="card-title"><?php echo substr($rPro->name, 0, 60); ?></h5>
                                    <?php $spPric = get_data_by_id('special_price', 'cc_product_special', 'product_id', $rPro->product_id);
                                    if (empty($spPric)) { ?>
                                       <p> <?php echo currency_symbol($rPro->price); ?> </p>
                                    <?php } else { ?>
                                        <small class="off-price">
                                            <del><?php echo currency_symbol($rPro->price); ?></del>
                                        </small>/<?php echo currency_symbol($spPric); ?>
                                    <?php } ?>
                                    <div class="addtocard text-center">
                                        <div class="addtoCardBtn m-auto"><a href="javascript:void(0)" onclick="addToCart('<?php echo $rPro->product_id;?>')" >Add to Cart</a></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <?php } } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
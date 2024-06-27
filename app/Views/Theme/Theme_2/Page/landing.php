<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $title;?></title>
    <meta name="description" content="<?php echo $description;?>">
    <meta name="keywords" content="<?php echo $keywords;?>">
    <link rel="shortcut icon" href="<?php echo base_url() ?>/favicon.ico">

    <link rel="stylesheet" href="<?php echo base_url()?>/assets/landing_page/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/landing_page/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/landing_page/css/responsive.css">
</head>

<body>
<form id="addto-cart-form" action="<?php echo base_url('addtocartdetail') ?>" method="post">
    <header>
        <nav class="header-nav navbar bg-nav navbar-expand-lg bg-body-tertiary nav-p s">
            <div class="container custom-container">
                <a class="navbar-brand" href="<?php echo base_url() ?>">
                    <?php $logoImg = get_lebel_by_value_in_theme_settings('side_logo');
                    echo image_view('uploads/logo', '', $logoImg, 'noimage.png', 'img-fluid side_logo'); ?>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
<!--                        <li class="nav-item">-->
<!--                            <a class="nav-link custom-nav-link custom-p-0" aria-current="page" href="#">our product</a>-->
<!--                        </li>-->
<!--                        <li class="nav-item">-->
<!--                            <a class="nav-link custom-nav-link custom-p-0" aria-current="page" href="#">our product</a>-->
<!--                        </li>-->
<!--                        <li class="nav-item">-->
<!--                            <a class="nav-link custom-nav-link custom-p-0" aria-current="page" href="#">our product</a>-->
<!--                        </li>-->
<!--                        <li class="nav-item">-->
<!--                            <a class="nav-link custom-nav-link custom-p-0" aria-current="page" href="#">our product</a>-->
<!--                        </li>-->
                        <li class="nav-item">
                            <button class="nav-link nav-btn"  onclick="buyNowAction()" >Buy Now</button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="banner-area">
            <div class="banner">
                <div class="banner-content">
                    <div class="container custom-container">
                        <input type="hidden"  name="qty"  value="1"  min="1" required>
                        <input type="hidden" name="product_id" value="<?php echo $products->product_id ?>" required>
                        <div class="main-barnd-logo">
                            <span><?php $logoImg = get_lebel_by_value_in_theme_settings('side_logo');
                                echo image_view('uploads/logo', '', $logoImg, 'noimage.png', 'img-fluid side_logo'); ?></span>
                        </div>
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="banner-text-content">
                                    <div class="banner-content-top-btn mx-lg-auto">
                                        <a>
                                            সারাদেশে ফ্রী হোম ডেলিভারি
                                        </a>
                                    </div>
                                    <div class="banner-content-headding">
                                        <h2>শক্ত ও মজবুত এলপিজি<span> সিলিন্ডার </span>ট্রলি</h2>
                                    </div>
                                    <div class="banner-content-text">
                                        <span>
                                            সিলিন্ডার হোল্ডার এলপিজি সিলিন্ডার বহন করার চাকাযুক্ত হোল্ডার ।
                                        </span>
                                    </div>
                                    <div class="price-buy">
                                        <ul>
                                            <li>
                                                <button class="nav-link nav-btn m-0 position-relative shaow-cus" onclick="buyNowAction()">Buy
                                                    Now</button>
                                            </li>
                                            <li class="ml-13">
                                                <span><span class="price"><?php echo currency_symbol_admin($products->price);?></span></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-5">
                                <div class="banner-image-content">
                                    <div class="banner-img">
<!--                                        <img class="main-banner-img"-->
<!--                                            src="--><?php //echo base_url()?><!--/assets/landing_page/img/WhatsApp_Image_2023-11-13_at_9.05 5.png"  id="mainImg" alt="">-->
                                        <?php echo image_view('uploads/products', $products->product_id, '437_' . $products->image, 'noimage.png', 'img-fluid' ,'mainImg') ?>
                                        <div class="main-image-massege">
                                            <span class="text">কোন ডেলিভারি চার্জ নাই</span>
                                            <span class="price"><span><?php echo currency_symbol_admin($products->price);?></span></span>
                                        </div>
                                    </div>
                                    <div class="banner-image-option">
                                        <ul>
<!--                                            <li>-->
<!--                                                <img class="banner-image-option-children img-opt"-->
<!--                                                    src="--><?php //echo base_url()?><!--/assets/landing_page/img/Rectangle432.png" alt="">-->
<!--                                            </li>-->
                                            <?php
                                            if (!empty($proImg)) {
                                                foreach ($proImg as $imgval) {
                                                    echo '<li>' . multi_image_view('uploads/products', $imgval->product_id, $imgval->product_image_id, '437_' . $imgval->image, 'noimage.png', 'banner-image-option-children img-opt') . '</li>';
                                                }
                                            }
                                            ?>
<!--                                            <li>-->
<!--                                                <img class="banner-image-option-children img-opt"-->
<!--                                                    src="--><?php //echo base_url()?><!--/assets/landing_page/img/Rectangle 433.png" alt="">-->
<!--                                            </li>-->
<!--                                            <li>-->
<!--                                                <img class="banner-image-option-children img-opt"-->
<!--                                                    src="--><?php //echo base_url()?><!--/assets/img/lll.png" alt="">-->
<!--                                            </li>-->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="main-area">
        <section class="showing_product_with_card_section">
            <div class="container custom-container">
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="custom-card text-center">
                            <div class="card-img img-parnt-1">
                                <img class="card-img-1" src="<?php echo base_url()?>/assets/landing_page/img/card-tolly_1.png" alt="">
                            </div>
                            <div class="card-title">
                                <span>ভাল মানের প্লাস্টিক</span>
                            </div>
                            <div class="cart-text">
                                এই ট্রলিটি A গ্রেট প্লাস্টিকের তৈরি যা সহজে ভাঙবে না।
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                        <div class="custom-card text-center">
                            <div class="card-img">
                                <img src="<?php echo base_url()?>/assets/landing_page/img/card-tolly_back.png" class="card-img-2" alt="">
                            </div>
                            <div class="card-title">
                                <span>মজবুত চাকা</span>
                            </div>
                            <div class="cart-text">
                                এখানে চারটা উন্নত মানের প্লাস্টিকের চাকা রয়েছে যার ফলে মেঝেতে দাগ পড়বে না।
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                        <div class="custom-card text-center">
                            <div class="card-img img-parnt-3">
                                <img src="<?php echo base_url()?>/assets/landing_page/img/card-slinder.png" class="card-img-3" alt="">
                            </div>
                            <div class="card-title">
                                <span>সহজে ব্যাবহার যোগ্য</span>
                            </div>
                            <div class="cart-text">
                                খুব সহজেই ভারী সিলিন্ডার এই ট্রলি এর মাধ্যমে সরাতে পারবেন।
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="product-info-section overflow-x-hidden ">
            <div class="col-md-6 responsive-item m-add">
                <div class="info-text-content">
                    <div class="info-text-content-heading">
                        <h3 class="position-relative">কেন এই ট্রলিটি ব্যবহার করবেন ?
                            <div class="undrline">
                                <svg xmlns="http://www.w3.org/2000/svg" width="102" height="14" viewBox="0 0 102 14"
                                    fill="none">
                                    <path d="M2 12.288C15 5.95469 52.9 -4.01198 100.5 6.78802" stroke="#ED464A"
                                        stroke-width="3" stroke-linecap="round" />
                                </svg>
                            </div>
                        </h3>
                    </div>
                    <div class="info-content-list">
                        <ul>
                            <li><span>আপনার রান্নাঘর কে আরো স্মার্ট দেখাতে এই প্রোডাক্টিভ ব্যবহার করা
                                    উচিত।</span></li>
                            <li><span>বাড়ির মা বোনদের কষ্ট লাঘবের জন্য এই প্রোডাক্টটি খুবই গুরুত্বপূর্ণ।</span>
                            </li>
                            <li><span>বিশেষ করে প্রেগন্যান্ট মহিলাদের জন্য এটা উপযোগী।</span></li>
                            <li><span>বয়স্ক মানুষের জন্য এই প্রোডাক্টটা উপযোগী।</span></li>
                            <li><span>অনাকাঙ্ক্ষিত কোমরের টান বা শিরার টান থেকে রক্ষা পেতেও এই প্রোডাক্টটি
                                    ব্যবহার করতে পারেন।</span></li>
                            <li><span>সৌন্দর্য বৃদ্ধির জন্য এই প্রোডাক্টটি ব্যবহার করতে পারেন।</span></li>
                            <li><span>আপনজনদেরকে খুশি করতে হলেও প্রোডাক্টটি ব্যবহার করা উচিত।</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container custom-container">
                <div class="row">
                    <div class="col-md-6 "> 
                        <div class="info-img-area">
                            <div class="info-img">
                                <div class="fast-laer">
                                    <img src="<?php echo base_url()?>/assets/landing_page/img/header-background-1.png" alt="">
                                </div>
                                <div class="laer-2nd">
                                    <img src="<?php echo base_url()?>/assets/landing_page/img/header-background-2.png" alt="">
                                </div>
                                <div class="info-main">
                                    <div class="info-slinder">
                                        <img src="<?php echo base_url()?>/assets/landing_page/img/complit-info.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="price-buy mt-57 responsive-item">
                            <ul class="price-buy-ul">
                                <li class="price-buy-li-1">
                                    <button class="nav-link nav-btn m-0" onclick="buyNowAction()">Buy Now</button>
                                </li>
                                <li class="ml-13 price-buy-li-2">
                                    <span><span class="price"><?php echo currency_symbol_admin($products->price);?></span></span>
                                </li>
                                <li class="ml-13 price-buy-li-3 free-del">সারাদেশে ডেলিভারি চার্জ ফ্রী</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 desktop">
                        <div class="info-text-content">
                            <div class="info-text-content-heading">
                                <h3 class="position-relative">কেন এই ট্রলিটি ব্যবহার করবেন ?
                                    <div class="undrline">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="102" height="14"
                                            viewBox="0 0 102 14" fill="none">
                                            <path d="M2 12.288C15 5.95469 52.9 -4.01198 100.5 6.78802" stroke="#ED464A"
                                                stroke-width="3" stroke-linecap="round" />
                                        </svg>
                                    </div>
                                </h3>
                            </div>
                            <div class="info-content-list">
                                <ul>
                                    <li><span>আপনার রান্নাঘর কে আরো স্মার্ট দেখাতে এই প্রোডাক্টিভ ব্যবহার করা
                                            উচিত।</span></li>
                                    <li><span>বাড়ির মা বোনদের কষ্ট লাঘবের জন্য এই প্রোডাক্টটি খুবই গুরুত্বপূর্ণ।</span>
                                    </li>
                                    <li><span>বিশেষ করে প্রেগন্যান্ট মহিলাদের জন্য এটা উপযোগী।</span></li>
                                    <li><span>বয়স্ক মানুষের জন্য এই প্রোডাক্টটা উপযোগী।</span></li>
                                    <li><span>অনাকাঙ্ক্ষিত কোমরের টান বা শিরার টান থেকে রক্ষা পেতেও এই প্রোডাক্টটি
                                            ব্যবহার করতে পারেন।</span></li>
                                    <li><span>সৌন্দর্য বৃদ্ধির জন্য এই প্রোডাক্টটি ব্যবহার করতে পারেন।</span></li>
                                    <li><span>আপনজনদেরকে খুশি করতে হলেও প্রোডাক্টটি ব্যবহার করা উচিত।</span></li>
                                </ul>
                            </div>
                            <div class="price-buy">
                                <ul>
                                    <li>
                                        <button class="nav-link nav-btn m-0" onclick="buyNowAction()">Buy Now</button>
                                    </li>
                                    <li class="ml-13">
                                        <span><span class="price"><?php echo currency_symbol_admin($products->price);?></span></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="product-opportunity-section">
            <div class="product-opportunity-section-wepper">
                <div class="container custom-container">
                    <div class="pro-op-wapper">
                        <div class="product-opportunity-hadding text-center">
                            <h2>
                                আমাদের পন্যের <span class="position-relative">সুবিধাসমূহ <svg
                                        xmlns="http://www.w3.org/2000/svg" width="102" height="14" viewBox="0 0 102 14"
                                        fill="none">
                                        <path d="M2 12.288C15 5.95469 52.9 -4.01198 100.5 6.78802" stroke="#ED464A"
                                            stroke-width="3" stroke-linecap="round" />
                                    </svg></span>
                            </h2>
                        </div>
                        <div class="product-opportunity-chart position-relative">
                            <div class="opportunity-img text-center">
                                <div class="opportunity-1">
                                    <div class="opp-wep">
                                        <ul>
                                            <li>
                                                <div class="dot-svg">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17"
                                                        viewBox="0 0 17 17" fill="none">
                                                        <circle cx="8.5" cy="8.5" r="8.5" fill="#686868" />
                                                    </svg>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="hr"></div>
                                            </li>
                                            <li>
                                                <div class="join-opportunity">
                                                    <span>+</span>
                                                </div>
                                            </li>
                                        </ul>
                                        <span class="d-child">সহজে বহন যোগ্য।</span>
                                    </div>
                                </div>

                                <div class="opportunity-2">
                                    <div class="opp-wep">
                                        <ul>
                                            <li>
                                                <div class="dot-svg">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17"
                                                        viewBox="0 0 17 17" fill="none">
                                                        <circle cx="8.5" cy="8.5" r="8.5" fill="#686868" />
                                                    </svg>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="hr"></div>
                                            </li>
                                            <li>
                                                <div class="join-opportunity">
                                                    <span>+</span>
                                                </div>
                                            </li>
                                        </ul>
                                        <span class="d-child">জং ধরা বা ছিদ্র হওয়া থেকে রক্ষা করে।</span>
                                    </div>
                                </div>

                                <div class="opportunity-3">
                                    <div class="opp-wep">
                                        <ul>
                                            <li>
                                                <div class="dot-svg">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17"
                                                        viewBox="0 0 17 17" fill="none">
                                                        <circle cx="8.5" cy="8.5" r="8.5" fill="#686868" />
                                                    </svg>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="hr"></div>
                                            </li>
                                            <li>
                                                <div class="join-opportunity">
                                                    <span>+</span>
                                                </div>
                                            </li>
                                        </ul>
                                        <span class="d-child ">অগ্নি দূর্ঘটনা হলে দ্রুত সরানো যায়। </span>
                                    </div>
                                </div>

                                <img class="p-o-img" src="<?php echo base_url()?>/assets/landing_page/img/opportunity-img.png" alt="">

                                <div class="opportunity-4">
                                    <div class="opp-wep">
                                        <ul>
                                            <li>
                                                <div class="dot-svgl">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17"
                                                        viewBox="0 0 17 17" fill="none">
                                                        <circle cx="8.5" cy="8.5" r="8.5" fill="#686868" />
                                                    </svg>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="hr"></div>
                                            </li>
                                            <li>
                                                <div class="join-opportunity">
                                                    <span>+</span>
                                                </div>
                                            </li>
                                        </ul>
                                        <span class="d-child-l">ফ্লোর পরিষ্কার থাকে। </span>
                                    </div>
                                </div>

                                <div class="opportunity-5">
                                    <div class="opp-wep">
                                        <ul>
                                            <li>
                                                <div class="dot-svgl">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17"
                                                        viewBox="0 0 17 17" fill="none">
                                                        <circle cx="8.5" cy="8.5" r="8.5" fill="#686868" />
                                                    </svg>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="hr"></div>
                                            </li>
                                            <li>
                                                <div class="join-opportunity">
                                                    <span>+</span>
                                                </div>
                                            </li>
                                        </ul>
                                        <span class="d-child-l">ট্রলির উচ্চতা হাফ ইঞ্চি।</span>
                                    </div>
                                </div>

                                <div class="opportunity-6">
                                    <div class="opp-wep">
                                        <ul>
                                            <li>
                                                <div class="dot-svgl">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17"
                                                        viewBox="0 0 17 17" fill="none">
                                                        <circle cx="8.5" cy="8.5" r="8.5" fill="#686868" />
                                                    </svg>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="hr"></div>
                                            </li>
                                            <li>
                                                <div class="join-opportunity">
                                                    <span>+</span>
                                                </div>
                                            </li>
                                        </ul>
                                        <span class="d-child-l">২৪/২৫ কেজির সকল গ্যাসের সিলিন্ডার বহন করা যাবে।</span>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                        <div class="sesponsive-img-view text-center">
                            <img src="<?php echo base_url()?>/assets/landing_page/img/subidha.png" alt="">
                        </div>
                        <div class="price-buy mt-57 responsive-item">
                            <ul class="price-buy-ul">
                                <li class="price-buy-li-1">
                                    <button class="nav-link nav-btn m-0" onclick="buyNowAction()">Buy Now</button>
                                </li>
                                <li class="ml-13 price-buy-li-2">
                                    <span><span class="price"><?php echo currency_symbol_admin($products->price);?></span></span>
                                </li>
                                <li class="ml-13 price-buy-li-3 free-del">সারাদেশে ডেলিভারি চার্জ ফ্রী</li>
                            </ul>
                        </div>
                        <div class="price-buy desktop">
                            <ul>
                                <li class="d-block text-center">
                                    <button class="nav-link nav-btn m-0" onclick="buyNowAction()">Buy Now</button>
                                </li>
                                <li class="ml-13 d-block text-center">
                                    <span><span class="price"><?php echo currency_symbol_admin($products->price);?></span></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="about-product">
            <div class="container custom-container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="about-text">
                            <div class="about-para-1">
                                <p>বাংলাদেশে সর্বপ্রথম আমরাই নিয়ে এসেছি <span>এলপিজি গ্যাস সিলিন্ডার এবং ফুল ও ফল গাছের
                                        টপ বহন করার ট্রলি' </span></p>
                            </div>

                            <div class="about-para-2">
                                <p>
                                    আমরা প্রায় সকলেই এলপিজি গ্যাস সিলিন্ডার ব্যবহার করি কিন্তু লোহার তৈরি এই সিলিন্ডার
                                    যথেষ্ট ভারি তাই বহন করা কষ্টকর ও সহজেই জং ধরে যায়, যার কারনে মেঝেতে দীর্ঘস্থায়ী
                                    দাগ পড়ে এবং ঘরের সৌন্দর্য নষ্ট করে, তাই এসব সমস্যা সমাধান করতে আমরাই নিয়ে এসেছে
                                    এলপিজি
                                    গ্যাস সিলিন্ডার বহন করার ট্রলি.</p>
                            </div>

                            <div class="price-buy desktop">
                                <ul>
                                    <li>
                                        <button class="nav-link nav-btn m-0" onclick="buyNowAction()">Buy Now</button>
                                    </li>
                                    <li class="ml-13">
                                        <span><span class="price"><?php echo currency_symbol_admin($products->price);?></span></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-7">
                        <div class="about-us-image">
                            <img src="<?php echo base_url()?>/assets/landing_page/img/dtl.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="about-video-section">
            <div class="container custom-container">
                <div class="row">
                    <div class="col-md-7 r-order-2">
                        <div class="video-content position-relative">
                            <div class="play-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="68" height="68" viewBox="0 0 68 68"
                                    fill="none">
                                    <g clip-path="url(#clip0_1886_1087)">
                                        <path
                                            d="M34 0C43.0174 0 51.6654 3.58213 58.0416 9.95837C64.4179 16.3346 68 24.9826 68 34C68 43.0174 64.4179 51.6654 58.0416 58.0416C51.6654 64.4179 43.0174 68 34 68C24.9826 68 16.3346 64.4179 9.95837 58.0416C3.58213 51.6654 0 43.0174 0 34C0 24.9826 3.58213 16.3346 9.95837 9.95837C16.3346 3.58213 24.9826 0 34 0ZM6.375 34C6.375 41.3266 9.28548 48.3531 14.4662 53.5338C19.6469 58.7145 26.6734 61.625 34 61.625C41.3266 61.625 48.3531 58.7145 53.5338 53.5338C58.7145 48.3531 61.625 41.3266 61.625 34C61.625 26.6734 58.7145 19.6469 53.5338 14.4662C48.3531 9.28548 41.3266 6.375 34 6.375C26.6734 6.375 19.6469 9.28548 14.4662 14.4662C9.28548 19.6469 6.375 26.6734 6.375 34ZM27.1108 22.2148L45.2327 33.0905C45.3894 33.1851 45.5189 33.3185 45.6088 33.4778C45.6987 33.6372 45.746 33.817 45.746 34C45.746 34.183 45.6987 34.3628 45.6088 34.5222C45.5189 34.6815 45.3894 34.8149 45.2327 34.9095L27.1108 45.7852C26.9496 45.8823 26.7656 45.9349 26.5775 45.9375C26.3893 45.9402 26.2039 45.8928 26.0401 45.8003C25.8763 45.7078 25.74 45.5735 25.6451 45.411C25.5502 45.2486 25.5001 45.0639 25.5 44.8758V23.1285C25.4994 22.94 25.5489 22.7547 25.6435 22.5917C25.738 22.4287 25.8743 22.2937 26.0382 22.2007C26.2022 22.1077 26.3879 22.06 26.5764 22.0625C26.7649 22.0649 26.9493 22.1175 27.1108 22.2148Z"
                                            fill="#FC0000" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_1886_1087">
                                            <rect width="68" height="68" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <video src="#">

                            </video>
                        </div>
                        <div class="price-buy mt-37 responsive-item">
                            <ul class="price-buy-ul">
                                <li class="price-buy-li-1">
                                    <button class="nav-link nav-btn m-0" onclick="buyNowAction()">Buy Now</button>
                                </li>
                                <li class="ml-13 price-buy-li-2">
                                    <span><span class="price"><?php echo currency_symbol_admin($products->price);?></span></span>
                                </li>
                                <li class="ml-13 price-buy-li-3 free-del">সারাদেশে ডেলিভারি চার্জ ফ্রী</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-5 r-order-1">
                        <div class="text-about-video">
                            <h2>
                                আমাদের পন্যে সম্পর্কে আরো জানুন
                            </h2>
                            <div class="about-video-text">
                                <p>আপনার জীবনকে আরো একটু সহজ করতে আজই সংগ্রহ করুন আমাদের এই এলপিজি গ্যাস সিলিন্ডার</p>
                            </div>
                            <div class="price-buy desktop">
                                <ul>
                                    <li>
                                        <button class="nav-link nav-btn m-0" onclick="buyNowAction()" >Buy Now</button>
                                    </li>
                                    <li class="ml-13">
                                        <span><span class="price"><?php echo currency_symbol_admin($products->price);?></span></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="pakege-section">
            <div class="container custom-container">
                <div class="row">
                    <div class="col-md-6 r-order-2">
                        <div class="pakege-picture">
                            <img src="<?php echo base_url()?>/assets/landing_page/img/Group-2758.png" alt="">
                        </div>
                        <div class="price-buy responsive-item mt-20">
                            <ul class="price-buy-ul">
                                <li class="price-buy-li-1">
                                    <button class="nav-link nav-btn m-0" onclick="buyNowAction()" >Buy Now</button>
                                </li>
                                <li class=" price-buy-li-2">
                                    <span><span class="price"><?php echo currency_symbol_admin($products->price);?></span></span>
                                </li>
                                <li class="price-buy-li-3 free-del">সারাদেশে ডেলিভারি চার্জ ফ্রী</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 r-order-1">
                        <div class="pakege-text">
                            <div class="pakege-section-headding">
                                <h2>কি ভাবে প্যকেজিং করা হবে</h2>
                            </div>
                            <div class="pakege-text-para">
                                <p>প্যাকেজিং এর ক্ষেত্রে আমরা অত্যন্ত যত্ন সহকারে প্রত্যেকটি প্রোডাক্টের সাথে একটি প্লেন
                                    পলি ব্যবহার করি তার উপরে আমরা একটি আকর্ষণীয় কার্টুন ব্যবহার করছি এবং কার্টুনের উপরে
                                    আবার আমরা বাবুল র‍্যাপিং করে সুন্দরভাবে গুছিয়ে
                                    কুরিয়ার করে থাকি।</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="fitback-section">
            <div class="container custom-container">
                <div class="heading-fitbak">
                    <h2>আমাদের পন্যে সম্পর্কে কাস্টমারদের মন্তব্য</h2>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-3 col-sm-6">
                        <div class="customer-card position-relative">
                            <div class="social">
                                <a href="#"><img src="<?php echo base_url()?>/assets/landing_page/img/229098 1.png" alt=""></a>
                            </div>
                            <div class="customar-profile-pic text-center">
                                <img src="<?php echo base_url()?>/assets/landing_page/img/Ellipse 7.svg" alt="">
                            </div>
                            <div class="customar-name text-center">
                                <span>syed irfan eartaza</span>
                            </div>
                            <div class="fit-back-content text-center">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesettinLorem Ipsum is simply
                                    dummy text of the printing and typesettinprinting and typesettin
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-3 col-sm-6">
                        <div class="customer-card position-relative">
                            <div class="social">
                                <a href="#"><img src="<?php echo base_url()?>/assets/landing_page/img/229098 1.png" alt=""></a>
                            </div>
                            <div class="customar-profile-pic text-center">
                                <img src="<?php echo base_url()?>/assets/landing_page/img/Ellipse 7.svg" alt="">
                            </div>
                            <div class="customar-name text-center">
                                <span>syed irfan eartaza</span>
                            </div>
                            <div class="fit-back-content text-center">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesettinLorem Ipsum is simply
                                    dummy text of the printing and typesettinprinting and typesettin
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-3 col-sm-6">
                        <div class="customer-card position-relative">
                            <div class="social">
                                <a href="#"><img src="<?php echo base_url()?>/assets/landing_page/img/229098 1.png" alt=""></a>
                            </div>
                            <div class="customar-profile-pic text-center">
                                <img src="<?php echo base_url()?>/assets/landing_page/img/Ellipse 7.svg" alt="">
                            </div>
                            <div class="customar-name text-center">
                                <span>syed irfan eartaza</span>
                            </div>
                            <div class="fit-back-content text-center">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesettinLorem Ipsum is simply
                                    dummy text of the printing and typesettinprinting and typesettin
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-3 col-sm-6">
                        <div class="customer-card position-relative">
                            <div class="social">
                                <a href="#"><img src="<?php echo base_url()?>/assets/landing_page/img/229098 1.png" alt=""></a>
                            </div>
                            <div class="customar-profile-pic text-center">
                                <img src="<?php echo base_url()?>/assets/landing_page/img/Ellipse 7.svg" alt="">
                            </div>
                            <div class="customar-name text-center">
                                <span>syed irfan eartaza</span>
                            </div>
                            <div class="fit-back-content text-center">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesettinLorem Ipsum is simply
                                    dummy text of the printing and typesettinprinting and typesettin
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-3 col-sm-6">
                        <div class="customer-card position-relative">
                            <div class="social">
                                <a href="#"><img src="<?php echo base_url()?>/assets/landing_page/img/229098 1.png" alt=""></a>
                            </div>
                            <div class="customar-profile-pic text-center">
                                <img src="<?php echo base_url()?>/assets/landing_page/img/Ellipse 7.svg" alt="">
                            </div>
                            <div class="customar-name text-center">
                                <span>syed irfan eartaza</span>
                            </div>
                            <div class="fit-back-content text-center">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesettinLorem Ipsum is simply
                                    dummy text of the printing and typesettinprinting and typesettin
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-3 col-sm-6">
                        <div class="customer-card position-relative">
                            <div class="social">
                                <img src="<?php echo base_url()?>/assets/landing_page/img/229098 1.png" alt="">
                            </div>
                            <div class="customar-profile-pic text-center">
                                <img src="<?php echo base_url()?>/assets/landing_page/img/Ellipse 7.svg" alt="">
                            </div>
                            <div class="customar-name text-center">
                                <span>syed irfan eartaza</span>
                            </div>
                            <div class="fit-back-content text-center">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesettinLorem Ipsum is simply
                                    dummy text of the printing and typesettinprinting and typesettin
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</form>
    <footer class="footer-section">
        <div class="container custom-container">
            <div class="footer-logo">
                <?php $logoImg = get_lebel_by_value_in_theme_settings('side_logo');
                echo image_view('uploads/logo', '', $logoImg, 'noimage.png', 'img-fluid side_logo'); ?>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="footer-text">
                        <p>
                            প্রোডাক্ট অর্ডার এরপর ডেলিভারি বয় যখন প্রোডাক্টটি আপনাকে ডেলিভারি করবে তখন ডেলিভারি বয়
                            থাকতে থাকতেই আপনি প্রোডাক্টটি চেক করে নিতে পারেন যদি কোন প্রকার ভাঙ্গা বা ফাটা পান সে
                            ক্ষেত্রে প্রোডাক্ট রিটার্ন করতে পারেন এবং সাপোর্টের জন্য আমাদের সাথে যোগাযোগ
                            করতে পারেন আমরা প্রতিনিয়তই আপনাদের জন্য কোয়ালিটি ফুল নিত্যনতুন আইটেমের প্রোডাক্ট সংগ্রহ
                            করেছি।
                        </p>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="fl-deadding">
                        Social media
                    </div>
                    <div class="footer-social-midea">
                        <ul>
                            <li>
                                <a target="_blank" href="<?php echo get_lebel_by_value_in_settings('fb_url'); ?>" class="social-icon-f">
                                    <img src="<?php echo base_url()?>/assets/landing_page/img/ri_facebook-fill.png" alt="facebook">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="fl-deadding">
                        Social media
                    </div>
                    <div class="footer-contuct">
                        <ul>
                            <li class="d-flex">
                                <span class="contact-icon">
                                    <img class="m-auto" src="<?php echo base_url()?>/assets/landing_page/img/ic_baseline-phone.png" alt="">
                                </span>
                                <span class="fc-t">+88<?php echo get_lebel_by_value_in_settings('phone'); ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="<?php echo base_url()?>/assets/landing_page/js/app.js"></script>
    <script src="<?php echo base_url() ?>/assets/amazing_gadgets/jquery-3.6.0.js"></script>
    <script>
        function buyNowAction(){
            $("#addto-cart-form").on('submit', (function(e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        $('#cartReload').load(location.href + " #cartReload");
                        $('#cartReload2').load(location.href + " #cartReload2");
                        $('#mesVal').html(response);
                        $('.btn-count').load(location.href + " .btn-count");
                        $('.body-count').load(location.href + " .body-count");
                        $('#carticon2').css('transform', 'rotate(90deg)');
                        $('#collapseExample').addClass('show');
                        buyNow();
                        $('.message_alert').show();
                        setTimeout(function() {
                            $("#messAlt").fadeOut(1500);
                        }, 600);

                    }
                });
            }));

        }

        function  buyNow(){
            location.replace("<?php echo base_url('checkout') ?>");
        }
    </script>
</body>

</html>
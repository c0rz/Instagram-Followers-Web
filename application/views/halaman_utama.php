<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<body class="js">

    <!-- Preloader -->
    <div class="preeloader">
        <div class="preloader-spinner"></div>
    </div>
    <!-- End Preloader -->
    <!-- Header Area -->
    <header id="site-header" class="site-header">
        <!-- <div class="buy-pro">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="inner">
                            <p>Demo Header</p>
                            <div class="pro-button">
                                <a href="#" target="_blank" class="btn">Buy Pro!</a>
                                <a href="#" target="_blank" class="btn">Pro Live Demo</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                        <p>Selamat datang di <?= $list_config['title'] ?></p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="social-contact">
                            <ul>
                                <li><a href="#"><i class="lni lni-facebook-filled"></i></a></li>
                                <li><a href="#"><i class="lni lni-vimeo"></i></a></li>
                                <li><a href="#"><i class="lni lni-twitter-original"></i></a></li>
                                <li><a href="#"><i class="lni lni-linkedin-original"></i></a></li>
                                <li><a href="#"><i class="lni lni-pinterest"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Bottom -->
        <div class="header-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-12">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="<?= base_url() ?>"><img src="<?= base_url('assets/img/logo.png') ?>" alt="#"></a>
                        </div>
                        <!-- End Logo -->
                        <div class="mobile-nav"></div>
                    </div>
                    <div class="col-lg-10 col-md-10 col-12">
                        <!-- Main Menu -->
                        <div class="main-menu">
                            <nav class="navigation ">
                                <ul class="nav menu">
                                    <li class="active"><a href="home">Halaman Utama</a></li>
                                    <li><a href="#about-us">Layanan kami</a></li>
                                    <li><a href="#testimonials">Testimonial</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!--/ End Main Menu -->
                        <a href="<?= base_url('masuk') ?>" class="button"><i class="lni lni-instagram"></i> Masuk dengan Instagram</a>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Header Bottom -->
    </header>
    <!--/ End Header Area -->

    <!--Hero header start-->
    <section class="hero-header primary-header slider-header" id="home">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-12">
                    <div class="hero-header-content">
                        <p>Nikmati layanan</p>
                        <h1><b><?= $list_config['title'] ?></b></h1>
                        <p>
                            Situs penambah followers, likes instagram AKTIF/REAL indonesia terbaru dengan keamanan sistem selalu diperbaharui.
                        </p>
                        <div class="button">
                            <a href="<?= base_url('masuk') ?>" class="btn"><i class="lni lni-instagram"></i> Masuk dengan Instagram</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-12">
                    <div class="hero-header-image">
                        <img src="<?= base_url('assets/img/service-img2.svg') ?>" alt="#">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Hero header end-->

    <!-- start Brands Area-->
    <div class="brands">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="brand-slider">
                        <div class="slingle-brand">
                            <img src="<?= base_url('assets/img/1.png') ?>" alt="#">
                        </div>
                        <div class="slingle-brand">
                            <img src="<?= base_url('assets/img/2.png') ?>" alt="#">
                        </div>
                        <div class="slingle-brand">
                            <img src="<?= base_url('assets/img/3.png') ?>" alt="#" height="600"">
                        </div>
                        <div class=" slingle-brand">
                            <img src="<?= base_url('assets/img/4.png') ?>" alt="#">
                        </div>
                        <div class=" slingle-brand">
                            <img src="<?= base_url('assets/img/5.png') ?>" alt="#">
                        </div>
                    </div>
                    <!-- Add Arrows -->
                </div>
            </div>
        </div>
    </div>

    <!-- Start Work Area -->
    <section id="about-us" class="work section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Kelebihan Layanan</h2>
                        <p>Tidak cukup dengan sistem keamanan kami akan memberikan lebih tanpa cuma - cuma untuk pengguna kami supaya nyaman berselancar / menggunakan aplikasi kami. </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-work">
                        <div class="serial">
                            <span><i class="lni lni-lock"></i></span>
                        </div>
                        <h3>Encrypt Data</h3>
                        <p>Kami membuat sistem enkripsi terbaru untuk mengamankan data tidak mudah di salah gunakan.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-work">
                        <div class="serial">
                            <span><i class="lni lni-shortcode"></i></span>
                        </div>
                        <h3>Kemudahan</h3>
                        <p>Desain di dukung semua device dan mudah di pahami pengguna dalam pemakaian aplikasi followers atau likes.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-work last">
                        <div class="serial">
                            <span><i class="lni lni-cloud-sync"></i></span>
                        </div>
                        <h3>Kontes Poin</h3>
                        <p>Poin di bagikan gratis setiap hari tanpa terkecuali, dapatkan bonus poin mingguan bahkan gratis followers hingga 1000 followers.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /End Work Area -->

    <!-- Start Counter Section-->
    <section class="product-counter-section">
        <div class="product-counter-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="counter-content-wrap">
                            <i class="lni lni-rocket"></i>
                            <h6 class="counter-title"><strong><?= $list_config['title'] ?></strong></h6>
                            <p class="counter-text">Layanan Auto Followers & Likes Instagram Indonesia</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <ul class="counter-list list-inline text-right">
                            <li>
                            </li>
                            <li>
                            </li>
                            <li>
                                <span class="number count">5000</span>
                                <span class="title">Pengguna Aktif</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /End Counter Section-->

    <!-- Start Testimonials Section -->
    <section id="testimonials" class="section testimonials">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Apa kata pengguna setia kami ?</h2>
                        <p>Kami akan bagikan ke pada kalian jika masih ragu dengan layanan aplikasi penambah followers dan likes instagram kami, demi meyakinkan pengguna baru. </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="testimonial-slider owl-carousel">
                        <!-- Single Testimonial -->
                        <div class="single-testimonial">
                            <p>" Dapat info dari temen, aku kira bohongan coba pake akun palsu bener nambah!" </p>
                            <div class="bottom">
                                <img src="<?= base_url('assets/img/pengguna_1.jpg') ?>" alt="#">
                                <h4 class="name">Juulia<span>Pengguna</span></h4>
                            </div>
                        </div>
                        <!--/ End Single Testimonial -->
                        <!-- Single Testimonial -->
                        <div class="single-testimonial">
                            <p>" anjir! keren banget, semangat terus min sering sering giveaway followers." </p>
                            <div class="bottom">
                                <img src="<?= base_url('assets/img/pengguna_2.jpg') ?>" alt="#">
                                <h4 class="name">Yulita<span>Pengguna</span></h4>
                            </div>
                        </div>
                        <!--/ End Single Testimonial -->
                        <!-- Single Testimonial -->
                        <div class="single-testimonial">
                            <p>" Sehat terus ya min, aman dan gak spam sesuai banget. tapi tolong kasih aku poin bonus lah udah di puji hahahahah" </p>
                            <div class="bottom">
                                <img src="<?= base_url('assets/img/pengguna_3.jpg') ?>" alt="#">
                                <h4 class="name">Putri<span>Pengguna</span></h4>
                            </div>
                        </div>
                        <!--/ End Single Testimonial -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /End Testimonials Section -->

    <!--Frequently asked questions start-->
    <section id="faq" class="faq-section section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Pertanyaan Umum</h2>
                        <p>Berikut adalah pertanyaan yang sering ditanyakan ke pada kami, maka dari itu kami buat agar mempermudah pengguna untuk mendapatkan jawaban. </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div id="accordion" class="mt-4 faq-container">
                        <div class="simple-card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class=" btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        <span class="arrow-container"></span> Bagaimana cara mendapatkan followers/likes di <?= $list_config['title'] ?> ?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                    Cukup Login dengan akun Instagram anda, silahkan klik Tombol "Masuk dengan Instagram" di bagian atas. Setelah Login pilih layanan yang ingin anda gunakan. Kini anda dapat menggunakan Indofoll setiap hari dengan 2x4 poin,. Poin Claim akan direset pukul 00.00 dan BONUS poin.
                                </div>
                            </div>
                        </div>
                        <div class="simple-card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class=" btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                        <span class="arrow-container"></span> Apakah aman jika saya login di <?= $list_config['title'] ?> ?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body card-with-button">
                                    Kami menjamin 100% keamanan data anda. Data/informasi pribadi yang anda masukan seperti password tidak kami simpan, kami hanya memerlukan password pada saat pertama login.
                                    <a href="<?= base_url('masuk') ?>" class=" btn"><i class="lni lni-instagram"></i> Masuk dengan Instagram</a>
                                </div>
                            </div>
                        </div>
                        <div class="simple-card">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <button class=" btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <span class="arrow-container"></span> Kenapa Instagram saya followingnya bertambah ?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                <div class="card-body">
                                    Kami menggunakan sistem tuker follow atau like sesama pengguna Indofoll. Jadi ketika anda menggunakan layanan followers/likes <?= $list_config['title'] ?>, akun anda otomatis akan memfollow/likes pengguna lain agar sama-sama menguntungkan.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Frequently asked questions end-->

    <!--Get Started start-->
    <section id="get-started" class="get-started section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-12">
                    <div class="inner-content">
                        <p class="small-title"><?= $list_config['title'] ?></p>
                        <h1 class="main-title">Dapatkan <b>Followers/Likes</b> GRATIS!</h1>
                        <p class="des">Bergabung di aplikasi <?= $list_config['title'] ?> dapatkan followers/likes indonesia, tanpa takut spam dan data di enkripsi terbaru.</p>
                        <a href="<?= base_url('masuk') ?>" class=" btn"><i class="lni lni-instagram"></i> Masuk dengan Instagram</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Get Started end-->

    <!--Footer start-->
    <section id="footer" class="section footer">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="text-center copyright">2021 &copy; <?= $list_config['title'] ?> Team</p>
                </div>
            </div>
        </div>
    </section>
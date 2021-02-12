<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<body class="js">

    <!-- Preloader -->
    <div class="preeloader">
        <div class="preloader-spinner"></div>
    </div>
    <!-- End Preloader -->
    <!--Hero header start-->
    <section class="hero-header primary-header slider-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="hero-header-content">
                        <p>Halo, </p>
                        <h1><b><?= $instagram['full_name'] ?></b></h1>
                        <p>
                            Silahakn pilih menu layanan kami, pastikan akun instagram kamu tidak di kunci / private untuk mendapatkan lebih banyak pengikut / likes.
                        </p>
                        <div class="button">
                            <button id="getfollowers" class="btn"><i class="lni lni-instagram"></i> Tambah Followers+</button>
                            <button id="getlikes" class="btn primary"><i class="lni lni-instagram"></i> Tambah Likes+</button>
                        </div>
                        <br />
                        <br />
                        <div class="button">
                            <button href="<?= base_url('keluar') ?>" class="btn"><i class="lni lni-exit-down"></i> Keluar Aplikasi <?= $list_config['title'] ?></button>
                        </div>
                        <br />
                        <br />
                    </div>
                </div>
            </div>
    </section>
    <!--Hero header end-->

    <!-- Start Blog Area -->
    <section class="blog section" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div id="menu">
                        <div class="alert alert-success alert-dismissible">Hasil tambah followers+/likes+ kamu akan muncul disini.</div>
                    </div>
                    <div class="section-title">
                        <h2>Profile kamu</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <!-- Single Blog -->
                    <div class="single-news">
                        <div class="news-body">
                            <div class="news-content">
                                <img src="<?= $instagram['profile_pic_url_hd'] ?>" height="20" alt="#" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <!-- End Single Blog -->
                </div>
                <div class="col-lg-6">
                    <!-- Single Blog -->
                    <div class="single-news">
                        <div class="news-body">
                            <div class="news-content">
                                <h2>Jumlah Following : <div id="following"><?= $instagram['edge_follow']['count'] ?></div>
                                </h2>
                                <h2>Jumlah Followers : <div id="followers"><?= $instagram['edge_followed_by']['count'] ?></div>
                                </h2>
                                <p class="text">Nikmati layanan kami tanpa batas, pastikan poin anda mencukupi jika tidak cukup silahkan login kembali 6 jam atau besok.</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Blog -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Blog Area -->

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
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
    <!-- Start Work Area -->
    <section id="about-us" class="work section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2><?= $list_config['title'] ?></h2>
                        <p>Selangkah lagi segera masuk untuk mendapatkan pengikut/followers dan likes aktif indonesia.</p>
                    </div>
                    <div class="form-group">
                        <div id="status"></div>
                    </div>
                    <form role="form" method="POST" id="login" autocomplete="off">
                        <div class="form-group">
                            <label class="control-label label-data">Username/Email/No HP</label>
                            <input type="text" class="form-control" name="username" placeholder="Username/Email/No HP">
                        </div>
                        <div class="form-group">
                            <label class="control-label label-data">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <div style="text-align: center;">
                                <button type="button" id="btn-login" class="btn btn-primary"><i class="lni lni-instagram"></i> Masuk dengan akun Instagram</button>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="single-work">
                                <div class="serial">
                                    <span><i class="lni lni-package"></i></span>
                                </div>
                                <h3>Pilih Layanan</h3>
                                <p>Pilih layanan yang anda inginkan, sesuaikan dengan budget dan kebutuhan anda.</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="single-work">
                                <div class="serial">
                                    <span><i class="lni lni-write"></i></span>
                                </div>
                                <h3>Pengisian Form</h3>
                                <p>Lengkapi form pesanan, harap periksa kembali form anda karena ketika proeses selesai tidak dapat
                                    diubah</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="single-work last">
                                <div class="serial">
                                    <span><i class="lni lni-wallet"></i></span>
                                </div>
                                <h3>Bayar</h3>
                                <p>Lakukan pembayaran sesuai invoice, pembayaran akan terdeteksi otomatis tanpa perlu konfirmasi
                                    pembayaran.</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="single-work last">
                                <div class="serial">
                                    <span><i class="lni lni-timer"></i></span>
                                </div>
                                <h3>Proses Selesai</h3>
                                <p>Lakukan pembayaran sesuai invoice, pembayaran akan terdeteksi otomatis tanpa perlu konfirmasi
                                    pembayaran.</p>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
    <!-- /End Work Area -->

    <!--Footer start-->
    <section id="footer" class="work section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="text-center copyright">2021 &copy; <?= $list_config['title'] ?> Team</p>
                </div>
            </div>
        </div>
    </section>
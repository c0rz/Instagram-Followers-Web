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
                <div class="col-12">
                    <div class="section-title">
                        <h2>Cara Pemesanan Layanan</h2>
                        <p>Ikuti langkah-langkah dibawah ini untuk melakukan pemesanan layanan kami.</p>
                    </div>
                    <div class="form-group">
                        <label class="control-label label-data">Username Ig/link</label>
                        <div class="">
                            <input id="singleorder" type="text" class="form-control" name="data" placeholder=""><small class="text-danger" id="note"></small>
                        </div>
                    </div>
                </div>
            </div>
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
    <section id="footer" class="section footer">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="text-center copyright">2021 &copy; <?= $list_config['title'] ?> Team</p>
                </div>
            </div>
        </div>
    </section>
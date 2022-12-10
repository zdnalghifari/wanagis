@extends('layouts.app')
@section('content')
    <div class="wrapper">
        <div class="page-header clear-filter" filter-color="orange">
            <div class="page-header-image" data-parallax="true" style="background-image:url('../assets/img/bg8.jpg');">
            </div>
            <div class="container">
                <div class="photo-container">
                    <img src="../assets/img/.jpg" alt="">
                </div>
                <h1 class="title">WANAGIStory</h1>
                <p class="category">Cerita dibalik pembangunan WANAGIS</p>

            </div>
        </div>
        <div class="section">
            <div class="container">
                <h2 class="title " style="margin-bottom: 5px">Tentang WANAGIS</h2>
                <h5 class="text-justify" style="margin-bottom: 0px">WANAGIS merupakan hasil sebuah proyek akhir dengan
                    judul "WANAGIS
                    (Wanagama WebGIS): WebGIS Diseminasi Sumber Daya Hutan Wanagama" yang disusun oleh Zaidan Al-ghifari
                    Fahlevi.
                    Pembangunan WANAGIS dimulai dari bulan Agustus 2022 dan selesai di tahun yang sama. Ide awal pembangunan
                    WANAGIS terpantik saat mengobrol dengan seorang teman dari kehutanan di awal
                    2022 di sebuah burjo daerah Karanggayam, Sleman, D.I. Yogyakarta. </h5>
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <h4 class="title text-center">Galeri Wanagama</h4>
                        <div class="nav-align-center" style="margin-bottom: 25px">
                            <ul class="nav nav-pills nav-pills-success nav-pills-just-icons" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#profile" role="tablist" rel="tooltip"
                                        data-placement="left" title="Foto Tanaman Wanagama">
                                        <img src={{ asset('/assets/img/portofolio1.png') }} style="margin-bottom: 5px">
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#home" role="tablist"
                                        rel="tooltip" data-placement="bottom" title="Lanskap Wanagama">
                                        <img src={{ asset('/assets/img/portofolio2.png') }} style="margin-bottom: 5px">
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#messages" role="tablist" rel="tooltip"
                                        data-placement="right" title="Fauna Wanagama">
                                        <img src={{ asset('/assets/img/portofolio3.png') }} style="margin-bottom: 5px">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Tab panes -->
            <div class="tab-content gallery">
                <div class="tab-pane active" id="home" role="tabpanel">
                    <div class="col-md-10 ml-auto mr-auto">
                        <div class="row collections">
                            <div class="col-md-6">
                                <img src="../assets/img/bg1.jpg" alt="" class="img-raised">
                                <img src="../assets/img/bg3.jpg" alt="" class="img-raised">
                            </div>
                            <div class="col-md-6">
                                <img src="../assets/img/bg8.jpg" alt="" class="img-raised">
                                <img src="../assets/img/bg7.jpg" alt="" class="img-raised">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="profile" role="tabpanel">
                    <div class="col-md-10 ml-auto mr-auto">
                        <div class="row collections">
                            <div class="col-md-6">
                                <img src="../assets/img/bg6.jpg" class="img-raised">
                                <img src="../assets/img/bg11.jpg" alt="" class="img-raised">
                            </div>
                            <div class="col-md-6">
                                <img src="../assets/img/bg7.jpg" alt="" class="img-raised">
                                <img src="../assets/img/bg8.jpg" alt="" class="img-raised">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="messages" role="tabpanel">
                    <div class="col-md-10 ml-auto mr-auto">
                        <div class="row collections">
                            <div class="col-md-6">
                                <img src="../assets/img/bg3.jpg" alt="" class="img-raised">
                                <img src="../assets/img/bg8.jpg" alt="" class="img-raised">
                            </div>
                            <div class="col-md-6">
                                <img src="../assets/img/bg7.jpg" alt="" class="img-raised">
                                <img src="../assets/img/bg6.jpg" class="img-raised">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section section-team text-center">
            <div class="container">
                <h2 class="title">People Behind WANAGIS</h2>
                <div class="team">
                    <div class="row">
                        <div class="col">
                            <div class="team-player">
                                <img src={{ asset('assets/img/zai.jpg') }} alt="Thumbnail Image"
                                    class="rounded-circle img-fluid img-raised">
                                <h4 class="title">Zaidan Al-ghifari Fahlevi</h4>
                                <p class="category text-success">Web Developer | SIG - Universitas Gadjah Mada</p>
                                <p>Berperan dalam mengembangkan <a href="/">WANAGIS</a> secara full-stack sebagai
                                    produk
                                    proyek akhir.
                                </p>
                                <a href="#pablo" class="btn btn-success btn-icon btn-round"><i
                                        class="fab fa-twitter"></i></a>
                                <a href="#pablo" class="btn btn-success btn-icon btn-round"><i
                                        class="fab fa-linkedin"></i></a>
                                <a href="#pablo" class="btn btn-success btn-icon btn-round"><i
                                        class="fab fa-whatsapp"></i></a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="team-player">
                                <img src={{ asset('assets/img/sabla.jpg') }} alt="Thumbnail Image"
                                    class="rounded-circle img-fluid img-raised">
                                <h4 class="title">Syifa Salsabila</h4>
                                <p class="category text-success">Content | Kehutanan - Universitas Gadjah Mada</p>
                                <p>Berperan dalam membuat logo dan konten dalam <a href="/">WANAGIS</a>.
                                </p>
                                <a href="#pablo" class="btn btn-success btn-icon btn-round"><i
                                        class="fab fa-twitter"></i></a>
                                <a href="#pablo" class="btn btn-success btn-icon btn-round"><i
                                        class="fab fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section section-contact-us text-center">
        <div class="container">
            <h2 class="title">Butuh komunikasi lebih lanjut?</h2>
            <p>Silahkan kirimkan surel untuk menghubungi.</p>
            <div class="row">
                <div class="col-lg-6 text-center col-md-8 ml-auto mr-auto">
                    <div class="input-group input-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="now-ui-icons users_circle-08"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" placeholder="Nama">
                    </div>
                    <div class="input-group input-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="now-ui-icons ui-1_email-85"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" placeholder="Email">
                    </div>
                    <div class="textarea-container">
                        <textarea class="form-control" name="name" rows="4" cols="80" placeholder="Ketik disini..."></textarea>
                    </div>
                    <div class="send-button">
                        <a href="#pablo" class="btn btn-success btn-round btn-block btn-lg">Kirim Pesan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section section-supported text-center" style="background-color: #004713">
        <div class="container">
            <h2 class="title" style="color: white">Didukung oleh</h2>
            <div class="row">
                <div class="col">
                    <img src="{{ asset('assets/img/logougm.png') }}" alt="" style="max-width: 10rem">
                </div>
                <div class="col">
                    <img src="{{ asset('assets/img/logowngm.png') }}" alt="" style="max-width: 10rem">
                </div>
                <div class="col">
                    <img src="{{ asset('assets/img/logokaro.png') }}" alt="" style="max-width: 10rem">
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="text-center text-lg-start bg-light text-muted footer-default">
        <!-- Section: Social media -->
        <div class="section section-social-media" data-background-color="black" style="padding-bottom: 0px">
            <div class="row justify-content-md-center sharing-area text-center">
                <div class="text-center col-md-12 col-lg-8">
                    <h2 class="title">Terima kasih!</h2>
                    <h6>Ikuti saya di sosial media<h6>
                </div>
                <div class="text-center col-md-12 col-lg-8">
                    <!-- Right -->
                    <a target="_blank" href="https://www.instagram.com/zaidanalghifarif/"
                        class="btn btn-neutral btn-icon btn-instagram btn-round btn-lg" rel="tooltip" title=""
                        data-original-title="Follow me">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a target="_blank" href="https://www.linkedin.com/in/zaidan-al-ghifari-fahlevi-0b359a1a7/"
                        class="btn btn-neutral btn-icon btn-linkedin btn-lg btn-round" rel="tooltip" title=""
                        data-original-title="Follow me">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a target="_blank" href="https://github.com/zaidanalghifarif"
                        class="btn btn-neutral btn-icon btn-github btn-round btn-lg" rel="tooltip" title=""
                        data-original-title="Star on Github">
                        <i class="fab fa-github"></i>
                    </a>
                </div>
                <!-- Right -->
                </section>
                <!-- Section: Social media -->

                <!-- Section: Links  -->

                <div class="container text-center text-md-start mt-5">
                    <!-- Grid row -->
                    <div class="row mt-3">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                            <!-- Content -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                WANAGIS
                            </h6>
                            <p class="text-left">
                                WANAGIS atau Wanagama WebGIS adalah SIG untuk diseminasi data sumber daya hutan KHDTK
                                Wanagama.
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Halaman
                            </h6>
                            <p>
                                <a href="/" class="text-reset">Beranda</a>
                            </p>
                            <p>
                                <a href="/map" class="text-reset">Peta</a>
                            </p>
                            <p>
                                <a href="/about" class="text-reset">Tentang</a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Didukung oleh </h6>
                            <p>
                                <a href="#!" class="text-reset">SIG UGM</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Wanagama</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Karomap</a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">Kontak</h6>
                            <p><i class="fas fa-home me-3"></i> Sleman, D.I. Yogyakarta</p>
                            <p>
                                <i class="fas fa-envelope me-3"></i>
                                zaidanalghifarif@gmail.com
                            </p>
                            <p><i class="fas fa-phone me-3"></i> +62 851 561 034 65</p>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                </div>
                <!-- Section: Links  -->

                <!-- Copyright -->
                <div class="container text-center p-4">
                    © 2022 Copyright:
                    <a class="text-reset fw-bold" href="https://linktr.ee/zaidanalfv">Zaidan Al-ghifari Fahlevi</a>
                </div>
            </div>
            <!-- Copyright -->
    </footer>
    <!-- Footer -->
@endsection

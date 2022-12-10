@extends('layouts.app')
@section('content')
    <div class="page-header">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item">
                    <img class="d-block" src={{ asset('/assets/img/c1.jpg') }} alt="First slide"
                        style="width: 100vw; height: 100vh">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Petak 5, KHDTK Wanagama</h5>
                    </div>
                </div>
                <div class="carousel-item active">
                    <img class="d-block" src={{ asset('/assets/img/c2.jpg') }} alt="Second slide"
                        style="width: 100vw; height: 100vh">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Petak 8, KHDTK Wanagama</h5>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block" src={{ asset('/assets/img/c3.jpg') }} alt="Third slide"
                        style="width: 100vw; height: 100vh">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Petak 13, KHDTK Wanagama</h5>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <i class="now-ui-icons arrows-1_minimal-left"></i>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <i class="now-ui-icons arrows-1_minimal-right"></i>
            </a>
        </div>
        <div class="content-center">
            <div class="container">
                <div class="text-center" style="background-color: rgba(128,128,128, 0.5); border-radius: 10px;padding:10px">
                    <h1 class="title text-center" style="color: #004713">
                        SELAMAT DATANG <br>DI<br>
                        WANAGIS
                        <br>
                    </h1>
                    <p class="category
                            text-center" style="color: #000000">
                        WEBGIS DISEMINASI SUMBER DAYA HUTAN WANAGAMA
                    </p>
                </div>
            </div>
        </div>
    </div>


    <div class="section section-about-us">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto text-justified" data-aos="fade-up">
                    <h2 class="title">Apa itu WANAGIS?</h2>
                    <h5 class="ml-auto text-justified">WANAGIS atau Wanagama WebGIS merupakan Sistem
                        Informasi Geografis berbasis website yang diperuntukan sebagai wadah diseminasi
                        data
                        sumber daya
                        hutan KHDTK (Kawasan Hutan dengan Tujuan Khusus) Wanagama.</h5>
                </div>
            </div>
            <div class="separator separator-success"></div>
            <div class="section-story-overview">
                <div class="row">
                    <div class="col-md-6">
                        <div class="image-container image-left" style="background-image: url('../assets/img/f1.jpg')">
                            <!-- First image on the left side -->
                            <p class="blockquote blockquote-success">"Web GIS provides many more
                                opportunities to
                                provide broader access to your authoritative GIS data"
                                <br>
                                <br>
                                <small>-ESRI</small>
                            </p>
                        </div>
                        <!-- Second image on the left side of the article -->
                        <div class="image-container" style="background-image: url('../assets/img/f3.jpg')">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <!-- First image on the right side, above the article -->
                        <div class="image-container image-right" style="background-image: url('../assets/img/f2.jpg')">
                        </div>
                        <h2 class="title">Tujuan dari pembangunan WANAGIS adalah..</h2>
                        <h5>
                            WebGIS secara sederhana adalah situs web yang memfasilitasi penggunanya
                            untuk
                            melakukan
                            pemrosesan data spasial melalui berbagai perangkat yang terkoneksi dengan
                            internet.
                        </h5>
                        <h5>
                            WebGIS Wanagama dibutuhkan sebagai infrastruktur yang dapat digunakan
                            pengguna
                            dalam
                            mengakses serta mengeksplorasi data-data yang dimiliki Wanagama terutama
                            data
                            inventarisasi
                            hutan, sehingga peluang pemanfaatan data semakin meningkat.
                        </h5>
                        <h5>
                            Pemaksimalan pemanfaatan data serta terjadinya integrasi data-data informasi
                            kehutanan akan
                            meningkatkan peluang dihasilkannya pengetahuan kehutanan secara kolaboratif
                            yang
                            mana
                            selaras dengan visi, misi, dan spirit dari Wanagama.
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section section-gallery-data text-center" style="padding-top:0px; padding-bottom:0px;">
        <div class="container">
            <h2 class="title text-center">Data Sumber Daya Hutan</h2>
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto">
                    <div class="nav-align-center" style="margin-bottom: 25px">
                        <ul class="nav nav-pills nav-pills-success nav-pills-just-icons" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#profile" role="tablist" rel="tooltip"
                                    data-placement="left" title="Data Tahun 2005">
                                    <img src={{ asset('/assets/img/1.png') }} style="margin-bottom: 5px">
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#home" role="tablist" rel="tooltip"
                                    data-placement="top" title="Data Tahun 2019">
                                    <img src={{ asset('/assets/img/2.png') }} style="margin-bottom: 5px">
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#messages" role="tablist" rel="tooltip"
                                    data-placement="right" title="Data Peta Raster">
                                    <img src={{ asset('/assets/img/3.png') }} style="margin-bottom: 5px">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Tab panes -->
            <div class="tab-content gallery">
                <div class="tab-pane active" id="home" role="tabpanel">
                    <div class="col-md-10 ml-auto mr-auto">
                        <div class="row collections">
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="card">
                                    <img class="card-img-top" style="padding:30px; padding-bottom:0px;"
                                        src={{ asset('assets/img/list/1.png') }} alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Batas Lokasi</h4>
                                        <a class="btn btn-success" style="color: white" data-container="body"
                                            data-toggle="popover" data-placement="bottom"
                                            data-content="Wanagama terbagi menjadi 8 petak yang membujur dari barat ke timur mulai dari petak 5, 6, 7, 13, 14, 16, 17, 18.">Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="card">
                                    <img class="card-img-top" style="padding:30px; padding-bottom:0px;"
                                        src={{ asset('assets/img/list/2.png') }} alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Tutupan Lahan</h4>
                                        <a class="btn btn-success" style="color: white" data-container="body"
                                            data-toggle="popover" data-placement="bottom"
                                            data-content="Wanagama memiliki 25 jenis tutupan lahan terdiri (a) agroforestri, (b) akasia, (c) bambu,  (d) bangunan, (e) belukar, dan seterusnya. ">Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="card">
                                    <img class="card-img-top" style="padding:30px; padding-bottom:0px;"
                                        src={{ asset('assets/img/list/5.png') }} alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Jenis Tanah</h4>
                                        <a class="btn btn-success" style="color: white" data-container="body"
                                            data-toggle="popover" data-placement="bottom"
                                            data-content="Wanagama mempunyai bentuk lahan karst yang kering dan tandus, dengan jenis tanah Medit Merah dan Rendzina">Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="card">
                                    <img class="card-img-top" style="padding:30px; padding-bottom:0px;"
                                        src={{ asset('assets/img/list/6.png') }} alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Kelerengan</h4>
                                        <a class="btn btn-success" style="color: white" data-container="body"
                                            data-toggle="popover" data-placement="bottom"
                                            data-content="Wanagama memiliki 5 kelas kelerengan yaitu datar, landai, berombak, lereng, dan curam">Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="profile" role="tabpanel">
                    <div class="col-md-10 ml-auto mr-auto">
                        <div class="row collections d-flex justify-content-center">
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="card">
                                    <img class="card-img-top" style="padding:30px; padding-bottom:0px;"
                                        src={{ asset('assets/img/point.png') }} alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Point</h4>
                                        <a class="btn btn-success" style="color: white" data-container="body"
                                            data-toggle="popover" data-placement="bottom"
                                            data-content="Data poin yang tersedia adalah data bangunan, gorong-gorong, dan keterangan tambahan.">Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="card">
                                    <img class="card-img-top" style="padding:30px; padding-bottom:0px;"
                                        src={{ asset('assets/img/polyline.png') }} alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Polyline</h4>
                                        <a class="btn btn-success" style="color: white" data-container="body"
                                            data-toggle="popover" data-placement="bottom"
                                            data-content="Data polyline yang tersedia adalah batas petak uji, jalan aspal, jalan batu, dan sungai">Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="card">
                                    <img class="card-img-top" style="padding:30px; padding-bottom:0px;"
                                        src={{ asset('assets/img/polygon.png') }} alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Polygon</h4>
                                        <a class="btn btn-success" style="color: white" data-container="body"
                                            data-toggle="popover" data-placement="bottom"
                                            data-content="Data polygon yang tersedia adalah data permukiman">Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="messages" role="tabpanel">
                    <div class="col-md-10 ml-auto mr-auto">
                        <div class="row collections">
                            <div class="col-md-6">
                                <img src="../assets/img/maps/peta1.png" alt="" class="img-raised">
                                <img src="../assets/img/maps/peta2.jpg" alt="" class="img-raised">
                            </div>
                            <div class="col-md-6">
                                <img src="../assets/img/maps/peta3.jpg" alt="" class="img-raised">
                                <img src="../assets/img/maps/peta4.jpg" class="img-raised">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section section-tutorial text-center">
        <div class="container">
            <h2 class="title" style="margin-bottom:15px">Video Demo Penggunaan WANAGIS</h2>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="vidio-embed"
                    src="https://www.vidio.com/embed/2395890-dimana-orang-jenius-dibentuk-the-geography-of-genius?autoplay=false&player_only=true&live_chat=false&enable_websocket=false&mute=false&"
                    width="560" height="317" scrolling="no" frameborder="0" allowfullscreen
                    allow="encrypted-media *;"></iframe>
                <script src="//static-web.prod.vidiocdn.com/assets/javascripts/vidio-embed.js"></script>
            </div>
        </div>
    </div>


    <div class="section section-extras text-center">
        <div class="container">
            <h2 class="title">Informasi Tambahan</h2>
            <div class="row">
                <div class="col-sm-6 col-md-8 ml-auto col-xl-12 mr-auto">
                    <p class="category">Tentang Wanagama, Sumber Daya Hutan, dan Feedback untuk WANAGIS</p>

                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs nav-tabs-neutral justify-content-center" role="tablist"
                                data-background-color="green-dark">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#khdtk1" role="tab"
                                        aria-selected="true">Tentang Wanagama</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#sumberdaya1" role="tab"
                                        aria-selected="false">Tentang Sumber Daya Hutan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#kuesioner1" role="tab"
                                        aria-selected="false">Kuesioner WANAGIS</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">

                            <div class="tab-content text-left">
                                <div class="tab-pane active" id="khdtk1" role="tabpanel">
                                    <h5>WANAGAMA merupakan hutan pendidikan yang dikelola oleh Fakultas
                                        Kehutanan UGM
                                        sesuai SK 493/Menlhk-Setjen/2015 dengan luasan 622,25 Ha. Wanagama
                                        terbagi
                                        menjadi 8 petak yang membujur dari barat ke timur mulai dari petak
                                        5, 6, 7, 13,
                                        14, 16, 17, 18. Wanagama secara administratif terletak dalam wilayah
                                        Kecamatan
                                        Playen dan Patuk Gunung Kidul.<br><br>

                                        Pada awal pembangunannya, Wanagama merupakan bukit gundul yang
                                        dikenal dengan
                                        istilah "batu bertanah" (bukan tanah berbatu) yang menjelaskan
                                        betapa tandus dan
                                        keringnya kondisi saat itu. Awal kehidupan dimulai ketika tim dari
                                        Fakultas
                                        Kehutanan UGM melakukan kegiatan penghijauan "pembelukaran" dengan
                                        menanam
                                        sebanyak mungkin jenis tanaman pionir. Harapannya tanaman mampu
                                        bertahan hidup,
                                        beregenerasi, memperbaiki kondisi tanah, tata air, dan iklim mikro
                                        yang
                                        memungkinkan bagi flora dan fauna lain untuk mengawali kehidupannya.
                                    </h5>
                                    <a class="btn btn-success btn-round btn-lg" role="button" style="color: white"
                                        onclick="window.open('https://wanagama.fkt.ugm.ac.id/wanagama-2/','_blank')">Baca
                                        selengkapnya</a>
                                </div>
                                <div class="tab-pane" id="sumberdaya1" role="tabpanel">
                                    <h5> Hutan dapat definisikan sebagai tempat berupa lahan yang luas yang
                                        terdiri dari
                                        komponen-komponen biotik dan abiotik yang di dalamnya terdapat
                                        ekosistem yang
                                        saling mempengaruhi satu sama lain dan tidak dapat dipisahkan. Hal
                                        ini setara
                                        dengan yang tercantum dalam UU RI No. 41 Tahun 1999 Pasal 1 tentang
                                        Kehutanan
                                        sebagaimana dikutip Sabara (2006) yang mendefinisikan hutan sebagai
                                        kesatuan
                                        ekosistem berupa hamparan lahan berisi sumberdaya alam hayati yang
                                        didominasi
                                        pepohonan dalam persekutuan alam lingkungannya, yang satu dengan
                                        lainnya tidak
                                        dapat dipisahkan.<br> <br>
                                        Sumber daya hutan (SDH) merupakan segala sesuatu hasil dari hutan yang dapat
                                        diperbarui dan berfungsi sebagai penyangga kehidupan. Dari segi ekonomi,
                                        keberadaan sumber daya hutan memiliki manfaat kuantitatif (tangible) dan manfaat
                                        kualitatif (intangible) bagi kelangsungan kehidupan masyakarat. Oleh karena itu,
                                        sudah selayaknya eksistensi SDH harus dipertahankan. Dengan pengelolaan yang
                                        benar, keberadaan SDH dinilai mampu memberikan kontribusi yang signifikan bagi
                                        kehidupan sekitarnya, sehingga manfaat tersebut secara lestari dan
                                        berkesinambungan dapat dirasakan.
                                    </h5>
                                    <a class="btn btn-success btn-round btn-lg" role="button" style="color: white"
                                        onclick="window.open('https://elearning.menlhk.go.id/pluginfile.php/849/mod_resource/content/1/index.html','_blank')">Baca
                                        selengkapnya</a>
                                </div>
                                <div class="tab-pane" id="kuesioner1" role="tabpanel">
                                    <h5>Pengujian beta testing adalah jenis uji produk yang akan dilakukan pada WANAGIS.
                                        Beta testing berfungsi mengidentifikasi permasalahan yang terjadi pada produk saat
                                        pengguna menggunakannya, sekaligus mengukur penerimaan pengguna terhadap produk yang
                                        diluncurkan. Pengujian WebGIS akan dilakukan melalui media kuesioner yang
                                        disebarkan secara terbuka kepada seluruh pengguna WANAGIS. Dalam pengujian ini
                                        pengguna akan menilai seberapa baik WANAGIS berkerja.
                                    </h5>
                                    <a class="btn btn-success btn-round btn-lg" role="button" style="color: white"
                                        onclick="window.open('https:/bit.ly/WANAGISTesting','_blank')">Isi
                                        kuesioner</a>
                                </div>
                            </div>
                        </div>
                    </div>

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

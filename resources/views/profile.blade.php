@extends('layouts.navbarHome')

@section('content')

    <!-- Carousel Start -->
    <div class="container-fluid px-0 mb-5">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-8 text-start">
                                    <h1 class="display-1 text-white mb-5 animated slideInRight">KAMPOENG SEMANGGI</h1>
                                    <p class="fs-4 text-white">Profil Kampoeng Semanggi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-end">
                <div class="col-lg-6">
                    <div class="row g-2">
                        <div class="col-6 position-relative wow fadeIn" data-wow-delay="0.7s">
                            <div class="about-experience bg-secondary rounded">
                                <small class="fs-5 fw-bold">Kampoeng Semanggi</small>
                            </div>
                        </div>
                        <div class="col-6 wow fadeIn" data-wow-delay="0.1s">
                            <img class="img-fluid rounded" src="img/product-1.jpg">
                        </div>
                        <div class="col-6 wow fadeIn" data-wow-delay="0.3s">
                            <img class="img-fluid rounded" src="img/product-3.jpeg">
                        </div>
                        <div class="col-6 wow fadeIn" data-wow-delay="0.5s">
                            <img class="img-fluid rounded" src="img/home-1.jpg">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <p class="section-title bg-white text-start text-primary pe-3">About Us</p>
                    <h1 class="mb-4">Ketahui mengenai sejarah kampung semanggi</h1>
                    <p class="mb-4">Kampung ini dikenal dengan nama kampung semanggi sejak tahun 2016. Branding kampung semanggi dilakukan oleh bapak muslik selaku camat kecamatan benowo. Kampung Semanggi dikenal karena sebagian besar penduduknya terutama ibu-ibu yang berprofesi sebagai penjual semanggi. Sebagian besar penjual semanggi berasal dari Kendung, namun sebelum tahun 2016, banyak orang-orang yang mencari daun semanggi sampai ke daerah Sidoarjo, Mojokerto, Krian, Lamongan, bahkan sampai daerah Kediri hingga Bojonegoro. Kemudian pada tahun 2017, mereka memiliki inisiatif untuk membudidayakan semanggi di lahan kavlingan dan lahan aset kota yang belum dibangun. Mereka juga memanfaatkan lahan-lahan kosong yang ada di belakang rumah sebagai tempat untuk menanam semanggi.
                    </p>
                </div>
                <div class="pb-3">
                    <div class="bg-secondary mb-3" style="padding: 30px;">
                        <p>"Since 2016, this village has gone by the name Kampung Semanggi.
                            In his capacity as the Benowo sub-district chief, Mr. Muslik branded Kampung Semanggi.
                            Most of the residents of Semanggi village, particularly the women who sell clover, are well-known.
                            The majority of clover sellers are located in Kendung, however prior to 2016, many people traveled to the regions of Sidoarjo,
                            Mojokerto, Krian, Lamongan, and even Kediri and Bojonegoro in search of clover leaves. Then, in 2017,
                            they took the effort to plant clover on vacant lots and city-owned property.
                            They grow clover on the bare ground behind the house as well."
                        </p>
                        <img class="img-fluid mx-auto d-block float-left mr-4 mb-2" src="img/about-1.jpg">
                        <p>Saat itu, transportasi masih belum memadai dan membuat
                        para penjual semanggi menempati rumah singgah di daerah Petemon.
                        Mereka akan kembali ke Kendung setelah satu hingga dua minggu untuk pulang.
                        </p>
                        <p>"Because of the poor transportation at the time,
                            clover sellers were compelled to stay in shelter
                            houses in the Petemon. After one to two weeks,
                            they would return back to Kendung to go home."
                        </p>
                        <p>Pada hari Jum’at, 3 September 2021, RW 03 Kelurahan Sememi Kecamatan Benowo
                        diresmikan sebagai KBA (Kampung Berseri Astra) Semanggi Surabaya.
                        Astra yang bekerja sama dengan Universitas Wijaya Putra sebagai
                        tim ahli di dalam pengelolaan produk dari semanggi,
                        serta membantu warga Kampung Semanggi dalam memberdayakan
                        Usaha Mikro Kecil Menengah (UMKM) pecel semanggi dan
                        produk-produk lainnya yang diantaranya terdiri dari cookies,
                        putri salju, nastar, kue dahlia, peyek, stick, pudot, jus, nugget,
                        kue lumpur, tahu bakso, tahu mercon, cilok, cireng dan bothok semanggi.
                        Di dalam pemasarannya, KBA mempunyai marketplace yang dinamakan Srikandi,
                        yang diketuai oleh Faricha Nurid Ducha. KBA sendiri memiliki program CSR
                        (Corporate Social Responsibility) diantaranya yaitu; Pendidikan, Kesehatan,
                        Kreatif dan Lingkungan yang bisa disebut dengan 4 pilar Kampung Berseri Astra.
                        </p>
                        <p>
                            "RW 03 Sememi Village in the Benowo District officially became KBA (Kampung Berseri Astra)
                            Semanggi Surabaya on Friday, September 3, 2021. In addition to assisting the residents of
                            Semanggi Village in empowering Micro, Small and Medium Enterprises (MSMEs) for clover pecel
                            and other products, such as cookies, putri salju, nastar, kue dahlia, peyek, stick, pudot, jus,
                            nugget, kue lumpur, tahu bakso, tahu mercon, cilok, cireng and bothok semanggi. Astra also works
                            in collaboration with Faricha Nurid Ducha is the head of the Srikandi marketplace for marketing at KBA.
                            The four pillars of Kampung Berseri Astra—education, health, the arts, and the environment—are covered by
                            KBA's own CSR (Corporate Social Responsibility) activities."
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
@endsection

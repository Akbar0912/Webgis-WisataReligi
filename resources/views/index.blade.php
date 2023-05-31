<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="shortcut icon" href="/assets/img/icon.png" type="image/png">

        <!--=============== REMIXICONS ===============-->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        
        <!--=============== SWIPER CSS ===============-->
        <link rel="stylesheet" href="/assets/css/swiper-bundle.min.css">

        <!--=============== CSS ===============-->
        <link rel="stylesheet" href="/assets/css/styles.css">

        <title>WEBGIS</title>
    </head>
    <body>
        <header class="header" id="header">
            <nav class="nav container">
                <a href="#" class="nav__logo">WEBGIS</a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item">
                            <a href="#home" class="nav__link active-link">Home</a>
                        </li>
                        <li class="nav__item">
                            <a href="#about" class="nav__link">About</a>
                        </li>
                        <li class="nav__item">
                            <a href="#paket" class="nav__link">Paket Wisata</a>
                        </li>
                    </ul>

                    <div class="nav__dark">
                        <!-- Theme change button -->
                        <span class="change-theme-name">Dark mode</span>
                        <i class="ri-moon-line change-theme" id="theme-button"></i>
                    </div>

                    <ul class="nav__list">
                        <li class="nav__item">
                            <a href="#home" class="nav__link">LOGIN ADMIN</a>
                        </li>
                    </ul>

                    <i class="ri-close-line nav__close" id="nav-close"></i>
                </div>

                <div class="nav__toggle" id="nav-toggle">
                    <i class="ri-function-line"></i>
                </div>
            </nav>
        </header>

        <main class="main">
            <!--==================== HOME ====================-->
            <section class="home" id="home">
                <img src="/assets/img/home1.jpg" alt="" class="home__img">

                <div class="home__container container grid">
                    <div class="home__data">
                        <span class="home__data-subtitle">SISTEM INFORMASI GEOGRAFIS</span>
                        <h1 class="home__data-title">Wisata Religi <br> Provinsi <b>Jawa Timur</b></h1>
                        <a href="#about" class="button">Explore</a>
                    </div>

                    <div class="home__social">
                        <a href="https://www.facebook.com/" target="_blank" class="home__social-link">
                            <i class="ri-facebook-box-fill"></i>
                        </a>
                        <a href="https://www.instagram.com/" target="_blank" class="home__social-link">
                            <i class="ri-instagram-fill"></i>
                        </a>
                        <a href="https://twitter.com/" target="_blank" class="home__social-link">
                            <i class="ri-twitter-fill"></i>
                        </a>
                    </div>
                </div>
            </section>

            <!--==================== ABOUT ====================-->
            <section class="about section" id="about">
                <div class="about__container container grid">
                    <div class="about__data">
                        <h2 class="section__title about__title">About <br> Webgis Wisata Religi</h2>
                        <p class="about__description">Sistem informasi ini merupakan aplikasi pemetaan geografis wisata religi wilayah Jawa Timur. Aplikasi ini memuat informasi dan lokasi dari tempat wisata religi di Jawa Timur.
                        </p>
                        <a href="/home" class="button">Lihat Peta</a>
                    </div>

                    <div class="about__img">
                        <div class="about__img-overlay">
                            <img src="/assets/img/aboutwisata1.jpg" alt="" class="about__img-one">
                        </div>

                        <div class="about__img-overlay">
                            <img src="/assets/img/aboutwisata2.jpg" alt="" class="about__img-two">
                        </div>
                    </div>
                </div>
            </section>

            <!--==================== VIDEO ====================-->
            <section class="video section">
                <!-- <h2 class="section__title">Video Tour</h2>

                <div class="video__container container">
                    <p class="video__description">Find out more with our video of the most beautiful and 
                        pleasant places for you and your family.
                    </p> -->

                    <div class="video__content">
                        <video id="video-file">
                            <!-- <source src="/assets/video/video.mp4" type="video/mp4"> -->
                        </video>

                        <button id="video-button">
                            <!-- <i class="ri-play-line video__button-icon" id="video-icon"></i> -->
                        </button>
                    </div>
                </div>
            </section>

            <!--==================== PAKET ====================-->
            <section class="place section" id="paket">
                <h2 class="section__title">Pilih Paket Destinasi Wisatamu</h2>

                <div class="place__container container grid">
                    <!--==================== PAKET CARD 1 ====================-->
                    <div class="place__card">
                        <img src="/assets/img/wisata1.jpg" alt="" class="place__img">
                        
                        <div class="place__content">
                            <div class="place__data">
                                <h3 class="place__title">Masjid Nasional Al Akbar</h3>
                                <span class="place__subtitle">Surabaya</span>
                                <div style="height: 150px;"></div>
                                <span class="place__price">Rp. 500.000</span>
                            </div>
                        </div>

                        <button class="button button--flex place__button">
                            <i class="ri-arrow-right-line"></i>
                        </button>
                    </div>

                    <!--==================== PAKET CARD 2 ====================-->
                    <div class="place__card">
                        <img src="/assets/img/wisata2.jpg" alt="" class="place__img">
                        
                        <div class="place__content">
                            <div class="place__data">
                                <h3 class="place__title">Masjid Agung Tuban</h3>
                                <span class="place__subtitle">Tuban</span>
                                <div style="height: 150px;"></div>
                                <span class="place__price">Rp. 500.000</span>
                            </div>
                        </div>

                        <button class="button button--flex place__button">
                            <i class="ri-arrow-right-line"></i>
                        </button>
                    </div>

                    <!--==================== PAKET CARD 3 ====================-->
                    <div class="place__card">
                        <img src="/assets/img/wisata3.jpg" alt="" class="place__img">
                        
                        <div class="place__content">
                            <div class="place__data">
                                <h3 class="place__title">Masjid Agung Jami Malang</h3>
                                <span class="place__subtitle">Malang</span>
                                <div style="height: 150px;"></div>
                                <span class="place__price">Rp. 500.000</span>
                            </div>
                        </div>

                        <button class="button button--flex place__button">
                            <i class="ri-arrow-right-line"></i>
                        </button>
                    </div>

                    <!--==================== PAKET CARD 4 ====================-->
                    <div class="place__card">
                        <img src="/assets/img/wisata4.jpg" alt="" class="place__img">
                        
                        <div class="place__content">
                            <div class="place__data">
                                <h3 class="place__title">Candi Bajang Ratu</h3>
                                <span class="place__subtitle">Malang</span>
                                <div style="height: 150px;"></div>
                                <span class="place__price">Rp. 500.000</span>
                            </div>
                        </div>

                        <button class="button button--flex place__button">
                            <i class="ri-arrow-right-line"></i>
                        </button>
                    </div>

                    <!--==================== PAKET CARD 5 ====================-->
                    <div class="place__card">
                        <img src="/assets/img/wisata5.jpg" alt="" class="place__img">
                        
                        <div class="place__content">
                            <div class="place__data">
                                <h3 class="place__title">Klenteng Kwan Sing Bio</h3>
                                <span class="place__subtitle">Tuban</span>
                                <div style="height: 150px;"></div>
                                <span class="place__price">Rp. 500.000</span>
                            </div>
                        </div>

                        <button class="button button--flex place__button">
                            <i class="ri-arrow-right-line"></i>
                        </button>
                    </div>

                    <!--==================== PAKET CARD 6 ====================-->
                    <div class="place__card">
                        <img src="/assets/img/wisata6.jpg" alt="" class="place__img">
                        
                        <div class="place__content">
                            <div class="place__data">
                                <h3 class="place__title">Candi Penataran</h3>
                                <span class="place__subtitle">Blitar</span>
                                <div style="height: 150px;"></div>
                                <span class="place__price">Rp. 500.000</span>
                            </div>
                        </div>

                        <button class="button button--flex place__button">
                            <i class="ri-arrow-right-line"></i>
                        </button>
                    </div>
                </div>
            </section>
        </main>

        <!--==================== FOOTER ====================-->
        <footer class="footer section">
            <div class="footer__container container grid">
                <div class="footer__content grid">
                    <div class="footer__data">
                        <h3 class="footer__title">Travel</h3>
                        <p class="footer__description">Travel you choose the <br> destination, 
                            we offer you the <br> experience.
                        </p>
                        <div>
                            <a href="https://www.facebook.com/" target="_blank" class="footer__social">
                                <i class="ri-facebook-box-fill"></i>
                            </a>
                            <a href="https://twitter.com/" target="_blank" class="footer__social">
                                <i class="ri-twitter-fill"></i>
                            </a>
                            <a href="https://www.instagram.com/" target="_blank" class="footer__social">
                                <i class="ri-instagram-fill"></i>
                            </a>
                            <a href="https://www.youtube.com/" target="_blank" class="footer__social">
                                <i class="ri-youtube-fill"></i>
                            </a>
                        </div>
                    </div>
    
                    <div class="footer__data">
                        <h3 class="footer__subtitle">About</h3>
                        <ul>
                            <li class="footer__item">
                                <a href="" class="footer__link">About Us</a>
                            </li>
                            <li class="footer__item">
                                <a href="" class="footer__link">Features</a>
                            </li>
                            <li class="footer__item">
                                <a href="" class="footer__link">New & Blog</a>
                            </li>
                        </ul>
                    </div>
        
                    <div class="footer__data">
                        <h3 class="footer__subtitle">Support</h3>
                        <ul>
                            <li class="footer__item">
                                <a href="#" class="footer__link">FAQs</a>
                            </li>
                            <li class="footer__item">
                                <a href="#" class="footer__link">Support Center</a>
                            </li>
                            <li class="footer__item">
                                <a href="#" class="footer__link">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="footer__rights">
                    <!-- <p class="footer__copy">&#169; 2021 Bedimcode. All rigths reserved.</p> -->
                    <div class="footer__terms">
                        <a href="#" class="footer__terms-link">Terms & Agreements</a>
                        <a href="#" class="footer__terms-link">Privacy Policy</a>
                    </div>
                </div>
            </div>
        </footer>

         <!--========== SCROLL UP ==========-->
        <a href="#" class="scrollup" id="scroll-up">
            <i class="ri-arrow-up-line scrollup__icon"></i>
        </a>

        <!--=============== SCROLL REVEAL===============-->
        <script src="/assets/js/scrollreveal.min.js"></script>
        
        <!--=============== SWIPER JS ===============-->
        <script src="/assets/js/swiper-bundle.min.js"></script>

        <!--=============== MAIN JS ===============-->
        <script src="/assets/js/main.js"></script>
    </body>
</html>
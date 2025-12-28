<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crowny Hotel</title>

    <!-- CSS -->
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">

    <!-- Owl Carousel -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
</head>

<body>

    <!-- ================= HEADER ================= -->
    <header>
        <div class="content flex_space">
            <div class="logo">
                <img src="<?= base_url('images/logo.png') ?>" alt="Crowny Hotel">
            </div>
            <div class="navlinks">
                <ul id="menulist">
                    <li><a href="#home">home</a></li>
                    <li><a href="#about">about</a></li>
                    <li><a href="#rooms">rooms</a></li>
                    <li><a href="#contact">contact</a></li>

                    <li><?php if (session()->get('isLoggedIn')): ?>

                            <?php if (session()->get('role') === 'admin'): ?>
                                <a href="<?= base_url('dashboard') ?>">Dashboard</a>
                            <?php endif; ?>

                            <a href="<?= base_url('logout') ?>">Logout</a>

                        <?php else: ?>

                            <a href="<?= base_url('login') ?>">Login</a>

                        <?php endif; ?>
                    </li>
                   
                </ul>
                <span class="fa fa-bars" onclick="menutoggle()"></span>
            </div>
        </div>
    </header>

    <script>
        var menulist = document.getElementById('menulist');
        menulist.style.maxHeight = "0px";

        function menutoggle() {
            menulist.style.maxHeight =
                menulist.style.maxHeight === "0px" ? "100vh" : "0px";
        }
    </script>

    <!-- ================= HOME SLIDER ================= -->
    <section class="home" id="home">
        <div class="content">
            <div class="owl-carousel owl-theme">
                <div class="item">
                    <img src="<?= base_url('images/banner-1.png') ?>" alt="">
                    <div class="text">
                        <h1>Spend Your Holiday</h1>
                        <p>Luxury hotel experience.</p>
                    </div>
                </div>
                <div class="item">
                    <img src="<?= base_url('images/banner-2.png') ?>" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- ================= ROOMS SECTION (DYNAMIC) ================= -->
    <section class="rooms" id="rooms">
        <div class="container top">
            <div class="heading">
                <h1>EXPLORE</h1>
                <h2>Our Rooms</h2>
            </div>

            <div class="content mtop">
                <?php if (!empty($rooms)): ?>
                    <div class="owl-carousel owl-carousel1 owl-theme">
                        <?php foreach ($rooms as $room): ?>
                            <div class="items">
                                <div class="image">
                                    <img src="<?= base_url('uploads/' . $room['image']) ?>"
                                        alt="<?= esc($room['title']) ?>">
                                </div>
                                <div class="text">
                                    <h2><?= esc($room['title']) ?></h2>
                                    <p><?= esc($room['description']) ?></p>

                                    <div class="button flex">
                                        <a href="<?= base_url('rooms/' . $room['id']) ?>"
                                            class="primary-btn">
                                            BOOK NOW
                                        </a>
                                        <h3>
                                            $<?= esc($room['price_per_night']) ?>
                                            <span><br>Per Night</span>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p style="text-align:center;">No rooms available.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- ================= FOOTER ================= -->
    <footer>
        <div class="container grid">
            <div class="box">
                <img src="<?= base_url('images/logo.png') ?>" alt="">
                <p>Luxury Hotel & Resort.</p>
            </div>
        </div>
    </footer>

    <!-- ================= SCRIPTS ================= -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            items: 1,
            nav: true
        });

        $('.owl-carousel1').owlCarousel({
            loop: true,
            margin: 40,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });
    </script>

</body>

</html>
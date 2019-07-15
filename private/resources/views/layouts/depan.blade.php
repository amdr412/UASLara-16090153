<!DOCTYPE html>
<html>

<head>

    <title>Pemetaan Rambu</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./public/images/dishub.png">
    <link rel="stylesheet" href="./public/depan/css/linearicons.css">
    <link rel="stylesheet" href="./public/depan/css/font-awesome.min.css">
    <link rel="stylesheet" href="./public/depan/css/bootstrap.css">
    <link rel="stylesheet" href="./public/depan/css/magnific-popup.css">
    <link rel="stylesheet" href="./public/depan/css/nice-select.css">
    <link rel="stylesheet" href="./public/depan/css/hexagons.min.css">
    <link rel="stylesheet" href="./public/depan/css/animate.min.css">
    <link rel="stylesheet" href="./public/depan/css/owl.carousel.css">
    <link rel="stylesheet" href="./public/depan/css/main.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
        integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
        integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
        crossorigin=""></script>
    <style>
        html,
        body {
            height: 100%;
            margin: auto;
        }

    </style>

    <style>
        body {
            padding: 0;
            margin: 0;
        }

        #map {
            height: 30%;
            width: 48vw;
            margin: auto;
        }

    </style>
</head>

<body>
    <header id="header" id="home">
        <div class="container main-menu">
            <div class="row align-items-center justify-content-between d-flex">
                <div id="logo">
                    <a href="/"><img src="./public/images/logo_navbar.png" alt="/" title="" /></a>
                </div>
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li class="menu-active"><a href="/pemetaan-rambu">Beranda</a></li>
                        <li class="menu-active"><a href="#laporan_masyarakat">Layanan Pelaporan</a></li>
                        <li class="menu-active"><a href="#feature">Macam macam layanan</a></li>
                        <li class="menu-active"><a href="#about">kontak</a></li>
                    </ul>
                </nav><!-- #nav-menu-container -->
            </div>
        </div>
    </header><!-- #header -->
    @yield('content')

    <footer class="footer-area section-gap" style="margin:auto;"  id="about"> 
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>About Us</h6>
                        <p>
                            Dinas Perhubungan Kab Tegal, ‎Jl. Cut Nyak Dien No. 13, Slawi
                            Kab. Tegal
                        </p>
                        <p>No.Tlp : ‎0283 xxx xxx</p>
                        <p>Email : dishubkominfo@tegalkab.go.id</p>

                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 social-widget">
                    <div class="single-footer-widget">
                        <h6>Follow Kami</h6>
                        <p>Sosial Media</p>
                        <div class="footer-social d-flex align-items-center">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                            <a href="#"><i class="fa fa-behance"></i></a>
                        </div>
                        <p class="footer-text">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());

                            </script> AR-Dev | This template is made with <i class="fa fa-heart-o"
                                aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script>
        var map = L.map('map');

        L.tileLayer(
            'https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                attribution: 'Klik/tap pada peta untuk menambah koordinat',
                id: 'mapbox.streets',
                maxZoom: 18

            }).addTo(map);

        function onLocationFound(e) {
            var radius = e.accuracy;

            L.circle(e.latlng, radius).addTo(map);
        }

        function onLocationError(e) {
            alert(e.message);
        }
        map.on('click', function (e) {
            let latitude = e.latlng.lat.toString().substring(0, 15);
            let longitude = e.latlng.lng.toString().substring(0, 15);
            $('#latitude').val(latitude);
            $('#longitude').val(longitude);
            updateMarker(latitude, longitude);
        });
        var updateMarkerByInputs = function () {
            return updateMarker($('#latitude').val(), $('#longitude').val());
        }
        map.on('locationfound', onLocationFound);
        map.on('locationerror', onLocationError);

        map.locate({
            setView: true,
            maxZoom: 16
        });

    </script>
    <script src="./public/depan/js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="./public/depan/js/vendor/bootstrap.min.js"></script>
    <script src="./public/depan/js/easing.min.js"></script>
    <script src="./public/depan/js/hoverIntent.js"></script>
    <script src="./public/depan/js/superfish.min.js"></script>
    <script src="./public/depan/js/jquery.ajaxchimp.min.js"></script>
    <script src="./public/depan/js/jquery.magnific-popup.min.js"></script>
    <script src="./public/depan/js/owl.carousel.min.js"></script>
    <script src="./public/depan/js/hexagons.min.js"></script>
    <script src="./public/depan/js/main.js"></script>
    <script src="./public/depan/js/jquery.nice-select.min.js"></script>
    <script src="./public/depan/js/jquery.counterup.min.js"></script>
    <script src="./public/depan/js/waypoints.min.js"></script>
    <script src="./public/depan/js/mail-script.js"></script>


</body>

</html>

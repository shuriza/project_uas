<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Info Promo & Pasang Wifi Indibiz</title>
    <link rel="icon" href="{{ asset('images/wifi.png') }}" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/bc9a1bbcfd.js" crossorigin="anonymous"></script>
    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}?v={{ time() }}">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<body style="user-select: none;">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top drop-shadow" id="dropshdnav">
        <div class="container-md">
            <!-- Logo -->
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/indibiz-logo.png') }}" alt="Logo" id="logo" style="height: 40px;">
            </a>

            <!-- Date & Time (Positioned Right) -->
            <div id="datetime" class="ml-1 d-none d-lg-block">
                <span id="time"></span><br>
                <span id="date"></span>
            </div>

            <!-- Navbar Toggle Button (for small screens) -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- Home -->
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>

                    <!-- Login -->
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>

                    <!-- Registrasi -->
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Registrasi</a>
                    </li>

                    <!-- Dropdown for extra links (for mobile) -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            More
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Link 1</a></li>
                            <li><a class="dropdown-item" href="#">Link 2</a></li>
                            <li><a class="dropdown-item" href="#">Link 3</a></li>
                        </ul>
                    </li>
                </ul>

                <!-- Button Pasang (Right-aligned) -->
                <button class="btn btn-custom ms-lg-3" onclick="openWhatsApp1()" id="buttonpasang">
                    <i class="fa-solid fa-wifi fa-beat-fade"></i> PASANG SEKARANG
                </button>
            </div>
        </div>
    </nav>



    <div class="floating-button" id="floatbutton">
      <a class="btn btn-lg rounded-circle">
        <i class="bi bi-whatsapp" id="wafloat"></i>
      </a>
      <span class="label" id="lblfloat"><b>Pasang Indibiz?</b><br> whatsapp</span>
    </div>

    <div class="container col-lg-4 col-md-4 col-sm-5 col-xs-4 offset-lg-7 offset-md-6 offset-sm-6 offset-xs-6" id="floatcard">
      <div class="row align-items-center" id="top">
        <div class="col-lg-2 col-md-2 col-sm-2 col-2 ps-3">
          <i class="bi bi-whatsapp" id="wa-card1"></i>
        </div>
        <div class="col-lg-9 col-md-10 col-sm-10 col-9">
          <h2 class="card-title" id="mulai">Mulai Percakapan</h2>
          <p class="card-text" id="hub0">Hubungi salah satu admin dibawah untuk mengobrol di Whatsapp.</p>
        </div>
      </div>
      <div id="bottom" class="row">
        <div class="col-12">
          <p id="jamop">Admin Online 24 Jam</p>
        </div>
        <a onclick="openWhatsApp2()" class="btn custom-btn2 btn-block" id="buttoncardfloat">
          <div class="row align-items-center">
            <div class="col-lg-2 col-md-2 col-sm-2 col-2">
              <i class="bi bi-person-circle" id="person1"></i>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-8" style="text-align: left;">
              <h4 class="card-title" id="adm">Admin</h4>
              <p class="card-text" id="hub">Konsultasi & Pemasangan</p>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-1">
              <i class="bi bi-whatsapp" id="wa-card2"></i>
            </div>
          </div>
        </a>
      </div>
    </div>

    <div class="container-md" id="carouselcont">
    <div class="col-lg-10" id="boxcarousel">
        <div class="my-carousel">
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-touch="true" data-bs-interval="1000">
            <div class="carousel-inner">
            <div class="carousel-item active" style="padding-right: 10px; padding-left:10px;">
                <img src="{{ asset('images/car.jpg') }}"class="d-block w-100" alt="First slide">
            </div>
            <div class="carousel-item" style="padding-right: 10px">
                <img src="{{ asset('images/car.jpg') }}" class="d-block w-100" alt="Second slide">
            </div>
            <div class="carousel-item" style="padding-right: 10px">
                <img src="{{ asset('images/carousel1.jpg') }}" class="d-block w-100" alt="Third slide">
            </div>
            <div class="carousel-item" style="padding-right: 10px">
                <img src="{{ asset('images/carousel2.jpg') }}" class="d-block w-100" alt="Fourth slide">
            </div>
            <div class="carousel-item" style="padding-right: 10px">
                <img src="{{ asset('images/carousel3.jpg') }}" class="d-block w-100" alt="Fifth slide">
            </div>
            <div class="carousel-item" style="padding-right: 10px">
                <img src="{{ asset('images/carousel4.jpg') }}" class="d-block w-100" alt="Sixth slide">
            </div>
            <div class="carousel-item" style="padding-right: 10px">
                <img src="{{ asset('images/carousel3.jpg') }}" class="d-block w-100" alt="Seventh slide">
            </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
            </button>
            <ol class="carousel-indicators">
            <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
            <li data-bs-target="#myCarousel" data-bs-slide-to="3"></li>
            <li data-bs-target="#myCarousel" data-bs-slide-to="4"></li>
            <li data-bs-target="#myCarousel" data-bs-slide-to="5"></li>
            <li data-bs-target="#myCarousel" data-bs-slide-to="6"></li>
            <li data-bs-target="#myCarousel" data-bs-slide-to="4"></li>
            </ol>
        </div>
        </div>
    </div>
    </div>

    <!--Welcome-->
    <div class="container-md" id="welcome">
        <div class="row d-flex justify-content-center align-items-center" id="welcomebox">
            <div class="row col-lg-10">
                <div class=" row col-lg-8 col-md-8 col-sm-12 col-12" id="welcomewrapper">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-3" id="welcomeimg">
                        <img src="{{ asset('images/indibizlogo2.png') }}" alt="logo2" class="img-fluid" id="welcomeimg">
                    </div>
                    <!-- Kolom selamat datang -->
                    <div class="col-lg-9 col-md-9 col-sm-9 col-9" id="welcometxt">
                      <h4>Selamat Datang di..</h4>
                      <h1>Indibiz</h1>
                      <h5>Solusi internet yang cepat, stabil, dan efisien, memenuhi kebutuhan bisnis inovatif dan meningkatkan produktivitas</h5>
                    </div>
                </div>
                <!-- Kolom deskripsi -->
                <div class="col-lg-4 col-md-4 col-sm-12 col-12 mt-lg-0 mt-md-0 mt-sm-2 mt-3">
                <p id="pwelcom">Temukan solusi jaringan koneksi internet yang menghubungkan pengguna dengan dunia digital secara cepat, stabil, dan efisien yang memenuhi kebutuhan digital untuk manajemen bisnis yang inovatif dan terintegrasi, serta meningkatkan efisiensi dan produktivitas.</p>
                <button class="btn buttoninfodet1">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i> INFO DETAIL
                </button>
                </div>
              </div>
        </div>
    </div>

    <!--Card Container 1-->
    <div class="container-md" id="cardcont1">
      <div class="col-lg-10" id="box1">
          <div id="Header1">HSI BISNIS NON FUP</div>
          <div class="row">
              <div class="container col-xl-4 col-lg-6 col-md-6 col-sm-12">
                  <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
                          <div class="card kartu pt-3">
                              <div class="row g-0">
                                  <div class="col-lg-6 col-md-6 col-sm-6 col-6" id="kiri1">
                                      <button class="btn buttoninfodet3">
                                          <i class="bi bi-exclamation-circle-fill"></i>INFO DETAIL
                                      </button>
                                      <div class="card-body text-center">
                                          <h1 id="angka1">50</h1>
                                          <p id="speed1">Mbps</p>
                                          <p id="harga1">Rp 439.000/bulan</p>
                                      </div>
                                  </div>
                                  <div class="col-lg-6 col-md-6 col-sm-6 col-6" id="kanan1">
                                      <div class="card-body">
                                          <div>
                                              <h5 class="card-title"><b>PAKET NON FUP</b></h5>
                                              <p class="card-text" id="biaya">Biaya pasang Rp 150.000 + PPN 11%(Rp 166.500 setelah PPN)</p>
                                          </div>
                                          <!-- Tombol buttoninfodet di bawah -->
                                          <div class="d-flex justify-content-end">
                                              <button class="btn buttoninfodet" onclick="openWhatsApp3(50,false)">
                                                <i class="fa-solid fa-arrow-up-right-from-square"></i> BERLANGGANAN
                                              </button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="container col-xl-4 col-lg-6 col-md-6 col-sm-12">
                  <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
                          <div class="card kartu pt-3" >
                              <div class="row g-0">
                                  <div class="col-lg-6 col-md-6 col-sm-6 col-6" id="kiri1">
                                      <button class="btn buttoninfodet3">
                                          <i class="bi bi-exclamation-circle-fill"></i>INFO DETAIL
                                      </button>
                                      <div class="card-body text-center">
                                          <h1 id="angka1">75</h1>
                                          <p id="speed1">Mbps</p>
                                          <p id="harga1">Rp 519.000/bulan</p>
                                      </div>
                                  </div>
                                  <div class="col-lg-6 col-md-6 col-sm-6 col-6" id="kanan1">
                                      <div class="card-body">
                                          <div>
                                              <h5 class="card-title"><b>PAKET NON FUP</b></h5>
                                              <p class="card-text" id="biaya">Biaya pasang Rp 150.000 + PPN 11%(Rp 166.500 setelah PPN)</p>
                                          </div>
                                          <!-- Tombol buttoninfodet di bawah -->
                                          <div class="d-flex justify-content-end">
                                              <button class="btn buttoninfodet" onclick="openWhatsApp3(75,false)">
                                                <i class="fa-solid fa-arrow-up-right-from-square"></i> BERLANGGANAN
                                              </button>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                          </div>
                      </div>
                  </div>
              </div>

              <div class="container col-xl-4 col-lg-6 col-md-6 col-sm-12">
                  <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
                          <div class="card kartu pt-3">
                              <div class="row g-0">
                                  <div class="col-lg-6 col-md-6 col-sm-6 col-6" id="kiri1">
                                      <button class="btn buttoninfodet3">
                                          <i class="bi bi-exclamation-circle-fill"></i>INFO DETAIL
                                      </button>
                                      <div class="card-body text-center">
                                          <h1 id="angka1">100</h1>
                                          <p id="speed1">Mbps</p>
                                          <p id="harga1">Rp 669.000/bulan</p>
                                      </div>
                                  </div>
                                  <div class="col-lg-6 col-md-6 col-sm-6 col-6" id="kanan1">
                                      <div class="card-body">
                                          <div>
                                              <h5 class="card-title"><b>PAKET NON FUP</b></h5>
                                              <p class="card-text" id="biaya">Biaya pasang Rp 150.000 + PPN 11%(Rp 166.500 setelah PPN)</p>
                                          </div>
                                          <!-- Tombol buttoninfodet di bawah -->
                                          <div class="d-flex justify-content-end">
                                              <button class="btn buttoninfodet" onclick="openWhatsApp3(100,false)">
                                                <i class="fa-solid fa-arrow-up-right-from-square"></i> BERLANGGANAN
                                              </button>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                          </div>
                      </div>
                  </div>
              </div>

              <div class="container col-xl-4 col-lg-6 col-md-6 col-sm-12">
                  <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
                          <div class="card kartu pt-3">
                              <div class="row g-0">
                                  <div class="col-lg-6 col-md-6 col-sm-6 col-6" id="kiri1">
                                      <button class="btn buttoninfodet3">
                                          <i class="bi bi-exclamation-circle-fill"></i>INFO DETAIL
                                      </button>
                                      <div class="card-body text-center">
                                          <h1 id="angka1">150</h1>
                                          <p id="speed1">Mbps</p>
                                          <p id="harga1">Rp 819.000/bulan</p>
                                      </div>
                                  </div>
                                  <div class="col-lg-6 col-md-6 col-sm-6 col-6" id="kanan1">
                                      <div class="card-body">
                                          <div>
                                              <h5 class="card-title"><b>PAKET NON FUP</b></h5>
                                              <p class="card-text" id="biaya">Biaya pasang Rp 150.000 + PPN 11%(Rp 166.500 setelah PPN)</p>
                                          </div>
                                          <!-- Tombol buttoninfodet di bawah -->
                                          <div class="d-flex justify-content-end">
                                              <button class="btn buttoninfodet" onclick="openWhatsApp3(150,false)">
                                                <i class="fa-solid fa-arrow-up-right-from-square"></i> BERLANGGANAN
                                              </button>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                          </div>
                      </div>
                  </div>
              </div>

              <div class="container col-xl-4 col-lg-6 col-md-6 col-sm-12">
                  <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
                          <div class="card kartu pt-3">
                              <div class="row g-0">
                                  <div class="col-lg-6 col-md-6 col-sm-6 col-6" id="kiri1">
                                      <button class="btn buttoninfodet3">
                                          <i class="bi bi-exclamation-circle-fill"></i>INFO DETAIL
                                      </button>
                                      <div class="card-body text-center">
                                          <h1 id="angka1">200</h1>
                                          <p id="speed1">Mbps</p>
                                          <p id="harga1">Rp 1.049.000/bulan</p>
                                      </div>
                                  </div>
                                  <div class="col-lg-6 col-md-6 col-sm-6 col-6" id="kanan1">
                                      <div class="card-body">
                                          <div>
                                              <h5 class="card-title"><b>PAKET NON FUP</b></h5>
                                              <p class="card-text" id="biaya">Biaya pasang Rp 150.000 + PPN 11%(Rp 166.500 setelah PPN)</p>
                                          </div>
                                          <!-- Tombol buttoninfodet di bawah -->
                                          <div class="d-flex justify-content-end">
                                              <button class="btn buttoninfodet" onclick="openWhatsApp3(200,false)">
                                                <i class="fa-solid fa-arrow-up-right-from-square"></i> BERLANGGANAN
                                              </button>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                          </div>
                      </div>
                  </div>
              </div>

              <div class="container col-xl-4 col-lg-6 col-md-6 col-sm-12">
                  <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
                          <div class="card kartu pt-3">
                              <div class="row g-0">
                                  <div class="col-lg-6 col-md-6 col-sm-6 col-6" id="kiri1">
                                      <button class="btn buttoninfodet3">
                                          <i class="bi bi-exclamation-circle-fill"></i>INFO DETAIL
                                      </button>
                                      <div class="card-body text-center">
                                          <h1 id="angka1">300</h1>
                                          <p id="speed1">Mbps</p>
                                          <p id="harga1">Rp 1.499.000/bulan</p>
                                      </div>
                                  </div>
                                  <div class="col-lg-6 col-md-6 col-sm-6 col-6" id="kanan1">
                                      <div class="card-body">
                                          <div>
                                              <h5 class="card-title"><b>PAKET NON FUP</b></h5>
                                              <p class="card-text" id="biaya">Biaya pasang Rp 150.000 + PPN 11%(Rp 166.500 setelah PPN)</p>
                                          </div>
                                          <!-- Tombol buttoninfodet di bawah -->
                                          <div class="d-flex justify-content-end">
                                              <button class="btn buttoninfodet" onclick="openWhatsApp3(300,false)">
                                                <i class="fa-solid fa-arrow-up-right-from-square"></i> BERLANGGANAN
                                              </button>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                          </div>
                      </div>
                  </div>
              </div>

          </div>
      </div>
  </div>
  
<div class="container-md" id="cardcont2">
    <div class="col-lg-10" id="box2">
        <div id="Header2">HSI BISNIS BASIC FUP</div>
        <div class="row">
            <div class="container col-xl-4 col-lg-6 col-md-6 col-sm-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
                        <div class="card kartu2 pt-3">
                            <div class="row g-0">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6" id="kiri2">
                                    <button class="btn buttoninfodet3">
                                        <i class="bi bi-exclamation-circle-fill"></i>INFO DETAIL
                                    </button>
                                    <div class="card-body text-center">
                                        <h1 id="angka2">50</h1>
                                        <p id="speed2">Mbps</p>
                                        <p id="harga2">Rp 387.000/bulan</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6" id="kanan2">
                                    <div class="card-body">
                                        <div>
                                            <h5 class="card-title"><b>PAKET BASIC FUP</b></h5>
                                            <p class="card-text" id="biaya2">Biaya pasang Rp 150.000 + PPN 11%(Rp 166.500 setelah PPN)</p>
                                        </div>
                                        <!-- Tombol buttoninfodet di bawah -->
                                        <div class="d-flex justify-content-end">
                                            <button class="btn buttoninfodet" onclick="openWhatsApp3(50,true)">
                                                <i class="fa-solid fa-arrow-up-right-from-square"></i> BERLANGGANAN
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container col-xl-4 col-lg-6 col-md-6 col-sm-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
                        <div class="card kartu2 pt-3">
                            <div class="row g-0">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6" id="kiri2">
                                    <button class="btn buttoninfodet3">
                                        <i class="bi bi-exclamation-circle-fill"></i>INFO DETAIL
                                    </button>
                                    <div class="card-body text-center">
                                        <h1 id="angka2">75</h1>
                                        <p id="speed2">Mbps</p>
                                        <p id="harga2">Rp 447.000/bulan</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6" id="kanan2">
                                    <div class="card-body">
                                        <div>
                                            <h5 class="card-title"><b>PAKET BASIC FUP</b></h5>
                                            <p class="card-text" id="biaya2">Biaya pasang Rp 150.000 + PPN 11%(Rp 166.500 setelah PPN)</p>
                                        </div>
                                        <!-- Tombol buttoninfodet di bawah -->
                                        <div class="d-flex justify-content-end">
                                            <button class="btn buttoninfodet" onclick="openWhatsApp3(75,true)">
                                                <i class="fa-solid fa-arrow-up-right-from-square"></i> BERLANGGANAN
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="container col-xl-4 col-lg-6 col-md-6 col-sm-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
                        <div class="card kartu2 pt-3">
                            <div class="row g-0">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6" id="kiri2">
                                    <button class="btn buttoninfodet3">
                                        <i class="bi bi-exclamation-circle-fill"></i>INFO DETAIL
                                    </button>
                                    <div class="card-body text-center">
                                        <h1 id="angka2">100</h1>
                                        <p id="speed2">Mbps</p>
                                        <p id="harga2">Rp 557.000/bulan</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6" id="kanan2">
                                    <div class="card-body">
                                        <div>
                                            <h5 class="card-title"><b>PAKET BASIC FUP</b></h5>
                                            <p class="card-text" id="biaya2">Biaya pasang Rp 150.000 + PPN 11%(Rp 166.500 setelah PPN)</p>
                                        </div>
                                        <!-- Tombol buttoninfodet di bawah -->
                                        <div class="d-flex justify-content-end">
                                            <button class="btn buttoninfodet" onclick="openWhatsApp3(100,true)">
                                                <i class="fa-solid fa-arrow-up-right-from-square"></i> BERLANGGANAN
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="container col-xl-4 col-lg-6 col-md-6 col-sm-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
                        <div class="card kartu2 pt-3">
                            <div class="row g-0">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6" id="kiri2">
                                    <button class="btn buttoninfodet3">
                                        <i class="bi bi-exclamation-circle-fill"></i>INFO DETAIL
                                    </button>
                                    <div class="card-body text-center">
                                        <h1 id="angka2">150</h1>
                                        <p id="speed2">Mbps</p>
                                        <p id="harga2">Rp 697.000/bulan</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6" id="kanan2">
                                    <div class="card-body">
                                        <div>
                                            <h5 class="card-title"><b>PAKET BASIC FUP</b></h5>
                                            <p class="card-text" id="biaya2">Biaya pasang Rp 150.000 + PPN 11%(Rp 166.500 setelah PPN)</p>
                                        </div>
                                        <!-- Tombol buttoninfodet di bawah -->
                                        <div class="d-flex justify-content-end">
                                            <button class="btn buttoninfodet" onclick="openWhatsApp3(150,true)">
                                                <i class="fa-solid fa-arrow-up-right-from-square"></i> BERLANGGANAN
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="container col-xl-4 col-lg-6 col-md-6 col-sm-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
                        <div class="card kartu2 pt-3">
                            <div class="row g-0">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6" id="kiri2">
                                    <button class="btn buttoninfodet3">
                                        <i class="bi bi-exclamation-circle-fill"></i>INFO DETAIL
                                    </button>
                                    <div class="card-body text-center">
                                        <h1 id="angka2">200</h1>
                                        <p id="speed2">Mbps</p>
                                        <p id="harga2">Rp 877.000/bulan</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6" id="kanan2">
                                    <div class="card-body">
                                        <div>
                                            <h5 class="card-title"><b>PAKET BASIC FUP</b></h5>
                                            <p class="card-text" id="biaya2">Biaya pasang Rp 150.000 + PPN 11%(Rp 166.500 setelah PPN)</p>
                                        </div>
                                        <!-- Tombol buttoninfodet di bawah -->
                                        <div class="d-flex justify-content-end">
                                            <button class="btn buttoninfodet" onclick="openWhatsApp3(200,true)">
                                                <i class="fa-solid fa-arrow-up-right-from-square"></i> BERLANGGANAN
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="container col-xl-4 col-lg-6 col-md-6 col-sm-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
                        <div class="card kartu2 pt-3">
                            <div class="row g-0">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6" id="kiri2">
                                    <button class="btn buttoninfodet3">
                                        <i class="bi bi-exclamation-circle-fill"></i>INFO DETAIL
                                    </button>
                                    <div class="card-body text-center">
                                        <h1 id="angka2">300</h1>
                                        <p id="speed2">Mbps</p>
                                        <p id="harga2">Rp 1.257.000/bulan</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6" id="kanan2">
                                    <div class="card-body">
                                        <div>
                                            <h5 class="card-title"><b>PAKET BASIC FUP</b></h5>
                                            <p class="card-text" id="biaya2">Biaya pasang Rp 150.000 + PPN 11%(Rp 166.500 setelah PPN)</p>
                                        </div>
                                        <!-- Tombol buttoninfodet di bawah -->
                                        <div class="d-flex justify-content-end">
                                            <button class="btn buttoninfodet" onclick="openWhatsApp3(300,true)">
                                                <i class="fa-solid fa-arrow-up-right-from-square"></i> BERLANGGANAN
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

          </div>
      </div>
  </div>

  <div class="container-md" id="contactcontainer">
    <div class="row d-flex justify-content-center align-items-center" id="contactbox">
        <div class="col-lg-10">
            <div class="row">
                <div class="col-md-5 col-sm-12 col-12" id="contacttxt">
                    <h2>Dibantu Tim Terbaik</h2>
                    <h1>HUBUNGI KAMI</h1>
                    <h5>Kami Berikan Layanan Terbaik Untuk Pelanggan</h5>
                </div>
                <div class="card col-md-7 col-sm-12 col-12" id="contactcard">
                    <div class="card-body" id="contactcardin">
                        <div class="row">
                            <div class="col-1">
                                <i class="bi bi-person-circle" id="person2"></i>
                            </div>
                            <div class="col">
                              <p><strong>Admin</strong></p>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col offset-1">
                              <p><strong>Working Hours:</strong></p>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-1">
                                <i class="bi bi-clock" id="clock1" ></i>
                            </div>
                            <div class="col">
                              <p>24 Jam</p>
                
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-1">
                                <i class="bi bi-whatsapp"  id="wa3"></i>
                            </div>
                            <div class="col">
                              <p>085236793416</p>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-md" id="accordioncont1">
    <div class="col-lg-10" id="accordionbox">
        <div class="accordion">
            <div class="accordion-item">
              <div class="accordion-item-header"><b>Syarat Pemasangan</b></div>
              <div class="accordion-item-body">
                <div class="accordion-item-body-content">
                    <ul>
                        <li>Memiliki kartu identitas berupa E-KTP yang masih berlaku.</li>
                        <li>Mempunyai email yang valid.</li>
                        <li>Memiliki nomor handphone yang masih aktif.</li>
                        <li>Anda harus mengirim foto selfie dengan memegang e-KTP.</li>
                        <li>Membayar biaya pasang baru setelah instalasi terpasang.
                          Pembayaran bisa dilakukan di Alfamart, Indomart, Kantor Pos atau Mobile Banking.</li>
                    </ul>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <div class="accordion-item-header"><b>Kapan pemasangan bisa dilaksanakan?</b></div>
              <div class="accordion-item-body">
                <div class="accordion-item-body-content">
                    <p>Pihak cutomer service kami akan menjadwalkan installasi sesuai dengan alamat yang sudah anda daftarkan pada form registrasi sebelumnya pada team sales.
                        <br><br>Lalu anda akan dikabarkan melalui whatsapp atau email anda, perihal pemasangan jaringan Indibiz.</p>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <div class="accordion-item-header"><b>Internet terkendala, apa yang harus saya lakukan?</b>
              </div>
              <div class="accordion-item-body">
                <div class="accordion-item-body-content">
                    <p>Customer service kami siap membantu anda 24/7</p>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <div class="accordion-item-header"><b>Apa ada FUP kuotanya?</b></div>
              <div class="accordion-item-body">
                <div class="accordion-item-body-content">
                    <p>Ada dua pilihan, yaitu NON FUP dan FUP Basic  </p>
                </div>
              </div>
            </div>
            <div class="accordion-item">
                <div class="accordion-item-header"><b>Cakupan Pelayanan</b></div>
                <div class="accordion-item-body">
                  <div class="accordion-item-body-content">
                      <p>Layanan kami mencakup ke seluruh Indonesia/Nasional.</p>
                  </div>
                </div>
              </div>
          </div>
        </div>
    </div>

    <footer class="container-fluid footer"></footer>

    <!-- JS Libraries -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

<!-- Custom JavaScript -->
<script src="{{ asset('script.js') }}"></script>


</body>
</html>

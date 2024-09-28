<!doctype html>
<html lang="en" class="h-100">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Website Company Profile Digital Creative">
    <meta name="author" content="Indra Styawantoro">
    
    <!-- Title -->
    <title>BOOK SHOP</title>

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{asset("uiprofile/img/vektor.png")}}" type="image/x-icon">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('fontawesome/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.css')}}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">

    <!-- Custom Style -->
    <link rel="stylesheet" href="{{asset("uiprofile/css/style.css")}}">
    <style>
        #card{
            background-color: #A3C582;
        }
        #card:hover{
            background-color: #527F25;
            color: white;
        }
    </style>
</head>

<body id="home" class="d-flex flex-column h-100">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light py-4 bg-nav">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand" href="#" onclick="window.location.reload(true);">
                <img src="{{asset("uiprofile/img/vektor.png")}}" alt="books" width="42" height="42" class="d-inline-block mt--2 me-2">
                <span class="text-body fs-4 fw-bolder">Books Shop</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse py-3 py-lg-1" id="navbarSupportedContent">
                <!-- Menu -->
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link mx-3" href="#" onclick="window.location.reload(true);">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-3" href="#about">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-3" href="#contact">Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-3" href="{{route('login')}}">Login</a>
                    </li>
                </ul>
                <!-- Social Media -->
                <div class="d-flex mt-3 ms-3 mt-md-0 ms-md-0">
                    <a href="https://www.facebook.com/mahmul.r.3?mibextid=ZbWKwL" target="_blank" class="btn btn-social-media me-3">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="https://www.instagram.com/mahmul.r/?utm_source=ig_web_button_share_sheet" target="_blank" class="btn btn-social-media me-3">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="https://youtube.com/@mahmulr3768?si=Jsjnl4zq0Ur8B3Gz" target="_blank" class="btn btn-social-media me-3">
                        <i class="bi bi-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-shrink-0">
        <!-- Heroes -->
        <div class="container-fluid col-xxl-8 px-4 py-5">
            <div class="row flex-lg-row-reverse align-items-center g-5">
                <div class="col-lg-5">
                    <img src="{{asset("uiprofile/img/vektor.png")}}" class="d-block mx-lg-auto img-fluid" alt="Book Shop" loading="lazy">
                </div>
                <div class="col-lg-7">
                    <h1 class="fw-bold lh-2 mb-4">Books Shop</h1>
                    <p class="lead mb-5 fa-beat" style="color: #4186E4;">Membaca Mudah, Buku di Genggaman!</p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        <a href="https://api.whatsapp.com/send?phone=6282183628475&text=Assalamualaikum.." class="btn btn-success rounded-pill px-4 py-2"><i class="bi bi-whatsapp me-2"></i> Hubungi Kami</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Services -->
        <div id="services" class="container text-center py-5">
            <div class="row text-center">
                <div class="col-lg-8 mx-auto">
                    <h3 class="fw-bold lh-2 mb-3">BOOKS</h3>
                    <p class="lead"></p>
                </div>
            </div>

            <div class="row py-4">
                <div class="container mt-5">
                    <!-- Form Pencarian -->
                    <div class="row">
                        <div class="col-4 offset-4">
                            <form action="{{ route('pencarian.buku') }}" method="GET">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="query" placeholder="Cari judul, jenis buku, atau penulis" required>
                                    <button class="btn btn-outline-primary" type="submit" id="button-addon2">Cari</button>
                                </div>
                            </form>
                        </div>
                    </div>
            
                    <!-- Tombol untuk Menampilkan Buku Disetujui -->
                    <div class="text-center mb-4">
                        <a href="{{ route('buku.disetujui') }}" class="btn btn-success">Tampilkan Seluruh Buku</a>
                    </div>
            
                    <!-- Hasil Pencarian dan Semua Buku -->
                    <div class="container-fluid p-3">
                        <div class="row">
                            @if(isset($books) && $books->isNotEmpty())
                                @foreach ($books as $book)
                                    <div class="col-3 rounded-3">
                                        <div class="card shadow-sm" style="width: 18rem;">
                                            <img src="{{ asset('images/' . $book->cover_buku) }}" alt="{{ $book->nama_buku }}" style="max-width: 100%;">
                                            <div class="card-body">
                                                <h5 class="card-title">{{$book->nama_buku}}</h5>
                                                <p class="fw-bold">{{$book->jenis_buku}}</p>
                                                <p class="fw-bold">{{$book->penulis->name}}</p>
                                                <p>Edisi: <span class="fw-bold">{{$book->edisi_buku}}</span></p>
                                                <p>Penulis: <span class="fw-bold">{{$book->penulis->name}}</span></p>
                                                <p>Jumlah Terjual: <span class="fw-bold">{{$book->jumlah_buku_terjual}}</span></p>
                                                <h4>Rp. {{$book->harga_jual}}</h4>
                                                <a href="{{route('login')}}" class="btn btn-primary">Deskripsi E-Book</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @elseif(isset($books) && $books->isEmpty())
                                <p class="text-center">Tidak ada buku yang ditemukan.</p>
                            @else
                                @if(isset($approvedBooks) && $approvedBooks->isNotEmpty())
                                    @foreach ($approvedBooks as $book)
                                        <div class="col-3 rounded-3">
                                            <div class="card shadow-sm" style="width: 18rem;">
                                                <img src="{{ asset('images/' . $book->cover_buku) }}" alt="{{ $book->nama_buku }}" style="max-width: 100%;">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{$book->nama_buku}}</h5>
                                                    <p class="fw-bold">{{$book->jenis_buku}}</p>
                                                    <p class="fw-bold">{{$book->penulis_buku}}</p>
                                                    <p>Edisi: <span class="fw-bold">{{$book->edisi_buku}}</span></p>
                                                    <p>Penulis: <span class="fw-bold">{{$book->penulis->name}}</span></p>
                                                    <p>Jumlah Terjual: <span class="fw-bold">{{$book->jumlah_buku_terjual}}</span></p>
                                                    <h4>Rp. {{$book->harga_jual}}</h4>
                                                    <a href="{{route('login')}}" class="btn btn-primary">Deskripsi E-Book</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-4 mb-4 col-sm-12 mb-lg-0">
                    <div class="card p-3" id="card" style="width: 18rem;">
                        <i class="fa-solid fa-user-group fa-2xl"></i>
                        <div class="card-body">
                          <p class="card-text">Rujuk</p>
                        </div>
                      </div>
                </div> --}}
            </div>
        </div>
        <!-- About -->
        <div id="about" class="container text-center py-5">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h3 class="fw-bold lh-2 mb-3">TENTANG KAMI</h3>
                </div>
            </div>

            <div class="row align-items-center text-start g-5 py-4">
                <div class="col-lg-6">
                    <h4 class="fw-bold lh-2 mb-3">Visi</h4>
                    <p>“Terwujudnya masyarakat Sipirok yang religius guna membangun keluarga smart (sakinah, mawaddah, rahmah dan tercatat)”.</p>
                </div>
                <div class="col-lg-6">
                    <h4 class="fw-bold lh-2 mb-3">Misi</h4>
                    <ol>
                        <li>Meningkatkan kualitas bimbingan, pemahaman dan pelayanan kehidupan beragama.</li>
                        <li>Meningkatkan pelayanan prima nikah dan rujuk.</li>
                        <li>Meningkatkan kualitas pembinaan di bidang keluarga sakinah, kemitraan umat, kemasjidan, ZIS, produk halal, ibadah sosial dan haji.</li>
                        <li>Optimalisasi 5 nilai budaya kerja (Intergritas, Profesionalitas, Inovasi, Tanggung Jawab, dan Keteladanan).</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- Contact -->
        <div id="contact" class="container text-center pt-4 pb-5">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h3 class="fw-bold lh-2 mb-3">KONTAK KAMI</h3>
                </div>
            </div>

            <div class="row align-items-start text-start g-5 pt-4 pb-5">
                <div class="col-lg-7">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2857.166845390956!2d98.58519047310129!3d3.49372595094175!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303125197f331eeb%3A0x1c418b38fc4ea5e!2sUINSU%20Medan%20Tuntungan%20Kampus%20IV!5e1!3m2!1sid!2sid!4v1727505975021!5m2!1sid!2sid" class="rounded-4 shadow-sm" width="100%" height="410" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-lg-5">
                    <div class="card h-100 border-0 rounded-4 shadow-sm">
                        <div class="card-body p-4 pb-0">
                            <div class="d-flex py-2">
                                <div class="flex-shrink-0">
                                    <i class="bi bi-geo-alt text-success fs-3"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-1">Alamat</h5>
                                    <p>Jl. Lap. Golf No.120, Kp. Tengah, Kec. Pancur Batu, Kabupaten Deli Serdang, Sumatera Utara 20353</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    {{-- <footer class="footer mt-auto py-4 bg-white">
        <div class="container">
            <div class="d-flex flex-column flex-md-row align-items-center align-items-md-left text-body">
                <div class="copyright text-center mb-2 mb-md-0">
                    &copy; 2022 - <a href="https://pustakakoding.com/" target="_blank" class="fw-bolder">Pustaka Koding</a>. All rights reserved.
                </div>
                <div class="link ms-md-auto">
                    <a href="https://pustakakoding.com/" target="_blank">Terms & Conditions</a>
                </div>
            </div>
        </div>
    </footer> --}}
    <script>
        // var dt = new Date();
        // document.getElementById("tanggalwaktu").innerHTML = dt.toLocaleDateString();
        const currentYear = new Date().getFullYear();
        document.getElementById('year').textContent = currentYear;
        
    </script>
    <!-- Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="{{asset('fontawesome/js/fontawesome.js')}}"></script>
    <script src="{{asset('fontawesome/js/all.js')}}"></script>
</body>
</html>
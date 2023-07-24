<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Item - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/landing.css') }}" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav id="navbar" class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            {{-- <a class="navbar-brand" href="#!">YayaMotor</a> --}}
            <a href="{{route('landing')}}" class="brand">
                <i class='bx bxs-book-heart'></i>
                <span class="text">Digital Library</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                </ul>
                <div class="d-flex">
                    @if (Auth::user())
                    <a href="{{route('dashboard')}}" class="btn ms-1 dashboard">
                        <i class='bx bxs-dashboard me-1' ></i>
                        Dashboard
                    </a>
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button type="submit" class="btn ms-1 logout">
                            <i class='bx bx-log-out me-1' ></i>
                            <span> Log out </span>
                        </button>
                    </form>
                    @else
                    <a href="{{route('login')}}" class="btn ms-1 dashboard">
                        <i class='bx bx-log-in me-1' ></i>
                        Log in
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </nav>
    <!-- Product section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{ asset('storage/book/cover/' . $book->cover) }}" alt="..." /></div>
                <div class="col-md-6">
                    <div class="small mb-1">Category : {{$book->category->name}}</div>
                    <h1 class="display-5 fw-bolder">{{ $book->title }}</h1>
                    <div class="fs-5 mb-4">
                        <span >{{$book->user->name}}</span>
                    </div>
                    <p class="lead">{{$book->description}}</p>
                    <div class="d-flex">
                        <a class="btn btn-secondary flex-shrink-0 me-2" href="{{route('book.index')}}">
                            <i class='bx bx-arrow-back me-1' ></i>
                            Back
                        </a>
                        <a class="btn btn-success flex-shrink-0" href="{{route('book.download', $book->id)}}"><i class='bx bxs-download me-1' >Download</i></a>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Related items section-->
    <section class="py-5 bg-light">
        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="fw-bolder mb-4">Your Book</h2>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach ($related as $book)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="{{ asset('storage/book/cover/' . $book->cover) }}" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <a href="{{ route('book.show', ['id' => $book->id]) }}" style="text-decoration: none" class="text-dark">
                                        <h5 class="fw-bold" >{{ $book->title }}</h5>
                                        <small class="px-2 bg-warning rounded-4" >{{$book->category->name}}</small>
                                    </a>
                                    <!-- Product price-->
                                    <p class="text-primary mt-2">
                                        {{ $book->user->name }},-
                                    </p>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-success flex-shrink-0" href="{{route('book.download', $book->id)}}"><i class='bx bxs-download' >Download</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark" id="about">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="brand">
                        <i class='bx bxs-book-heart'></i>
                        <span class="text">Digital Library</span>
                    </div>
                    {{-- <p class="me-4 text-white">YayaMotor merupakan Store yang menjual aneka kebutuhan motor, mulai dari Sparepart motor, aksesoris motor, perlengkapan rider, perkakas, dan lain sebagainya.</p> --}}
                </div>
                <div class="col">
                    {{-- <div class="d-flex">
                        <i class='bx bxs-map text-white me-2'></i>
                        <p class="text-white" >Komplek Cimpago Permai, Kec. Pauh, Kel. Koto Luar, Kota Padang, Sumatera Barat</p>
                    </div> --}}
                    <p class="text-white" >Develop by Fitrah Amaliah Muis </p>
                    <a href="https://github.com/fitrahsvt"><i class='bx bxl-github text-white fs-1'></i></a>
                    <a href="https://www.linkedin.com/in/fitrah-amaliah-muis-516544267/"><i class='bx bxl-linkedin text-white fs-1'></i></a>
                    <a href="https://www.instagram.com/fitrahamaliahm/"><i class='bx bxl-instagram text-white fs-1'></i></a>
                    <a href="mailto:fitrahamaliahmuis@gmail.com"><i class='bx bxs-envelope text-white fs-1'></i></a>
                </div>
            </div>
            <hr class="text-white">
            <p class="m-0 text-center text-white">Copyright &copy; Digital Library 2023 </p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>

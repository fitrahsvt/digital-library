<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <link href="{{asset('css/landing.css')}}" rel="stylesheet" />
  <!-- Boxicons -->
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
<style>
    body {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        flex-direction: column;
    }

    .container {
        max-width: 500px;
        padding: 40px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
</style>
</head>
<body>
    @if (Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Succes!</strong> Akun anda berhasil dibuat
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Oops!</strong> {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
  <div class="container">

    <div class="row justify-content-center">
      <div class="col-md-12">
            <div class="position-relative mb-4">
                <a href="#" class="brand position-absolute top-50 start-50 translate-middle" >
                    <i class='bx bxs-book-heart'></i>
                    <span class="text">Digital Library</span>
                </a>
            </div>
          <form action="{{route('authenticate')}}" method="POST">
            @csrf
            <h3 class="text-center mb-3">Log in</h3>
            <div class="form-floating mb-3">
                <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
              </div>
              <div class="form-floating mb-3">
                <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
              </div>
            <div class="d-grid">
            <button type="submit" class="btn btn-primary fw-bold">LOG IN</button>
            <div>
                Not registered yet?
                <a href="{{route('register')}}"> Register now</a>
            </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>

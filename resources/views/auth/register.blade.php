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
    @if (Session::get('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Data tidak lengkap. Akun anda gagal dibuat
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
        <form action="{{route('register.store')}}" method="post">
            @csrf
            <h3 class="text-center mb-3">Register</h3>
            <div class="form-floating mb-3">
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{old('name')}}" placeholder="Ex: Fitrah Amaliah" name="name">
                <label for="name">Name</label>
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="telp" value="{{old('phone')}}" placeholder="08xxxx" name="phone">
                <label for="telp">Telp</label>
                @error('phone')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" value="{{old('email')}}" placeholder="name@example.com" name="email">
                <label for="floatingInput">Email address</label>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" value="{{old('password')}}" placeholder="Password" name="password">
                <label for="floatingPassword">Password</label>
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="d-grid">
            <button type="submit" class="btn btn-primary fw-bold">SIGN UP</button>
            <div>
                Have an account?<a href="{{route('login')}}"> log in here</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>

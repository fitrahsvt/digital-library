@extends('layouts.main')

@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Detail user</h1>
                <ul class="breadcrumb">
                    <li>
                        <a class="active" href="{{route('user.index')}}">User</a>
                    </li>
                    <li><i class='bx bx-chevron-right' ></i></li>
                    <li>
                        <a href="#">Detail</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="table-data">
            <div class="order">
                <div class="profil-flex" style="display: flex; align-items: center;">
                    <div class="profil" style="text-align: center; margin: 20px">
                        @if ($user->avatar)
                            <img src="{{ asset('storage/user/' . $user->avatar) }}" alt="{{$user->avatar}}"
                            style="
                                border-radius: 50%;
                                width: 40vmin;
                                max-width: 300px;
                                height: 40vmin;
                                object-fit: cover; ">
                        @else
                            <img src="{{ asset('storage/user/blank_profile.jpg') }}" alt="blank_profile"
                            style="
                                border-radius: 50%;
                                width: 40vmin;
                                max-width: 300px;
                                height: 40vmin;
                                object-fit: cover; ">
                        @endif
                        <h3>{{$user->name}}</h3>
                        <p style="margin-bottom: 5px">{{$user->birth}}</p>
                        <a type="button" class="button-profil" href="{{route('user.index')}}">Back</a>
                    </div>
                    <div class="detail" style="margin-left: 20px">
                        <p>Email :</p>
                        <h4>{{$user->email}}</h4>
                        <br>
                        <p>Phone :</p>
                        <h4>{{$user->phone}}</h4>
                        <br>
                        <p>Address :</p>
                        <h4>{{$user->address}}</h4>
                        <br>
                        <p>gender :</p>
                        @if ($user->gender == 'L')
                            <h4>Laki-laki</h4>
                        @endif
                        @if ($user->gender == 'P')
                            <h4>Perempuan</h4>
                        @endif

                    </div>
                </div>
            </div>
        </div>
        <footer>
            <div>Copyright &copy; digital library 2023</div>
        </footer>
    </main>
@endsection

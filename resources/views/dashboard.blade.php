@extends('layouts.main')

@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Dashboard</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                </ul>
            </div>
        </div>
        @if (Auth::user()->role->name == 'admin' || Auth::user()->role->name == 'staff')
            <ul class="box-info">
                <li>
                    <i class='bx bxs-book' ></i>
                    <span class="text">
                        <h3>{{$bookcount}}</h3>
                        <p>Books</p>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-category-alt' ></i>
                    <span class="text">
                        <h3>{{$categorycount}}</h3>
                        <p>Category</p>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-group' ></i>
                    <span class="text">
                        <h3>{{$usercount}}</h3>
                        <p>Users</p>
                    </span>
                </li>
            </ul>
        @endif

        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>User profile</h3>
                </div>
                <div class="profil-flex" style="display: flex; align-items: center;">
                    <div class="profil" style="text-align: center; margin: 20px">
                        @if (Auth::user()->avatar)
                            <img src="{{ asset('storage/user/' . Auth::user()->avatar) }}" alt="{{Auth::user()->avatar}}"
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
                        <h3>{{Auth::user()->name}}</h3>
                        <p style="margin-bottom: 5px">{{Auth::user()->birth}}</p>
                        <a type="button" class="button-profil" href="{{route('profile.edit', Auth::user()->id)}}">Edit profile</a>

                    </div>
                    <div class="detail" style="margin-left: 20px">
                        <p>Email :</p>
                        <h4>{{Auth::user()->email}}</h4>
                        <br>
                        <p>Phone :</p>
                        <h4>{{Auth::user()->phone}}</h4>
                        <br>
                        <p>Address :</p>
                        <h4>{{Auth::user()->address}}</h4>
                        <br>
                        <p>gender :</p>
                        @if (Auth::user()->gender == 'L')
                            <h4>Laki-laki</h4>
                        @endif
                        @if (Auth::user()->gender == 'P')
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

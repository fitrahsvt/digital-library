@extends('layouts.main')

@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>User</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">User</a>
                    </li>
                </ul>
                <br>
                <a href="{{route('user.create')}}" class="btn-download">
                    <i class='bx bx-plus'></i>
                    <span class="text">Create New</span>
                </a>
            </div>
        </div>
        <ul class="box-info">
            <a href="{{route('role.index')}}">
                <li>
                    <i class='bx bxs-group' style="background: var(--light-orange); color: var(--orange);"></i>
                    <span class="text">
                        <h3>{{$rolecount}}</h3>
                        <p>Role</p>
                    </span>
                </li>
            </a>
        </ul>
        <div class="table-data">
            <div class="order">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>avatar</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>email</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $u)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                <img src="{{ asset('storage/user/' . $u->avatar) }}" class="img-fluid" alt="{{ $u->avatar }}" style="max-height: 50px; width: auto;">
                                </td>
                                <td>{{$u->name}}</td>
                                <td>{{$u->role->name}}</td>
                                <td>{{$u->email}}</td>
                                <td>
                                    <form action="{{route('user.destroy', $u->id)}}" method="POST" onsubmit="return confirm('Anda yakin menghapus ini?');">
                                        <div>
                                            <a href="{{route('user.detail', $u->id)}}"><i class='bx bxs-user-detail' ></i></a>
                                            <a href="{{route('user.edit', $u->id)}}"><i class='bx bxs-edit' ></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="button-delete"><i class='bx bxs-trash-alt' ></i></button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <footer>
            <div>Copyright &copy; digital library 2023</div>
        </footer>
    </main>
@endsection

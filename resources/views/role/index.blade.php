@extends('layouts.main')

@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Role</h1>
                <ul class="breadcrumb">
                    <li>
                        <a class="active" href="{{route('user.index')}}">User</a>
                    </li>
                    <li><i class='bx bx-chevron-right' ></i></li>
                    <li>
                        <a href="#">Role</a>
                    </li>
                </ul>
            </div>
            <div class="container" style="margin-top: 0;">
                <form action="{{ route('role.store') }}" method="POST">
                    @csrf
                    <label for="name" style="margin-bottom: 10px">Create role</label>
                    <div class="form-khusus">
                        <input type="text" id="name" name="name" placeholder="name" style="margin-right: 20px; @error('name') border: 1px solid red; @enderror" value="{{old('name')}}">
                        <input type="submit" value="Submit" style="width: 150px">
                    </div>
                    @error('name')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </form>
            </div>
        </div>
        <div class="table-data">
            <div class="order">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $r)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $r->name }}</td>
                            <td>
                                <form action="{{route('role.destroy', $r->id)}}" method="POST" onsubmit="return confirm('Anda yakin menghapus ini?');">
                                    <div>
                                        <a href="{{route('role.edit', $r->id)}}"><i class='bx bxs-edit' ></i></a>
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

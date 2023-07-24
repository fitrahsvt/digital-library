@extends('layouts.main')

@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Category</h1>
                <ul class="breadcrumb">
                    <li>
                        <a class="active" href="{{route('book.index')}}">Daftar buku</a>
                    </li>
                    <li><i class='bx bx-chevron-right' ></i></li>
                    <li>
                        <a href="#">Category</a>
                    </li>
                </ul>
            </div>
            <div class="container" style="margin-top: 0;">
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <label for="name" style="margin-bottom: 10px">Create category</label>
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
                            @if (Auth::user()->role->name == 'staff')
                            <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $c)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $c->name }}</td>
                            <td>
                                <form action="{{route('category.destroy', $c->id)}}" method="POST" onsubmit="return confirm('Anda yakin menghapus ini?');">
                                    <div>
                                        <a href="{{route('category.edit', $c->id)}}"><i class='bx bxs-edit' ></i></a>
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

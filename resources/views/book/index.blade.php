@extends('layouts.main')

@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Daftar buku</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Daftar buku</a>
                    </li>
                </ul>
                <br>
                <a href="{{route('book.create')}}" class="btn-download">
                    <i class='bx bx-plus' ></i>
                    <span class="text">Tambah baru</span>
                </a>

                <div class="dropdown">
                    <a href="#" class="category-link" style="text-align: center">Filter Kategori <i class='bx bx-chevron-down' style="padding-left: 5px"></i></a>
                    <div class="dropdown-content">
                        <a href="{{route('book.index')}}">All</a>
                        @foreach ($category as $c)
                        <a href="{{route('book.index', ['category' => $c->name])}}">{{$c->name}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="table-data">
            <div class="order">
                <style>
                    th{
                        padding: 10px;
                    }
                </style>
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Cover</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Jumlah Halaman</th>
                            <th>Dibuat oleh</th>
                            <th width="20%" style="text-align: center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if (Auth::user()->role->name == 'admin')
                        @foreach ($books as $b)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td style="text-align: center">
                                    <img src="{{ asset('storage/book/cover/' . $b->cover) }}" class="img-fluid" alt="{{ $b->cover }}" style="max-height: 100px; width: auto; ">
                                </td>
                                <td>{{$b->title}}</td>
                                <td>{{$b->category->name}}</td>
                                <td>{{$b->amount}}</td>
                                <td>{{$b->user->name}}</td>
                                <td style="text-align: center">
                                    <form action="{{route('book.destroy', $b->id)}}" method="POST" onsubmit="return confirm('Anda yakin menghapus ini?');">
                                        <div>
                                            <a href="{{route('book.download', $b->id)}}"><i class='bx bxs-download' ></i></a>
                                            <a href="{{route('book.show', $b->id)}}"><i class='bx bxs-detail'></i></a>
                                            <a href="{{route('book.edit', $b->id)}}" style=""><i class='bx bxs-edit' ></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="button-delete"><i class='bx bxs-trash-alt' ></i></button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                        @if (Auth::user()->role->name == 'user')
                            @foreach ($books as $b)
                                @if (Auth::user()->id == $b->created_by)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td style="text-align: center">
                                            <img src="{{ asset('storage/book/cover/' . $b->cover) }}" class="img-fluid" alt="{{ $b->cover }}" style="max-height: 50px; width: auto; ">
                                        </td>
                                        <td>{{$b->title}}</td>
                                        <td>{{$b->category->name}}</td>
                                        <td>{{$b->amount}}</td>
                                        <td>{{$b->user->name}}</td>
                                        <td style="text-align: center">
                                            <form action="{{route('book.destroy', $b->id)}}" method="POST" onsubmit="return confirm('Anda yakin menghapus ini?');">
                                                <div>
                                                    <a href="{{route('book.download', $b->id)}}"><i class='bx bxs-download' ></i></a>
                                                    <a href="{{route('book.edit', $b->id)}}"><i class='bx bxs-edit' ></i></a>
                                                    <a href="{{route('book.show', $b->id)}}"><i class='bx bxs-detail'></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="button-delete"><i class='bx bxs-trash-alt' ></i></button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @endif
                        </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection

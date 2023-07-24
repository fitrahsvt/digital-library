@extends('layouts.main')

@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Edit buku</h1>
                <ul class="breadcrumb">
                    <li>
                        <a class="active" href="{{route('book.index')}}">Daftar buku</a>
                    </li>
                    <li><i class='bx bx-chevron-right' ></i></li>
                    <li>
                        <a href="#">Edit</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container">
            <form action="{{ route('book.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Judul</label>
                    <input value="{{$book->title}}" type="text" id="title" name="title" @error('title') style="border: 1px solid red;" @enderror >
                    @error('title')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category">Kategori</label>
                    <select id="category" name="category" @error('category') style="border: 1px solid red;" @enderror>
                        <option selected disabled>- Choose Category -</option>
                            @foreach ($category as $c)
                                <option value="{{$c->id}}" {{ $book->category_id == $c->id ? 'selected' : '' }}>{{$c->name}}</option>
                            @endforeach
                    </select>
                    @error('category')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea id="description" name="description" @error('description') style="border: 1px solid red;" @enderror>{{$book->description}}</textarea>
                    @error('description')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="amount">Jumlah halaman</label>
                    <input value="{{$book->amount}}" @error('amount') style="border: 1px solid red;" @enderror type="text" id="amount" name="amount">
                    @error('amount')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="book">Upload file (pdf)</label>
                    <input type="file" name="book" @error('book') style="border: 1px solid red;" @enderror id="book" accept=".pdf">
                    @error('book')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="cover">Upload cover</label>
                    <input type="file" name="cover" @error('cover') style="border: 1px solid red;" @enderror id="cover" accept=".jpg, .jpeg, .png., .webp">
                    @error('cover')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <input type="submit" value="Save">
                <a href="{{ route('book.index') }}" class="button-cancel">Cancel</a>
            </form>
        </div>
        <footer>
            <div>Copyright &copy; Digital Library 2023</div>
        </footer>
    </main>
@endsection

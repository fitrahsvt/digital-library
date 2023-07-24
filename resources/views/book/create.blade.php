@extends('layouts.main')

@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Create book</h1>
                <ul class="breadcrumb">
                    <li>
                        <a class="active" href="{{route('book.index')}}">Book</a>
                    </li>
                    <li><i class='bx bx-chevron-right' ></i></li>
                    <li>
                        <a href="#">Create</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container">
            <form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Judul<abbr style="color: red">*</abbr></label>
                    <input type="text" id="title" name="title" @error('title') style="border: 1px solid red;" @enderror value="{{old('title')}}">
                    @error('title')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category">Kategori<abbr style="color: red">*</abbr></label>
                    <select id="category" name="category" @error('category') style="border: 1px solid red;" @enderror>
                        <option selected disabled>- Pilih Kategori -</option>
                            @foreach ($category as $c)
                                <option value="{{$c->id}}" {{old('category') == $c->id ? 'selected' : ''}}>{{$c->name}}</option>
                            @endforeach
                    </select>
                    @error('category')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi<abbr style="color: red">*</abbr></label>
                    <textarea id="description" name="description" @error('description') style="border: 1px solid red;" @enderror>{{old('description')}}</textarea>
                    @error('description')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="amount">Jumlah halaman<abbr style="color: red">*</abbr></label>
                    <input type="text" id="amount" name="amount" @error('amount') style="border: 1px solid red;" @enderror value="{{old('amount')}}">
                    @error('amount')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="book">Upload file (pdf)<abbr style="color: red">*</abbr></label>
                    <input type="file" name="book" id="book" accept=".pdf" @error('book') style="border: 1px solid red;" @enderror>
                    @error('book')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="cover">Cover<abbr style="color: red">*</abbr></label>
                    <input type="file" name="cover" id="cover" accept=".jpg, .jpeg, .png., .webp" @error('cover') style="border: 1px solid red;" @enderror>
                    @error('cover')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" value="{{Auth::user()->id}}" name="user" style="display: none;" >
                </div>
                <input type="submit" value="Save">
                <a href="{{ route('book.index') }}" class="button-cancel">Cancel</a>
            </form>
        </div>
        <footer>
            <div>Copyright &copy; Digital library 2023</div>
        </footer>
    </main>
@endsection

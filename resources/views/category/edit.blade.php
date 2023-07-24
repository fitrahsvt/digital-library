@extends('layouts.main')

@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Edit Category</h1>
                <ul class="breadcrumb">
                    <li>
                        <a class="active" href="{{route('product.index')}}">Product</a>
                    </li>
                    <li><i class='bx bx-chevron-right' ></i></li>
                    <li>
                        <a class="active" href="{{route('category.index')}}">Category</a>
                    </li>
                    <li><i class='bx bx-chevron-right' ></i></li>
                    <li>
                        <a href="#">Edit</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container">
            <form action="{{route('category.update', $category->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input value="{{$category->name}}" type="text" @error('name') style="border: 1px solid red" @enderror id="name" name="name" required>
                    @error('name')
                        <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <input type="submit" value="Submit">
                <a href="{{ route('category.index') }}" class="button-cancel">Cancel</a>
            </form>
        </div>
    </main>
@endsection

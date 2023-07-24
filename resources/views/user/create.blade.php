@extends('layouts.main')

@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Create user</h1>
                <ul class="breadcrumb">
                    <li>
                        <a class="active" href="{{route('user.index')}}">User</a>
                    </li>
                    <li><i class='bx bx-chevron-right' ></i></li>
                    <li>
                        <a href="#">Create</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container">
            <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="role">Role</label>
                    <select id="role" name="role" @error('role') style="border: 1px solid red;" @enderror>
                        <option selected disabled>- Choose Role -</option>
                            @foreach ($role as $r)
                                <option value="{{$r->id}}" {{old('role') == $r->id ? 'selected' : ''}}>{{$r->name}}</option>
                            @endforeach
                    </select>
                    @error('role')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" @error('name') style="border: 1px solid red;" @enderror value="{{old('name')}}">
                    @error('name')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" @error('email') style="border: 1px solid red;" @enderror value="{{old('email')}}">
                    @error('email')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" @error('password') style="border: 1px solid red;" @enderror value="{{old('password')}}">
                    @error('password')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" name="phone" @error('phone') style="border: 1px solid red;" @enderror value="{{old('phone')}}">
                    @error('phone')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea id="address" name="address" @error('address') style="border: 1px solid red;" @enderror>{{old('address')}}</textarea>
                    @error('address')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="birth">birthdate</label>
                    <input type="date" id="birth" name="birth" @error('birth') style="border: 1px solid red;" @enderror value="{{old('birth')}}">
                    @error('birth')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select id="gender" name="gender" @error('gender') style="border: 1px solid red;" @enderror>
                        <option selected disabled>- Choose Gender -</option>
                            <option value="P" {{old('gender') == "P" ? 'selected' : ''}}>Perempuan</option>
                            <option value="L" {{old('gender') == "L" ? 'selected' : ''}}>Laki-laki</option>
                    </select>
                    @error('gender')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="avatar">Picture</label>
                    <input type="file" name="avatar" id="avatar" accept=".jpg, .jpeg, .png., .webp" @error('avatar') style="border: 1px solid red;" @enderror>
                    @error('avatar')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <input type="submit" value="Save">
                <a href="{{ route('user.index') }}" class="button-cancel">Cancel</a>
            </form>
        </div>
        <footer>
            <div>Copyright &copy; digital library 2023</div>
        </footer>
    </main>
@endsection

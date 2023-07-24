@extends('layouts.main')

@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Edit your profile</h1>
                <ul class="breadcrumb">
                    <li>
                        <a class="active" href="{{route('dashboard')}}">Dashboard</a>
                    </li>
                    <li><i class='bx bx-chevron-right' ></i></li>
                    <li>
                        <a href="#">Edit-profile</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container">
            <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea id="address" name="address" @error('address') style="border: 1px solid red;" @enderror>{{$user->address}}</textarea>
                    @error('address')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="birth">birthdate</label>
                    <input type="date" value="{{$user->birth}}" id="birth" name="birth" @error('birth') style="border: 1px solid red;" @enderror>
                    @error('birth')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select id="gender" name="gender" @error('gender') style="border: 1px solid red;" @enderror>
                        <option selected disabled>- Choose Gender -</option>
                            <option value="P" {{ $user->gender == "P" ? 'selected' : '' }}>Perempuan</option>
                            <option value="L" {{ $user->gender == "L" ? 'selected' : '' }}>Laki-laki</option>
                    </select>
                    @error('gender')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="avatar">Picture photo</label>
                    <input type="file" name="avatar" id="avatar" accept=".jpg, .jpeg, .png., .webp" @error('avatar') style="border: 1px solid red;" @enderror>
                    @error('avatar')
                    <small style="color: red">{{$message }}</small>
                    @enderror
                </div>
                <input type="submit" value="Save">
                <a href="{{ route('dashboard') }}" class="button-cancel">Cancel</a>
            </form>
        </div>
        <footer>
            <div>Copyright &copy; digital library 2023</div>
        </footer>
    </main>
@endsection

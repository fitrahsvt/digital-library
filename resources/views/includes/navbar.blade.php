<nav>
    <i class='bx bx-menu' ></i>
    <a href="#" class="nav-link">{{Auth::user()->role->name}}</a>
    <form action="#">
        <div class="form-input" style="visibility: hidden">
            <input type="search" placeholder="Search...">
            <button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
        </div>
    </form>
    <input type="checkbox" id="switch-mode" hidden>
    <label for="switch-mode" class="switch-mode"></label>
    <a href="{{route('dashboard')}}" class="profile">
        @if (Auth::user()->avatar)
            <img src="{{ asset('storage/user/' . Auth::user()->avatar) }}" alt="{{Auth::user()->avatar}}">
        @else
            <img src="{{ asset('storage/user/blank_profile.jpg') }}" alt="blank_profile">
        @endif
    </a>
</nav>

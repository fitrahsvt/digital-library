<section id="sidebar">
    <a href="{{route('landing')}}" class="brand">
        <i class='bx bxs-book-heart'></i>
        <span class="text">Digital Library</span>
    </a>
    <ul class="side-menu top">
        <li >
            <a href="{{route('dashboard')}}">
                <i class='bx bxs-dashboard' ></i>
                <span class="text">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{route('book.index')}}">
                <i class='bx bxs-book-content'></i>
                <span class="text">Books</span>
            </a>
        </li>
        @if (Auth::user()->role->name == 'admin')
        <li>
            <a href="{{route('category.index')}}">
                <i class='bx bx-category' ></i>
                <span class="text">Categories</span>
            </a>
        </li>
        <li>
            <a href="{{route('user.index')}}">
                <i class='bx bxs-group' ></i>
                <span class="text">Users</span>
            </a>
        </li>
        @endif
    </ul>
    <ul class="side-menu">
        <li>
            <form action="{{route('logout')}}" method="POST">
                @csrf
                <button type="submit" class="logout-button">
                    <i class='bx bxs-log-out-circle' ></i>
                    <span class="text" style="margin-left: 10px;">Logout</span>
                </button>
            </form>
        </li>
    </ul>
</section>

<style>
    .navbar-custom {
        background-color: #2C3E50;
    }

    .navbar-custom .btn-secondary {
        background-color: #2C3E50; /* Match the navbar background color */
        border-color: #2C3E50; /* Match the navbar background color */
        color: white;
    }

    .nav-link:hover,
    .nav-link.active,
    .nav-link:focus{
        background-color: #657383; /* Slate lighter background color */
        border-color: #657383;
        border-radius: 5px;
    }

    .navbar-custom .btn-secondary:hover,
    .navbar-custom .btn-secondary:focus {
        background-color: #657383; /* Slate lighter background color */
        border-color: #657383; /* Slate lighter background color */
    }

    .dropdown-menu .dropdown-item:hover {
        background-color: #ebedf0; /* lighter background color */
        color: #ffffff;
    }
</style>

    <nav class="navbar container-fluid navbar-expand-lg navbar-custom mb-3 px-4 py-4 sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('main') }}" style="margin-right: auto; color: white;">ItemShare</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarScroll">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item me-3">
                        <a class="nav-link{{ request()->routeIs('how_to') ? ' active' : '' }}" href="{{ route('how_to') }}" style="color: white;">How It Work?</a>
                    </li>
                    <li class="nav-item me-3">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="categoriesDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">
                                Categories
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="categoriesDropdown" id="categoriesMenu">
                                <!-- Categories will be dynamically populated here -->
                            </ul>
                        </div>
                    </li>


                    <li class="nav-item me-3">
                        <a class="nav-link" href="{{ route('contact.create') }}" style="color: white;">Contact</a>
                    </li>


                </ul>
            </div>
            <div class="d-flex">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @auth
                    <li class="nav-item me-4">
                        <form action="{{ route('toggle.role') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-primary">{{ Auth::user()->role }}</button>
                        </form>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false" style="color: white;">
                            Profile
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('home') }}" style="color: #2C3E50;">Dashboard</a></li>
                            @if (Auth::user()->role=='renter')
                            <li><a class="dropdown-item" href="{{ route('products.create') }}" style="color: #2C3E50;">Add Product</a></li>
                            <li><a class="dropdown-item" href="{{ route('products.index') }}" style="color: #2C3E50;">My Products</a></li>
                            <li><a class="dropdown-item" href="{{ route('ask_rent') }}" style="color: #2C3E50;">Rent Request</a></li>
                            @else
                            <li><a class="dropdown-item" href="{{ route('bookings.index') }}" style="color: #2C3E50;">My Bookings</a></li>
                            @endif

                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item" style="color: #2C3E50;">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endauth
                    @guest
                        <li class="nav-item me-3">
                            <a class="nav-link" href="{{ route('register') }}" style="color: white;">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}" style="color: white;">Login</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var categories = JSON.parse(xhr.responseText);
                        categories.forEach(function(category) {
                            var li = document.createElement('li');
                            var a = document.createElement('a');
                            a.setAttribute('class', 'dropdown-item');
                            a.setAttribute('href', '#');
                            a.setAttribute('style', 'color: #2C3E50;');
                            a.textContent = category.name;
                            a.onclick = function() {
                                loadItems(category.id);
                            };
                            li.appendChild(a);
                            document.getElementById('categoriesMenu').appendChild(li);
                        });
                    } else {
                        console.error('Request failed: ' + xhr.status);
                    }
                }
            };
            xhr.open('GET', '{{ route("get_categories") }}', true);
            xhr.send();
        });

        function loadItems(categoryId) {
            window.location.href = '{{ route("filtered_items") }}?categoryId=' + categoryId;
        }
    </script>






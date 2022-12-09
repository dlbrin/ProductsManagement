<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Shopping</title>
    {{-- Custom Css Link --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    {{-- Bootstrap Css CDN Linke --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- FontAwesome Icons --}}
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    {{-- Summernote CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    {{-- Summernote JS --}}
    <script src="{{ asset('assets/js/summernote.min.js') }}"></script>
    @livewireStyles
</head>
<body>
    <nav>
        <div class="NavContainer">
            <div class="NavLogo">
                <a href="{{ route('Product') }}">
                    <span>Dlbrin</span> Shopping
                </a>
            </div>
            <ul>
                <li>
                    <a href="{{ route('whishlistproduct') }}">
                        <div class="wishlistIcon">
                            <i class="fas fa-heart"></i> 
                            <div class="wishlistCount">
                                <livewire:wishlistcount />
                            </div>
                        </div>
                    </a>
                </li>
                @auth
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fal fa-sign-out"></i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                @endauth
            </ul>
        </div>
    </nav>
    @yield('content')
    
    {{-- Bootstrap Js CDN Linke --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    @livewireScripts
</body>
</html>
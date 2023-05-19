<style>
    a.navbar-brand{
        font-family: "Times New Roman", Times, serif;
    }
    li{
        font-family: "Times New Roman", Times, serif;
    }
    
    .gray{
        background: #f8f9fa;
    }
</style>

<header class="shadow p-0 gray rounded">
    <nav class="navbar navbar-expand">
        <a class="navbar-brand" href="/">JRamedia</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        @auth
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Profile
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <p>Welcome, {{ auth()->user()->name }}</p>
                    <a class="dropdown-item" href="#">Setting</a>
                    <form action="/logout" method ="post">
                        @csrf
                        <button type ="submit" class="dropdown-item">Log Out</button>
                    </form>
                </div>
            </div>  
        </div>
        
        @else
        <div class="navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li><a href="/login" class="nav-link">Login</a></li>
                <li><a href="/register" class="nav-link">Register</a></li>
                <li><a href="/about_us" class="nav-link">About Us</a></li>
            </ul>
        </div>
        @endauth
    </nav>
</header>
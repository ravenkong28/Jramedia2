<style>
    a.navbar-brand, a.nav-link, a.dropdown-item{
        font-family: "Times New Roman", Times, serif;
    }
    
    li{
        font-family: "Times New Roman", Times, serif;
    }
    
    .gray{
        background-color : #f8f9fa;
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.0/css/font-awesome.min.css">

<header class="shadow p-0 gray rounded">
    <nav class="navbar navbar-expand-sm">
        <a class="navbar-brand" href="/">JRamedia</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        @auth
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto mr-1">
                <li><a href="/view_product_admin" class="nav-link">View Products</a></li>
                <li><a href="/view_transaction" class="nav-link">View All Transaction</a></li>
                <li><a href="/view_account" class="nav-link">View Account</a></li>
            </ul>

            <form class="navbar-form navbar-right" role="search">
                <div class="input-group w-auto mt-2 mr-2">
                <input type="text" class="form-control" placeholder="Search Our Product Here...">
                    <span class="input-group-btn">
                        <button type="submit " class="btn btn-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="23" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </button>
                    </span>
                </div>
            </form>
            
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Profile
                </a>
                <div class= "dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <p>Welcome, {{ auth()->user()->name }}</p>
                    <a class="dropdown-item" href="#">Setting</a>
                    <form action="/logout" method ="post">
                        @csrf
                        <button type ="submit" class="dropdown-item">Log Out</button>
                    </form>
                </div>
            </div>  
        </div>
        </>
        
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
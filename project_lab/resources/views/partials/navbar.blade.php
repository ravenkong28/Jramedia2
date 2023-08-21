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
        @auth
            <a class="navbar-brand text-info" href="/home">JRamedia</a>
            <button class="navbar-toggler" type="button">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto mr-1">
                    <a href="/home/view-products" class="nav-link text-info">View Products</a>
                    @can('admin')
                        <a href="/home/view-transactions" class="nav-link text-info">View All Transaction</a>
                        <a href="/home/view-accounts" class="nav-link text-info">View Account</a>
                    @endcan
                </ul>

                <form class="navbar-form navbar-right" role="search">
                    <div class="input-group w-auto mt-2 mr-2">
                        <form action="/home/view-products">
                            <input type="text" class="form-control" placeholder="Search Our Product Here..." name="search">
                            <span class="input-group-btn">
                                <button type="submit " class="btn btn-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="23" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                    </svg>
                                </button>
                            </span>
                        </form>
                    </div>
                </form>
                
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-info" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Profile
                    </a>
                    <div class= "dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <p>Welcome, <p class ="text-info">{{ auth()->user()->name }}</p></p>
                        @can('admin')
                        @else
                            <a class="dropdown-item text-info" href="/home/my-cart">My Cart</a>
                        @endcan
                        <form action="/logout" method ="post">
                            @csrf
                            <button type ="submit" class="dropdown-item text-info">Log Out</button>
                        </form>
                    </div>
                </div>  
            </div>

        @else
        <a class="navbar-brand text-info" href="/">JRamedia</a>
        <button class="navbar-toggler" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>   
        <div class="navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li><a href="/login" class="nav-link text-info">Login</a></li>
                <li><a href="/register" class="nav-link text-info">Register</a></li>
                <li><a href="/about" class="nav-link text-info">About Us</a></li>
            </ul>
        </div>
        @endauth
    </nav>
</header>
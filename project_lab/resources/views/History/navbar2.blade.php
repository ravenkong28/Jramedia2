<style>
    a.navbar-brand, a.nav-link, a.dropdown-item{
        font-family: "Times New Roman", Times, serif;
    }
    li{
        font-family: "Times New Roman", Times, serif;
    }
    
    .gray{
        background: #f8f9fa;
    }
</style>

<header class="shadow p-0 gray rounded items-center">
    <nav class="navbar navbar-expand-sm">
        <a class="navbar-brand" href="/">JRamedia</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto mr-1">
                <li><a href="/view_product_cust" class="nav-link">View Products</a></li>
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
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Setting</a>
                    <a class="dropdown-item" href="#">Log Out</a>
                </div>
            </div>  
        </div>
        
    </nav>
</header>
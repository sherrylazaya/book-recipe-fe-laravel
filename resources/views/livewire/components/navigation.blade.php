<div class="bg-recipe-primary px-2">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a href="{{route("dashboard")}}" class="navbar-brand d-flex align-self-center">
                <img class="d-inline-block align-text-top img-fluid" src="{{asset('icon/logo.svg')}}" alt="book-recipe" style="max-width: 40px">
                <h4 class="my-2 mx-2 text-light fw-bold custom-fontsize-title">Buku Resep 79 v0.1</h4>
            </a>
            <div class="d-flex flex-row justify-content-center align-item-center liv-nav">
                <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample">
                    <i class="ri-menu-line"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <a href="{{route('dashboard')}}" class="link-underline link-underline-opacity-0 mx-4 fs-6 fw-bold {{$isCurrent == 'dashboard' ? 'link-recipe-primary' : 'link-light'}}">Daftar Resep Masakan</a>
                    <a href="{{route('my-recipes')}}" class="link-underline link-underline-opacity-0 mx-4 fs-6 fw-bold {{$isCurrent == 'my-recipes' ? 'link-recipe-primary' : 'link-light'}}">Resep Saya</a>
                    <a href="{{route('favorites')}}" class="link-underline link-underline-opacity-0 mx-4 fs-6 fw-bold {{$isCurrent == 'favorites' ? 'link-recipe-primary' : 'link-light'}}">Resep Favorit</a>
                    <div class="dropdown logout">
                        <i role="button" type="button" class="profil fa-solid fa-circle-user fa-2x text-light mx-4" data-bs-toggle="dropdown"></i>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" wire:click="logout"><i class="fa-solid fa-arrow-right-from-bracket"></i>Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <nav class="navbar">
        <div class="offcanvas offcanvas-end bg-recipe-primary-offcanvas" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            {{-- Dashboard --}}
            <a class="my-2 mx-3 link-underline link-underline-opacity-0 mx-4 fs-6 fw-bold {{$isCurrent == 'dashboard' ? 'link-recipe-primary' : 'link-light' }}" href="{{route('dashboard')}}">
                <i class="ri-file-list-line">Daftar Resep Masakan</i>
            </a>
            {{-- MyRecipe --}}
            <a class = "my-2 mx-3 link-underline link-underline-opacity-0 mx-4 fs-6 fw-bold {{$isCurrent == 'my-recipes' ? 'link-recipe-primary' : 'link-light' }}" href="{{route('my-recipes')}}">
                <i class="ri-heart-add-line">Resep Saya</i>
            </a>
            {{-- Favorite --}}
            <a class="my-2 mx-3 link-underline link-underline-opacity-0 mx-4 fs-6 fw-bold {{$isCurrent == 'favorites' ? 'link-recipe-primary' : 'link-light' }}" href="{{route('favorites')}}">
                <i class="ri-star-line">Resep Favorite</i>
            </a>
            {{-- Logout --}}
            <a wire:click="logout" class="my-2 mx-3 link-underline link-underline-opacity-0 mx-4 fs-6 fw-bold">
                <i class="ri-logout-box-line">Signout</i>
            </a>
        </div>
    </nav>
</div>

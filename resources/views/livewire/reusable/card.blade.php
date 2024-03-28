<div class="col-lg-3 col-md-4 col-sm-6 mb-3">
    <div class="col d-flex justift-content-center align-item-center w-100">
        <div class="justify-content-center">
            <div class="card">
                {{-- elipsis icon --}}
                <div class="btn-group">
                    <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        @if($showIcon)
                            <i class="fa fa-my-recipe-icon" style="color: white;"></i>
                        @else
                            <i class="fa fa-ellipsis" style="color: white;"></i>
                        @endif
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item text-recipe-primary" href="{{route("edit-recipe", ['id' => $data['recipeId']])}}">
                            <i class="fa-solid fa-pen-to-square"></i>Edit</a></li>
                        <li><a class="dropdown-item text-recipe-danger" wire:click ="showModalDelete">
                            <i class="fa-solid fa-trash"></i>Hapus</a></li>
                    </ul>
                </div>

                {{-- image container --}}
                <div class="image-container d-flex align-items-center justify-content-center overflow-y-hidden">
                    <img class="img-fluid" src="{{$data['imageUrl']}}" alt="{{$data['recipeName']}}">
                </div>

                {{-- detail recipe --}}
                <div class="details">
                    {{-- Top Section --}}
                    <div class="d-flex justify-content-between mt-2">
                        <p>{{$data['categories']['categoryName']}}</p>
                        <p>{{$data['levels']['levelName']}}</p>
                    </div>

                    {{-- middle section --}}
                    <p class="p-recipe fw-bold">{{$data['recipeName']}}</p>

                    {{-- bottom section --}}
                    <div class="mt-0">
                        <div class="d-flex align-items-center mb-0">
                            {{-- time --}}
                            <div class="d-flex align-items-center">
                                <i class="fa-regular fa-clock"></i>
                                <p class="mb-0 mx-2">{{$data['time']}} Menit</p>
                            </div>
                            {{-- favorite or no --}}
                            <div class="d-flex align-items-center ms-auto">
                                <i role="button" type="button" class="{{$data['isFavorite'] ? 'fa-solid' : 'fa-regular'}} fa-star" wire:click="showModal"></i>
                                <p class="mb-0 mx-2">Favorite</p>
                            </div>
                        </div>
                        <div class="mt-3 mb-2 2-100 d-flex justify-content-center">
                            <a href="{{route('detail-recipe', ['id' => $data['recipeId']])}}" class="link-recipe-primary link-underline-info">Lihat detail recipe</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

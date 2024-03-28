<div class="col d-flex justify-content-center align-items-center w-100">
    <div class="justify-content-center">
        <div class="card">
            <div class="btn-group">
                <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    @if($showIcon)
                    <i class="fa fa-my-recipe-icon" style="color: white;"></i>
                    @else
                    <i class="fa fa-ellipsis" style="color: white;"></i>
                    @endif
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item text-recipe-primary" href="{{route('edit-recipe', ['id' => $data['recipeId']])}}">
                            <i class="fa-solid fa-pen-to-square"></i> Edit</a></li>
                    <li><a class="dropdown-item text-recipe-danger" wire:click='showModalDelete'>
                            <i class="fa-solid fa-trash"></i> Hapus</a></li>
                </ul>
            </div>
            <div class="image-container d-flex align-items-center justify-content-center overflow-y-hidden">
                <img src="{{ $data['imageUrl'] }}" alt="{{ $data['recipeName'] }}" class="img-fluid">
            </div>

            <div class="details">
                <div class="d-flex justify-content-between mt-2">
                    <p>{{ $data['categories']['categoryName'] }}</p>
                    <p>{{ $data['levels']['levelName'] }}</p>
                </div>
                <p class="p-recipe fw-bold">{{ $data['recipeName'] }}</p>

                <div class="mt-0">
                    <div class="d-flex align-items-center mb-0">
                        <div class="d-flex align-items-center">
                            <i class="fa-regular fa-clock"></i>
                            <p class="mb-0 mx-2">{{ $data['time'] }} Menit</p>
                        </div>
                        <div class="d-flex align-items-center ms-auto">
                            <i role="button" type="button"
                                class="{{ $data['isFavorite'] ? 'fa-solid' : 'fa-regular' }} fa-star"
                                wire:click="showModal"></i>
                            <p class="mb-0 mx-2">Favorite</p>
                        </div>
                    </div>
                    <div class="mt-3 mb-2 w-100 d-flex justify-content-center">
                        <a href="{{route('detail-recipe', ['id' => $data['recipeId']])}}" class="link-recipe-primary link-underline-info">Lihat detail resep</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


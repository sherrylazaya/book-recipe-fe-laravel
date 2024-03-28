<div class="d-flex justify-items-center filter-container gap-4">
    <div class="filter-btn">
        <button class="w-100 filter btn btn-light d-flex justify-content-center mx-2 custom-fontsize-content1" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            Filter
            <i class="ri-filter-3-fill mx-2"></i>
        </button>
        <div class="dropdown-menu p-4 w-max-xs" aria-labelledby="dropdownMenuButton1">
            <div class="row custom-fontsize-content1">
                <div class="col-md-6 mb-3">
                    <p>Tingkat Kesulitan</p>
                    <select class="form-select custom-fontsize-content2" aria-label="First select example" wire:model='level'>
                        <option value="">All</option>
                        @foreach($levels['data'] as $level)
                        <option value={{$level['levelId']}}>{{$level['levelName']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <p>Kategori</p>
                    <select class="form-select custom-fontsize-content2" aria-label="Second select example" wire:model='category'>
                        <option value="">All</option>
                        @foreach($categories['data'] as $category)
                        <option value={{$category['categoryId']}}>{{$category['categoryName']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row custom-fontsize-content1">
                @if($isDashboard)
                <div class="col-md-6 mb-3">
                    <p>Waktu Memasak</p>
                    <select class="form-select custom-fontsize-content2" aria-label="Fourth select example" wire:model='time'>\
                        <option selected value="">All</option>
                        <option value="0-30">0-30</option>
                        <option value="30-60">30-60</option>
                        <option value=60>>90</option>
                    </select>
                </div>
                @else
                <div class="col-md-6 mb-3">
                    <p>Waktu Memasak</p>
                    <select class="form-select custom-fontsize-content2" aria-label="Fifth select example" wire:model='time'>\
                        <option selected value="">All</option>
                        <option value=30>30</option>
                        <option value=60>60</option>
                        <option value=90>90</option>
                    </select>
                </div>
                @endif
                <div class="col mb-3 d-none d-md-block">
                    <p>Sortir</p>
                    <select class="form-select custom-fontsize-content2" aria-label="Third select example" wire:model='sortBy'>
                        <option selected value="">All</option>
                        <option value="recipeName,asc">Nama Resep A-Z</option>
                        <option value="recipeName,desc">Nama Resep Z-A</option>
                        <option value="timeCook,asc">Waktu Memasak A-Z</option>
                        <option value="timeCook,desc">Waktu Memasak Z-A</option>
                    </select>
                </div>
            </div>

            <div class="row mt-3 custom-fontsize-content1">
                <div class="col">
                    <button type="submit" class="btn btn-primary" wire:click='filter'>Filter</button>
                </div>
            </div>
        </div>
    </div>

    <div class="dropdown filter-btn d-md-none">
        <button class="btn w-100 btn-light dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
            Sort By
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
            <li><button class="dropdown-item" type="button" value="recipeName,asc " wire:model='sortBy'>Nama Resep A-Z</button></li>
            <li><button class="dropdown-item" type="button" value="recipeName,desc " wire:model='sortBy'>Nama Resep Z-A</button></li>
            <li><button class="dropdown-item" type="button" value="timeCook,asc" wire:model='sortBy'>Waktu Memasak A-Z</button></li>
            <li><button class="dropdown-item" type="button" value="timeCook,desc" wire:model='sortBy'>Waktu Memasak Z-A</button></li>
        </ul>
    </div>
</div>

<div>
    @if ($flashMessage)
    <livewire:reusable.alert-success :message="$flashMessage" wire:key="success_{{$alertId}}">
    @endif
    <livewire:reusable.alert-info name="favorite" :alertId="$alertId" wire:key="alert_{{$alertId}}">

    @if ($errors->has('serverError'))
    <livewire:reusable.alert-error />
    @elseif ($data['isNoData'])
    <livewire:reusable.no-data :message="$data['message']"/>
    @else
<div class="container-fluid text-start d-flex flex-column justify-content-center w-100 w-max-md w-max-xs mx-auto">
    <h2 class="mt-4 text-center fw-bolder">
        <a role="button" href="{{route(session('navPage'))}}" class="fa-solid fa-chevron-left" style="color: black; text-decoration: none;"></a>
        {{$data['data']['recipeName']}}
    </h2>
    <img src="{{$data['data']['imageFilename']}}" alt="Disini Image Resep Desktop" class="mt-4 w-75 mx-auto rounded d-none d-md-block hidden-element">
    {{-- Untuk Mobile --}}
    <div class="text-center position-relative">
        <div class="d-flex align-items-center mx-auto fav-xs">
            <i class="fa-lg d-md-none {{$data['data']['isFavorite'] ? 'fa-solid' : 'fa-regular'}} fa-star" width="16" wire:click="showModalChoice"></i>
            <p class="my-auto favorite-section ps-1 custom-fontsize-content2 d-md-none">Favorit</p>
        </div>
        <img src="{{$data['data']['imageFilename']}}" alt="Disini Image Resep Mobile" class="mt-3 img-fluid mx-auto rounded d-md-none">
    </div>

    <div class="mt-4 d-flex flex-wrap justify-content-between w-100 py-3 px-md-5 px-3 border-recipe-primary rounded">
        <div>
            <p class="mb-0 fs-6 fw-bolder costum-fontsize-content1">Kategori</p>
            <p class="my-auto text-recipe-primary costum-fontsize2">{{$data['data']['categories']['categoryName']}}</p>
        </div>
        <div>
            <p class="mb-0 fs-6 fw-bolder costum-fontsize-content1">Waktu Memasak</p>
            <p class="my-auto text-recipe-primary costum-fontsize2">{{$data['data']['timeCook']}}</p>
        </div>
        <div>
            <p class="mb-0 fs-6 fw-bolder costum-fontsize-content1">Kesulitan</p>
            <p class="my-auto text-recipe-primary costum-fontsize2">{{$data['data']['levels']['levelName']}}</p>
        </div>
        <div class="d-flex align-items-center d-none d-md-block my-auto">
            <i role="button" type="button" class="text-recipe-primary fa-lg {{$data['data']['isFavorite'] ? 'fa-solid' : 'fa-regular'}} fa-star" wire:click="showModalChoice"></i>
            <p class="text-recipe-primary my-auto favorite-section ps-1 custom-fontsize-content1 hidden-element fs-6">Favorit</p>
        </div>
    </div>
    <div class="mt-4 text-start custom-fontsize-content3">
        <h3 class="text-recipe-primary border-bottom border-2 border-secondary custom-fontsize-subtitle">Bahan - Bahan</h3>
        {!!$data['data']['ingridient']!!}
    </div>
    <div class="mt-4 text-start custom-fontsize-content3">
        <h3 class="text-recipe-primary border-bottom border-2 border-secondary custom-fontsize-subtitle">Cara Memasak</h3>
        {!!$data['data']['howToCook']!!}
    </div>
</div>
@endif

</div>

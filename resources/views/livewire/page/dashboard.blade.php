<div class="col-12">
    {{-- desktop --}}
    <div class="d-none d-sm-flex flex-column align-items-center mt-5">
        <div class="d-flex justify-content-center col-12">
            <a href="{{ route('add-recipe') }}" class="btn-add btn btn-primary mx-3" role="button">
                <i class="fa-solid fa-plus custom-fontsize-content1"></i> Tambah Resep
            </a>
            <livewire:reusable.search class="custom-fontsize-content1">
            <livewire:reusable.filter :isDashboard="true" class="custom-fontsize-content1">
        </div>
        <h1 class="fw-bold custom-fontsize-subtitle mt-3">Daftar Resep Makanan</h1>
    </div>

    {{-- mobile --}}
    <div class="d-flex flex-column justify-content-center mt-3 mx-2 d-sm-none">
        <h1 class="fw-bold custom-fontsize-subtitle text-center">Daftar Resep Masakan</h1>
        <div class="mb-3">
            <livewire:reusable.search class="custom-fontsize-content1">
        </div>
        <div class="d-flex flex-column justify-content-center filter-add gap-3 w-100">
            <livewire:reusable.filter :isDashboard="false" class="custom-fontsize-content1">
            <a href="{{route('add-recipe')}}" class="btn-add btn btn-primary w-100" role="button">
                <i class="fa-solid fa-plus custom-fontsize-content1"></i> Tambah Resep
            </a>
        </div>
    </div>

    {{-- data --}}
    @if (!$recipes['isNoData'])
    <div class="d-flex justify-content-center w-100">
        <div class="row parent-card justify-content-start mt-3">
            @foreach ($recipes['data'] as $data)
                <livewire:reusable.card :data="$data" :key="$data['recipeId']">
            @endforeach

            <div class="mx-md-2">
                <div class="d-md-flex align-items-center justify-content-between mt-4 mx-auto">
                    <livewire:reusable.index-limitter>
                    <livewire:reusable.pagination :initialData="$recipes" :currentPage="$currentPage" :key="$indexChanges">
                </div>
            </div>
        </div>
    </div>
    @else
    {{-- <livewire:components.no-data :message="$recipes['message']"> --}}
        <h1>No Data</h1>
        @endif
</div>

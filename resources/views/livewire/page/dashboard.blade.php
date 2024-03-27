<div>
    @if (!$recipes['isNoData'])
    <div class="d-flex justify-content-center w-100">
        <div class="row parent-card justify-content-start mt-3">
            @foreach ($recipes['data'] as $data)
                <livewire:reusable.card :data="$data" :key="$data['recipeId']">
            @endforeach
        </div>
    </div>
    @else
    {{-- <livewire:components.no-data :message="$recipes['message']"> --}}
        <h1>No Data</h1>
        @endif
</div>

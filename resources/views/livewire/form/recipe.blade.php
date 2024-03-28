<div class="mx-auto p-4">
    <form wire:submit="submit" class="form-recipe">
        <h2 class="text-center fw-bolder mb-5 mt-3">Judul disini</h2>

        <div class="row mx-auto my-2 justify-content-center">
            {{-- Form Bagian Kiri --}}
            <div class="col-md-5 mx-5">
                <div>
                    <label for="recipeName" class="fs-6">Nama Resep<strong class="text-danger">*</strong></label>
                    <input class="form-control mt-2 @error('recipeName') border-danger @enderror" type="text" id="recipeName" placeholder="Nama Resep Masakan" wire:model.live="recipeName">
                    @error('recipeName') <p class="text-danger m-0 p-0">{{$message}}</p> @enderror
                </div>

                <div class="mt-4">
                    <label for="image" class="fs-6">Gambar Makanan<strong class="text-danger">*</strong></label>
                    <div id="image-upload-dropzone" class="d-flex w-100 flex-column p-3 mt-2 rounded image-upload {{isset($errors->get('image')[1]) ? 'image-upload-danger' : " "}} bg-light">
                        <img src="{{asset('icon/addPhoto.svg')}}" alt="Image Preview" class="mx-auto image-upload-placeholder my-3">
                        <h6 class="text-center text-secondary"><strong>Click to upload</strong> or drag and drop <p>PNG, JPG, JPEG MAX 1 MB</p></h6>
                        <input type="file" wire:key="imageInput" id="image" wire:model.live="image"
                        x-on:livewire-upload-error="$dispatch('tmpError')"
                        class="image-input h-100 form-control">
                        <div wire:loading wire:target="image" class="bg-light image-upload-loading">
                            <i class="fa-solid fa-circle-notch fa-spin fa-4 d-flex justify-content-center align-items-center h-100"></i>
                        </div>
                    </div>
                    @error('image') <p class="text-danger m-0 p-0">image error</p> @enderror
                </div>

                <div class="mt-4 mb-4 fs-6">
                    <label>Bahan - Bahan<strong class="text-danger">*</strong></label>
                    <div class="@error('ingridient') rich-text-danger @enderror">
                        <livewire:reusable.rich-text name="ingridient">
                    </div>
                    @error('ingridient') <p class="text-danger m-0 p-0">{{$message}}</p> @enderror
                </div>
            </div>

            {{-- Form Bagian kanan --}}
            <div class="col-md-5">
                <div>
                    <label for="category" class="fs-6">Kategori Masakan<strong class="text-danger">*</strong></label>
                    <select wire:model="selectedCategory" id="category" class="form-select mt-2 @error('selectedCategory') border-danger @enderror">
                        <option selected value=null disabled class="text-center">Pilih Kategori</option>
                    </select>
                    @error('selectedCategory') <p class="text-danger m-0 p-0">{{$message}}</p> @enderror
                </div>

                <div class="row mt-4">
                    <div class="col-md-6 mb-3">
                        <label for="time" class="fs-6">Waktu Memasak<strong class="text-danger">*</strong></label>
                        <input type="number" class="form-control mt-2 @error('timeCook') border-danger @enderror" id="time" wire:model.live="timeCook" placeholder="Waktu Memasak">
                        @error('timeCook') <p class="text-danger m-0 p-0">{{$message}}</p> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="level" class="fs-6">Tingkat Kesulitan<strong class="text-danger">*</strong></label>
                        <select id="level" wire:model="selectedLevel" class="form-select mt-2 @error('selectedLevel') border-danger @enderror">
                            <option value=null selected disabled>Pilih tingkat Kesulitan</option>
                        </select>
                        @error('selectedLevel') <p class="text-danger m-0 p-0">{{$message}}</p> @enderror
                    </div>
                </div>

                <div class="mt-4 fs-6">
                    <label>Cara Memasak<strong class="text-danger">*</strong></label>
                    <div class="@error('howToCook') rich-text-danger @enderror">
                        <livewire:reusable.rich-text name="howToCook">
                    </div>
                    @error('howToCook') <p class="text-danger m-0 p-0">{{$message}}</p> @enderror
                </div>

                <div class="d-flex justify-content-end my-3 buttons-container">
                    <button class="btn btn-recipe-outline-primary mb-md-0 me-2" wire:click="cancel">Cancel</button>
                    <button class="btn btn-recipe-primary">Submit</button>
                </div>

            </div>

        </div>
    </form>
</div>

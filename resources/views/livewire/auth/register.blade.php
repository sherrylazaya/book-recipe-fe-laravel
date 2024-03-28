<div class="container">
    @error('serverError')
        <livewire:reusable.alert-error/>
    @enderror
        <livewire:reusable.alert-auth-error/>
    <x-frame :judul="'Daftar'">
        <form wire:submit.prevent="register" class="row g-1 need-validation mx-auto p-4">

            <div class="form-group">
                <label for="username" class="label">Username <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                placeholder="Username" wire:model.live="username">
                @error('username')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="fullName" class="label">Nama Lengkap <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('fullName') is-invalid @enderror" id="fullName"
                placeholder="Nama Lengkap" wire:model.live="fullName">
                @error('fullName')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="password" class="label">Kata Sandi <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="{{ $showPassword ? 'text' : 'password'}}" id="password"
                        class="form-control @error('password') is-invalid @enderror" placeholder="Kata Sandi"
                        wire:model.live="password"/>
                        <span class="input-group-text" wire:click="togglePasswordVisibility" style="cursor: pointer;">
                            <i role="button" type="button" 
                                class="fa-solid {{ $showPassword ? 'fa-eye-slash' : 'fa-eye'}}"></i>
                        </span>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
            </div>

            <div class="form-group mt-3">
                <label for="retypePassword" class="label">Konfirmasi Kata Sandi <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="{{ $showRetypePassword ? 'text' : 'password'}}" id="retypePassword"
                        class="form-control @error('retypePassword') is-invalid @enderror" placeholder="Konfirmasi Kata Sandi"
                        wire:model.live="retypePassword"/>
                        <span class="input-group-text" wire:click="toggleRetypePasswordVisibility" style="cursor: pointer;">
                            <i role="button" type="button" 
                                class="fa-solid {{ $showRetypePassword ? 'fa-eye-slash' : 'fa-eye'}}"></i>
                        </span>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
            </div>

            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary btn-auth">Daftar</button>
            </div>

            <div class="col-md-6 text-center mt-3 mx-auto">
                <a class="outlined-link" onclick="window.location.href='/login'">Batal, Kembali Ke Halaman Login</a>
            </div>

        </form>
    </x-frame>
</div>

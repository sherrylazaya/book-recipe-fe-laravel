<div>
    @error('loginError')
    <livewire:reusable.alert-error/>
    @enderror
    @if (session('registerSuccess'))
        <livewire:reusable.alert-auth-success :message="session('registerSuccess')" />
    @endif
<livewire:reusable.alert-auth-error/>
    <x-frame :judul="'Login'">
    <form wire:submit.prevent="login" class="row g-1 needs-validation mx-auto p-4">
        @csrf
        <div>
            <label for="username" class="label">Username <span class="text-danger">*</span></label>
            <input type="text" id="username" placeholder="Username" class="form-control @error('username') is-invalid @enderror" wire:model.live="username"/>
            @error('username')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="password" class="label">Kata Sandi <span class="text-danger">*</span></label>
            <div class="input-group">
                <input type="{{ $showPassword ? 'text' : 'password' }}" placeholder="Password" class="form-control @error('password') is-invalid @enderror" id="password" wire:model.live="password" />
                <span class="input-group-text" wire:click="tooglePasswordVisibility" style="cursor: pointer;">
                    <i role="button" type="button" wire:click="showPassword" class="fa-solid {{ $showPassword ? 'fa-eye-slash' : 'fa-eye' }} "></i>
                </span>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary btn-auth">Login</button>
        </div>
        <div class="text-center mt-3">
            <span>Belum punya akun?</span>
            <a href="/register" class="outlined-link">Daftar Disini</a>
        </div>
        <div class="text-center mt-1">
            <a href="/login" class="outlined-link">About</a>
            <a style="margin: 0 3rem"></a>
            <a href="/login" class="outlined-link">Contact</a>
        </div>
    </form>
</x-frame>
</div>

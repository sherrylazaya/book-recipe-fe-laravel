<div class="input-group custom-search text-center mx-md-5">
    <span class="input-group-text">
        <i class="fas fa-search"></i>
    </span>
    <input type="text" wire:model='search' class="form-control" placeholder="Search" wire:keydown.enter='performSearch'>
</div>

<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="entries entries-container">
        <p class="entriesp">Entries</p>
        <div class="entries-container">
            <button class="btn entries-button custom-fontsize-content2  {{$selectedEntries == 8 ? 'selected-entries' : ''}}" wire:click='setEntries(8)'>8</button>
            <button class="btn entries-button custom-fontsize-content2  {{$selectedEntries == 16 ? 'selected-entries' : ''}}" wire:click='setEntries(16)'>16</button>
            <button class="btn entries-button custom-fontsize-content2  {{$selectedEntries == 48 ? 'selected-entries' : ''}}" wire:click='setEntries(48)'>48</button>
        </div>
    </div>
</div>

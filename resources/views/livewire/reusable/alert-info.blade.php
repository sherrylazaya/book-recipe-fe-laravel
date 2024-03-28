<div class="container-fluid d-flex align-items-center justify-content-center bg-dark bg-opacity-50">
    <div class="modal fade modal-lg" id="infoModal{{$name}}" tabindex="-1" aria-labelledby="infoModal" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content w-recipe-80 w-max-xs mx-auto">
                <div class="modal-header d-flex justify-content-end border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex flex-column w-max-xs mx-auto">
                    <i class="ri-error-warning-line ri-9x text-recipe-warning mx-auto"></i>
                    <p class="text-center message-modal-{{$name}} mx-md5 mx-2 text-break fs-4 custom-fontsize-content2"></p>
                    <div class="py-md-4 py-3 mx-auto d-flex w-max-xs">
                        <button class="mx-md-5 mx-1 rounded btn btn-lg btn-recipe-outline-primary choices" data-choices="false" data-bs-dismiss="modal">Tidak</button>
                        <button class="mx-md-5 mx-1 rounded btn btn-lg btn-recipe-outline-primary choices" data-choices="true" data-bs-dismiss="modal">Ya</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @script
    <script>
        $(document).ready(function(){
            Livewire.on('infoAlert-{{$name}}-{{$alertId}}', (event)=> {
            const message = event.message;
            $('#infoModal{{$name}}').modal('show');
            $('.message-modal-{{$name}}').text(message);
            $('.choices').click(function(){
                const choices = $(this).data('choices');
                $wire.dispatch('choices-{{$name}}', {choices:choices});
            })
        });
    })
    </script>
    @endscript
</div>

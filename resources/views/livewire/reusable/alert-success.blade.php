<div class="container-fluid d-flex align-items-center justify content-center bg-dark bg-opacity-50">
    <div class="modal fade modal-lg mx-auto" id="successModal" tabindex="-1" aria-labelledby="successModal" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content w-recipe-80 w-max-xs position-absolute top-50 start-50 translate-middle">
                <div class="modal-header d-flex justify-content-end border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex flex-column w-max-xs mx-auto">
                    <i class="ri-checkbox-circle-line ri-9x mx-auto text-recipe-success"></i>
                    <h1 class="text-recipe-success text-center fw-bold fs-1">Sukses</h1>
                    <p class="text-center message mx-5 text-break fs-4"></p>
                    <button wire:click='continue' class="mx-auto mb-5 rounded btn btn-lg btn-recipe-primary" data-bs-dismiss="modal">Continue</button>
                </div>
            </div>
        </div>
    </div>
    @script
    <script>
        $('#succesModal').modal('show');
        $('.message').html('{{$message}}');
    </script>
    @endscript
</div>

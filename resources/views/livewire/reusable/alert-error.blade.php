<div class="container-fluid d-flex align-items-center justify-content-center bg-dark bg-opacity-50">
    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content col-5 rounded text-center py-3 px-3 bg-recipe-danger text-light fs-6 fw-medium w-max-xs">
                Terjadi Kesalahan Server. Silahkan Coba Lagi
            </div>
        </div>
    </div>
    @script
    <script>
        $('#errorModal').modal('show');
    </script>
    @endscript
</div>

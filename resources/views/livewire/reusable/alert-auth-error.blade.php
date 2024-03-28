<div class="container-fluid d-flex align-items-center justify-content-center bg-dark bg-opacity-50 mx-auto" data-bs-dismiss="toast">
    <div id="authErrorAlert" class="auth-alert toast align-items-center bg-light border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body d-flex align-items-center">
            <i class="fas fa-check-circle fa-xl text-danger"></i>
            <p class="message my-auto ps-2"></p>
        </div>
    </div>
    @script
    <script>
         $(document).ready(function() {
            const authErrorAlert = new bootstrap.Toast($('#authErrorAlert'));
            Livewire.on('alertAuthError', (event)=>{
                authErrorAlert.show();
                $('.message').text(event.message);
            })
        })
    </script>
    @endscript
    
</div>

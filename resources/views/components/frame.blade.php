<div class="container mt-3">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-8">
            <div class="card-auth">
                <div class="card-header text-center">
                    {{ $judul }}
                </div>
                {{ $slot }}
            </div>
        </div>
    </div>
</div>

<style>
    body {
        background-color: #f5f5f5;
    }
    .card-auth {    
        max-width: 32rem;
        margin: auto;
        width: 100%;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        background-color: white;

    }
    .card-header {
        background-color: #F49881;
        font-size: 1.125rem;
        line-height: 2.10rem;
        color: white;
        text-align: center;
    }
    .form-control {
        display: flex;
        flex-direction: column;
        width: 100%;
        gap: 1rem;
        font-size: 0.875rem;
        line-height: 1.45rem;  
    }
    
    .form-control:hover{
        border-color: black;
    }
    
    .form-control::placeholder {
        font-family: Mulish;
        color: #B4B4BB;
        opacity: 0.9;
        font-size: 12px;
    }
    
    .label{
        color: #787885;
        opacity: 0.9;
    }
    
    .text-danger {
        color: #f49881;
    }
    
   .btn .btn-primary:hover {
        background-color: #1565C0;
        border-color:  #1565C0;
    }
    
    .outlined-link {
        color: #f49881;
        cursor: pointer;
        text-decoration: none;
    }
    @media (max-width: 767px) {
        .card-auth {
            max-width: 100%;
            flex: 100%;
        }
    }

</style>

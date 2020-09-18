@if(session('errors'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert" id="alert">
            <strong>{{session('errors')}}</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>  
@endif

@if(session('success'))
    <div class="container mt-3">
        <div class="alert alert-warning alert-dismissible fade show" role="alert" id="done">
            <strong>{{session('success')}}</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <div class="alert-message">
            {{ session('success') }}
        </div>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <div class="alert-message">
            {{ session('error') }}
        </div>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show p-3" role="alert">
        <strong>
            @foreach ($errors->all() as $error)
                <div>{{$error}}</div>
            @endforeach
        </strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


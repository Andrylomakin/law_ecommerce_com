@if ($errors->any())
    <div class="alert alert-danger border-2 d-flex align-items-center" role="alert">
        <div class="bg-danger me-3 icon-item"><span class="fas fa-times-circle text-white fs-3"></span></div>
        <ul style="width: 100%;margin: 0;">
            @foreach ($errors->all() as $error)
                <li class="mb-0 flex-1">{{ $error  }}</li>
            @endforeach
        </ul>
        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

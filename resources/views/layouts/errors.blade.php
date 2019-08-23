
@if($errors->any())
    <div class="alert-danger p-2 mt-3">
        <ul>
            @foreach($errors->all() as $error)
                <li class="border-danger p-2">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
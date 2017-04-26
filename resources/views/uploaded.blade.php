<div>Uploader</div>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (count($dud) > 0)
<h1>Duds!!!!!!!</h1>
    @foreach ($dud as $duds)
        @foreach($duds as $dud)
            {{$dud}}<br>
        @endforeach
    @endforeach

@endif

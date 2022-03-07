@if (Auth::guest())
    <h1>Log in om deze pagina te bekijken</h1>
    <a href="/login">inloggen</a>
    <?php return ?>
@endif

@if(Auth::user()->id != $berichten->auteur_id)
    <h1>U kunt dit bericht niet aanpassen alleen de auteur kan dit</h1>
    <a href="{{route("berichten.index")}}">Terug</a>
    <?php return ?>
@endif

@extends('app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Bericht aanpassen</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('berichten.index') }}" title="Go back"> Terug </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('berichten.update', $berichten->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Titel:</strong>
                    <input type="text" name="title" value="{{ $berichten->title }}" class="form-control" placeholder="Titel">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Content:</strong>
                    <textarea class="form-control" style="height:50px" name="content"
                              placeholder="Content">{{ $berichten->content }}</textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection

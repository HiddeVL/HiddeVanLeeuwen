@if (Auth::guest())
    <h1>Log in om deze pagina te bekijken</h1>
    <a href="/login">inloggen</a>
    <?php return ?>
@endif
@extends('app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>  {{ $berichten->name }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('berichten.index') }}" title="Go back"> Terug </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <b>{{ $berichten->title }}</b>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {{ $berichten->content }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <p>Geschreven door: {{ $berichten->auteur }}</p>

            </div>
        </div>


    </div>
@endsection

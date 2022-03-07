@if (Auth::guest())
   <h1>Log in om deze pagina te bekijken</h1>
   <a href="/login">inloggen</a>
   <?php return ?>
@endif

@extends("app")

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Bericht aanmaken</h2>
            </div>
            <div class="pull-right">

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
    <form action="{{ route('berichten.store') }}" method="POST" >
        @csrf
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Titel:</strong>
                <input type="text" name="title" class="form-control" placeholder="Titel">
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>content:</strong>
                    <textarea class="form-control" style="height:50px" name="content" placeholder="Content"></textarea>
                </div>
            </div>


            <input type="hidden" name="auteur" class="form-control" value="{{Auth::user()->name}}">
            <input type="hidden" name="auteur_id" class="form-control" value="{{Auth::user()->id}}">


            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection

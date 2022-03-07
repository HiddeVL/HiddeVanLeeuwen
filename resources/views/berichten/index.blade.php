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
                <h2>Laravel 8 CRUD </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('berichten.create') }}" title="Create a Bericht">Toevoegen</i>
                </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Content</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($berichten as $bericht)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $bericht->title }}</td>
                <td>{{ $bericht->content }}</td>
                <td>
                    <form action="{{ route('berichten.destroy', $bericht->id) }}" method="POST">
                        <a style="text-decoration: none; color: lightblue; border-bottom: lightblue solid 2px" href="{{ route('berichten.show', $bericht->id) }}" title="show">Bekijken</a>
                        @if(Auth::user()->id == $bericht->auteur_id)
                            <a style= "text-decoration: none; color: lightblue; border: none; background-color: transparent;border-bottom: lightblue solid 2px" href="{{ route('berichten.edit', $bericht->id) }}">Aanpassen</a>
                            <button type="submit" title="delete" style="border: none; background-color:transparent; color: lightblue; border-bottom: lightblue solid 2px">Verwijderen</button>
                            @csrf
                            @method('DELETE')
                        @endif
                    </form>
                </td>
            </tr>

        @endforeach
    </table>

    {!! $berichten->links() !!}

@endsection

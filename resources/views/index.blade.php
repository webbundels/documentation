@extends('DocumentationPackage::layout')

@section('body_id', 'documentation_index')

@section('content')
    <div id="header_holder">
        <div class="header">
            <h1>
                {{ config('app.name') }}<br/>
                documentatie
            </h1>
        </div>
    </div>

    <div id="documentation_holder">
        @if (strpos(Auth::user()->email, '@webbundels.nl') !== false)
            <div class="button-holder">
                <a id="new_chapter_button" class="styled-button" href="{{ route('documentation.create') }}">Nieuw hoofdstuk</a>
                <button class="styled-button" data-edit-button>Volgorde wijzigen</button>

                <div class="styled-button cancel" data-cancel-button>Annuleren</div>
                <input class="styled-button save" data-save-button type="submit" value="Opslaan">
            </div>
        @endif

        <div id="table_of_contents">

        </div>

        <form method="post" id="form" action="{{ route('documentation.change_order') }}">
            @csrf

            <div data-documentation-container class="documentation-container"></div>
        </form>
    </div>  
@stop

@section('scripts')
    <script>
        let chapters = {!! $documentationChapters->toJson() !!}
    </script>
@stop
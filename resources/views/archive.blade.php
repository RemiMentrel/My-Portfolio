@extends('layouts.app')

@section('content')
    <div class="rm-c-Archive rm-u-hspace">
        <div class="rm-c-Archive-wrapper rm-u-wrapper">
            <h1 class="rm-c-Archive-heading rm-c-Heading" data-lvl="1">
                Projets <img src="@asset('images/headings/projets.svg')" alt="" class="lower" />
            </h1>

            <div class="rm-c-Archive-list">
                @foreach ($projects as $project)
                    <article class="rm-c-ProjectMiniature">
                        <a class="rm-c-ProjectMiniature-wrapper" href="{{ $project['link'] }}">
                            <h2>{{ $project['title'] }}</h2>
                            <img src="{{ $project['image']['url'] }}" alt="" />
                        </a>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="rm-c-Archive">
        <h1>Projets</h1>

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
@endsection

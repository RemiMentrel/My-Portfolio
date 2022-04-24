@extends('layouts.app')

@section('content')
    <h1 class="rm-u-a11yhidden">Projets</h1>

    <div class="rm-c-ProjectList rm-u-hspace">
        <div class="rm-c-ProjectList-wrapper">
            <nav class="rm-c-ProjectList-nav rm-c-Breadcrumb">
                <ul>                        
                    @foreach ($projects as $project)
                        <li @if ($loop->iteration === 1)  data-selected="true" @endif>
                            <a href="#{{ $project['slug'] }}" data-color="{{ $project['color'] }}">
                                {{ $project['title'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </nav>

            <div class="rm-c-ProjectList-visual">
                @foreach ($projects as $project)
                    <article id="{{ $project['slug'] }}" class="rm-c-ProjectList-project" @if ($loop->iteration === 1)  data-selected="true" @endif>
                        <div class="rm-c-ProjectList-project-wrapper">
                            <h2 class="rm-c-ProjectList-project-logo">
                                <img src="{{ $project['logo']['url'] }}" alt="" loading="lazy" />
                                {{ $project['title'] }}
                            </h2>

                            <p class="rm-c-ProjectList-project-description">
                                {{ $project['description'] }}
                            </p>

                            <ul class="rm-u-a11yhidden">
                                @if(!empty($project['tags']))
                                    @foreach ($project['tags'] as $tag)
                                        <li>#{{ $tag->name }}</li>
                                    @endforeach
                                @endif
                            </ul>

                            <div class="rm-c-ProjectList-project-cta">
                                @include('components.btn', ['type' => 'a', 'href' => $project['link'], 'mode' => 'minimal', 'text' => 'Voir le projet', 'arrow' => 'next'])
                            </div>

                            <div class="rm-c-ProjectList-project-preview">
                                <img src="{{ $project['preview']['url'] }}" alt="" loading="lazy" />
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="rm-c-ProjectList-switch">
                @include('components.tabs', ['mode' => 'switch', 'tabs' => [ ['name' => 'Projets', 'url' => '/projets', 'selected' => 'true', 'icon' => 'cup'], ['name' => 'Le labo', 'url' => '/labo', 'icon' => 'erlenmeyer'] ]])
            </div>
        </div>
    </div>
@endsection

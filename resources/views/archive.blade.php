@extends('layouts.app')

@section('content')
    <div class="rm-c-Archive rm-u-hspace">
        <div class="rm-c-Archive-wrapper rm-u-wrapper">
            <h1 class="rm-c-Archive-heading rm-c-Heading" data-lvl="1">
                Projets <img src="@asset('images/headings/projets.svg')" alt="" />
            </h1>

            <div class="rm-c-Archive-subnav">
                <div class="rm-c-Archive-subnav-item">
                    <a href="/projets" @if($projects['mode'] === 'projects')data-current="true"@endif>Etudes de cas</a>
                </div>
                
                <div class="rm-c-Archive-subnav-item">
                    <a href="/projets?creations"  @if($projects['mode'] === 'creations')data-current="true"@endif>Petites créations</a>
                </div>
            </div>

            @if($projects['mode'] === 'projects')
                <div class="rm-c-ProjectList">
                    @foreach ($projects['list'] as $key=>$project)
                        <article class="rm-c-ProjectMiniature">
                            <a class="rm-c-ProjectMiniature-wrapper" href="{{ $project['link'] }}" style="animation-delay: {{ ($loop->iteration * 0.4) + 0.4 }}s">
                                <div class="rm-c-ProjectMiniature-content" data-counter="{{ sprintf('%02d', $key+1) }}">
                                    <h2 class="rm-c-ProjectMiniature-name">
                                        {{ $project['title'] }}
                                    </h2>

                                    <ul class="rm-c-ProjectMiniature-tags">
                                        @if(!empty($project['tags']))
                                            @foreach ($project['tags'] as $tag)
                                                <li>#{{ $tag->name }}</li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>

                                <div class="rm-c-ProjectMiniature-image">
                                    <img src="{{ $project['image'] }}" alt="miniature projet" loading="lazy" />
                                </div>
                            </a>
                        </article>
                    @endforeach
                </div>
            @else
                <div class="rm-c-CreationList">
                    @foreach ($projects['list'] as $key=>$creation)
                        <article class="rm-c-CreationMiniature">
                            <figure class="rm-c-CreationMiniature-wrapper">
                                <div class="rm-c-CreationMiniature-media">
                                    <img src="{{ $creation['media']['image']['url'] }}" alt="{{ $creation['media']['image']['alt'] }}" />
                                </div>

                                <figcaption class="rm-c-CreationMiniature-content">
                                    <h2>{{ $creation['title'] }}</h2>
                                    {!! $creation['description'] !!}
                                </figcaption>
                            </figure>
                        </article>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection

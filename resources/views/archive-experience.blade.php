@extends('layouts.app')

@section('content')
    <div class="rm-c-Labo rm-u-hspace">
        <div class="rm-c-Labo-wrapper rm-u-wrapper">
            <h1 class="rm-c-Labo-heading rm-c-Heading" data-lvl="1">
                Projets <img src="@asset('images/headings/labo.svg')" alt="" />
            </h1>

            <nav class="rm-c-Labo-filters" aria-label="Types de projets">
                <ul>
                    <li>
                        <a href="{{ get_post_type_archive_link('experience') }}"
                           @if (get_queried_object_id() === 0) class="active" @endif>
                            Voir tout
                        </a>
                    </li>
                    @foreach ($categories as $category)
                        <li>
                            <a href="{{ $category['link'] }}"
                               @if ($category['current']) class="active" @endif>
                                {{ $category['name'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </nav>

            <div class="rm-c-Labo-list">
                <div class="rm-c-Labo-list-group">
                    @foreach ($experiences as $key=>$experience)
                        @if ($key % 8 === 0 && $key !== 0)
                            </div><div class="rm-c-Labo-list-group">
                        @endif

                        <article class="rm-c-ProjectMiniature" @if (!empty($experience['media']['video'])) data-video="true" @endif
                                    style="animation-delay: {{ ($loop->iteration * 0.4) + 0.4 }}s">
                            <div class="rm-c-ProjectMiniature-wrapper"
                                    data-href="{{ $experience['link'] }}"
                                    title="{{ $experience['title'] }}">

                                <div class="rm-c-ProjectMiniature-desc">
                                    <h2>{{ $experience['title'] }}</h2>

                                    <ul class="rm-c-ProjectMiniature-categories">
                                        @if(!empty($experience['categories']))
                                            @foreach ($experience['categories'] as $category)
                                                <li>{{ $category->name }}</li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                                    
                                <figure>
                                    <img src="{{ $experience['media']['image']['url'] }}" alt="miniature projet" loading="lazy"
                                         @if (!empty($experience['media']['video']))
                                            data-video-url="{{ $experience['media']['video']['url'] }}"
                                            data-video-mime="{{ $experience['media']['video']['mime_type'] }}"
                                         @endif />
                                    
                                    <figcaption>{!! $experience['description'] !!}</figcaption>
                                </figure>
                            </div>
                        </article>
                    @endforeach
                </div>
                            
                <aside class="rm-c-Popin rm-u-hspace" data-display="false" aria-hidden="true">
                    <b class="rm-c-Popin-mask"></b>
                    <div class="rm-c-Popin-wrapper rm-u-wrapper">
                        <div class="rm-c-Gallery">
                            <div class="rm-c-Gallery-list">
                                <div class="rm-c-Gallery-list-wrapper" data-popin-content>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
        
        <div class="rm-c-ProjectList-switch">
            @include('components.tabs', ['mode' => 'switch', 'tabs' => [ ['name' => 'Projets', 'url' => '/projets', 'icon' => 'cup'], ['name' => 'Le labo', 'url' => '/labo', 'selected' => 'true', 'icon' => 'erlenmeyer'] ]])
        </div>
    </div>
@endsection

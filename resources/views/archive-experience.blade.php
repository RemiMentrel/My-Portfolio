@extends('layouts.app')

@section('content')
    <div class="rm-c-Labo rm-u-hspace">
        <div class="rm-c-Labo-wrapper rm-u-wrapper">
            <h1 class="rm-c-Labo-heading rm-c-Heading" data-lvl="1">
                Projets <img src="@asset('images/headings/labo.svg')" alt="" />
            </h1>

            <div class="rm-c-Labo-list">
                @foreach ($projects as $key=>$project)
                    <article class="rm-c-ProjectMiniature">
                        <a class="rm-c-ProjectMiniature-wrapper"
                           href="{{ $project['link'] }}"
                           title="{{ $post->post_title }}"
                           style="animation-delay: {{ ($loop->iteration * 0.4) + 0.4 }}s">

                            <div class="rm-c-ProjectMiniature-desc">
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
                                
                            <img src="{{ $project['image'] }}" alt="miniature projet" loading="lazy" />
                        </a>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    @php
        $home = get_fields();
    @endphp

    <div class="rm-c-Home">

        <div class="rm-c-Home-top rm-u-hspace">
            <div class="rm-c-Home-top-wrapper rm-u-wrapper">
                <div class="rm-c-Home-top-logo">
                    <img src="{{ $home['top']['logo']['url'] }}" alt="{{ $home['top']['logo']['alt'] }}" />
                </div>

                <ul class="rm-c-Home-top-shortcuts">
                    @foreach ($home['top']['shortcuts'] as $shortcut)
                        @include('components.btn', ['type' => 'a', 'mode' => 'classic', 'style' => 'secondary', 'text' => $shortcut['cta']['title'], 'href' => $shortcut['cta']['url'], 'target' => $shortcut['cta']['target'],  'arrow' => 'next'])
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="rm-c-Home-featured rm-u-hspace">
            <div class="rm-c-Home-featured-wrapper rm-u-wrapper">
                <h2 class="rm-c-Home-featured-heading">
                    À la une !
                </h2>

                <ul class="rm-c-Home-featured-list">
                    @foreach ($home['featured_posts'] as $post)
                        <li>
                            <a href="{{ get_permalink($post->ID) }}" title="{{ $post->post_title }}">
                                {{ $post->post_title }}
                                {!! get_the_post_thumbnail($post->ID) !!}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection

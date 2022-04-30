@php
/*
Template Name: À propos
Template Post Type: page
*/
@endphp

@extends('layouts.app')

@section('content')
    @php
        $about = get_fields();
    @endphp

    <div class="rm-c-About">

        <div class="rm-c-AboutIntroduction rm-u-hspace">
            <div class="rm-c-AboutIntroduction-wrapper rm-u-wrapper">
                <div class="rm-c-AboutIntroduction-logo">
                    <img src="{{ $about['introduction']['content']['logo']['url'] }}" alt="{{ $about['introduction']['content']['logo']['alt'] }}" />
                </div>

                <div class="rm-c-AboutIntroduction-text">
                    <p>
                        {{ $about['introduction']['content']['text'] }}
                    </p>

                    @include('components.btn', ['type' => 'a', 'href' => '/projets', 'mode' => 'classic', 'text' => 'Mes projets', 'arrow' => 'next'])
                </div>

                <img class="rm-c-AboutIntroduction-portrait" src="{{ $about['introduction']['image']['url'] }}" alt="{{ $about['introduction']['image']['alt'] }}" />
            </div>
        </div>

    </div>
@endsection

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

                <p class="rm-c-AboutIntroduction-text">
                    {{ $about['introduction']['content']['text'] }}

                    <a href="/contact">Voir mon CV</a>
                </p>

                <img class="rm-c-AboutIntroduction-portrait" src="{{ $about['introduction']['image']['url'] }}" alt="{{ $about['introduction']['image']['alt'] }}" />
            </div>
        </div>

    </div>
@endsection

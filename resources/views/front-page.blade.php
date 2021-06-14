@extends('layouts.app')

@section('content')
    <div class="rm-c-About">

        <div class="rm-c-AboutIntroduction rm-u-hspace">
            <div class="rm-c-AboutIntroduction-wrapper rm-u-wrapper">
                <div class="rm-c-AboutIntroduction-logo">
                    <img src="{{ $about_data['introduction']['content']['logo']['url'] }}" alt="{{ $about_data['introduction']['content']['logo']['alt'] }}" />
                </div>

                <p class="rm-c-AboutIntroduction-text">
                    {{ $about_data['introduction']['content']['text'] }}
                </p>

                <img class="rm-c-AboutIntroduction-portrait" src="{{ $about_data['introduction']['image']['url'] }}" alt="{{ $about_data['introduction']['image']['alt'] }}" />
            </div>
        </div>

    </div>
@endsection

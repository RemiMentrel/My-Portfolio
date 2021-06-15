@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp

    @php
      $project = get_fields();
    @endphp

    <article @php post_class('rm-c-Project') @endphp>
      <header class="rm-c-Project-header rm-u-hspace">
          <h1>{!! get_the_title() !!}</h1>
          <img src="{{ $project['logo']['url'] }}" alt="{{ $project['logo']['alt'] }}" />
      </header>

      <div class="rm-c-Project-content rm-u-hspace">
        <div class="rm-c-Project-wrapper rm-u-wrapper">

          <section class="rm-c-ProjectIntroduction">
            <div class="rm-c-ProjectIntroduction-content">
              <h2>{{ $project['introduction']['content']['title'] }}</h2>
              {!! $project['introduction']['content']['text'] !!}
            </div>

            @if(!empty($project['introduction']['image']))
              <img class="rm-c-ProjectIntroduction-image" src="{{ $project['introduction']['image']['url'] }}" alt="{{ $project['introduction']['image']['alt'] }}" />
            @endif
          </section>

          @if(!empty($project['detail']))
            <div class="rm-c-ProjectDetail">
              <div class="rm-c-ProjectDetail-list">
                @foreach ($project['detail'] as $section)
                  @if(!empty($section['image']))
                    <img class="rm-c-ProjectIntroduction-image" src="{{ $section['image']['url'] }}" alt="{{ $section['image']['alt'] }}" />
                  @endif

                  <div class="rm-c-ProjectIntroduction-content">
                    <h2>{{ $section['content']['title'] }}</h2>
                    {!! $section['content']['text'] !!}
                  </div>
                @endforeach
              </div>
            </div>
          @endempty
        
        </div>
      </div>

      <footer class="rm-c-Project-footer">
        TODO: Sharing section
      </footer>
    </article>

  @endwhile
@endsection

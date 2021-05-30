@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp

    <article @php post_class('rm-c-Project') @endphp>
      <header class="rm-c-Project-header rm-u-hspace">
          <h1>{!! get_the_title() !!}</h1>
          <img src="" alt="" />
      </header>

      <div class="rm-c-Project-content rm-u-hspace">
        <div class="rm-c-Project-wrapper rm-u-wrapper">
          TODO: ACF
        </div>
      </div>

      <footer class="rm-c-Project-footer">
        TODO: Sharing section
      </footer>
    </article>

  @endwhile
@endsection

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp

    <div @php post_class('rm-c-Page') @endphp>
      <header class="rm-c-Page-header rm-u-hspace">
        <h1>{!! App::title() !!}</h1>
        <img src="" alt="{!! App::title() !!}" />
      </header>
      
      <div class="rm-c-Page-content rm-u-hspace">
        @php the_content() @endphp
      </div>
    </div>

  @endwhile
@endsection

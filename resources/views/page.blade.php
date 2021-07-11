@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp

    <div @php post_class('rm-c-Page') @endphp>
      <header class="rm-c-Page-header rm-u-hspace">
        <h1 class="rm-c-Heading" data-lvl='1'>
          {!! App::title() !!}
          @if(App::title() === 'Contact')
            <img src="@asset('images/headings/contact.svg')" alt="" />
          @endif
        </h1>
      </header>
      
      <div class="rm-c-Page-content rm-u-hspace">
        {{ get_the_content() }}
      </div>
    </div>

  @endwhile
@endsection

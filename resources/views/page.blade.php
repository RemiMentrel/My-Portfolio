@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    <h1>{!! App::title() !!}</h1>
    
    <div class="rm-u-wysiwyg">
      @php the_content() @endphp
    </div>
  @endwhile
@endsection

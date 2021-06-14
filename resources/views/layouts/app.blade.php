<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  
  <body @php body_class() @endphp>
    @php do_action('get_header') @endphp

    @include('partials.header')

    <main class="main">
      @yield('content')
    </main>
    
    @php do_action('get_footer') @endphp

    @if(!is_front_page())
      @include('partials.footer')
    @endif

    @php wp_footer() @endphp
  </body>
</html>

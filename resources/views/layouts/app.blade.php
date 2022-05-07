<!doctype html>
<html {!! get_language_attributes() !!} style="@yield('documentStyle')" >
  @include('partials.head')
  
  <body @php body_class('rm-c-App') @endphp>
    @php do_action('get_header') @endphp

    <div class="rm-c-App-header">
      @include('partials.header')
    </div>

    <main class="rm-c-App-main">
      @yield('content')
    </main>
    
    @php do_action('get_footer') @endphp

    
    <div class="rm-c-App-footer">
      @include('partials.footer')
    </div>

    @php wp_footer() @endphp
  </body>
</html>

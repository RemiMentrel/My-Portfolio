<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')

  <body @php body_class() @endphp>
    @php do_action('get_header') @endphp

    @include('partials.header')

    <main class="rm-c-Page">
      <div class="rm-c-Page-content">
          @yield('content')
      </div>
    </main>

    @php do_action('get_footer') @endphp
    @include('partials.footer')
    @php wp_footer() @endphp
  </body>
</html>

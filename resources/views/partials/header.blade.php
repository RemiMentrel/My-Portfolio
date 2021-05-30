<header class="rm-c-Header rm-u-hspace">
  <div class="rm-c-Header-wrapper rm-u-wrapper">
    <nav class="rm-c-Header-navigation">
      <a class="rm-c-Header-navigation-logo" href="{{ home_url('/') }}">
        <img src="" alt="{{ get_bloginfo('name', 'display') }}" />
      </a>

      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'rm-c-Navigation']) !!}
      @endif
    </nav>
  </div>
</header>

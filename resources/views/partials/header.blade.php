<header class="rm-c-Header rm-u-hspace">
  <div class="rm-c-Header-wrapper rm-u-wrapper" data-size="large">
    <nav class="rm-c-Header-navigation" data-is="showHide">
      <a class="rm-c-Header-navigation-logo" href="{{ home_url('/') }}">
        <img src="@asset('images/logo/logo_mini_light.svg')" alt="{{ get_bloginfo('name', 'display') }}" />
      </a>

      @if (has_nav_menu('primary_navigation'))
        <span class="rm-c-Header-navigation-toggler" aria-hidden="true" data-show-hide="toggler"></span>
        <div class="rm-c-Header-navigation-wrapper" data-show-hide="content">
          {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'rm-c-Navigation']) !!}
        </div>
      @endif
    </nav>
  </div>
</header>

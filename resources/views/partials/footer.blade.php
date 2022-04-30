<footer id="footer" class="rm-c-Footer">
  <div class="rm-c-Footer-main rm-u-hspace">
    <div class="rm-c-Footer-main-wrapper rm-u-wrapper">
      <div class="rm-c-Footer-main-logo">
        <img src="@asset('images/logo/logo_mini_mono-dark.svg')" alt="{{ get_bloginfo('name', 'display') }}" />
      </div>

      @foreach (App::contactInfos() as $name=>$info)
        <div class="rm-c-Footer-main-section" data-type="{{ $name }}">
          <strong class="rm-c-Footer-main-section-title">
            @if ($name == 'telephone')
              Téléphone
            @elseif ($name == 'mail')
              Mail
            @elseif ($name == 'network')
              Suivez-moi
            @endif
          </strong>

          <div class="rm-c-Footer-main-section-content">
            @if ($name == 'telephone')
              <a href="tel:{{ $info }}">{{ $info }}</a>
            @elseif ($name == 'mail')
              <a href="mailto:{{ $info }}">{{ $info }}</a>
            @elseif ($name == 'network')
              @foreach ($info as $network=>$url)
                @if(!empty($url))
                  <a href="{{ $url }}" title="{{ ucfirst($network) }}">{{ $network }}</a>
                @endif
              @endforeach
            @endif
          </div>
        </div>
      @endforeach
    </div>
  </div>

  <div class="rm-c-Footer-bottom rm-u-hspace">
    <div class="rm-c-Footer-bottom-wrapper rm-u-wrapper">
      Design par Rémi Mentrel & développement par Antoine Cabrol
    </div>
  </div>
</footer>

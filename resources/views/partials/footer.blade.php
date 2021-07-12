<footer id="footer" class="rm-c-Footer rm-u-hspace">
  <div class="rm-c-Footer-wrapper rm-u-wrapper">
    <div class="rm-c-Footer-logo">
      <img src="@asset('images/logo/logo_mini_mono-dark.svg')" alt="{{ get_bloginfo('name', 'display') }}" />
    </div>

    @foreach (App::contactInfos() as $name=>$info)
      <div class="rm-c-Footer-section" data-type="{{ $name }}">
        <strong class="rm-c-Footer-section-title">
          @if ($name == 'telephone')
            Téléphone
          @elseif ($name == 'mail')
            Mail
          @elseif ($name == 'network')
            Suivez-moi
          @endif
        </strong>

        <div class="rm-c-Footer-section-content">
          @if ($name == 'telephone')
            <a href="tel:{{ $info }}">{{ $info }}</a>
          @elseif ($name == 'mail')
            <a href="mailto:{{ $info }}">{{ $info }}</a>
          @elseif ($name == 'network')
            @foreach ($info as $network=>$url)
              <a href="{{ $url }}" title="{{ ucfirst($network) }}">{{ $network }}</a>
            @endforeach
          @endif
        </div>
      </div>
    @endforeach
  </div>
</footer>
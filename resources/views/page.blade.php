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

        @if (get_post_field( 'post_name', get_post() ) === 'contact')
          <div class="rm-c-Contact">
            <div class="rm-c-Contact-infos">
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
                        @if(!empty($url))
                          <a href="{{ $url }}" title="{{ ucfirst($network) }}" target="_blank" rel="noreferrer noopener">{{ $network }}</a>
                        @endif
                      @endforeach
                    @endif
                  </div>
                </div>
              @endforeach
            </div>

            <div class="rm-c-Contact-cta">
              <a href="{{ App::cv() }}" class="rm-c-Btn" target="_blank" rel="noreferrer noopener"><span>Voir mon CV</span></a>
            </div>
          </div>
        @endif
      </div>
    </div>

  @endwhile
@endsection

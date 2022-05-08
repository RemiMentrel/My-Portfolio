@php
/*
Template Name: Contact
Template Post Type: page
*/
@endphp

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp

    <div @php post_class('rm-c-Page') @endphp>
      <header class="rm-c-Page-header rm-u-hspace">
        <h1 class="rm-c-Heading" data-lvl="1" data-replaced>
          {!! App::title() !!}
          <img src="@asset('images/headings/contact.svg')" alt="" />
        </h1>
      </header>
      
      <div class="rm-c-Page-content rm-u-hspace">
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
            @include('components.btn', ['type' => 'a', 'mode' => 'classic', 'style' => 'primary', 'text' => 'Voir mon CV', 'href' => App::cv(), 'target' => '_blank' ])
          </div>
        </div>
    </div>
    </div>

  @endwhile
@endsection

@extends('layouts.app')

@php
  $project = get_fields();
@endphp

@section('documentStyle')
    @if (!empty($project['color']))
        --project-color: {{ $project['color'] }}
    @endif
@endsection

@section('content')
  @while(have_posts()) @php the_post() @endphp


    <article @php post_class('rm-c-Project') @endphp>
      <header class="rm-c-Project-header">
          <h1>{{ get_the_title() }}</h1>
      </header>

      @if(!empty($project['has_detail']))
        <div class="rm-c-Project-nav rm-u-hspace">
          <div class="rm-c-Project-nav-wrapper rm-u-wrapper">
            @include('components.tabs', ['mode' => 'simple', 'tabs' => [ ['name' => 'Introduction', 'url' => '#introduction', 'selected' => 'true'], ['name' => $project['detail_title'], 'url' => '#detail'] ]])
          </div>
        </div>
      @endif

      <section id="introduction" class="rm-c-ProjectIntroduction rm-u-hspace" data-shown="true">
        <div class="rm-c-ProjectIntroduction-wrapper rm-u-wrapper" data-size="xlarge">
          <div class="rm-c-ProjectIntroduction-content">
            <h2 class="rm-c-Heading" data-lvl="1">{{ $project['introduction']['content']['title'] }}</h2>
            {!! $project['introduction']['content']['text'] !!}

            <div class="rm-c-ProjectIntroduction-content-ctas">
              @include('components.btn', ['type' => 'a', 'style' => 'secondary', 'text' => 'Retour aux projets', 'href' => '/projets',  'arrow' => 'back', 'animationDelay' => 1.5])

              @if(!empty($project['has_detail']))
                @include('components.btn', ['type' => 'a', 'style' => 'primary', 'text' => 'Voir le détail', 'href' => '#detail',  'arrow' => 'next', 'animationDelay' => 1.8])
              @endif
            </div>
          </div>

          <figure class="rm-c-ProjectIntroduction-image">
            @if(!empty($project['introduction']['video']))
              <video poster="{{ $project['introduction']['image']['sizes']['project-image'] }}" playsinline autoplay muted loop loading="lazy">
                <source src="{{ $project['introduction']['video']['url'] }}"
                        type="{{ $project['introduction']['video']['mime_type'] }}">
              </video>
            @else
              <img src="{{ $project['introduction']['image']['sizes']['project-image'] }}" alt="{{ $project['introduction']['image']['alt'] }}" loading="lazy" />
              @if ( !empty($project['introduction']['image']['caption']) )
                <figcaption>
                  {{ $project['introduction']['image']['caption'] }}
                </figcaption>
              @endif
            @endif
          </figure>
        </div>
      </section>

      @if(!empty($project['has_detail']))
        <div id="detail" class="rm-c-ProjectDetail rm-u-hspace">
          <div class="rm-c-ProjectDetail-wrapper rm-u-wrapper" data-size="xlarge">
            <h2 class="rm-c-ProjectDetail-heading rm-c-Heading" data-lvl="1">{{ $project['detail_title'] }}</h2>

            <div class="rm-c-ProjectDetail-list" data-slider="container">
              <div class="rm-c-ProjectDetail-list-wrapper" data-slider="wrapper">
                @foreach ($project['detail'] as $key=>$section)
                  <section class="rm-c-ProjectDetail-section" data-slider="slide">
                    <div class="rm-c-ProjectDetail-section-content">
                      <div class="rm-c-ProjectDetail-section-content-wrapper">
                        <h3 class="rm-c-Heading" data-lvl="2">{{ $section['content']['title'] }}</h3>
                        {!! $section['content']['text'] !!}
                      </div>
                    </div>

                    @if(!empty($section['image']['more_images']))
                      <div class="rm-c-ProjectDetail-section-image" role="button" data-popin-trigger="gallery_{{ $key }}" aria-title="Voir plus">
                        @if(!empty($section['image']['image']))
                          <img src="{{ $section['image']['image']['sizes']['project-image'] }}" alt="{{ $section['image']['image']['alt'] }}" loading="lazy" />
                        @endif

                        <span class="rm-c-ProjectDetail-section-image-fader">Voir plus</span>
                      </div>
                    @else
                      <figure class="rm-c-ProjectDetail-section-image">
                        @if(!empty($section['image']['video']))
                          <video poster="{{ $section['image']['image']['sizes']['project-image'] }}" playsinline autoplay muted loop loading="lazy">
                            <source src="{{ $section['image']['video']['url'] }}"
                                    type="{{ $section['image']['video']['mime_type'] }}">
                          </video>
                        @else
                          <img src="{{ $section['image']['image']['sizes']['project-image'] }}" alt="{{ $section['image']['image']['alt'] }}" loading="lazy" />
                        @endif

                        @if ( !empty($section['image']['image']['caption']) )
                          <figcaption>
                            {{ $section['image']['image']['caption'] }}
                          </figcaption>
                        @endif
                      </figure>
                    @endif
                  </section>
                @endforeach

                <div class="rm-c-ProjectDetail-section" data-slider="slide">
                  <footer class="rm-c-Project-footer rm-u-hspace">
                    <div class="rm-c-Project-footer-wrapper rm-u-wrapper">
                      <h2 class="rm-c-Project-footer-heading rm-c-Heading" data-lvl="2">Ce projet vous a plu ?</h2>
            
                      <div class="rm-c-Project-footer-ctas">
                        @include('components.btn', ['type' => 'a', 'href' => '/contact', 'mode' => 'classic', 'text' => 'Me contacter'])
            
                        <span class="rm-c-Project-footer-ctas-sep">ou</span>
            
                        <div class="rm-c-Project-footer-ctas-network">
                          <a href="https://www.facebook.com/sharer/sharer.php?u={{ get_permalink() }}"
                            onclick="window.open('https://www.facebook.com/sharer/sharer.php?u={{ get_permalink() }}','popup','width=600,height=600'); return false;"
                            target="_blank" rel="noreferrer noopener">Facebook<img src="@asset('images/icons/network/facebook.svg')" alt="" /></a>
            
                          <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ get_permalink() }}&source={{ site_url() }}"
                            onclick="window.open('https://www.linkedin.com/shareArticle?mini=true&url={{ get_permalink() }}&source={{ site_url() }}','popup','width=600,height=600'); return false;"
                            target="_blank" rel="noreferrer noopener">Linkedin<img src="@asset('images/icons/network/linkedin.svg')" alt="" /></a>
                        </div>
                      </div>
                    </div>
                  </footer>
                </div>
              </div>

              <button class="swiper-arrow" data-slider="prev" data-floating> @include('components.btn', ['type' => 'div', 'mode' => 'minimal', 'text' => 'Précédent', 'arrow' => 'back']) </button>
              <button class="swiper-arrow" data-slider="next" data-floating> @include('components.btn', ['type' => 'div', 'mode' => 'minimal', 'text' => 'Suivant', 'arrow' => 'next']) </button>
            

              <div class="rm-c-ProjectDetail-pagination">
                <button class="swiper-arrow" data-slider="prev"> @include('components.btn', ['type' => 'div', 'mode' => 'minimal', 'text' => 'Précédent', 'arrow' => 'back']) </button>
                <div data-slider="pagination"></div>
                <button class="swiper-arrow" data-slider="next"> @include('components.btn', ['type' => 'div', 'mode' => 'minimal', 'text' => 'Suivant', 'arrow' => 'next']) </buttonass=>
              </div>
            </div>
          </div>
        </div>
      @endempty

      @if(!empty($project['has_detail']))
        <div class="rm-c-Popin rm-u-hspace" data-display="false">
          <b class="rm-c-Popin-mask" title="Fermer la galerie"></b>
          <div class="rm-c-Popin-wrapper rm-u-wrapper">
            @foreach ($project['detail'] as $key=>$section)
              @if(!empty($section['image']['more_images']))
                <div id="gallery_{{ $key }}" class="rm-c-Gallery" data-shown="false" data-theme="light">
                  <div class="rm-c-Gallery-list" data-slider="container">
                    <div class="rm-c-Gallery-list-wrapper" data-slider="wrapper">
                      <figure class="rm-c-Gallery-image" data-slider="slide">
                        @if(!empty($section['image']['video']))
                          <video poster="{{ $section['image']['image']['sizes']['project-image'] }}" playsinline controls loading="lazy">
                            <source src="{{ $section['image']['video']['url'] }}"
                                    type="{{ $section['image']['video']['mime_type'] }}">
                          </video>
                        @else
                          <img src="{{ $section['image']['image']['url'] }}" alt="{{ $section['image']['image']['alt'] }}" loading="lazy" />
                        @endif
                        
                        @if ( !empty($section['image']['image']['caption']) )
                          <figcaption>
                            {{ $section['image']['image']['caption'] }}
                          </figcaption>
                        @endif
                      </figure>

                      @foreach ($section['image']['gallery'] as $item)
                        <figure class="rm-c-Gallery-image" data-slider="slide">
                          @if(!empty($item['video']))
                            <video poster="{{ $item['image']['sizes']['project-image'] }}" playsinline controls loading="lazy">
                              <source src="{{ $item['video']['url'] }}"
                                      type="{{ $item['video']['mime_type'] }}">
                            </video>
                          @else
                            <img src="{{ $item['image']['url'] }}" alt="{{ $item['image']['alt'] }}" loading="lazy" />
                          @endif

                          @if ( !empty($item['image']['caption']) )
                            <figcaption>
                              {{ $item['image']['caption'] }}
                            </figcaption>
                          @endif
                        </figure>
                      @endforeach
                    </div>
                      
                    <button class="swiper-arrow" data-slider="prev" data-floating> @include('components.btn', ['type' => 'div', 'mode' => 'minimal', 'text' => 'Précédent', 'arrow' => 'back']) </button>
                    <button class="swiper-arrow" data-slider="next" data-floating> @include('components.btn', ['type' => 'div', 'mode' => 'minimal', 'text' => 'Suivant', 'arrow' => 'next']) </button>

                    <div class="rm-c-Gallery-pagination" data-slider="pagination_gallery_{{ $key }}"></div>
                  </div>
                </div>
              @endif
            @endforeach
          </div>
        </div>
      @endif

    </article>

  @endwhile
@endsection

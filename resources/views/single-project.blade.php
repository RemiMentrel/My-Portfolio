@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp

    @php
      $project = get_fields();
    @endphp

    <article @php post_class('rm-c-Project') @endphp>
      <header class="rm-c-Project-header rm-u-hspace">
          <h1>{{ get_the_title() }}</h1>
          <img src="{{ $project['logo']['url'] }}" alt="{{ $project['logo']['alt'] }}" @if(!empty($project['is_logo_large'])) data-logo-large="true" @endif />
      </header>

      <div class="rm-c-Project-content">
        <section class="rm-c-ProjectIntroduction rm-u-hspace">
          <div class="rm-c-ProjectIntroduction-wrapper rm-u-wrapper">
            <div class="rm-c-ProjectIntroduction-content">
              <h2 class="rm-c-Heading" data-lvl="2">{{ $project['introduction']['content']['title'] }}</h2>
              {!! $project['introduction']['content']['text'] !!}
            </div>

            <div class="rm-c-ProjectIntroduction-image">
              @if(!empty($project['introduction']['image']))
                <img src="{{ $project['introduction']['image']['sizes']['project-image'] }}" alt="{{ $project['introduction']['image']['alt'] }}" loading="lazy" />
              @endif
            </div>
          </div>
        </section>

        @if(!empty($project['detail']))
          <div class="rm-c-ProjectDetail rm-u-hspace">
            <div class="rm-c-ProjectDetail-wrapper rm-u-wrapper">
              <h2 class="rm-c-ProjectDetail-heading rm-c-Heading" data-lvl="2">{{ $project['detail_title'] }}</h2>

              <div class="rm-c-ProjectDetail-list" data-slider="container">
                <div class="rm-c-ProjectDetail-list-wrapper" data-slider="wrapper">
                  @foreach ($project['detail'] as $key=>$section)
                    <section class="rm-c-ProjectDetail-section" data-slider="slide">
                      <div class="rm-c-ProjectDetail-section-image" @if(!empty($section['image']['more_images'])) role="button" data-popin-trigger="gallery_{{ $key }}" aria-title="Voir plus" @endif>
                        @if(!empty($section['image']['image']))
                          <img src="{{ $section['image']['image']['sizes']['project-image'] }}" alt="{{ $section['image']['image']['alt'] }}" loading="lazy" />
                        @endif
                      </div>

                      <div class="rm-c-ProjectDetail-section-content">
                        <h3 class="rm-c-Heading" data-lvl="3">{{ $section['content']['title'] }}</h3>
                        {!! $section['content']['text'] !!}
                      </div>
                    </section>
                  @endforeach
                </div>

                <div class="swiper-arrow-left" data-slider="prev"></div>
                <div class="swiper-arrow-right" data-slider="next"></div>
              </div>

              <div class="rm-c-ProjectDetail-pagination" data-slider="pagination"></div>
            </div>
          </div>
        @endempty
      </div>

      <div class="rm-c-Popin rm-u-hspace" data-display="false">
        <b class="rm-c-Popin-mask"></b>
        <div class="rm-c-Popin-wrapper rm-u-wrapper">
          @foreach ($project['detail'] as $key=>$section)
            @if(!empty($section['image']['more_images']))
              <div id="gallery_{{ $key }}" class="rm-c-Gallery" data-shown="false">
                <div class="rm-c-Gallery-list" data-slider="container">
                  <div class="rm-c-Gallery-list-wrapper" data-slider="wrapper">
                    @if(!empty($section['image']['image']))
                      <div class="rm-c-Gallery-image" data-slider="slide">
                        <img src="{{ $section['image']['image']['url'] }}" alt="{{ $section['image']['image']['alt'] }}" loading="lazy" />
                      </div>
                    @endif

                    @foreach ($section['image']['gallery'] as $item)
                      <div class="rm-c-Gallery-image" data-slider="slide">
                          <img src="{{ $item['image']['url'] }}" alt="{{ $item['image']['alt'] }}" loading="lazy" />
                      </div>
                    @endforeach
                  </div>
                    
                  <div class="swiper-arrow-left" data-slider="prev"></div>
                  <div class="swiper-arrow-right" data-slider="next"></div>

                  <div class="rm-c-Gallery-pagination" data-slider="pagination_gallery_{{ $key }}"></div>
                </div>
              </div>
            @endif
          @endforeach
        </div>
      </div>

      <footer class="rm-c-Project-footer rm-u-hspace">
        <div class="rm-c-Project-footer-wrapper rm-u-wrapper">
          <h2 class="rm-c-Project-footer-heading rm-c-Heading" data-lvl="2">Cet article vous a plu ?</h2>

          <div class="rm-c-Project-footer-ctas">
            <a href="#footer" class="rm-c-Btn"><span>Me contacter</span></a>

            <span>ou</span>

            <div class="rm-c-Project-footer-ctas-network">
              <a href="https://www.facebook.com/sharer/sharer.php?u={{ get_permalink() }}"
                onclick="window.open('https://www.facebook.com/sharer/sharer.php?u={{ get_permalink() }}','popup','width=600,height=600'); return false;"
                target="_blank" rel="noreferrer">Facebook<img src="@asset('images/icons/network/facebook.svg')" alt="" /></a>

              <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ get_permalink() }}&source={{ site_url() }}"
                onclick="window.open('https://www.linkedin.com/shareArticle?mini=true&url={{ get_permalink() }}&source={{ site_url() }}','popup','width=600,height=600'); return false;"
                target="_blank" rel="noreferrer">Linkedin<img src="@asset('images/icons/network/linkedin.svg')" alt="" /></a>
            </div>
          </div>
        </div>
      </footer>
    </article>

  @endwhile
@endsection

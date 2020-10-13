@extends('layouts.app')

@section('content')
  <div class="rm-u-wrapper" data-size="large">
    <div class="rm-c-PageHeading">
      <h1 class="rm-c-PageHeading-title">
        @for ($i = 1; $i <= 5; $i++)
          @php
          $line = 'line_'.$i;
          @endphp

          @if (!empty($page_header[$line]))
            <span class="rm-c-PageHeading-title-line" data-line="{{$i}}">
                @if ((int)$page_header['strong']['line'] === $i )
                    {{ $page_header['strong']['text'] }}
                @endif
                {{ $page_header[$line] }}
            </span>
          @endif
            
        @endfor
      </h1>
    </div>

    <div class="rm-c-Breadcrumb">
      <div class="rm-c-Breadcrump-trigger">
        <div class="rm-c-ScrollBar-animation"></div>

        <span class="rm-c-ScrollBar-name"></span>

      </div>

      <div class="rm-c-Breadcrump-numbers"></div>
    </div>
  </div>

    <div class="rm-c-ProjetList">
      <div class="rm-c-ProjetList-nav">
        <div class="rm-c-ProjetList-nav-prev"></div>

        <div class="rm-c-ProjetList-nav-next"></div>

        <div class="rm-c-ProjetList-nav-dots"></div>
      </div>
      <ul class="rm-c-ProjetList-list">
        @for ($i = 0; $i < 3; $i++)
          <li>
            <div class="rm-c-ProjetMiniature">
              <img src="" alt="">

              <div class="rm-c-ProjetMiniature-title">miniature {{ $i }}</div>
            </div>
          </li>
        @endfor
      </ul>
    </div>

    <b class="rm-c-Breadcrumb-line"></b>
@endsection

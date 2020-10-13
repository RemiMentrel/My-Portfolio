@extends('layouts.app')

@section('content')
    <div class="rm-c-ProjetTop">
        <div class="rm-c-PageHeading">
            <h1>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </h1>
        </div>

        <img class="rm-c-ProjetTop-visual" src="" alt="">
    </div>

    <div class="rm-c-Breadcrumb">
        <div class="rm-c-Breadcrump-numbers"></div>

        <div class="rm-c-Breadcrump-trigger">
            <div class="rm-c-ScrollBar-animation"></div>

            <span class="rm-c-ScrollBar-name"></span>
        </div>
    </div>

    <ul class="rm-c-ListItem">
        @for ($i = 0; $i < 2; $i++)
            <li>
                <div class="rm-c-ListItem">
                    <img src="" alt="Home-Page-img">
                    <p class="rm-c-TxtImg"></p>
                </div>
            </li>
        @endfor
    </ul>

    <b class="rm-c-Breadcrumb-line"></b>
  </div>
@endsection
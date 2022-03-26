@php
/*
Template Name: Styleguide
Template Post Type: page
*/
@endphp

@extends('layouts.app')

@section('content')
    <div class="rm-c-Styleguide rm-u-hspace">
        <div class="rm-u-wrapper">
            <h1>{!! App::title() !!}</h1>

            <h2>Boutons</h2>
            @include('components.btn', ['type' => 'button', 'mode' => 'classic', 'text' => 'En savoir plus', 'arrow' => 'next'])
            @include('components.btn', ['type' => 'button', 'mode' => 'minimal', 'text' => 'En savoir plus', 'arrow' => 'down'])

            <h2>Formulaires</h2>

            <h2>Onglets</h2>
            @include('components.tabs', ['mode' => 'simple', 'tabs' => [ ['name' => 'Introduction', 'url' => '#'], ['name' => 'Description', 'url' => '#'] ]])
            @include('components.tabs', ['mode' => 'switch', 'tabs' => [ ['name' => 'Projets', 'url' => '#', 'icon' => 'cup'], ['name' => 'Le labo', 'url' => '#', 'icon' => 'erlenmeyer'] ]])

            <h2>Pagination</h2>
            - pagination slider

            <h2>Fil d'arianne</h2>
        </div>
    </div>
@endsection
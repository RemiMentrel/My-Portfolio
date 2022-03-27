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
            @include('components.btn', ['type' => 'button', 'mode' => 'classic', 'text' => 'Bouton principal', 'arrow' => 'next'])
            @include('components.btn', ['type' => 'button', 'mode' => 'classic', 'style' => 'secondary', 'text' => 'Bouton secondaire', 'arrow' => 'next'])
            @include('components.btn', ['type' => 'button', 'mode' => 'minimal', 'text' => 'En savoir plus', 'arrow' => 'down'])

            <h2>Formulaires</h2>
            <input type="text" name="lastname" placeholder="Nom" value="" /><br>
            <input type="text" name="firstname" placeholder="Prénom" value="" /><br>
            <input type="email" name="email" placeholder="Addresse e-mail " value="" /><br>
            <textarea name="message" placeholder="À votre tour..."></textarea>

            <h2>Onglets</h2>
            @include('components.tabs', ['mode' => 'simple', 'tabs' => [ ['name' => 'Introduction', 'url' => '#'], ['name' => 'Description', 'url' => '#'] ]])
            @include('components.tabs', ['mode' => 'switch', 'tabs' => [ ['name' => 'Projets', 'url' => '#', 'icon' => 'cup'], ['name' => 'Le labo', 'url' => '#', 'icon' => 'erlenmeyer'] ]])

            <h2>Fil d'arianne</h2>
            <nav class="rm-c-Breadcrumb" aria-labelledby="Fil d'arianne">
                <ul>
                    <li><a href="#">The Colorful Festival</a></li>
                    <li><a href="#">Ambassade Franco-Australienne</a></li>
                    <li data-selected="true">
                        <a href="#">Signature Gastronomique</a>
                    </li>
                    <li><a href="#">Astra Agency</a></li>
                    <li><a href="#">Cybertruck Animation</a></li>
                    <li><a href="#">Museum of Bread</a></li>
                    <li><a href="#">Gaea</a></li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
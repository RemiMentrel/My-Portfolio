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
            - bouton (avec texte)
            - bouton minimal (icone seule) : flèche droite/bas/gauche

            <h2>Formulaires</h2>

            <h2>Onglets</h2>
            - onglets simples
            - switch

            <h2>Pagination</h2>
            - pagination slider

            <h2>Fil d'arianne</h2>
        </div>
    </div>
@endsection
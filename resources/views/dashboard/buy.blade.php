@extends('layouts.app')

@section('title')
    Buy tokens
@endsection

@section('content')
    <div class="admin-data-content layout-top-spacing">
        <div class="row">
            <token-sale-component></token-sale-component>
        </div>
        <div class="row">
            <others-component :referrer={{isset($user) ? $user : null}}></others-component>
        </div>
    </div>
@endsection

@section('styles')
    <link href="{{('dash/assets/css/elements/infobox.css')}}" rel="stylesheet" type="text/css" />
    {{-- <link href="{{('dash/assets/css/pages/faq/faq2.css')}}" rel="stylesheet" type="text/css" />  --}}
@endsection


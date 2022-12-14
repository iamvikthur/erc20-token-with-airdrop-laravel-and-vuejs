@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')

    <div class="admin-data-content layout-top-spacing">
        <div class="row">
            {{-- !!! SUMMARY COMPONENT !!!  --}}
            <summary-component></summary-component>
        </div>
        <div class="row">
            {{-- <token-sale-component></token-sale-component> --}}
            @if(isset($user))
                <index-component :referrer={{ $user }}></index-component>
            @else
                <index-component></index-component>
            @endif
        </div>
    </div>

@endsection

@section('styles')
    <link href="{{('dash/assets/css/elements/infobox.css')}}" rel="stylesheet" type="text/css" />
@endsection
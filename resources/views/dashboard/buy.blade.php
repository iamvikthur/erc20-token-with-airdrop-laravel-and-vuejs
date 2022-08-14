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
    <link href="{{asset('dash/assets/css/elements/infobox.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('script')
    <!-- BEGIN THEME GLOBAL STYLE -->
    <script src="{{asset('dash/assets/js/scrollspyNav.js')}}"></script>
    <script src="{{asset('dash/plugins/sweetalerts/sweetalert2.min.js')}}"></script>
    <script src="{{asset('dash/plugins/sweetalerts/custom-sweetalert.js')}}"></script>
    <!-- END THEME GLOBAL STYLE -->  
@endsection


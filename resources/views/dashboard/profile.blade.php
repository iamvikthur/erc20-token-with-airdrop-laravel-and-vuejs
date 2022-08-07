@extends('layouts.app')

@section('title')
    Airdrop Profile
@endsection

@section('styles')
    <link href="{{asset('dash/assets/css/users/user-profile.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('dash/assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('dash/assets/css/components/custom-list-group.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <div class="admin-data-content layout-top-spacing">
        <div class="row">
            <profile-component></profile-component>
        </div>
    </div>

@endsection

@section('script')
    <!-- BEGIN THEME GLOBAL STYLE -->
    <script src="{{asset('dash/assets/js/scrollspyNav.js')}}"></script>
    <script src="{{asset('dash/plugins/sweetalerts/sweetalert2.min.js')}}"></script>
    <script src="{{asset('dash/plugins/sweetalerts/custom-sweetalert.js')}}"></script>
    <!-- END THEME GLOBAL STYLE -->  
@endsection
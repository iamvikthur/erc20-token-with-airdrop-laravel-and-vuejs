@extends('layouts.app')

@section('title')
    NFT colection
@endsection

@section('content')

    <div class="admin-data-content layout-top-spacing">
        <div class="row">
            <nft-component></nft-component>
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
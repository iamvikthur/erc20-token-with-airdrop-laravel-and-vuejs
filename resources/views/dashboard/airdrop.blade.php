@extends('layouts.app')

@section('title')
    NGL Airdrop
@endsection

@section('content')
    <div class="admin-data-content layout-top-spacing">
        <div class="row">
            <airdrop-component></airdrop-component>
        </div>
    </div>

@endsection

@section('styles')
    <link href="{{asset('dash/assets/css/pages/helpdesk.css')}}" rel="stylesheet" type="text/css" />
@endsection
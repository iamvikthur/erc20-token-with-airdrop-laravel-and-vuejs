@extends('layouts.app')

@section('title')
    Farm
@endsection

@section('content')

    <div class="admin-data-content layout-top-spacing">
        <div class="row">
            <farm-component></farm-component>
        </div>
    </div>

@endsection

@section('styles')
    <link href="{{asset('dash/assets/css/pages/coming-soon/style.css')}}" rel="stylesheet" type="text/css" />
@endsection
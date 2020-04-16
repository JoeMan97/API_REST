<!-- Plantilla donde se muestran las listas de las opiniones -->

@extends('layouts.app')

@section('title', 'Mis opiniones')

@section('content')

    <new-opinion-component></new-opinion-component>
    <opinions-component user-id="{{ $user_id }}" api-token="{{ $api_token }}"></opinions-component>    
    <opinion-form-component api-token="{{ $api_token }}"></opinion-form-component>
    <opinion-details-component></opinion-details-component>

@endsection
@extends('layouts.app')

@section('title', 'Crear opinión')

@section('content')

    <div class="form-group">
        <label for="">Puntuación</label>
        <input type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Título</label>
        <input type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Resumen</label>
        <input type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Dirección IP</label>
        <input type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Empresa</label>
        <input type="text" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>

@endsection
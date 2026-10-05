@extends('layouts.app')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard')

@section('content')

    <h1 class="h3 mb-3">Dashboard</h1>

    <p>Bem-vindo ao sistema, {{ Auth::user()->name }}.</p>

@endsection
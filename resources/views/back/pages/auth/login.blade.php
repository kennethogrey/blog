@section('title',isset($title) ? $title : 'Login')
@extends('back.layouts.auth-layout')
@section('content')
<div class="page page-center">
    <div class="container-tight py-4">
      <div class="text-center mb-4">
        <a href="." class="navbar-brand navbar-brand-autodark"><img src="./back/dist/img/logo-favicon/logo.png" height="36" alt=""></a>
      </div>
      @livewire('author-login-form')
    </div>
</div>
@endsection

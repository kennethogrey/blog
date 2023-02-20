@extends('back.layouts.pages-layout')
@section('title', isset($title) ? $title : 'Home')
@section('content')
<div class="page-header d-print-none">
    <div class="row align-items-center">
      <div class="col">
        <h2 class="page-title">
          All Posts
        </h2>
      </div>
    </div>
  </div>
  @livewire('all-posts')
@endsection

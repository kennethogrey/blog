@extends('back.layouts.pages-layout')
@section('title', isset($title) ? $title : 'Categories')
@section('content')
<div class="page-header d-print-none">
    <div class="row align-items-center">
      <div class="col">
        <h2 class="page-title">
          Categories & SubCategories
        </h2>
      </div>
    </div>
</div>
@livewire('categories')
@endsection
@push('scripts')
<script>
    window.addEventListener('hideCategoriesModal',function(){
        $('#categories_modal').modal('hide');
    });
</script>
@endpush

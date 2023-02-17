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
    window.addEventListener('hideCategoriesModal',function(e){
        $('#categories_modal').modal('hide');
    });
    window.addEventListener('showCategoriesModal',function(e){
        $('#categories_modal').modal('show');
    });
    window.addEventListener('hideSubCategoriesModal',function(e){
        $('#subcategories_modal').modal('hide');
    });
    window.addEventListener('showSubCategoriesModal',function(e){
        $('#subcategories_modal').modal('show');
    });
    window.addEventListener('hideSubCategoriesModal',function(e){
        $('#subcategories_modal').modal('hide');
    });

    $('#categories_modal,#subcategories_modal').on('hidden.bs.modal',function(e){
        Livewire.emit('resetModalForm');
    });
</script>
@endpush

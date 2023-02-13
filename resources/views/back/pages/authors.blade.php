@extends('back.layouts.pages-layout')
@section('title', isset($title) ? $title : 'Authors')
@section('content')
@livewire('authors')
@endsection
@push('scripts')
    <script>
        $(window).on('hidden.bs.modal',function(){
            Livewire.emit('resetForms');
        });
        window.addEventListener('hide_add_author_model',function(event){
            $('#add_author_modal').modal('hide');
        });
    </script>
@endpush

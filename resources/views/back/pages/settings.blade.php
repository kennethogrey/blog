@extends('back.layouts.pages-layout')
@section('title', isset($title) ? $title : 'Settings')
@section('content')
<div class="row aligns-items-center">
    <div class="col">
        <h1 class="page-titl">
            Settings
        </h1>
    </div>
</div>
<div class="card">
    <ul class="nav nav-tabs" data-bs-toggle="tabs">
      <li class="nav-item">
        <a href="#tabs-home-17" class="nav-link active" data-bs-toggle="tab">General Settings</a>
      </li>
      <li class="nav-item">
        <a href="#tabs-profile-17" class="nav-link" data-bs-toggle="tab">Logo & Favicon</a>
      </li>
      <li class="nav-item">
        <a href="#tabs-activity-17" class="nav-link" data-bs-toggle="tab">Social Media</a>
      </li>
    </ul>
    <div class="card-body">
      <div class="tab-content">
        <div class="tab-pane fade active show" id="tabs-home-17">
          <div>
            @livewire('author-general-settings')
        </div>
        </div>
        <div class="tab-pane fade" id="tabs-profile-17">
          <div>Fringilla egestas nunc quis tellus diam rhoncus ultricies tristique enim at diam, sem nunc amet, pellentesque id egestas velit sed</div>
        </div>
        <div class="tab-pane fade" id="tabs-activity-17">
          <div>Donec ac vitae diam amet vel leo egestas consequat rhoncus in luctus amet, facilisi sit mauris accumsan nibh habitant senectus</div>
        </div>
      </div>
    </div>
  </div>
@endsection

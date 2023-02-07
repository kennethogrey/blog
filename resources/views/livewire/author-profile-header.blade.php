<div>
    <div class="page-header">
        <div class="row align-items-center">
          <div class="col-auto">
            <span class="avatar avatar-md" style="background-image: url(...)"></span>
          </div>
          <div class="col-md-6">
            <h2 class="page-title">{{ $author->name }}</h2>
            <div class="page-subtitle">
              <div class="row">
                <div class="col-auto">
                  <!-- Download SVG icon from http://tabler-icons.io/i/building-skyscraper -->
                  <!-- SVG icon code -->
                  <a href="#" class="text-reset">@ {{$author->username}} | {{ $author->authorType->name }}</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-auto d-md-flex">
            <a href="#" class="btn btn-primary">
              <!-- Download SVG icon from http://tabler-icons.io/i/message -->
              <!-- SVG icon code -->
              Change Picture
            </a>
          </div>
        </div>
    </div>
</div>

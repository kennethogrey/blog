<div>
    @if(categories())
        <div class="col-lg-12 col-md-6">
            <div class="widget">
                <h2 class="section-title mb-3">Categories</h2>
                <div class="widget-body">
                    <ul class="widget-list">
                        @foreach(categories() as $item)
                            <li><a href="{{route('category_posts',$item->slug)}}">{{Str::ucfirst($item->subcategory_name)}}
                                <span class="ml-auto">({{$item->posts->count()}})</span></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif
</div>
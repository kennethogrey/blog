@extends('back.layouts.pages-layout')
@section('title', isset($title) ? $title : 'Add new Post')
@section('content')
<div class="page-header d-print-none">
    <div class="row align-items-center">
      <div class="col">
        <h2 class="page-title">
          Add New Post
        </h2>
        @if (Session::get('fail'))
            <div class="alert alert-danger">
                {{Session::get('fail')}}
            </div>
        @endif
        @if (Session::get('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif
      </div>
    </div>
</div>

<form action='{{route("author.posts.create")}}' method="post" id="addPostForm" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <div class="mb-3">
                        <label class="form-label">Post Title</label>
                        <input type="text" class="form-control" name="post_title" placeholder="Enter post title">
                        <span class="text-danger"></span>
                        <span class="text-danger">@error('post_title'){{$message}}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Post Content</label>
                        <textarea class="form-control" name="post_content" rows="6" placeholder="Content.."></textarea>
                        <span class="text-danger">@error('post_content'){{$message}}@enderror</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <div class="form-label">Post Category</div>
                        <select class="form-select" name="post_category">
                            <option value="">No selected</option>
                            @foreach (\App\Models\SubCategory::all() as $category )
                                <option value="{{$category->id}}">{{$category->subcategory_name}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">@error('post_category'){{$message}}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <div class="form-label">Featured image</div>
                        <input type="file" class="form-control" name="featured_image">
                        <span class="text-danger">@error('featured_image'){{$message}}@enderror</span>
                    </div>
                    <div class="image-holder mb-2" style="max-width: 250px">
                        <img src="" alt="" class="img-thumbnail" id="image-preveiwer" data-ijabo-default-img=''>
                    </div>
                    <button type="submit" class="btn btn-primary">Save post</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script>
    $(function(){
        $('input[type="file"][name="featured_image"]').ijaboViewer({
            preview:'#image-preveiwer',
            imageShape:'rectangular',
            allowedExtensions:['jpg','jpeg','png'],
            onErrorShape:function(message,element){
                alert(message);
            },
            onInvalidType:function(message,element){
                alert(message);
            },

        });
        
        // $('form#addPostForm').submit(function(e){
        //     e.preventDefault();
        //     toastr.remove();
        //     var form = this;
        //     var fromdata = new FormData(form);
        //     $.ajax({
        //         url:$(form).attr('action'),
        //         method:$(form).attr('method'),
        //         data:fromdata,
        //         processData:false,
        //         dataType:'json',
        //         contentType:false,
        //         beforeSend:function(){
        //             $(form).find("span.error-text").text('');
        //         },
        //         success:function(response){
        //             toastr.remove();
        //             if(response.code == 1){
        //                 $(form)[0].reset();
        //                 $('div.image-holder').html('');
        //                 toastr.success(response.msg);
        //             }else{
        //                 toastr.error(response.msg);
        //             }
        //         },
        //         error:function(response){
        //             toastr.remove();
        //             $.each(response.responseJSON.errors,function(prefix,val){
        //                 $(form).find('span.'+prefix+'_error').text(val[0]);
        //             });
        //         }

        //     });
        // });
    });
</script>
@endpush

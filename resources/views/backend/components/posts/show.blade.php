<x-admin-layout>
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb align-items-center mb-0">
                        <li class=""> <a href="{{ url('/dashboard') }}"><i class="mdi mdi-view-dashboard-outline"></i> Dashboard /</a> </li>
                        <li class=" active"><a href="{{ route('admin.posts') }}"><i class="mdi mdi-file-document-outline"></i> Posts / </a></li>
                        <li> Show</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>

    <div class="content-wradminer">
        <div class="content pt-0 mt-0">
            <!-- Top Statistics -->
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <h4 class="card-title mb-0">
                                    <i class="mdi mdi-file-document-outline"></i> Post <small class="text-muted">Detail</small>
                                </h4>
                                <div class="small text-muted">
                                    Post Management Dashboard
                                </div>
                            </div>
                            <!--/.col-->
                            <div class="col-4">
                                <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                                    <button type="button" class="btn btn-warning btn-sm" onclick="history.back(-1)"><i class="mdi mdi-reply"></i></button>
                                    <a href="{{ url('/admin/post/edit/'.$post->id, $post->slug) }}" class="btn btn-secondary btn-sm ml-1" data-toggle="tooltip" title="" data-original-title="post List"><i class="mdi mdi-wrench"></i> Edit</a>
                                </div>
                            </div>
                            <!--/.col-->
                        </div>
                        <!--/.row-->

                        <hr>

                        <div class="row mt-4 text-center">
                            <div class="col-md-9 post-detail-wrap">
                                <p class="mb-5"> Displaing all the values of <b>Post - Id: {{ $post->id }}</b></p>
                                <div class="post-description text-left  border-start border-primary border-3 pl-2">
                                    <h4>Post Title</h4>
                                    <p class="my-3 bg-light py-3 px-2">{{ $post->title }}</p>
                                </div>
                                <hr>
                                <div class="post-description text-left  border-start border-primary border-3 pl-2">
                                    <h4>Post Slug</h4>
                                    <p class="my-3 bg-light py-3 px-2">{{ $post->slug }}</p>
                                </div>
                                <hr>
                                <div class="post-description text-left  border-start border-primary border-3 pl-2">
                                    <h4>Post Short Description</h4>
                                    <p class="my-3 bg-light py-3 px-2">{!! $post->excerpt !!}</p>
                                </div>
                                <hr>
                                <div class="post-description text-left  border-start border-primary border-3 pl-2">
                                    <h4>Post Long Description</h4>
                                    <div class="my-3 bg-light py-3 px-2 post-description">
                                        <span class="">{!! $post->description !!}</span>
                                    </div>
                                </div>
                                @if($post->user->name)
                                <hr>
                                <div class="post-description text-left  border-start border-primary border-3 pl-2">
                                    <h4>Post Author</h4>
                                    <p class="my-3 bg-light py-3 px-2">
                                        {{ $post->user->name }}
                                    </p>
                                </div>
                                @endif
                                @if($post->updated_by)
                                <hr>
                                <div class="post-description text-left  border-start border-primary border-3 pl-2">
                                    <h4>Post Updated By</h4>
                                    <p class="my-3 bg-light py-3 px-2">
                                        {{ $post->postUpdatedBy->updated_by }}
                                    </p>
                                </div>
                                @endif
                                <hr>
                                <div class="post-description text-left  border-start border-primary border-3 pl-2">
                                    <h4>Post Created At</h4>
                                    <p class="my-3 bg-light py-3 px-2">
                                        {{ Carbon\Carbon::parse($post->created_at)->toDayDateTimeString() }}
                                    </p>
                                </div>
                                <hr>
                                <div class="post-description text-left  border-start border-primary border-3 pl-2">
                                    <h4>Post Updated At</h4>
                                    <p class="my-3 bg-light py-3 px-2">
                                        {{ Carbon\Carbon::parse($post->updated_at)->toDayDateTimeString() }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <h5 class="mb-5">View Post</h5>
                                <div class="card">
                                    <div class="card-header">
                                        <p>Featured Image</p>
                                        
                                    </div>
                                    <div class="card-body p-0">
                                        <img src="{{ Storage::disk('public')->url('posts/'.$post->featured_image) }}" width="100%" height="150px" alt="">
                                    </div>
                                </div>
                                <div class="card mt-4">
                                    <div class="card-header">
                                        <p>Tags</p>
                                    </div>
                                    <div class="card-body">
                                        <ul>
                                            @foreach($tags as $tag)
                                            @foreach($post->tags as $postTag)
                                            @if($tag->id == $postTag->id)
                                                <li  class="flex">{{ $tag->tag_name }}</li>
                                            @endif
                                            @endforeach
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="card mt-4">
                                    <div class="card-header">
                                        <p>Category</p>
                                    </div>
                                    <div class="card-body">
                                        <ul>
                                            @foreach($categories as $category)
                                            @foreach($post->categories as $postCategory)
                                            @if($category->id == $postCategory->id)
                                                <li  class="flex">{{ $category->category_name }}</li>
                                            @endif
                                            @endforeach
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="card mt-4">
                                    <div class="card-header">
                                        <p>Post</p>
                                    </div>
                                    <div class="card-body">
                                        <p>Post link</p>
                                        <p>Post link</p>
                                        <p>Post link</p>
                                        <p>Post link</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
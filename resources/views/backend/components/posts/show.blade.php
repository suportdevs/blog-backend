<x-admin-layout>
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb align-items-center mb-0">
                        <li class=""> <a href="{{ url('/dashboard') }}"><i class="mdi mdi-view-dashboard-outline"></i> Dashboard /</a> </li>
                        <li class=" active"><a href="{{ route('admin.posts') }}"><i class="mdi mdi-post-multiple"></i> post / </a></li>
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
                                    <i class="mdi mdi-post-multiple"></i> Post <small class="text-muted">Detail</small>
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
                            <div class="col-md-7">
                                <p class="mb-5"> Displaing all the values of <b>Post - Id: {{ $post->id }}</b></p>
                                <table class="table table-bordered table-striped text-left">
                                    <thead>
                                        <tr>
                                            <th><b>Key</b></th>
                                            <th>Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><b>Id</b></td>
                                            <td>{{ $post->id }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Post Title</b></td>
                                            <td>{{ $post->tile }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Post Slug</b></td>
                                            <td>{{ $post->slug }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Short Description</b></td>
                                            <td>{!! $post->excerpt !!}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Description</b></td>
                                            <td>{!! $post->description !!}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Author</b></td>
                                            <td>
                                                @if($post->user->name)
                                                   {{ $post->user->name }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Updated By</b></td>
                                            <td>
                                                @if($post->updated_by)
                                                   {{ $post->postUpdatedBy->updated_by }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Created At</b></td>
                                            <td>{{ Carbon\Carbon::parse($post->created_at)->toDayDateTimeString() }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Updated At</b></td>
                                            <td>{{ Carbon\Carbon::parse($post->updated_at)->toDayDateTimeString() }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-5">
                                <h5 class="mb-5">View Post</h5>
                                <div class="card">
                                    <div class="card-header">
                                        <p>Featured Image</p>
                                        
                                    </div>
                                    <div class="card-body">
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
<x-admin-layout>
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb align-items-center mb-0">
                        <li class=""> <a href="{{ url('/dashboard') }}"><i class="mdi mdi-view-dashboard-outline"></i> Dashboard /</a> </li>
                        <li class=" active"><a href="{{ route('admin.tags') }}"><i class="mdi mdi-tag-multiple"></i> Tags / </a></li>
                        <li> Edit</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>

    @foreach ($errors->all() as $message)
    <div class="content py-0 mt-0">
        <!-- Top Statistics -->
        <div class="row">
            <div class="alert alert-danger alert-dismissible fade show py-3" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
    @endforeach

    <div class="content-wradminer">
        <div class="content pt-0 mt-0">
            <!-- Top Statistics -->
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <h4 class="card-title mb-0">
                                    <i class="mdi mdi-tag-multiple"></i> Tags <small class="text-muted">Edit</small>
                                </h4>
                                <div class="small text-muted">
                                    Tags Management Dashboard
                                </div>
                            </div>
                            <!--/.col-->
                            <div class="col-4">
                                <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                                    <a href="{{ route('admin.tags') }}" class="btn btn-secondary btn-sm ml-1" data-toggle="tooltip" title="" data-original-title="tags List"><i class="mdi mdi-format-list-bulleted-type"></i> List</a>
                                </div>
                            </div>
                            <!--/.col-->
                        </div>
                        <!--/.row-->

                        <hr>

                        <div class="row mt-4">
                            <div class="col">
                            <form class="form" method="POST" action="{{ route('admin.post.store') }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="title">Title</label> <span class="text-danger">*</span>
                                                <input class="form-control" type="text" name="title" id="title" placeholder="Post Title" value="{{ $post->title }}" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="intro">Intro</label> <span class="text-danger">*</span>
                                                <textarea class="form-control" name="excerpt" id="intro" placeholder="Intro" required="" value="{{ $post->excerpt }}">{{ $post->excerpt }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="description">Content</label> <span class="text-danger">*</span>
                                                <textarea class="form-control" name="description" id="postTextareaEditor" placeholder="Content" value="{{ $post->description }}">{{ $post->description }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="featured_image">Featured Image</label> <span class="text-danger">*</span>
                                                <div class="input-group mb-3">
                                                    <input class="form-control" type="file" name="featured_image" id="featured_image" placeholder="Featured Image" required="" aria-label="Image" aria-describedby="button-image" value="{{ Storage::disk('public')->url('/posts/'.$post->featured_image) }}">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-info" type="button" id="button-image"><i class="fas fa-folder-open"></i> Browse</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="category_id">Category</label> <span class="text-danger">*</span>
                                                <select name="category_id[]" id="category_id" class="form-control select2" multiple="multiple">
                                                    @foreach($categories as $category)
                                                        <option
                                                            @foreach($post->categories as $postCategory)
                                                                {{ $postCategory->id == $category->id ? "selected" : ""}}
                                                            @endforeach
                                                        value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="type">Type</label> <span class="text-danger">*</span>
                                                <select name="type" id="type" class="form-control select2">
                                                    <option
                                                        {{ $post->type ? "selected" : ""}}
                                                        value="{{ $post->type }}">
                                                        @if($post->type ==1)
                                                            Article
                                                        @elseif($post->type == 2)
                                                            News
                                                        @else
                                                            Media
                                                        @endif
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="is_featured">Is Featured</label> <span class="text-danger">*</span>
                                                <select name="is_featured" id="is_featured" class="form-control select2">
                                                    <option value="">Choose any Option</option>
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="tag_id">Tags</label>
                                                <select name="tag_id[]" id="tag_id" class="form-control select2" multiple>
                                                    <option value="">-- Select an Option --</option>
                                                    @foreach($tags as $item)
                                                        <option value="{{ $item->id }}">{{ $item->tag_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="status">Status</label> <span class="text-danger">*</span>
                                                <select name="status" id="status" class="form-control select2">
                                                    <option value="">-- Select an Option --</option>
                                                    <option value="1">Published</option>
                                                    <option value="0">Draft</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="meta_title">Meta Title</label>
                                                <input class="form-control" type="text" name="meta_title" id="meta_title" placeholder="Meta Title">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="meta_keywords">Meta Keywords</label>
                                                <input class="form-control" type="text" name="meta_keywords" id="meta_keywords" placeholder="Meta Keywords">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="meta_description">Meta Description</label>
                                                <input class="form-control" type="text" name="meta_description" id="meta_description" placeholder="Meta Description">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="meta_og_image">Meta Open Graph Image</label>
                                                <input class="form-control" type="text" name="meta_og_image" id="meta_og_image" placeholder="Meta Open Graph Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="meta_og_url">Meta Open Graph URL</label>
                                                <input class="form-control" type="text" name="meta_og_url" id="meta_og_url" placeholder="Meta Open Graph URL">
                                            </div>
                                        </div>
                                    </div>
                                    <div>

                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <button class="btn btn-success" type="submit"><i class="fas fa-plus-circle"></i> Create</button>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="float-right">
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-warning" onclick="history.back(-1)"><i class="fas fa-reply"></i> Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                           <div class="col-sm-12 col-md-12 text-right">
                            <hr/>
                                @if($post->created_at)
                                    <span><b>{{ 'Created At: ' }}</b>{{ Carbon\Carbon::parse($post->created_at)->toDayDateTimeString() }}</span> 
                                @endif
                                @if($post->updated_at)
                                    <span><b>{{ ' Updated At: ' }}</b>{{ Carbon\Carbon::parse($post->updated_at)->diffForHumans() }}</span> 
                                @endif
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script src="{{ asset('backend/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('backend/select2/select2.min.js') }}"></script>
    <script>
        // ClassicEditor
        //     .create( document.querySelector( '#postTextareaEditor' ) )
        //     .then( editor => {
        //         return editor;
        //     } )
        //     .catch( err => {
        //         return err;
        //     } );
            
        // Select2 javascript
        $(document).ready(function() {
            $('.select2').select2({
                theme: "bootstrap",
                placeholder: "-- Choose any Option --"
            });
        });
    </script>
    
    @endpush
</x-admin-layout>
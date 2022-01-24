<x-admin-layout>
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb align-items-center mb-0">
                        <li class=""> <a href="{{ url('/dashboard') }}"><i class="mdi mdi-view-dashboard-outline"></i> Dashboard /</a> </li>
                        <li class=" active"><i class="mdi mdi-file-document-outline"></i> Posts</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    @if($errors->any())
    <div class="content py-0 mt-0">
        <!-- Top Statistics -->
        <div class="row">
            <div class="alert alert-danger alert-dismissible fade show py-3 text-danger" role="alert">
                <ul>
                    @foreach($errors->all() as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
    @endif

    <div class="content-wradminer">
        <div class="content pt-0 mt-0">
            <!-- Top Statistics -->
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <h4 class="card-title mb-0">
                                    <i class="mdi mdi-file-document-outline"></i> Posts <small class="text-muted">Create</small>
                                </h4>
                                <div class="small text-muted">
                                    Posts Management Dashboard </div>
                            </div>
                            <!--/.col-->
                            <div class="col-4">
                                <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                                    <a href="{{ route('admin.posts') }}" class="btn btn-secondary btn-sm ml-1" data-toggle="tooltip" title="" data-original-title="Posts List"><i class="fas fa-list-ul"></i> List</a>
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
                                                <input class="form-control" type="text" name="title" id="title" placeholder="Post Title" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="featured_image">Featured Image</label> <span class="text-danger">*</span>
                                                <div class="input-group mb-3">
                                                    <input class="form-control" type="file" name="featured_image" id="featured_image" placeholder="Featured Image" required="" aria-label="Image" aria-describedby="button-image">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-info" type="button" id="button-image"><i class="fas fa-folder-open"></i> Browse</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="intro">Intro</label> <span class="text-danger">*</span>
                                                <textarea class="form-control" name="excerpt" id="intro" placeholder="Intro" required=""></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="description">Content</label> <span class="text-danger">*</span>
                                                <textarea class="form-control" name="description" id="description" placeholder="Content"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="category_id">Category</label> <span class="text-danger">*</span>
                                                <select name="category_id[]" id="category_id" class="form-control select2" multiple="multiple">
                                                    <option value="">-- Choose any Option --</option>
                                                    @foreach($categories as $item)
                                                    <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="type">Type</label> <span class="text-danger">*</span>
                                                <select name="type" id="type" class="form-control select2">
                                                    <option value="">-- Choose any Option --</option>
                                                    <option value="1">Article</option>
                                                    <option value="2">News</option>
                                                    <option value="3">Media</option>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script> -->
    <script src="{{ asset('backend/select2/select2.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
    <script>
        class MyUploadAdapter {
            constructor(loader) {
                // The file loader instance to use during the upload. It sounds scary but do not
                // worry — the loader will be passed into the adapter later on in this guide.
                this.loader = loader;
            }
            // Starts the upload process.
            upload() {
                return this.loader.file
                    .then(file => new Promise((resolve, reject) => {
                        this._initRequest();
                        this._initListeners(resolve, reject, file);
                        this._sendRequest(file);
                    }));
            }
            // Aborts the upload process.
            abort() {
                if (this.xhr) {
                    this.xhr.abort();
                }
            }
            // Initializes the XMLHttpRequest object using the URL passed to the constructor.
            _initRequest() {
                const xhr = this.xhr = new XMLHttpRequest();
                // Note that your request may look different. It is up to you and your editor
                // integration to choose the right communication channel. This example uses
                // a POST request with JSON as a data structure but your configuration
                // could be different.
                xhr.open('POST', "{{ route('admin.ckeditor.store') }}", true);
                xhr.setRequestHeader('x-csrf-token', '{{ csrf_token() }}');
                xhr.responseType = 'json';
            }
            // Initializes XMLHttpRequest listeners.
            _initListeners(resolve, reject, file) {
                const xhr = this.xhr;
                const loader = this.loader;
                const genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', () => reject(genericErrorText));
                xhr.addEventListener('abort', () => reject());
                xhr.addEventListener('load', () => {
                    const response = xhr.response;
                    // This example assumes the XHR server's "response" object will come with
                    // an "error" which has its own "message" that can be passed to reject()
                    // in the upload promise.
                    //
                    // Your integration may handle upload errors in a different way so make sure
                    // it is done properly. The reject() function must be called when the upload fails.
                    if (!response || response.error) {
                        return reject(response && response.error ? response.error.message : genericErrorText);
                    }
                    // If the upload is successful, resolve the upload promise with an object containing
                    // at least the "default" URL, pointing to the image on the server.
                    // This URL will be used to display the image in the content. Learn more in the
                    // UploadAdapter#upload documentation.
                    resolve({
                        default: response.url
                    });
                });
                // Upload progress when it is supported. The file loader has the #uploadTotal and #uploaded
                // properties which are used e.g. to display the upload progress bar in the editor
                // user interface.
                if (xhr.upload) {
                    xhr.upload.addEventListener('progress', evt => {
                        if (evt.lengthComputable) {
                            loader.uploadTotal = evt.total;
                            loader.uploaded = evt.loaded;
                        }
                    });
                }
            }
            // Prepares the data and sends the request.
            _sendRequest(file) {
                // Prepare the form data.
                const data = new FormData();
                data.append('upload', file);
                // Important note: This is the right place to implement security mechanisms
                // like authentication and CSRF protection. For instance, you can use
                // XMLHttpRequest.setRequestHeader() to set the request headers containing
                // the CSRF token generated earlier by your application.
                // Send the request.
                this.xhr.send(data);
            }
            // ...
        }

        function SimpleUploadAdapterPlugin(editor) {
            editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                // Configure the URL to the upload script in your back-end here!
                return new MyUploadAdapter(loader);
            };
        }
        ClassicEditor
            .create(document.querySelector('#description'), {
                extraPlugins: [SimpleUploadAdapterPlugin],
            })
            .then(editor => {
                // Simulate label behavior if textarea had a label
                if (editor.sourceElement.labels.length > 0) {
                    editor.sourceElement.labels[0].addEventListener('click', e => editor.editing.view.focus());
                }
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
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
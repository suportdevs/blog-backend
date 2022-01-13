<x-admin-layout>
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb align-items-center mb-0">
                        <li class=""> <a href="{{ url('/dashboard') }}"><i class="mdi mdi-view-dashboard-outline"></i> Dashboard /</a> </li>
                        <li class=" active"><a href="{{ route('admin.tags') }}"><i class="mdi mdi-tag-multiple"></i> Tags / </a></li>
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
                                    <i class="mdi mdi-tag-multiple"></i> Tags <small class="text-muted">Detail</small>
                                </h4>
                                <div class="small text-muted">
                                    Tags Management Dashboard
                                </div>
                            </div>
                            <!--/.col-->
                            <div class="col-4">
                                <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                                    <button type="button" class="btn btn-warning btn-sm" onclick="history.back(-1)"><i class="mdi mdi-reply"></i></button>
                                    <a href="{{ url('/admin/tags/edit/'.$tag->id, $tag->slug) }}" class="btn btn-secondary btn-sm ml-1" data-toggle="tooltip" title="" data-original-title="tags List"><i class="mdi mdi-wrench"></i> Edit</a>
                                </div>
                            </div>
                            <!--/.col-->
                        </div>
                        <!--/.row-->

                        <hr>

                        <div class="row mt-4 text-center">
                            <div class="col-md-7">
                                <p class="mb-5"> Displaing all the values of <b>{{ $tag->tag_name }} - Id: {{ $tag->id }}</b></p>
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
                                            <td>{{ $tag->id }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Name</b></td>
                                            <td>{{ $tag->tag_name }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Slug</b></td>
                                            <td>{{ $tag->slug }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Description</b></td>
                                            <td>{{ $tag->description }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Author</b></td>
                                            <td>{{ $tag->user->name }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Updated By</b></td>
                                            <td>{{ $tag->user->name }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Created At</b></td>
                                            <td>{{ Carbon\Carbon::parse($tag->created_at)->toDayDateTimeString() }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Updated At</b></td>
                                            <td>{{ Carbon\Carbon::parse($tag->updated_at)->toDayDateTimeString() }}</td>
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
                                        <img src="{{ asset($tag->image) }}" width="100%" height="150px" alt="">
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
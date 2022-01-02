<x-admin-layout>
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb align-items-center mb-0">
                        <li class=""> <a href="{{ url('/dashboard') }}"><i class="mdi mdi-view-dashboard-outline"></i> Dashboard /</a> </li>
                        <li class=" active"><a href="{{ route('admin.tags') }}"><i class="mdi mdi-tag-multiple"></i> Tags /</a></li>
                        <li> Create</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>

    @foreach($errors->all() as $message)
    <div class="content py-0 mt-0">
        <!-- Top Statistics -->
        <div class="row">
            <div class="alert alert-danger alert-dismissible fade show py-3 text-danger" role="alert">
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
                                    <i class="mdi mdi-tag-multiple"></i> Tags <small class="text-muted">Create</small>
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
                                <form action="{{ route('admin.tags.store') }}" class="form" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row justify-content-center">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="name">Name</label> <span class="text-danger">*</span>
                                                <input class="form-control" type="text" name="tag_name" id="name" placeholder="Tag Name" require="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="image">Image</label> <span class="text-danger">*</span>
                                                <input type="file" name="tag_img" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea class="form-control" name="description" id="description" placeholder="Description"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <button class="btn btn-success btn-sm" type="submit"><i class="mdi mdi-plus-circle"></i> Create</button>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="float-right">
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-warning btn-sm" onclick="history.back(-1)"><i class="mdi mdi-reply"></i> Cancel</button>
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
</x-admin-layout>
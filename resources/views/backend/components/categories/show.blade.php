<x-admin-layout>
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb align-items-center mb-0">
                        <li class=""> <a href="{{ url('/dashboard') }}"><i class="mdi mdi-view-dashboard-outline"></i> Dashboard /</a> </li>
                        <li class=" active"><a href="{{ route('admin.categories') }}"><i class="mdi mdi-sitemap"></i> Categories / </a></li>
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
                                    <i class="mdi mdi-sitemap"></i> Categories <small class="text-muted">Detail</small>
                                </h4>
                                <div class="small text-muted">
                                    Categories Management Dashboard
                                </div>
                            </div>
                            <!--/.col-->
                            <div class="col-4">
                                <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                                    <button type="button" class="btn btn-warning btn-sm" onclick="history.back(-1)"><i class="mdi mdi-reply"></i></button>
                                    <a href="{{ url('/admin/categories/edit/'.$category->id, $category->slug) }}" class="btn btn-secondary btn-sm ml-1" data-toggle="tooltip" title="" data-original-title="Categories List"><i class="mdi mdi-wrench"></i> Edit</a>
                                </div>
                            </div>
                            <!--/.col-->
                        </div>
                        <!--/.row-->

                        <hr>

                        <div class="row mt-4 text-center">
                            <div class="col-md-7">
                                <p class="mb-5"> Displaing all the values of <b>{{ $category->category_name }} - Id: {{ $category->id }}</b></p>
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
                                            <td>{{ $category->id }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Name</b></td>
                                            <td>{{ $category->category_name }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Slug</b></td>
                                            <td>{{ $category->slug }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Description</b></td>
                                            <td>{{ $category->description }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Author</b></td>
                                            <td>{{ $category->user->name }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Created At</b></td>
                                            <td>{{ Carbon\Carbon::parse($category->created_at)->toDayDateTimeString() }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Updated At</b></td>
                                            <td>{{ Carbon\Carbon::parse($category->updated_at)->toDayDateTimeString() }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-5">
                                <h5 class="mb-5">View Post</h5>
                                <div class="card">
                                    <div class="card-header">
                                        <p>Post</p>
                                        
                                    </div>
                                    <div class="card-body">
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
<x-admin-layout>
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb align-items-center mb-0">
                        <li class=""> <a href="{{ url('/dashboard') }}"><i class="mdi mdi-view-dashboard-outline"></i> Dashboard /</a> </li>
                        <li class=" active"><i class="mdi mdi-sitemap"></i> Posts</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    @if(session('status'))
    <div class="content py-0 mt-0">
        <!-- Top Statistics -->
        <div class="row">
            <div class="alert alert-success alert-dismissible fade show py-3" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
    @endif
        
    <div class="content-wradminer">
        <div class="content pt-0 mt-0">
            <!-- Top Statistics -->
            <div class="row">
                <div class="card w-100">
                    <div id="tablewrap" class="card-body">
                        <div class="row mb-3 align-items-center">
                            <div class="col-8">
                                <h4 class="card-title mb-0">
                                    <i class="mdi mdi-sitemap"></i> Posts <small class="text-muted">Data Table List</small>
                                </h4>
                                <div class="small text-muted"> Posts Management Dashboard </div>
                            </div>
                            <div class="col-4">
                                <div class="float-right">
                                    <a href="{{ url('/admin/posts/create') }}" class="btn btn-success btn-sm" data-toggle="tooltip" title="Add Category" data-original-title="Create Comment">
                                        <i class="mdi mdi-plus"></i>
                                    </a>
                                    <div class="btn-group" role="group" aria-label="Toolbar button groups">
                                        <div class="btn-group" role="group">
                                            <button id="btnGroupToolbar" type="button" class="btn btn-secondary dropdown-toggle btn-sm align-items-center" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-toggle="tooltip" title="More" data-original-title="More">
                                                <i class="mdi mdi-settings-outline"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="btnGroupToolbar" data-popper-placement="bottom-end">
                                                <a class="dropdown-item" href="{{ url('/admin/posts/trashed') }}"><i class="mdi mdi-eye-off-outline"></i> View trash </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table  id="dataTables" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Slug</th>
                                    <th>Image</th>
                                    <th>Created At</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php ($i=1)
                                @foreach($posts as $item)
                                <tr>
                                    <td>{{ $i ++ }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->slug }}</td>
                                    <td><img src="{{Storage::disk('public')->url('public/posts/'.$item->featured_image)}}" width="60px" height="60px" alt=""></td>
                                    <td>{{ $item->created_at }}</td>
                                    <td><div class="btn btn-primary btn-sm">show</div></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
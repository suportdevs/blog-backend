<x-admin-layout>
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb align-items-center mb-0">
                        <li class=""> <a href="{{ url('/dashboard') }}"><i class="mdi mdi-view-dashboard-outline"></i> Dashboard /</a> </li>
                        <li class=" active"><i class="mdi mdi-sitemap"></i> Categories</li>
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
                                    <i class="mdi mdi-sitemap"></i> Categories <small class="text-muted">Data Table List</small>
                                </h4>
                                <div class="small text-muted"> Categories Management Dashboard </div>
                            </div>
                            <div class="col-4">
                                <div class="float-right">
                                    <a href="{{ url('/categories/create') }}" class="btn btn-success btn-sm" data-toggle="tooltip" title="Add Category" data-original-title="Create Comment">
                                        <i class="mdi mdi-plus"></i>
                                    </a>
                                    <div class="btn-group" role="group" aria-label="Toolbar button groups">
                                        <div class="btn-group" role="group">
                                            <button id="btnGroupToolbar" type="button" class="btn btn-secondary dropdown-toggle btn-sm align-items-center" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-toggle="tooltip" title="More" data-original-title="More">
                                                <i class="mdi mdi-settings-outline"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="btnGroupToolbar" data-popper-placement="bottom-end">
                                                <a class="dropdown-item" href="{{ url('/admin/categories/trashed') }}"><i class="mdi mdi-eye-off-outline"></i> View trash </a>
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
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Updated At</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($categories->count())
                                    @php($i = 1)
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{ $i ++ }}</td>
                                            <td>{{ $category->category_name }}</td>
                                            <td>{{ $category->slug }}</td>
                                            <td>
                                                @if($category->created_at == NULL)
                                                    <span class="text-danger">Data not set</span>
                                                @else
                                                    {{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}
                                                @endif
                                            </td>
                                            <td class="text-right text-white">
                                                <a href="{{ url('/admin/categories/edit/'.$category->id, $category->slug) }}" class="btn-primary btn btn-sm"><i class="mdi mdi-wrench"></i></a>
                                                <a href="{{ url('/admin/categories/show/'.$category->id, $category->slug) }}" class="btn-warning btn btn-sm text-white"><i class="mdi mdi-monitor-multiple"></i></a>
                                                <a href="{{ url('/admin/categories/delete/'.$category->id) }}" class="btn-danger btn btn-sm"><i class="mdi mdi-trash-can-outline"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else 
                                <tr>
                                    <td colspan="5" class="text-center"><h5 class="text-danger">Something went Wrong !</h5>
                                    <p>Data not Found</p></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
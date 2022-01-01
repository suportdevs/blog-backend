<x-admin-layout>
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb align-items-center mb-0">
                        <li class=""> <a href="{{ url('/dashboard') }}"><i class="mdi mdi-view-dashboard-outline"></i> Dashboard /</a> </li>
                        <li class=""> <a href="{{ route('admin.tags') }}"><i class="mdi mdi-tag-multiple"></i> Tags /</a> </li>
                        <li class=" active"> Trashed</li>
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
                                    <i class="mdi mdi-tag-multiple"></i> Tags <small class="text-muted">Trashed</small>
                                </h4>
                                <div class="small text-muted"> Tags Management Dashboard </div>
                            </div>
                            <div class="col-4">
                                <div class="float-right">
                                    <a href="{{ route('admin.tags') }}" class="btn btn-secondary btn-sm ml-1" data-toggle="tooltip" title="" data-original-title="tags List"><i class="mdi mdi-format-list-bulleted-type"></i> List</a>
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
                                @if($tags->count())
                                    @php($i = 1)
                                    @foreach($tags as $tag)
                                        <tr>
                                            <td>{{ $i ++ }}</td>
                                            <td>{{ $tag->tag_name }}</td>
                                            <td>{{ $tag->slug }}</td>
                                            <td>
                                                @if($tag->created_at == NULL)
                                                    <span class="text-danger">Data not set</span>
                                                @else
                                                    {{ Carbon\Carbon::parse($tag->created_at)->diffForHumans() }}
                                                @endif
                                            </td>
                                            <td class="text-right text-white">
                                                <a href="{{ url('/admin/tags/restore/'.$tag->id,$tag->slug) }}" class="btn-primary btn btn-sm"><i class="mdi mdi-restore"></i>Restore</a>
                                                <a href="{{ url('/admin/tags/forceDelete/'.$tag->id,$tag->slug) }}" class="btn-danger btn btn-sm"><i class="mdi mdi-trash-can-outline"></i> Delete</a>
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
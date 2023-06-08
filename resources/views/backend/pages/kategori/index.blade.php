
@extends('backend.layouts.master')

@section('title')
Admins - Admin Panel
@endsection

@section('styles')
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    
@endsection


@section('admin-content')

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left font-weight-bold font-weight-bold">Master Kategori Explore</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><span> Kategori Explore</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            @include('backend.layouts.partials.logout')
        </div>
    </div>
</div>
<!-- page title area end -->

<div class="main-content-inner">
    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title float-left">Kategori Explore</h4>
                    <div class="float-right mb-2">
                       
                                            <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Create New Kategori Explore
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create Kategori Explore</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <form action="{{ route('kategori-explore-store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="text" name="kategori" class="form-control" id="">
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save </button>
                            </div>
                        </form>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="data-tables">
                        @include('backend.layouts.partials.messages')
                        <table id="dataTable" class="text-center">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="10%">Kategori</th>
                                    <th width="10%">Manage</th>
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($kategori as $item)
                               <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{$item->kategori}}
                                    </td>
                                    <td>
                                        <a class="btn btn-primary text-white" href="{{ route('manage-explore', $item->id) }}">
                                            Manage Explore
                                        </a>
                                    </td>
                                    <td>
                                      
                                        @if (Auth::guard('admin')->user()->can('Master Destinasi edit'))
                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal{{$item->id}}">
                                                    Edit
                                                </button>
                                                
                                                <!-- Modal -->
                                              
                                        @endif
                                        
                                        @if (Auth::guard('admin')->user()->can('Master Destinasi delete'))
                                        <a class="btn btn-danger text-white" href="{{ route('kategori-explore-delete', $item->id) }}">
                                            Delete
                                        </a>
                                        @endif
                                    </td>
                                </tr>
                               @endforeach

                               @foreach ($kategori as $item)
                               <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Kategori Explore</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                        <form action="{{ route('kategori-explore-update',$item->id) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="text" name="kategori" class="form-control" value="{{ $item->kategori }}" id="">
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save </button>
                                        </div>
                                    </form>
                                    </div>
                                    </div>
                                </div>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- data table end -->
        
    </div>
</div>
@endsection


@section('scripts')
     <!-- Start datatable js -->
     <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
     <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
     <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
     <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
     
     <script>
         /*================================
        datatable active
        ==================================*/
        if ($('#dataTable').length) {
            $('#dataTable').DataTable({
                responsive: true
            });
        }

     </script>
@endsection
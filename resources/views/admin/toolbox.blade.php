@extends('admin.layout.app')
@section('content')

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->


        <div class="row mt-5">

            <div class="col-12">
                <div class="col-md-6">
                    <a href="{{ route('admin.toolbox.create') }}" class="btn btn-primary mb-4">Add New</a>

                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-4">Articles</h4>
                        <!-- end nav-->
                        <div class="tab-content">
                            <div class="tab-pane show active" id="basic-datatable-preview">
                                <div id="basic-datatable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            @if(session()->has('deleted'))
                                                <div class="alert alert-success">
                                                    {{ session()->get('deleted') }}
                                                </div>
                                            @endif
                                            @if(session()->has('updated'))
                                                <div class="alert alert-success">
                                                    {{ session()->get('updated') }}
                                                </div>
                                            @endif
                                            <table id="myTable" class="table dt-responsive nowrap w-100 dataTable no-footer dtr-inline" aria-describedby="basic-datatable_info" style="position: relative; width: 1490px;">
                                                <thead>
                                                <tr>
                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" style="width: 246.8px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Date</th>
                                                    <th class="sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" style="width: 184.8px;" aria-label="Office: activate to sort column ascending">Title</th>
                                                    <th class="sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" style="width: 184.8px;" aria-label="Office: activate to sort column ascending">Featured Images</th>
{{--                                                    <th class="sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" style="width: 184.8px;" aria-label="Office: activate to sort column ascending">Body</th>--}}
                                                    <th class="sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" style="width: 93.8px;" aria-label="Age: activate to sort column ascending">Edit</th>
                                                    <th class="sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" style="width: 93.8px;" aria-label="Age: activate to sort column ascending">Delete</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($toolbox as $item)
                                                    <tr class="odd">
                                                        <td class="dtr-control sorting_1" tabindex="0">
                                                            <div style="position: absolute; height: 1px; width: 0px; overflow: hidden;">
                                                                <input type="text" tabindex="0">
                                                            </div>{{ date('Y-m-d', strtotime($item->created_at)) }}</td>
                                                        <td>{{ $item->title }}</td>
                                                        <td><img height="100" width="100" src="{{ asset('toolbox/'.$item->featured_image) }}" alt=""></td>
                                                        <td>
                                                            <a href="{{ route('admin.toolbox.show', $item->id) }}" class="btn btn-sm btn-secondary">View</a>
                                                            <a href="{{ route('admin.toolbox.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                        </td>
                                                        <td>
                                                            <form method="POST" action="{!! route('admin.toolbox.destroy', $item->id) !!}" accept-charset="UTF-8">
                                                                <input name="_method" value="DELETE" type="hidden">
                                                                {{ csrf_field() }}

                                                                <div class="btn-group btn-group-xs pull-right" role="group">


                                                                    <button data-toggle="tooltip" data-placement="top" type="submit" class="btn  btn-sm btn-danger" onclick="return confirm(&quot;Delete Article?&quot;)">
                                                                        <span class="fa flaticon-delete" aria-hidden="true"></span>Delete
                                                                    </button>

                                                                </div>

                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end preview-->

                            <!-- end preview code-->
                        </div>
                        <!-- end tab-content-->
                    </div>
                    <!-- end card body-->
                </div>
                <!-- end card -->
            </div>
        </div><!-- end row -->





    </div>
    <!-- container -->


@endsection

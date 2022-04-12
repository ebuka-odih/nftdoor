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
                    <a href="{{ route('admin.article.create') }}" class="btn btn-primary mb-4">Add New</a>

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
                                            <table id="myTable" class="table dt-responsive nowrap w-100 dataTable no-footer dtr-inline" aria-describedby="basic-datatable_info" style="position: relative; width: 1490px;">
                                                <thead>
                                                <tr>
                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" style="width: 246.8px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Date</th>
                                                    <th class="sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" style="width: 363.8px;" aria-label="Position: activate to sort column ascending">Category</th>
                                                    <th class="sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" style="width: 184.8px;" aria-label="Office: activate to sort column ascending">Title</th>
                                                    <th class="sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" style="width: 184.8px;" aria-label="Office: activate to sort column ascending">Featured Images</th>
                                                    <th class="sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" style="width: 184.8px;" aria-label="Office: activate to sort column ascending">Featured News</th>
                                                    <th class="sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" style="width: 93.8px;" aria-label="Age: activate to sort column ascending">Action</th>
                                                    <th class="sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" style="width: 93.8px;" aria-label="Age: activate to sort column ascending">Delete</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($articles as $item)
                                                <tr class="odd">
                                                    <td class="dtr-control sorting_1" tabindex="0">
                                                        <div style="position: absolute; height: 1px; width: 0px; overflow: hidden;">
                                                            <input type="text" tabindex="0">
                                                        </div>{{ date('Y-m-d', strtotime($item->created_at)) }}</td>
                                                    <td>{{ $item->category->title }}</td>
                                                    <td>
                                                         <span  class="d-inline-block text-truncate" style="max-width: 150px;">
                                                        {{ $item->title }}
                                                         </span>
                                                    </td>
                                                    <td><img height="100" width="100" src="{{ asset('images/'.$item->image) }}" alt=""></td>
                                                    <td>{{ $item->featured() }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.article.show', $item->id) }}" class="btn btn-sm btn-secondary">View</a>
                                                        <a href="{{ route('admin.article.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                    </td>
                                                    <td>
                                                        <form method="POST" action="{!! route('admin.article.destroy', $item->id) !!}" accept-charset="UTF-8">
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
                            <div class="tab-pane" id="basic-datatable-code">
                                <p>Please include following css file at <code>head</code> element</p> <pre>                                                    <span class="html escape hljs xml"><span class="hljs-comment">&lt;!-- Datatables css --&gt;</span><br><span class="hljs-tag">&lt;<span class="hljs-name">link</span> <span class="hljs-attr">href</span>=<span class="hljs-string">"assets/css/vendor/dataTables.bootstrap5.css"</span> <span class="hljs-attr">rel</span>=<span class="hljs-string">"stylesheet"</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"text/css"</span> /&gt;</span><br><span class="hljs-tag">&lt;<span class="hljs-name">link</span> <span class="hljs-attr">href</span>=<span class="hljs-string">"assets/css/vendor/responsive.bootstrap5.css"</span> <span class="hljs-attr">rel</span>=<span class="hljs-string">"stylesheet"</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"text/css"</span> /&gt;</span></span>
                                                </pre>
                                <!-- end highlight-->
                                <p>Make sure to include following js files at end of <code>body</code> element</p> <pre class="mb-0">                                                    <span class="html escape hljs xml"><span class="hljs-comment">&lt;!-- Datatables js --&gt;</span><br><span class="hljs-tag">&lt;<span class="hljs-name">script</span> <span class="hljs-attr">src</span>=<span class="hljs-string">"assets/js/vendor/jquery.dataTables.min.js"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">script</span>&gt;</span><br><span class="hljs-tag">&lt;<span class="hljs-name">script</span> <span class="hljs-attr">src</span>=<span class="hljs-string">"assets/js/vendor/dataTables.bootstrap5.js"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">script</span>&gt;</span><br><span class="hljs-tag">&lt;<span class="hljs-name">script</span> <span class="hljs-attr">src</span>=<span class="hljs-string">"assets/js/vendor/dataTables.responsive.min.js"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">script</span>&gt;</span><br><span class="hljs-tag">&lt;<span class="hljs-name">script</span> <span class="hljs-attr">src</span>=<span class="hljs-string">"assets/js/vendor/responsive.bootstrap5.min.js"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">script</span>&gt;</span><br><br><span class="hljs-comment">&lt;!-- Datatable Init js --&gt;</span><br><span class="hljs-tag">&lt;<span class="hljs-name">script</span> <span class="hljs-attr">src</span>=<span class="hljs-string">"assets/js/pages/demo.datatable-init.js"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">script</span>&gt;</span></span>
                                                </pre>
                                <!-- end highlight--><pre class="mb-0">                                                    <span class="html escape hljs xml"><span class="hljs-tag">&lt;<span class="hljs-name">table</span> <span class="hljs-attr">id</span>=<span class="hljs-string">"basic-datatable"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"table dt-responsive nowrap w-100"</span>&gt;</span><br>    <span class="hljs-tag">&lt;<span class="hljs-name">thead</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">tr</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Name<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Position<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Office<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Age<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Start date<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Salary<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>        <span class="hljs-tag">&lt;/<span class="hljs-name">tr</span>&gt;</span><br>    <span class="hljs-tag">&lt;/<span class="hljs-name">thead</span>&gt;</span><br><br><br>    <span class="hljs-tag">&lt;<span class="hljs-name">tbody</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">tr</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Tiger Nixon<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>System Architect<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Edinburgh<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>61<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>2011/04/25<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>$320,800<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>        <span class="hljs-tag">&lt;/<span class="hljs-name">tr</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">tr</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Garrett Winters<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Accountant<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Tokyo<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>63<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>2011/07/25<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>$170,750<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>        <span class="hljs-tag">&lt;/<span class="hljs-name">tr</span>&gt;</span><br>    <span class="hljs-tag">&lt;/<span class="hljs-name">tbody</span>&gt;</span><br><span class="hljs-tag">&lt;/<span class="hljs-name">table</span>&gt;</span></span>
                                                </pre>
                                <!-- end highlight-->
                            </div>
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

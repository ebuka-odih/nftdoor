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
        <!-- end page title -->


        <div class="row mt-5">
            <div class="col-10 offset-1">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-4">Add Categories</h4>
                        <div class="tab-content">
                            <div class="tab-pane show active" id="floating-preview">

                                <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        @if(session()->has('failed'))
                                            <div class="alert alert-danger">
                                                {{ session()->get('failed') }}
                                            </div>
                                        @endif

                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <div class="col-lg-6">
                                            <div class="form-group mb-3">
                                                <label for="floatingInput">Name</label>
                                                <input type="text" name="title" class="form-control form-control-lg" id="floatingInput" placeholder="Solana NFT">
                                                <input type="hidden"  name="slug" class="form-control form-control-lg" id="floatingInput" >

                                            </div>
                                        </div>

                                        <div class="col-lg-12 mt-4">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>

                                    </div>

                                </form>
                            </div>

                        </div> <!-- end tab-content-->
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div><!-- end col -->
        </div><!-- end row -->





    </div>
    <!-- container -->


@endsection

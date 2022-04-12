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
            <div class="col-8 offset-1">

                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-5">Change Password</h4>
                        <div class="tab-content">
                            <div class="tab-pane show active" id="floating-preview">
                                @if(session()->has('success'))
                                    <div class="alert alert-success">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif

                                <form action="{{ route('admin.store_password') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label for="floatingInput">Old Password</label>
                                                <input type="text" name="current_password" class="form-control form-control-lg" id="floatingInput" >

                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label for="floatingInput">New Password</label>
                                                <input type="text" name="new_password" class="form-control form-control-lg" id="floatingInput" >

                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label for="floatingInput">Confirm Password</label>
                                                <input type="text" name="new_confirm_password" class="form-control form-control-lg" id="floatingInput" >

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

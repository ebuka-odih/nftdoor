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

        <div class="row">

            <div class="col-lg-6 col-xxl-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Featured Image</h5>
                        <div dir="ltr">
                            <div class="mt-3 chartjs-chart" style="height: 450px;">
                                <img height="450" width="450" src="{{ asset('nft-giveaway/'.$nft_giveaway->featured_image) }}" alt="">

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card-->

            </div>

            <div class="col-xxl-8 col-lg-6">
                <!-- project card -->
                <div class="card d-block">
                    <div class="card-body">
                        <a href="{{ route('admin.nft-giveaway.index') }}" class="btn btn-sm btn-link"><-Back</a><br>
                        <hr>

                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="dripicons-dots-3"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="{{ route('admin.nft-giveaway.edit', $nft_giveaway->id) }}" class="dropdown-item"><i class="mdi mdi-pencil me-1"></i>Edit</a>
                                <!-- item-->
                                <form method="POST" action="{!! route('admin.nft-giveaway.destroy', $nft_giveaway->id) !!}" accept-charset="UTF-8">
                                    <input name="_method" value="DELETE" type="hidden">
                                    {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">


                                        <button data-toggle="tooltip" data-placement="top" type="submit" class="btn  btn-sm btn-danger" onclick="return confirm(&quot;Delete NFT Giveaway?&quot;)">
                                            <span class="fa flaticon-delete" aria-hidden="true"></span>Delete
                                        </button>

                                    </div>

                                </form>
                                <!--                                <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-delete me-1"></i>Delete</a>-->
                                <!-- item-->
                            </div>
                        </div>
                        <!-- project title-->
                        <h3 class="mt-0 mb-3">
                            {{ $nft_giveaway->name }}
                        </h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <h5>Created Date</h5>
                                    <p>{{ date('d M Y', strtotime($nft_giveaway->created_at)) }} </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <h5>Updated Date</h5>
                                    <p>{{ date('d M Y', strtotime($nft_giveaway->updated_at)) }} </p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="">
                                    <h5>Start Date</h5>
                                    <p>{{ date('d M Y', strtotime($nft_giveaway->start_date)) }} </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="">
                                    <h5>End Date</h5>
                                    <p>{{ date('d M Y', strtotime($nft_giveaway->end_date)) }} </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="">
                                    <h5>End In</h5>
                                    <p>{{ $nft_giveaway->ends_in }} </p>
                                </div>
                            </div>
                        </div>


                        {{--                        <h5>Project Overview:</h5>--}}

                        <p class="text-muted mb-2">
                            {!! $nft_giveaway->body !!}
                        </p>


                    </div> <!-- end card-body-->

                </div> <!-- end card-->

                <!-- end card-->
            </div> <!-- end col -->


        </div>


    </div>
    <!-- container -->



@endsection

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
                            <div class="mt-3 chartjs-chart" style="height: 460px;">
                                <img height="450" width="450" src="{{ asset('nft-images/'.$nft->featured_image) }}" alt="">
                                <h4 class="mb-5">Price: {{ $nft->price }} {{ $nft->network }}</h4>
                                <br>

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
                        <a href="{{ route('admin.nft.index') }}" class="btn btn-sm btn-link"><-Back</a><br>
                        <hr>

                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="dripicons-dots-3"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="{{ route('admin.nft.edit', $nft->id) }}" class="dropdown-item"><i class="mdi mdi-pencil me-1"></i>Edit</a>
                                <!-- item-->
                                <form method="POST" action="{!! route('admin.nft.destroy', $nft->id) !!}" accept-charset="UTF-8">
                                    <input name="_method" value="DELETE" type="hidden">
                                    {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs " role="group">
                                        <button data-toggle="tooltip" data-placement="top" type="submit" class="btn  btn-sm btn-danger" onclick="return confirm(&quot;Delete NFT?&quot;)">
                                            <span class="fa flaticon-delete" aria-hidden="true"></span>Delete
                                        </button>

                                    </div>

                                </form>
{{--                                <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-delete me-1"></i>Delete</a>--}}
                                <!-- item-->
                            </div>
                        </div>
                        <!-- project title-->
                        <h3 class="mt-0 mb-3">
                            {{ $nft->name }}
                        </h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <h5>Created Date</h5>
                                    <p>{{ date('d M Y', strtotime($nft->created_at)) }} <small class="text-muted">{{ date('h:i A', strtotime($nft->created_at)) }}</small></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <h5>Updated Date</h5>
                                    <p>{{ date('d M Y', strtotime($nft->updated_at)) }} <small class="text-muted">{{ date('h:i A', strtotime($nft->updated_at)) }}</small></p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="">
                                    <h5>Profit</h5>
                                    <p class="text-success">{{ $nft->profit  }}%
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="">
                                    <h5>Supply</h5>
                                    <p>{{ $nft->supply }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="">
                                    <h5>Network</h5>
                                    <p>{{ $nft->network }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="">
                                    <h5>Presale</h5>
                                    <p>{{ $nft->pre_sale }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="">
                                    <h5>Floor Price</h5>
                                    <p>{{ $nft->floor_price  }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="">
                                    <h5>Owners</h5>
                                    <p>{{ $nft->owners }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="">
                                    <h5>24hr Change</h5>
                                    <p>{{ $nft->change24 }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="">
                                    <h5>Asset</h5>
                                    <p>{{ $nft->asset }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="badge bg-secondary text-light mb-3">{{ $nft->title }}</div>

                        {{--                        <h5>Project Overview:</h5>--}}

                        <p class="text-muted mb-2">
                            {!! $nft->description !!}
                        </p>




                    </div> <!-- end card-body-->

                </div> <!-- end card-->

                <!-- end card-->
            </div> <!-- end col -->


        </div>


    </div>
    <!-- container -->


@endsection

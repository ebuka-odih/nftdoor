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
            <div class="col-10 offset-1">

                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-4">Edit NFT Listing</h4>
                        <a href="{{ route('admin.nft.index') }}" class="btn btn-sm btn-link mb-2"><-Back</a>
                        <div class="tab-content">

                            <div class="tab-pane show active" id="floating-preview">

                                <form action="{{ route('admin.nft.update', $nft->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
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

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group mb-3">
                                                    <label for="floatingInput">Name</label>
                                                    <input type="text" name="name" value="{{ old('name', optional($nft)->name) }}" class="form-control form-control" id="floatingInput" placeholder="Bored Ape">

                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="floatingPassword">Featured Image</label><br>
                                                    <input type="file" name="featured_image" class="form-control-file" id="floatingPassword">
                                                </div>
                                                <img class="mt-3 mb-3" height="70" width="70" src="{{ asset('nft-images/'.$nft->featured_image) }}" alt="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group mb-3">
                                                    <label for="floatingInput">Price</label>
                                                    <input type="text" name="price" value="{{ old('price', optional($nft)->price) }}" class="form-control form-control" id="floatingInput" placeholder="0.2">

                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="floatingPassword">Supply</label><br>
                                                    <input type="number" name="supply" value="{{ old('supply', optional($nft)->supply) }}" class="form-control" id="floatingPassword" placeholder="100">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group mb-3">
                                                    <label for="floatingInput">Network</label>
                                                    <select name="network" id="" class="form-control">
                                                        <option selected disabled>Choose network</option>
                                                        <option value="ETH">Ethereum</option>
                                                        <option value="SOL">Solana</option>
                                                        <option value="BNB">Binance Coin</option>
                                                    </select>
                                                    <small>current: {{ $nft->network }}</small>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="floatingPassword">Profit</label><br>
                                                    <input type="text" name="profit" value="{{ old('profit', optional($nft)->profit) }}" class="form-control" id="floatingPassword" placeholder="+30">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="floatingPassword">Presale Date</label><br>
                                                    <input type="date" name="pre_sale" value="{{ old('pre_sale', date('Y-m-d')) }}"  class="form-control" id="floatingPassword" placeholder="today">
                                                </div>
{{--                                                <small>{{ $nft->pre_sale }}</small>--}}
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="form-group mb-3">
                                                    <label for="floatingInput">Floor Price</label>
                                                    <input type="text" name="floor_price" value="{{ old('floor_price', optional($nft)->floor_price) }}" class="form-control" id="floatingPassword" placeholder="3.0">
                                                </div>
                                                <small>{{ $nft->pre_sale }}</small>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="floatingPassword">24/hr Change</label><br>
                                                    <input type="text" name="change24" value="{{ old('change24', optional($nft)->change24) }}" class="form-control" id="floatingPassword" placeholder="300.4%">
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="floatingPassword">Owner</label><br>
                                                    <input type="text" name="owners" value="{{ old('owners', optional($nft)->owners) }}" class="form-control" id="floatingPassword" placeholder="3.5k">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="floatingPassword">Asset</label><br>
                                                    <input type="text" name="asset" value="{{ old('asset', optional($nft)->asset) }}" class="form-control" id="floatingPassword" placeholder="9.4k">
                                                </div>
                                            </div>

                                        </div>


                                        <div class="col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label for="floatingPassword">Description</label><br>
                                                <textarea class="ckeditor form-control" cols="10" rows="10" name="description">
                                                    {{ old('description', optional($nft)->description) }}
                                                </textarea>
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


    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });

        CKEDITOR.replace('wysiwyg-editor', {
            filebrowserUploadUrl: "{{route('admin.article.store', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>


@endsection

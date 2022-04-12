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
                        <h4 class="header-title mb-4">Add NFT Listing</h4>
                        <div class="tab-content">
                            <div class="tab-pane show active" id="floating-preview">

                                <form action="{{ route('admin.nft.store') }}" method="POST" enctype="multipart/form-data">
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

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group mb-3">
                                                    <label for="floatingInput">Name</label>
                                                    <input type="text" name="name" class="form-control form-control" id="floatingInput" placeholder="Bored Ape">

                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="floatingPassword">Featured Image</label><br>
                                                    <input type="file" name="featured_image" required class="form-control-file" id="floatingPassword">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group mb-3">
                                                    <label for="floatingInput">Price</label>
                                                    <input type="text" name="price" class="form-control form-control" id="floatingInput" placeholder="0.2">

                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="floatingPassword">Supply</label><br>
                                                    <input type="number" name="supply" class="form-control" id="floatingPassword" placeholder="100">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group mb-3">
                                                    <label for="floatingInput">Network</label>
                                                    <select name="network" id="" class="form-control">
                                                        <option value="ETH">Ethereum</option>
                                                        <option value="SOL">Solana</option>
                                                        <option value="BNB">Binance Coin</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="floatingPassword">Profit</label><br>
                                                    <input type="text" name="profit" class="form-control" id="floatingPassword" placeholder="+30">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="floatingPassword">Presale Date</label><br>
                                                    <input type="date" name="pre_sale" class="form-control" id="floatingPassword" placeholder="today">
                                                </div>
                                            </div>
                                        </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="form-group mb-3">
                                                        <label for="floatingInput">Floor Price</label>
                                                        <input type="text" name="floor_price" class="form-control" id="floatingPassword" placeholder="3.0">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="floatingPassword">24/hr Change</label><br>
                                                        <input type="text" name="change24" class="form-control" id="floatingPassword" placeholder="300.4%">
                                                    </div>
                                                </div>

                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="floatingPassword">Owner</label><br>
                                                        <input type="text" name="owners" class="form-control" id="floatingPassword" placeholder="3.5k">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="floatingPassword">Asset</label><br>
                                                        <input type="text" name="asset" class="form-control" id="floatingPassword" placeholder="9.4k">
                                                    </div>
                                                </div>

                                            </div>


                                        <div class="col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label for="floatingPassword">Description</label><br>
                                                <textarea class="ckeditor form-control" cols="10" rows="10" name="description"></textarea>
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

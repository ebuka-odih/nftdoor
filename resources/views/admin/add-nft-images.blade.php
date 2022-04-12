@extends('admin.layout.app')
@section('content')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        .wrap {
            padding: 30px 0;
        }
        h2 {
            margin-bottom: 30px;
        }
    </style>

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
                        <h4 class="header-title mb-4">Add NFT Images</h4>
                        <div class="tab-content">
                            <div class="tab-pane show active" id="floating-preview">

                                <div class="wrap">
                                    <h2>Upload images for your NFT</h2>
                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-success alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @foreach(Session::get('image') as $img)
                                            <img src="nft-images/{{ $img }}" style="width:100px;">
                                        @endforeach
                                    @endif
                                    @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                            <strong>Whoops!</strong> There were some problems with your file.
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form action="{{ route('admin.nft_gallery', $nft->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="nft_id" value="{{ $nft->id }}">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="file" name="images[]" multiple>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="submit" class="btn btn-info">Upload</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>

                        </div> <!-- end tab-content-->
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div><!-- end col -->
        </div><!-- end row -->





    </div>
    <!-- container -->

    <script type="text/javascript">
        $(document).ready(function() {
            $(".btn-success").click(function(){
                var lsthmtl = $(".clone").html();
                $(".increment").after(lsthmtl);
            });
            $("body").on("click",".btn-danger",function(){
                $(this).parents(".hdtuto control-group lst").remove();
            });
        });
    </script>
@endsection

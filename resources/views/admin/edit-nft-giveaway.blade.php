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
                        <h4 class="header-title mb-4">Edit NFT Giveaway</h4>
                        <div class="tab-content">
                            <div class="tab-pane show active" id="floating-preview">

                                <form action="{{ route('admin.nft-giveaway.update', $nft_giveaway->id) }}" method="POST" enctype="multipart/form-data">
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
                                                    <input type="text" name="name" value="{{ old('name', optional($nft_giveaway)->name) }}" class="form-control form-control" id="floatingInput" placeholder="Bored Ape">

                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="floatingPassword">Featured Image</label><br>
                                                    <input type="file" name="featured_image" class="form-control-file" id="floatingPassword">
                                                </div>
                                                <img class="mt-2 mb-3" height="70" width="70" src="{{ asset('nft-giveaway/'.$nft_giveaway->featured_image) }}" alt="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group mb-3">
                                                    <label for="floatingInput">Start Date</label>
                                                    <input type="date" name="start_date" value="{{ old('start_date', optional($nft_giveaway)->start_date) }}" class="form-control form-control" id="floatingInput" placeholder="0.2">

                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="floatingPassword">Ending Date</label><br>
                                                    <input type="date" name="end_date" value="{{ old('end_date', optional($nft_giveaway)->end_date) }}" class="form-control" id="floatingPassword" placeholder="100">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label for="floatingPassword">Description</label><br>
                                                <textarea class="ckeditor form-control" cols="10" rows="10" name="body">
                                                    {{ $nft_giveaway->body }}
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

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
                        <h4 class="header-title mb-4">Add Article</h4>
                        <div class="tab-content">
                            <div class="tab-pane show active" id="floating-preview">

                                    <form action="{{ route('admin.article.store') }}" method="POST" enctype="multipart/form-data">
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
                                                    <label for="floatingInput">Title</label>
                                                    <input type="text" name="title" class="form-control form-control" id="floatingInput" placeholder="The NFTdoor">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="floatingSelect">Works with selects</label>
                                                    <select name="category"  class="form-select form-select" id="floatingSelect" aria-label="Floating label select example">
                                                        <option selected>Select Category</option>
                                                        @foreach($category as $item)
                                                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="floatingPassword">Featured Image</label><br>
                                                    <input type="file" name="image" class="form-control-file" id="floatingPassword">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="floatingSelect">Featured News</label>
                                                    <select name="featured"  class="form-select form-select" id="floatingSelect" aria-label="Floating label select example">
                                                        <option selected>Select Category</option>
                                                        <option value="1">Yes</option>
                                                        <option value="0">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label for="floatingPassword">Body</label><br>
                                                <textarea class="ckeditor form-control" cols="10" rows="10" name="body"></textarea>
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

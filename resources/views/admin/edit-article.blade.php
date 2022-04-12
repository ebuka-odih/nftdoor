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
                        <h4 class="header-title mb-4">Edit Article</h4>
                        <div class="tab-content">
                            <div class="tab-pane show active" id="floating-preview">

                                <form action="{{ route('admin.article.update', $article->id) }}" method="POST" enctype="multipart/form-data">
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

                                        <div class="col-lg-6">
                                            <div class="form-group mb-3">
                                                <label for="floatingInput">Title</label>
                                                <input type="text" name="title" value="{{ old('title', optional($article)->title) }}" class="form-control form-control-lg" id="floatingInput" >

                                            </div>
                                            <div class="form-group">
                                                <label >Featured Image</label><br>
                                                <input type="file" name="image" value="{{ old('image', optional($article)->image) }}"  class="form-control-file" >
                                            </div>
                                        </div>


                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="floatingSelect">Works with selects</label>
                                                <select required name="category"  class="form-select form-select-lg" id="floatingSelect" aria-label="Floating label select example">
                                                    @foreach($category as $item)
                                                        <option value="{{ $item->id}}" {{(old('category') == optional($item)->id)? 'selected':''}}>{{$item->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mt-4">
                                            <div class="form-group">
                                                <textarea  class="ckeditor form-control" cols="10" rows="10" name="body">{{ old('body', optional($article)->body) }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mt-4">
                                            <button type="submit" class="btn btn-primary">Update</button>
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

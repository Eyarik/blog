@extends('admin.layouts.app')

@section('addcss')

<link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  
@endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Post</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <div class="card card-primary">
      @if (count($errors) > 0)

        @foreach ($errors->all() as $error)

          <p class="alert alert-danger">{{ $error }}</p>
          
        @endforeach
        
      @endif

        <form role="form" action="{{ route('post.update',$posts->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="card-body">
            
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="title">Restaurant Name</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $posts->title }}" placeholder="Title">
                     </div>
                    
                    <div class="form-group">
                        <label for="slug">Post Name</label>
                        <input type="text" class="form-control" id="slug" name="slug" value="{{ $posts->slug }}" placeholder="slug">
                    </div>
                </div>
                <div class="col-lg-6">
                  <br>
                    <div class="form-group">
                        <div class="float-right">
                          <label for="image">File input</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" name="image" class="custom-file-input" id="image" value="{{ $posts->image }}">
                              <label class="custom-file-label" for="name">Choose file</label>
                            </div>
                          </div>
                        </div>

                        <div class="form-check float-left">
                          <input name="status" type="checkbox" class="form-check-input" id="status" value="1">
                          <label class="form-check-label" for="status" >Publish</label>
                        </div>
                    </div>
                    <br>
                    <br>
                    {{-- <div class="form-group" style="margin-top: 18px">
                      <label>Select Tags</label>
                      <select class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;" name="tag[]">
                        @foreach ($tags as $tag)
                          <option value="{{ $tag->id }}"
                           
                            @foreach ($posts->tags as $PostTag)

                            @if ($PostTag->id == $tag->id)
                              selected
                            @endif
                              
                            @endforeach
                            
                          >{{ $tag->name }}</option>
                        @endforeach
                        
                      </select>
                    </div>

                    <div class="form-group" style="margin-top: 18px">
                      <label>Select Category</label>
                      <select class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;" name="category[]">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                      
                          @foreach ($posts->categories as $PostCategory)

                          @if ($PostCategory->id == $category->id)
                            selected
                          @endif
                            
                          @endforeach
                        
                        >{{ $category->name }}</option>
                      @endforeach
                      </select>
                    </div> --}}
                </div>
            </div>
            
          </div>

          
          <!-- /.card-body -->
          <section class="content">
              <div class="row">
              <div class="col-md-12">
                  <div class="card card-outline card-info">
                  <div class="card-header">
                      <h3 class="card-title">
                        Description 
                      </h3>
                  </div>
                  <div class="card-body">
                      <textarea id="summernote" name="body" placeholder=" Place Enter some text here">
                        {{ $posts->body }}
                      </textarea>
                  </div>
                  </div>
              </div>
              </div>
          </section>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('post.index') }}" class="btn btn-warning">Back</a>
          </div>
        </form>
    </div>

    <!-- Main content -->
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
    
@endsection


@section('addscript')
  <script src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>
 <script></script>
 <script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()
  
      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
    })
    
  </script>
    <script>
        $(function () {
       
        // Summernote
        $('#summernote').summernote()
    
        // CodeMirror
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed",
            theme: "monokai"
        });
        })
    </script>
@endsection



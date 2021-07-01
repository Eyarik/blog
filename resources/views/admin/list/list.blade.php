@extends('admin.layouts.app')

@section('content')

@section('addcss')

<link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  
@endsection

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>TAG</h1>
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
        <form role="form" action="{{ route('list.store') }}" method="POST">
          @csrf
          <div class="card-body">
            <div class="offset-lg-3 col-lg-6">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Food List">
                    </div>
                <div class="form-group">
                    <label for="slug">Post Name</label>
                    <input type="text" class="form-control" id="slug" name="slug" placeholder="slug">
                </div>
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
                          <textarea id="summernote" name="body" placeholder=" Place Enter some Description About The Restaurant">
                          
                          </textarea>
                      </div>
                      </div>
                  </div>
                  </div>
                </section>
                <div class="form-group" style="margin-top: 18px">
                  <label>Select Restaurant</label>
                  <select class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;" name="category[]">
                    @foreach ($posts as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                  @endforeach
                  </select>
                </div>
                <div class="form-group" style="margin-top: 18px">
                  <label>Select Category</label>
                  <select class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;" name="category[]">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                  @endforeach
                  </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('category.index') }}" class="btn btn-warning">Back</a>
                </div>
            </div>
          </div>
          <!-- /.card-body -->
          
        </form>
    </div>

    <!-- Main content -->
    
    <!-- /.content -->
  </div>
    
@endsection

@section('addscript')
    <script src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>
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
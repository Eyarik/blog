@extends('admin.layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List</h1>
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
        <form role="form" action="{{ route('list.update',$lists->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="card-body">
            <div class="offset-lg-3 col-lg-6">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $lists->title }}" placeholder="Category">
                    </div>
                <div class="form-group">
                    <label for="slug">Post Name</label>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{ $lists->slug }}" placeholder="slug">
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
                            {{ $lists->body }}
                          </textarea>
                      </div>
                      </div>
                  </div>
                  </div>
                </section>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('list.index') }}" class="btn btn-warning">Back</a>
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
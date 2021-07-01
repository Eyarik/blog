@extends('admin.layouts.app')

@section('content')

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
        <form role="form" action="{{ route('category.update',$category->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="card-body">
            <div class="offset-lg-3 col-lg-6">
                <div class="form-group">
                    <label for="name">Menu Category Name</label>
                    <input type="text" class="form-control" id="name" name="category" value="{{ $category->name }}" placeholder="Category">
                    </div>
                <div class="form-group">
                    <label for="slug">Category Post Name</label>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{ $category->slug }}" placeholder="slug">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
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
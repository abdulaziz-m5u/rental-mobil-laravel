@extends('layouts.app')

@section('content')

    <!-- Main content -->
    <section class="content pt-4">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tambah Data</h3>
                <a href="{{ route('admin.blogs.index')}}" class="btn btn-success shadow-sm float-right"> <i class="fa fa-arrow-left"></i> Kembali</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="post" action="{{ route('admin.blogs.update', $blog) }}" enctype="multipart/form-data">
                    @csrf 
                    @method('put')
                    <div class="form-group row border-bottom pb-4">
                        <label for="title" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="title" value="{{ old('title', $blog->title) }}" id="title">
                        </div>
                    </div>
                    <div class="form-group row border-bottom pb-4">
                        <label for="type_id" class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="type_id" id="type_id">
                                @foreach($types as $type)
                                    <option {{ old('type', $blog->type->id) == $type->id ? 'selected' : null }} value="{{ $type->id }}">{{ $type->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row border-bottom pb-4">
                        <label for="image" class="col-sm-2 col-form-label">Gambar</label>
                        <div class="col-sm-10">
                          <input type="file" class="form-control" name="image" value="{{ old('image') }}" id="image">
                        </div>
                    </div>
                    <div class="form-group row border-bottom pb-4">
                        <label for="excerpt" class="col-sm-2 col-form-label">Excerpt</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="excerpt" value="{{ old('excerpt', $blog->excerpt) }}" id="excerpt">
                        </div>
                    </div>
                    <div class="form-group row border-bottom pb-4">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="description" id="description" cols="30" rows="6">{{ old('description', $blog->description) }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row border-bottom pb-4">
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="status" id="status">
                                @foreach($statuses as $no => $status)
                                <option {{ old('status') == $no ? 'selected' : null }} value="{{ $no }}">{{ $status }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Save</button>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@push('script-alt')
<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
<script>


    function SimpleUploadAdapterPlugin( editor ) {
        editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
            // Configure the URL to the upload script in your back-end here!
            return new MyUploadAdapter( loader );
        };
    }

    ClassicEditor
        .create( document.querySelector( '#description' ), {
            extraPlugins: [ SimpleUploadAdapterPlugin ],

            // ...
        })

        .catch( error => {
            console.error( error );
        } );
</script>
@endpush
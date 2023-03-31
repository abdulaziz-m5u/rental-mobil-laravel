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
                <a href="{{ route('admin.teams.index')}}" class="btn btn-success shadow-sm float-right"> <i class="fa fa-arrow-left"></i> Kembali</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="post" action="{{ route('admin.teams.store') }}" enctype="multipart/form-data">
                    @csrf 
                    <div class="form-group row border-bottom pb-4">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="nama" value="{{ old('nama') }}" id="nama">
                        </div>
                    </div>
                    <div class="form-group row border-bottom pb-4">
                        <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="jabatan" value="{{ old('jabatan') }}" id="jabatan">
                        </div>
                    </div>
                    <div class="form-group row border-bottom pb-4">
                        <label for="photo" class="col-sm-2 col-form-label">Photo</label>
                        <div class="col-sm-10">
                          <input type="file" class="form-control" name="photo" value="{{ old('photo') }}" id="photo">
                        </div>
                    </div>
                    <div class="form-group row border-bottom pb-4">
                        <label for="bio" class="col-sm-2 col-form-label">Bio</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="bio" id="bio" cols="30" rows="6">{{ old('bio') }}</textarea>
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
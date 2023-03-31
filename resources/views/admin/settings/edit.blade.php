@extends('layouts.app')

@section('content')

    <!-- Main content -->
    <section class="content pt-4">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Edit Data</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="post" action="{{ route('admin.settings.update', $setting) }}">
                    @csrf 
                    @method('put')
                    <div class="form-group row border-bottom pb-4">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="alamat" value="{{ old('alamat', $setting->alamat) }}" id="alamat">
                        </div>
                    </div>
                    <div class="form-group row border-bottom pb-4">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="email" value="{{ old('email', $setting->email) }}" id="email">
                        </div>
                    </div>
                    <div class="form-group row border-bottom pb-4">
                        <label for="phone" class="col-sm-2 col-form-label">Nomer Perusahaan</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="phone" value="{{ old('phone', $setting->phone) }}" id="phone">
                        </div>
                    </div>
                    <div class="form-group row border-bottom pb-4">
                        <label for="footer_description" class="col-sm-2 col-form-label">Footer Description</label>
                        <div class="col-sm-10">
                          <textarea name="footer_description" id="footer_description" class="form-control" cols="30" rows="6">{{ old('footer_description', $setting->footer_description) }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row border-bottom pb-4">
                        <label for="tentang_perusahaan" class="col-sm-2 col-form-label">Tentang Perusahaan</label>
                        <div class="col-sm-10">
                          <textarea name="tentang_perusahaan" id="tentang_perusahaan" class="form-control" cols="30" rows="6">{{ old('tentang_perusahaan', $setting->tentang_perusahaan) }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row border-bottom pb-4">
                        <label for="sejarah_perusahaan" class="col-sm-2 col-form-label">Sejarah Perusahaan</label>
                        <div class="col-sm-10">
                          <textarea name="sejarah_perusahaan" id="sejarah_perusahaan" class="form-control" cols="30" rows="6">{{ old('sejarah_perusahaan', $setting->sejarah_perusahaan) }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row border-bottom pb-4">
                        <label for="facebook" class="col-sm-2 col-form-label">Facebook</label>
                        <div class="col-sm-10">
                          <input type="text" placeholder="https://example.com"
       pattern="https://.*" class="form-control" name="facebook" value="{{ old('facebook', $setting->facebook) }}" id="facebook">
                        </div>
                    </div>
                    <div class="form-group row border-bottom pb-4">
                        <label for="instagram" class="col-sm-2 col-form-label">Instagram</label>
                        <div class="col-sm-10">
                          <input type="text" placeholder="https://example.com"
       pattern="https://.*" class="form-control" name="instagram" value="{{ old('instagram', $setting->instagram) }}" id="instagram">
                        </div>
                    </div>
                    <div class="form-group row border-bottom pb-4">
                        <label for="linkedin" class="col-sm-2 col-form-label">Linkedin</label>
                        <div class="col-sm-10">
                          <input type="text" placeholder="https://example.com"
       pattern="https://.*" class="form-control" name="linkedin" value="{{ old('linkedin', $setting->linkedin) }}" id="linkedin">
                        </div>
                    </div>
                    <div class="form-group row border-bottom pb-4">
                        <label for="twitter" class="col-sm-2 col-form-label">twitter</label>
                        <div class="col-sm-10">
                          <input type="text" placeholder="https://example.com"
       pattern="https://.*" class="form-control" name="twitter" value="{{ old('twitter', $setting->twitter) }}" id="twitter">
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
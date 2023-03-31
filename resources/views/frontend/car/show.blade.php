@extends('frontend.layout')

@section('content')
<div
        class="hero inner-page"
        style="background-image: url('{{ asset('frontend/images/hero_1_a.jpg') }}')"
      >
        <div class="container">
         
        </div>
      </div>

      <div class="site-section bg-light">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8">
            @if(count($errors) > 0 )
        <div class="content-header mb-0 pb-0">
            <div class="container-fluid">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <ul class="p-0 m-0" style="list-style: none;">
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endif
        @if(session()->has('message'))
            <div class="content-header mb-0 pb-0">
                <div class="container-fluid">
                    <div class="mb-0 alert alert-{{ session()->get('alert-type') }} alert-dismissible fade show" role="alert">
                        <strong>{{ session()->get('message') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div> 
                </div><!-- /.container-fluid -->
            </div>
        @endif
              <h2 class="section-heading"><strong>ISI DATA ANDA</strong></h2>
              <div class="card p-5">
              <form action="{{ route('car.store') }}" method="post">
                @csrf
                <input type="hidden" name="car_id" value="{{ $car->id }}">
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" class="form-control" id="nama" >
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat Lengkap</label>
                    <input type="text" name="alamat_lengkap" value="{{ old('alamat_lengkap') }}" class="form-control" id="alamat" >
                </div>
                <div class="form-group">
                    <label for="nomer_wa">Nomer Hp/Whatsapp</label>
                    <input type="string" name="nomer_wa" value="{{ old('nomer_wa') }}" class="form-control" id="nomer_wa" >
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
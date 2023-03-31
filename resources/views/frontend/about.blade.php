@extends('frontend.layout')

@section('content')
<div class="hero inner-page" style="background-image: url('{{ asset('frontend/images/hero_1_a.jpg') }}');">
        
        <div class="container">
          <div class="row align-items-end ">
            <div class="col-lg-5">

              <div class="intro">
                <h1><strong>About</strong></h1>
                <div class="custom-breadcrumbs"><a href="index.html">Home</a> <span class="mx-2">/</span> <strong>About</strong></div>
              </div>

            </div>
          </div>
        </div>
      </div>

    

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5 mb-lg-0 order-lg-2">
            <img src="{{ asset('frontend/images/hero_2.jpg') }}" alt="Image" class="img-fluid rounded">
          </div>
          <div class="col-lg-4 mr-auto">
            <h2>Car Company</h2>
            <p>{{ $setting->tentang_perusahaan }}</p>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-light">
      <div class="container">
        <div class="row justify-content-center text-center mb-5 section-2-title">
          <div class="col-md-6">
            <h2 class="mb-4">Meet Our Team</h2>
          </div>
        </div>
        <div class="row align-items-stretch">

        @foreach($teams as $team)
          <div class="col-lg-4 col-md-6 mb-5">
            <div class="post-entry-1 h-100 person-1">
              
                <img style="object-fit:cover;height: 80px;width:80px;" src="{{ Storage::url($team->photo) }}" alt="Image"
                 class="img-fluid">
            
              <div class="post-entry-1-contents">
                <span class="meta">{{ $team->jabatan }}</span>
                <h2>{{ $team->nama }}</h2>
                <p>{{ $team->bio }}</p>
              </div>
            </div>
          </div>
        @endforeach

        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <img src="{{ asset('frontend/images/hero_1.jpg') }}" alt="Image" class="img-fluid rounded">
          </div>
          <div class="col-lg-4 ml-auto">
            <h2>Our History</h2>
              <p>{{ $setting->sejarah_perusahaan }}</p>
            </div>
        </div>
      </div>
    </div>
@endsection
@extends('frontend.layout')

@section('content')
<div class="hero" style="background-image: url('{{ asset('frontend/images/hero_1_a.jpg') }}')">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-lg-10">
              <div class="row mb-5">
                <div class="col-lg-7 intro">
                  <h1><strong>Sewa Mobil</strong> Dengan Satu Sentuhan.</h1>
                </div>
              </div>

              <form class="trip-form" method="get" action="{{ route('car.index') }}">
                <div class="row align-items-center">
                  <div class="mb-3 mb-md-0 col-md-4">
                    <select name="category_id" id="category_id" class="custom-select form-control">
                      <option value="">Pilih Kategori Mobil</option>
                      @foreach($types as $type)
                        <option value="{{ $type->id }}">{{ $type->nama }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="mb-3 mb-md-0 col-md-4">
                    <select name="penumpang" id="penumpang" class="custom-select form-control">
                      <option value="">Jumlah Penumpang</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </div>

                  <div class="mb-3 mb-md-0 col-md-4">
                    <input
                      type="submit"
                      value="Cari"
                      class="btn btn-primary btn-block py-3"
                    />
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="site-section">
        <div class="container">
          <h2 class="section-heading"><strong>Cara Pemesanan</strong></h2>
          <p class="mb-5">Langkah yang mudah untuk menyewa mobil</p>

          <div class="row mb-5">
            <div class="col-lg-4 mb-4 mb-lg-0">
              <div class="step">
                <span>1</span>
                <div class="step-inner">
                  <span class="number text-primary">01.</span>
                  <h3>Pilih Mobil</h3>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Vero, laboriosam!
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 mb-4 mb-lg-0">
              <div class="step">
                <span>2</span>
                <div class="step-inner">
                  <span class="number text-primary">02.</span>
                  <h3>Isi Form</h3>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Vero, laboriosam!
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 mb-4 mb-lg-0">
              <div class="step">
                <span>3</span>
                <div class="step-inner">
                  <span class="number text-primary">03.</span>
                  <h3>Pembayaran</h3>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Vero, laboriosam!
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="site-section">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-7 text-center order-lg-2">
              <div class="img-wrap-1 mb-5">
                <img
                  src="{{ asset('frontend/images/feature_01.png') }}"
                  alt="Image"
                  class="img-fluid"
                />
              </div>
            </div>
            <div class="col-lg-4 ml-auto order-lg-1">
              <h3 class="mb-4 section-heading">
                <strong
                  >Kami berkomitmen untuk memberikan pelayanan terbaik</strong
                >
              </h3>
              <p class="mb-5">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Repudiandae, explicabo iste a labore id est quas, doloremque
                veritatis! Provident odit pariatur dolorem quisquam,
                voluptatibus voluptates optio accusamus, vel quasi quidem!
              </p>

              <p><a href="#" class="btn btn-primary">Kontak Kami</a></p>
            </div>
          </div>
        </div>
      </div>

      <div class="site-section bg-light">
        <div class="container">
          <div class="row">
            <div class="col-lg-7">
              <h2 class="section-heading"><strong>Daftar Mobil</strong></h2>
              <p class="mb-5">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
              </p>
            </div>
          </div>

          <div class="row">
          @foreach($cars as $car)
            <div class="col-md-6 col-lg-4 mb-4">
              <div class="listing d-block align-items-stretch">
                <div class="listing-img h-100 mr-4">
                  <img src="{{ Storage::url($car->image) }}" alt="Image" class="img-fluid" />
                </div>
                <div class="listing-contents h-100">
                  <h3>{{ $car->nama_mobil }}</h3>
                  <div class="rent-price">
                    <strong>Rp{{ number_format($car->price,0,",",".") }}</strong><span class="mx-1">/</span>hari
                  </div>
                  <div class="d-block d-md-flex mb-3 border-bottom pb-3">
                    <div class="listing-feature pr-4">
                      <span class="caption">Pintu:</span>
                      <span class="number">{{ $car->pintu }}</span>
                    </div>
                    <div class="listing-feature pr-4">
                      <span class="caption">Penumpang:</span>
                      <span class="number">{{ $car->penumpang }}</span>
                    </div>
                  </div>
                  <div>
                    <p>
                     {{ $car->description}}
                    </p>
                    <p>
                      <a href="{{ route('car.show', $car) }}" class="btn btn-primary btn-sm">Sewa Sekarang</a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
          </div>
        </div>
      </div>

      <div class="site-section bg-light">
        <div class="container">
          <div class="row">
            <div class="col-lg-7">
              <h2 class="section-heading"><strong>Testimonial</strong></h2>
              <p class="mb-5">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
              </p>
            </div>
          </div>
          <div class="row">
          @foreach($testimonials as $testimonial)
            <div class="col-lg-4 mb-4 mb-lg-0">
              <div class="testimonial-2">
                <blockquote class="mb-4">
                  <p>
                   {{ $testimonial->pesan }}
                  </p>
                </blockquote>
                <div class="d-flex v-card align-items-center">
                  <img
                    src="{{ Storage::url($testimonial->profile) }}"
                    alt="Image"
                    style="object-fit:cover;width: 80px;height:80px;"
                    class="img-fluid mr-3"
                  />
                  <div class="author-name">
                    <span class="d-block">{{ $testimonial->name }}</span>
                    <span>{{ $testimonial->pekerjaan }}</span>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
          </div>
        </div>
      </div>
@endsection
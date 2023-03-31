@extends('frontend.layout')

@section('content')
 
<div class="hero inner-page" style="background-image: url('{{ asset('frontend/images/hero_1_a.jpg') }}');">
        
        <div class="container">
          <div class="row align-items-end ">
            <div class="col-lg-5">

              <div class="intro">
                <h1><strong>Blog</strong></h1>
                <div class="custom-breadcrumbs"><a href="index.html">Home</a> <span class="mx-2">/</span> <strong>Blog</strong></div>
              </div>

            </div>
          </div>
        </div>
      </div>

    

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">

        @forelse($blogs as $blog)
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="post-entry-1 h-100">
              <a href="{{ route('blog.show',$blog->slug) }}">
                <img src="{{ Storage::url($blog->image) }}" alt="Image"
                 class="img-fluid">
              </a>
              <div class="post-entry-1-contents">
                
                <h2><a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->title }}</a></h2>
                <span class="meta d-inline-block mb-3">{{ date('M d, Y', strtotime($blog->created_at)) }}</span>
                <p>{{ $blog->excerpt }}</p>
              </div>
            </div>
          </div>
        @empty
            <p class="display-4 text-center mx-auto">Data yang anda cari kosong !</p>
        @endforelse

        </div>

      </div>
    </div>
@endsection
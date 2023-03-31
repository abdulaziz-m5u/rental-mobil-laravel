@extends('frontend.layout')

@section('content')
<div
        class="hero inner-page"
        style="background-image: url('{{ asset('frontend/images/hero_1_a.jpg') }}')"
      >
        <div class="container">
          <div class="row align-items-end">
            <div class="col-lg-12">
              <div class="intro">
                <h1><strong>{{ $blog->title }}</strong></h1>
                <div class="pb-4">
                  <strong class="text-black"
                    >{{ date('M d, Y', strtotime($blog->created_at)) }}</strong
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="site-section">
        <div class="container">
          <div class="row">
            <div class="col-md-8 blog-content">
              <div class="card" style="border: none;">
                {!! $blog->description !!}
              </div>
              <div id="disqus_thread"></div>
            </div>
            <div class="col-md-4 sidebar">
              <div class="sidebar-box">
                <form action="{{ route('blog.index') }}" method="get" class="search-form">
                  <div class="form-group">
                    <span class="icon fa fa-search"></span>
                    <input
                      type="text"
                      name="s"
                      class="form-control"
                      placeholder="Type a keyword and hit enter"
                    />
                  </div>
                </form>
              </div>
              <div class="sidebar-box">
                <div class="categories">
                  <h3>Tips & Trik</h3>
                  @foreach($blogs as $blog)
                    <li>
                      <a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->title }}</a>
                    </li>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection

@push('script-alt')
<script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://https-ypdigital-site.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>
@endpush
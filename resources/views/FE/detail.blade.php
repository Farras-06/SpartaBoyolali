@extends('frontend.app')

@section('style-fe')

@endsection

@section('content-fe')
<style>

    .slider {
        display: flex;
        width: 100%;
        margin: 0 auto;
        overflow: hidden;
        padding: 2.5rem;
    }
    .item {
        animation: animate 25s linear infinite;
    }
    .item img
        {
            min-width: 200px;
            padding: 0 30px;
        }
    .slider:hover .item {
        animation-play-state: paused;
    }
    @keyframes animate {
        0% {
            transform: translate3d(0, 0, 0);
        }
        100% {
            transform: translate3d(-1800px, 0, 0);
        }
    }
    </style>
<!-- <section class="site-hero overlay" style="background-image: url({{asset('sogo-master/images/hero_4.jpg')}})" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row site-hero-inner justify-content-center align-items-center">
        <div class="col-md-10 text-center" data-aos="fade-up">
          {{-- <span class="custom-caption text-uppercase text-white d-block  mb-3">Welcome To 5 <span class="fa fa-star text-primary"></span>   Hotel</span> --}}
          <span class="custom-caption text-uppercase text-white d-block  mb-3">Welcome</span>
          <h1 class="heading">Explore the new Shine of Java</h1>
        </div>
      </div>
    </div>

    <a class="mouse smoothscroll" href="#next">
      <div class="mouse-icon">
        <span class="mouse-wheel"></span>
      </div>
    </a>
  </section> -->
  <!-- END section -->


  <section id="home" class="py-5 bg-light">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-12 col-lg-7 ml-auto order-lg-2 position-relative mb-5" data-aos="fade-up">
          <figure class="img-absolute">
            {{-- <img src="{{asset('sogo-master/images/food-1.jpg')}}" alt="Image" class="img-fluid"> --}}
          </figure>
          <img src="{{ asset('img/destinasi/'.$destinasi->gambar) }}" alt="Image" class="img-fluid rounded">
        </div>
        <div class="col-md-12 col-lg-4 order-lg-1" data-aos="fade-up">
          <h2 class="heading">{{ $destinasi->nama }}</h2>
          <p class="mb-4">{{ $destinasi->deskripsi }}</p>
          {{-- <p><a href="#" class="btn btn-primary text-white py-2 mr-3">Learn More</a> <span class="mr-3 font-family-serif"><em>or</em></span> </p> --}}
        </div>
        
      </div>
    </div>
  </section>
  
  <!-- END section -->

  <section id="event" class="section blog-post-entry bg-light">
    <div class="container">
      <div class="row justify-content-center text-center mb-5">
        <div class="col-md-7">
          <h2 class="heading" data-aos="fade-up">Gallery </h2>
          <p data-aos="fade-up">Kenali destinasi wisata kami lebih jauh dengan kumpulan foto pada Galeri ini.</p>
        </div>
      </div>
      <div class="row">
        <div class="slider">
          @foreach ($gelery as $item)
            <div class="item"><a href="#"><img alt="logo" src="{{ asset('img/destinasi/'.$item->gambar) }}" height="400"></a></div>
          @endforeach
        </div>
        
      </div>
        @php
            $usr = Auth::guard('admin')->user();
        @endphp
        <center>
          @if ($usr == null)
          <a href="{{url('admin/login')}}" class="btn btn-danger">
            Beli Tiket
          </a>
          @else
          <a href="{{route('beli-tiket',$destinasi->id)}}" class="btn btn-danger">
            Beli Tiket
          </a>
          @endif
        </center>
    </div>
  </section>


@endsection

@section('script-fe')

@endsection
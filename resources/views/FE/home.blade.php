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

.testimonial-slider {
  background-color: #5072a7;
  padding: 3em 2em;
}
.testimonial-title {
  color: #fff;
}
.testimonial-title h2 {
  padding-left: 0.2em;
}
.cardtesti {
  margin: 0 0.5em;
  box-shadow: 2px 6px 8px 0 rgba(22, 22, 26, 0.18);
  border: none;
  height: 100%;
}
.pic-ctn {
  width: 100%;
  height: 200px;
}

@keyframes display {
  0% {
    transform: translateX(0);
    opacity: 0;
  }
  10% {
    transform: translateX(0);
    opacity: 1;
  }
  20% {
    transform: translateX(0);
    opacity: 1;
  }
  100% {
    transform: translateX(0);
    opacity: 0;
  }
}

.pic-ctn {
  width: 100%;
  height: 300px;
  margin-top: 15vh;
}

.pic-ctn > img {
  position: absolute;
  top: 0;
  opacity: 0;
  width: 100%;
  height: 90vh;
  animation: display 12s infinite;
}

img:nth-child(2) {
  animation-delay: 4s;
}
img:nth-child(3) {
  animation-delay: 8s;
}

    </style>
    <div class="home-slider owl-carousel js-fullheight">
      <div class="slider-item js-fullheight" style="background-image: url('img/slide-1_car.jpg');">
        <div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
            <div class="col-md-12 ftco-animate">
            </div>
          </div>
        </div>
      </div>

      <div class="slider-item js-fullheight" style="background-image: url('img/slide-2_car.jpg');">
        <div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
            <div class="col-md-12 ftco-animate">
            </div>
          </div>
        </div>
      </div>

      <div class="slider-item js-fullheight" style="background-image: url('img/slide-3_car.jpg');">
        <div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
            <div class="col-md-12 ftco-animate">
            </div>
          </div>
        </div>
      </div>
    </div>
<!-- <section class="site-hero overlay" style="background-image: url(sogo-master/images/hero_4.jpg)" data-stellar-background-ratio="0.5">
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

  {{-- <section class="section bg-light pb-0"  >
    <div class="container">
     
      <div class="row check-availabilty" id="next">
        <div class="block-32" data-aos="fade-up" data-aos-offset="-200">

          <form action="#">
            <div class="row">
              <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                <label for="checkin_date" class="font-weight-bold text-black">Check In</label>
                <div class="field-icon-wrap">
                  <div class="icon"><span class="icon-calendar"></span></div>
                  <input type="text" id="checkin_date" class="form-control">
                </div>
              </div>
              <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                <label for="checkout_date" class="font-weight-bold text-black">Check Out</label>
                <div class="field-icon-wrap">
                  <div class="icon"><span class="icon-calendar"></span></div>
                  <input type="text" id="checkout_date" class="form-control">
                </div>
              </div>
              <div class="col-md-6 mb-3 mb-md-0 col-lg-3">
                <div class="row">
                  <div class="col-md-6 mb-3 mb-md-0">
                    <label for="adults" class="font-weight-bold text-black">Adults</label>
                    <div class="field-icon-wrap">
                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                      <select name="" id="adults" class="form-control">
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                        <option value="">4+</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3 mb-md-0">
                    <label for="children" class="font-weight-bold text-black">Children</label>
                    <div class="field-icon-wrap">
                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                      <select name="" id="children" class="form-control">
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                        <option value="">4+</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-3 align-self-end">
                <button class="btn btn-primary btn-block text-white">Check Availabilty</button>
              </div>
            </div>
          </form>
        </div>


      </div>
    </div>
  </section> --}}

  <!-- <section id="home" class="py-5 bg-light" style="margin-top: 23vh;">
    <div class="container" style="margin-top:100px">
   
      <div class="row align-items-center">
        <div class="col-md-12 col-lg-7 ml-auto order-lg-2 position-relative mb-5" data-aos="fade-up">
          <img src="{{asset('sogo-master/images/img_1.jpg')}}" alt="Image" class="img-fluid rounded">
        </div>
        <div class="col-md-12 col-lg-4 order-lg-1" data-aos="fade-up">
          <h2 class="heading">Welcome!</h2>
          <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
          {{-- <p><a href="#" class="btn btn-primary text-white py-2 mr-3">Learn More</a> <span class="mr-3 font-family-serif"><em>or</em></span> </p> --}}
        </div>
        
      </div>
    </div>
  </section> -->

  <section id="destinasi" class="section" style="margin-top: 13vh;">
    <div class="container" style="margin-top:100px">
      <div class="row justify-content-center mb-5">
        <div class="col-md-12">
          <h2 class="heading" data-aos="fade-up">Destinasi Pilihan</h2>
          <p data-aos="fade-up" data-aos-delay="100">Mulai perjalanan wisata Anda di Boyolali melalui destinasi wisata terbaik Kami.</p>
        </div>
      </div>
      <div class="row">
        @foreach ($destinasi as $item)
        <div class="col-md-6 col-lg-4" data-aos="fade-up">
          <a href="{{ route('detail',$item->id) }}" class="room">
            <figure class="img-wrap" style="height: 190px;">
              <style>
                .img-figure {
                  width: 400px;
                  clear: left;
                  margin-bottom: 1px;
                  margin-right: 10px;
                }

                figcaption {
                  background: rgba(0, 0, 0, .4);
                  border-radius: 10px;
                  color: white;
                  max-width: 400px;
                  font-size: 20px;
                  display: block;
                  position: absolute;
                  padding: 0 10px;
                }

                figure {
                  position: relative;
                  text-align: center;
                  display: flex;
                  justify-content: center;
                  align-items: center;

                }
              </style>
              <img src="{{ asset('img/destinasi/'.$item->gambar) }}" alt="Free website template" class="img-fluid img-figure mb-3">
              <figcaption>{{ $item->nama }}</figcaption>
            </figure>
          </a>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <section id="explore" class="section bg-image overlay" style="background-image: url('img/slide-3_car.jpg');">
    <div class="container">
      <div class="row justify-content-center text-center mb-5">
        <div class="col-md-7">
          <h2 class="heading text-white" data-aos="fade">Explore</h2>
          <p class="text-white" data-aos="fade" data-aos-delay="100">Kenali lebih dalam Boyolali dengan wisata yang tidak kalah menarik di seluruh penjuru Boyolali.</p>
        </div>
      </div>
      <div class="food-menu-tabs" data-aos="fade">
        <ul class="nav nav-tabs mb-5" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link letter-spacing-2" id="drinks-tab" data-toggle="tab" href="#drinks" role="tab" aria-controls="drinks" aria-selected="false">Show All</a>
            </li>

            @foreach ($kategori as $item)
                <li class="nav-item">
                         <a class="nav-link letter-spacing-2" id="{{ $item->id }}-tab" data-toggle="tab" href="#desserts{{ $item->id }}" role="tab" aria-controls="desserts{{ $item->id }}" aria-selected="false">{{ $item->kategori }}</a>
                </li>
            @endforeach
        </ul>
        <div class="tab-content py-5" id="myTabContent">
          
        @foreach ($kategori as $item)
        <div class="tab-pane fade text-left" id="desserts{{ $item->id }}" role="tabpanel" aria-labelledby="{{ $item->id }}-tab">
                <div class="row">
                    @foreach ($explore->where('id_kategori',$item->id) as $ex)
                    <div class="col-md-6">
                        <div class="food-menu mb-5">
                        <h3 class="text-primary"><a href="#" class="text-primary">{{ $ex->nama_wisata }}</a></h3>
                        <p class="text-white text-opacity-7">{{ $ex->deskripsi_wisata }}.</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div> <!-- .tab-pane -->
        @endforeach
        <div class="tab-pane fade text-left" id="drinks" role="tabpanel" aria-labelledby="drinks-tab">
            <div class="row">
                @foreach ($explore as $ex)
                <div class="col-md-6">
                    <div class="food-menu mb-5">
                    <h3 class="text-primary"><a href="#" class="text-primary">{{ $ex->nama_wisata }}</a></h3>
                    <p class="text-white text-opacity-7">{{ $ex->deskripsi_wisata }}.</p>
                    </div>
                </div>
                @endforeach
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </section>
  <!-- <section id="kategori" class="section" style="padding-top: 0 !important;">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-12">
          <h2 class="heading" data-aos="fade-up">Kategori Wisata</h2>
          <p data-aos="fade-up" data-aos-delay="100">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
        </div>
      </div>
      <div class="row">
        @foreach ($destinasi as $item)
        <div class="col-md-6 col-lg-4" data-aos="fade-up">
          <a href="{{ route('detail',$item->id) }}" class="room">
            <figure class="img-wrap" style="height: 190px;">
              <img src="{{ asset('img/destinasi/'.$item->gambar) }}" alt="Free website template" class="img-fluid img-figure mb-3">
              <figcaption>{{ $item->nama }}</figcaption>
            </figure>
          </a>
        </div>
        @endforeach
      </div>
    </div>
  </section> -->

  <section id="destinasi" class="section">
    <div class="container-fluid">
      <div class="row justify-content-center text-center mb-5">
        <div class="col-md-7">
          <h2 class="heading" data-aos="fade-up">Peta Wisata</h2>
          <p data-aos="fade-up" data-aos-delay="100">Cari tempat menarik di Boyolali dengan Peta Wisata kami.</p>
        </div>
      </div>
      <div class="row">
        <!-- <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1iQVBop8m1z9zy0YJT4fuIM4E0WFsUA_z&z=16&ll=-7.534858500000002%2C110.6004026" width="100%" height="600" frameborder="0" style="border:0"></iframe> -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.367356606518!2d110.59934647438988!3d-7.5348524924784055!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a6ebe971275d5%3A0xfbcf386c14ecfdc8!2sCity%20Market%20Boyolali!5e0!3m2!1sen!2sid!4v1684058507218!5m2!1sen!2sid" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </section>
  <style>
    .presentation-month{
      display: none;
    }
  </style>
  <section id="event" class="section blog-post-entry">
    <div class="container">
      <div class="row justify-content-center text-center mb-5">
        <div class="col-md-7">
          <h2 class="heading" data-aos="fade-up">Kalender Events {{ date('Y') }}</h2>
          <p data-aos="fade-up">Boyolali adalah kota berbudaya. Temukan info tentang acara kebudayaan di sini.</p>
        </div>
      </div>
      <div class="row">
        <div class="container">

        <!-- Nav tabs -->
        <div class="w-100 d-flex justify-content-center align-items-center">
          <ul class="nav nav-tabs" role="tablist">
            <li style="padding: 10px 20px;margin:10px 20px;background: white;border: 1px solid #aaa;" role="presentation">
              <a style="color: #aaa;" href="#januari" aria-controls="januari" role="tab" data-toggle="tab">Januari</a>
            </li>
            <li style="padding: 10px 20px;margin:10px 20px;background: white;border: 1px solid #aaa;" role="presentation">
              <a style="color: #aaa;" href="#februari" aria-controls="februari" role="tab" data-toggle="tab">Februari</a>
            </li>
            <li style="padding: 10px 20px;margin:10px 20px;background: white;border: 1px solid #aaa;" role="presentation">
              <a style="color: #aaa;" href="#maret" aria-controls="maret" role="tab" data-toggle="tab">Maret</a>
            </li>
            <li style="padding: 10px 20px;margin:10px 20px;background: white;border: 1px solid #aaa;" role="presentation">
              <a style="color: #aaa;" href="#april" aria-controls="april" role="tab" data-toggle="tab">April</a>
            </li>
            <li style="padding: 10px 20px;margin:10px 20px;background: white;border: 1px solid #aaa;" role="presentation">
              <a style="color: #aaa;" href="#mei" aria-controls="mei" role="tab" data-toggle="tab">Mei</a>
            </li>
            <li style="padding: 10px 20px;margin:10px 20px;background: #ce4c4b;border: 1px solid #fff;" role="presentation" class="all-month">
              <a style="color: #fff;" href="#mei" aria-controls="mei" role="tab" data-toggle="tab">Lihat Semua</a>
            </li>
            <li style="padding: 10px 20px;margin:10px 20px;background: white;border: 1px solid #aaa;" role="presentation" class="presentation-month">
              <a style="color: #aaa;" href="#juni" aria-controls="juni" role="tab" data-toggle="tab">Juni</a>
            </li>
            <li style="padding: 10px 20px;margin:10px 20px;background: white;border: 1px solid #aaa;" role="presentation" class="presentation-month">
              <a style="color: #aaa;" href="#juli" aria-controls="juli" role="tab" data-toggle="tab">Juli</a>
            </li>
            <li style="padding: 10px 20px;margin:10px 20px;background: white;border: 1px solid #aaa;" role="presentation" class="presentation-month">
              <a style="color: #aaa;" href="#agustus" aria-controls="agustus" role="tab" data-toggle="tab">Agustus</a>
            </li>
            <li style="padding: 10px 20px;margin:10px 20px;background: white;border: 1px solid #aaa;" role="presentation" class="presentation-month">
              <a style="color: #aaa;" href="#september" aria-controls="september" role="tab" data-toggle="tab">September</a>
            </li>
            <li style="padding: 10px 20px;margin:10px 20px;background: white;border: 1px solid #aaa;" role="presentation" class="presentation-month">
              <a style="color: #aaa;" href="#oktober" aria-controls="oktober" role="tab" data-toggle="tab">Oktober</a>
            </li>
            <li style="padding: 10px 20px;margin:10px 20px;background: white;border: 1px solid #aaa;" role="presentation" class="presentation-month">
              <a style="color: #aaa;" href="#november" aria-controls="november" role="tab" data-toggle="tab">November</a>
            </li>
            <li style="padding: 10px 20px;margin:10px 20px;background: white;border: 1px solid #aaa;" role="presentation" class="presentation-month">
              <a style="color: #aaa;" href="#desember" aria-controls="desember" role="tab" data-toggle="tab">Desember</a>
            </li>
          </ul>
        </div>

        <!-- Tab panes -->
        <div class="tab-content" style="padding: 5% 20%;">
          <div role="tabpanel" class="tab-pane active" id="januari">
            @foreach($events as $val)
              @if(date('n',strtotime($val->tanggal)) == '1')
              <a href="<?= $val->llnk ?>" class="text-dark">
                {{ $val->tanggal }} <br>  <br>
                <h5>{{ $val->nama_event }}</h5>
                {{ $val->deskripsi }} <br>
              </a><br>
              <div style="border-top: 1px solid black;padding:10px">&nbsp;</div>
              @endif
            @endforeach
          </div>
          <div role="tabpanel" class="tab-pane" id="februari">
            @foreach($events as $val)
              @if(date('n',strtotime($val->tanggal)) == '2')
              <a href="<?= $val->llnk ?>" class="text-dark">
                {{ $val->tanggal }} <br>  <br>
                <h5>{{ $val->nama_event }}</h5>
                {{ $val->deskripsi }} <br>
              </a><br>
              <div style="border-top: 1px solid black;padding:10px">&nbsp;</div>
              @endif
            @endforeach
          </div>
          <div role="tabpanel" class="tab-pane" id="maret">
            @foreach($events as $val)
              @if(date('n',strtotime($val->tanggal)) == '3')
              <a href="<?= $val->llnk ?>" class="text-dark">
                {{ $val->tanggal }} <br>  <br>
                <h5>{{ $val->nama_event }}</h5>
                {{ $val->deskripsi }} <br>
              </a><br>
              <div style="border-top: 1px solid black;padding:10px">&nbsp;</div>
              @endif
            @endforeach
          </div>
          <div role="tabpanel" class="tab-pane" id="april">
            @foreach($events as $val)
              @if(date('n',strtotime($val->tanggal)) == '4')
              <a href="<?= $val->llnk ?>" class="text-dark">
                {{ $val->tanggal }} <br>  <br>
                <h5>{{ $val->nama_event }}</h5>
                {{ $val->deskripsi }} <br>
              </a><br>
              <div style="border-top: 1px solid black;padding:10px">&nbsp;</div>
              @endif
            @endforeach
          </div>
          <div role="tabpanel" class="tab-pane" id="mei">
            @foreach($events as $val)
              @if(date('n',strtotime($val->tanggal)) == '5')
              <a href="<?= $val->llnk ?>" class="text-dark">
                {{ $val->tanggal }} <br>  <br>
                <h5>{{ $val->nama_event }}</h5>
                {{ $val->deskripsi }} <br>
              </a><br>
              <div style="border-top: 1px solid black;padding:10px">&nbsp;</div>
              @endif
            @endforeach
          </div>
          <div role="tabpanel" class="tab-pane" id="juni">
            @foreach($events as $val)
              @if(date('n',strtotime($val->tanggal)) == '6')
              <a href="<?= $val->llnk ?>" class="text-dark">
                {{ $val->tanggal }} <br>  <br>
                <h5>{{ $val->nama_event }}</h5>
                {{ $val->deskripsi }} <br>
              </a><br>
              <div style="border-top: 1px solid black;padding:10px">&nbsp;</div>
              @endif
            @endforeach
          </div>
          <div role="tabpanel" class="tab-pane" id="juli">
            @foreach($events as $val)
              @if(date('n',strtotime($val->tanggal)) == '7')
              <a href="<?= $val->llnk ?>" class="text-dark">
                {{ $val->tanggal }} <br>  <br>
                <h5>{{ $val->nama_event }}</h5>
                {{ $val->deskripsi }} <br>
              </a><br>
              <div style="border-top: 1px solid black;padding:10px">&nbsp;</div>
              @endif
            @endforeach
          </div>
          <div role="tabpanel" class="tab-pane" id="agustus">
            @foreach($events as $val)
              @if(date('n',strtotime($val->tanggal)) == '8')
              <a href="<?= $val->llnk ?>" class="text-dark">
                {{ $val->tanggal }} <br>  <br>
                <h5>{{ $val->nama_event }}</h5>
                {{ $val->deskripsi }} <br>
              </a><br>
              <div style="border-top: 1px solid black;padding:10px">&nbsp;</div>
              @endif
            @endforeach
          </div>
          <div role="tabpanel" class="tab-pane" id="september">
            @foreach($events as $val)
              @if(date('n',strtotime($val->tanggal)) == '9')
              <a href="<?= $val->llnk ?>" class="text-dark">
                {{ $val->tanggal }} <br>  <br>
                <h5>{{ $val->nama_event }}</h5>
                {{ $val->deskripsi }} <br>
              </a><br>
              <div style="border-top: 1px solid black;padding:10px">&nbsp;</div>
              @endif
            @endforeach
          </div>
          <div role="tabpanel" class="tab-pane" id="oktober">
            @foreach($events as $val)
              @if(date('n',strtotime($val->tanggal)) == '10')
              <a href="<?= $val->llnk ?>" class="text-dark">
                {{ $val->tanggal }} <br>  <br>
                <h5>{{ $val->nama_event }}</h5>
                {{ $val->deskripsi }} <br>
              </a><br>
              <div style="border-top: 1px solid black;padding:10px">&nbsp;</div>
              @endif
            @endforeach
          </div>
          <div role="tabpanel" class="tab-pane" id="november">
            @foreach($events as $val)
              @if(date('n',strtotime($val->tanggal)) == '11')
              <a href="<?= $val->llnk ?>" class="text-dark">
                {{ $val->tanggal }} <br>  <br>
                <h5>{{ $val->nama_event }}</h5>
                {{ $val->deskripsi }} <br>
              </a><br>
              <div style="border-top: 1px solid black;padding:10px">&nbsp;</div>
              @endif
            @endforeach
          </div>
          <div role="tabpanel" class="tab-pane" id="desember">
            @foreach($events as $val)
              @if(date('n',strtotime($val->tanggal)) == '12')
              <a href="<?= $val->llnk ?>" class="text-dark">
                {{ $val->tanggal }} <br>  <br>
                <h5>{{ $val->nama_event }}</h5>
                {{ $val->deskripsi }} <br>
              </a><br>
              <div style="border-top: 1px solid black;padding:10px">&nbsp;</div>
              @endif
            @endforeach
          </div>
        </div>

      </div>
      </div>
    </div>
  </section>
    <div class="home-slider owl-carousel js-fullheight">
      <div class="slider-item js-fullheight" style="background-image: url('img/slide-1_car.jpg');">
        <div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
            <div class="col-md-12 ftco-animate">
              <center class="text w-100 text-center">
                <img src="{{asset('img/kadin.jpg')}}" style="border-radius:50%;border:3px solid rgba(255, 255, 255, .5);margin-bottom: 30px;width: 200px;height: 200px;display: initial !important;background: black;">
                <h3 class="text-white">Supana, S.Pd, M.Pd.</h3>
                <p class="text-white">Kepala Dinas Disporapar Kab. Boyolali</p>
                <p class="text-white" style="font-size:15px" data-aos="fade" data-aos-delay="100">Selamat datang di website Pariwisata Kabupaten Boyolali. Mari kita bangun pemuda, olahraga, dan pariwisata di Boyolali dengan “Semangat Boyolali Metal”, Melangkah Bersama, Menata Bersama, Penuh Totalitas.</p>
              </center>
            </div>
          </div>
        </div>
      </div>

      <div class="slider-item js-fullheight" style="background-image: url('img/slide-2_car.jpg');">
        <div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
            <div class="col-md-12 ftco-animate">
              <center class="text w-100 text-center">
                <img src="{{asset('img/arief.jpeg')}}" style="border-radius:50%;border:3px solid rgba(255, 255, 255, .5);margin-bottom: 30px;width: 200px;height: 200px;display: initial !important;background: black;">
                <h3 class="text-white">Arief Muhammad</h3>
                <p class="text-white">Influencer</p>
                <p class="text-white" style="font-size:15px" data-aos="fade" data-aos-delay="100">Kedung Kayang sangat indah dengan air terjun yang menakjubkan dan suasana yang tenang. Wajib kesini kalo kalian main ke Boyolali!</p>
              </center>
            </div>
          </div>
        </div>
      </div>

      <div class="slider-item js-fullheight" style="background-image: url('img/slide-3_car.jpg');">
        <div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
            <div class="col-md-12 ftco-animate">
              <center class="text w-100 text-center">
                <img src="{{asset('img/bupati.jpg')}}" style="border-radius:50%;border:3px solid rgba(255, 255, 255, .5);margin-bottom: 30px;width: 200px;height: 200px;display: initial !important;background: black;">
                <h3 class="text-white">M. Said Hidayat, S.H.</h3>
                <p class="text-white">Bupati Boyolali</p>
                <p class="text-white" style="font-size:15px" data-aos="fade" data-aos-delay="100">Dengan pembangunan Cepogo Cheese Park ini, akan berdampak luas termasuk UMKM dan perekonomian masyarakat sekitar akan meningkat. Kami bersyukur telah membuka objek wisata yang menjadi destinasi wisata baru, yakni Cepogo Cheese Park dari Cimory di Desa Genting, Kecamatan Cepogo.</p>
              </center>
            </div>
          </div>
        </div>
      </div>
    </div>
  <style>
    .item img {
      padding: 0 15px;
    }
  </style>  
<div class="slider" style="margin:20px 0">
            <div class="item"><a href=""><img alt="logo" src="https://picsum.photos/id/10/200/300"></a></div>
            <div class="item"><a href=""><img alt="logo" src="https://picsum.photos/id/11/200/300"></a></div>
            <div class="item"><a href=""><img alt="logo" src="https://picsum.photos/id/12/200/300"></a></div>
            <div class="item"><a href=""><img alt="logo" src="https://picsum.photos/id/13/200/300"></a></div>
            <div class="item"><a href=""><img alt="logo" src="https://picsum.photos/id/14/200/300"></a></div>
            <div class="item"><a href=""><img alt="logo" src="https://picsum.photos/id/15/200/300"></a></div>
            <div class="item"><a href=""><img alt="logo" src="https://picsum.photos/id/16/200/300"></a></div>
            <div class="item"><a href=""><img alt="logo" src="https://picsum.photos/id/17/200/300"></a></div>
            <div class="item"><a href=""><img alt="logo" src="https://picsum.photos/id/18/200/300"></a></div>
            <div class="item"><a href=""><img alt="logo" src="https://picsum.photos/id/19/200/300"></a></div>
            <div class="item"><a href=""><img alt="logo" src="https://picsum.photos/id/28/200/300"></a></div>
            <div class="item"><a href=""><img alt="logo" src="https://picsum.photos/id/29/200/300"></a></div>
            <div class="item"><a href=""><img alt="logo" src="https://picsum.photos/id/33/200/300"></a></div>
            <div class="item"><a href=""><img alt="logo" src="https://picsum.photos/id/53/200/300"></a></div>
            <div class="item"><a href=""><img alt="logo" src="https://picsum.photos/id/54/200/300"></a></div>
            <div class="item"><a href=""><img alt="logo" src="https://picsum.photos/id/55/200/300"></a></div>
        </div>
  <!-- <div class="testimonial-slider">
    <div id="carouselExampleControls" class="carousel carousel-dark" data-bs-ride="carousel">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">
            <div class="testimonial-title d-flex">
              <i class="fa fa-quote-left" style="font-size:36px"></i>
              {{-- <i class="bi bi-quote display-1"></i> --}}
              <h3 class="fw-bold display-6" style="font-size: 45px;color: white;font-weight: bold;">Apa kata Mereka?</h3>
              <i class="fa fa-quote-right" style="font-size:36px; float: right;"></i>
             
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
              {{-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> --}}
              <i class="	fa fa-angle-left" style="color: black"></i>
              {{-- <span class="visually-hidden">Previous</span> --}}
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
              {{-- <span class="carousel-control-next-icon" aria-hidden="true"></span> --}}
              <i class="fa fa-angle-right" style="color: black"></i>
              {{-- <span class="visually-hidden">Next</span> --}}
            </button>
          </div>
          <div class="col-md-4">
            {{-- <iframe width="420" height="345" src="https://www.youtube.com/embed/tgbNymZ7vqY">
            </iframe> --}}
            <iframe width="420" height="345" src="https://www.youtube.com/embed/97kI1Bx7u0Y" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
          </div>
          <div class="col-md-4">
            <div class="carousel-inner">
              
              <div class="carousel-item active">
                <div class="card cardtesti">
                  <div class="img-wrapper"></div>
                  <div class="card-body">
                    <h5 class="card-title">Card title 1</h5>
                    <i class="bi bi-star-fill text-warning pe-1"></i>
                    <i class="bi bi-star-fill text-warning pe-1"></i>
                    <i class="bi bi-star-fill text-warning pe-1"></i>
                    <i class="bi bi-star-fill text-warning pe-1"></i>
                    <i class="bi bi-star-fill text-warning pe-1"></i>
                    <p class="card-text">Some quick example text to build on the card title and make up
                      the bulk of the
                      card's content.</p>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->
  <!-- END section -->
  
  
  <!-- END section -->



@endsection

@section('script-fe')
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script>
// var multipleCardCarousel = document.querySelector("#carouselExampleControls");
// if (window.matchMedia("(min-width: 576px)").matches) {
//   var carousel = new bootstrap.Carousel(multipleCardCarousel, {
//     interval: false
//   });
//   var carouselWidth = $(".carousel-inner")[0].scrollWidth;
//   var cardWidth = $(".carousel-item").width();
//   var scrollPosition = 0;
//   $("#carouselExampleControls .carousel-control-next").on("click", function () {
//     if (scrollPosition < carouselWidth - cardWidth * 3) {
//       scrollPosition += cardWidth;
//       $("#carouselExampleControls .carousel-inner").animate(
//         { scrollLeft: scrollPosition },
//         600
//       );
//     }
//   });
//   $("#carouselExampleControls .carousel-control-prev").on("click", function () {
//     if (scrollPosition > 0) {
//       scrollPosition -= cardWidth;
//       $("#carouselExampleControls .carousel-inner").animate(
//         { scrollLeft: scrollPosition },
//         600
//       );
//     }
//   });
// } else {
//   $(multipleCardCarousel).addClass("slide");
// }
// $('a[href="#mei"]').tab('show') // Select tab by name
$(document).on('click','.all-month',function(){
  $('.presentation-month').removeClass('presentation-month')
  $('.all-month').addClass('presentation-month')
  console.log(this)
})
// $('#myTabs a:first').tab('show') // Select first tab
// $('#myTabs a:last').tab('show') // Select last tab
// $('#myTabs li:eq(2) a').tab('show') // Select third tab (0-indexed)

</script>
@endsection
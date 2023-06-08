@extends('frontend.app')

@section('style-fe')

@endsection

@section('content-fe')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/Pepper-Grinder/jquery-ui.css">
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

.containerBeli {
  width: 432px;
  /* height: 496px; */
  max-height: 80%;
  max-width: 80%;
  background: #E8ECF0;
  box-shadow: 0px 30px 20px rgba(0, 0, 0, 0.2);
  border-radius: 10px;
  padding: 20px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  z-index: 1;
  margin-bottom: 2%;
  margin-left: 10%;

}

form {
  width: 100%;
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.input-group {
  display: flex;
  width: 100%;
  flex-direction: column;
  justify-content: center;
  padding: 5px;
}

.check-in-out,
.other {
  display: flex;
  justify-content: center;
  align-items: center;
}

input {
  width: 100%;
  box-shadow: 4px 10px 20px rgba(0, 0, 0, 0.08);
  border-radius: 5px;
  border: none;
  padding: 20px;
  outline: none;
  font-size: 21px;
}

label {
  font-size: 17px;
  align-items: center;
  padding: 5px 0;
  color: rgba(0, 0, 0, 0.5);
}

.properties {
  background-color: #FF455B;
  max-width: 60%;
  color: white;
  padding: 20px;
  border-radius: 10px;
  margin-top: -10px;
  text-align: center;
  font-size: 22px;
}
input[type="number"] {
	outline: none;
	-moz-appearance: textfield;
}
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
	-webkit-appearance: none;
	appearance: none;
}
.ui-spinner{

  padding: 10px;
  background: white;
  width: 100%;

}


.passenger-ticket {
  width: 25vw;
  padding: 1em;
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
  background: #fff;
  position: relative;
  border-bottom: 3px dashed #afadad;
}
.passenger-ticket:last-child {
  border-bottom: none;
  border-bottom-left-radius: 5px;
  border-bottom-right-radius: 5px;
}
.passenger-ticket:last-child .circle {
  display: none;
}
.passenger-ticket:last-child .ticket-bottom {
  display: none;
}
.passenger-ticket__line {
  display: flex;
  margin: 8px 0;
}
.passenger-ticket__data {
  width: 50%;
}
.passenger-ticket__data:last-child {
  margin-right: 0;
}
.passenger-ticket__bottom {
  position: absolute;
  width: 100%;
  bottom: 6px;
  left: 0;
}
.passenger-ticket__bottom .circle {
  width: 14px;
  height: 14px;
  border-radius: 50%;
  position: absolute;
  background: #6b6b6b;
  z-index: 2;
}
.passenger-ticket__bottom .circle-left {
  left: -7px;
}
.passenger-ticket__bottom .circle-right {
  right: -7px;
}

    </style>
<section class="site-hero overlay" style="background-image: url({{asset('sogo-master/images/hero_4.jpg')}})" data-stellar-background-ratio="0.5">
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
  </section>
  <!-- END section -->


  <section id="home" class="py-5 bg-light">
    <div class="container">
  
        <div class="row">
          <h4>History</h4>
        </div>
        <div class="row">
          <div class="table-responsive">
            <table class="table" border="1">
              <thead>
                <tr>
                  <td>No</td>
                  <td>No Tiket</td>
                  <td>Tanggal</td>
                  <td>Jam</td>
                  <td>Jumlah Tiket</td>
                  <td>Jumlah Bayar</td>
                  <td>Status Bayar</td>
                </tr>
              </thead>
              <tbody>
                @foreach ($pesan as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->no_tiket }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->jam }}</td>
                    <td>{{ $item->jumlah_tiket }}</td>
                    <td> @currency($item->jumlah_bayar) </td>
                    <td> 
                      @if ($item->status == 'Paid')
                        {{ $item->status }}
                      @else
                      <a href="{{ route('pesanan',$item->id) }}" class="btn btn-success">Pay</a>
                      @endif
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>


    </div>
  </section>

  
  


@endsection

@section('script-fe')

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

@endsection
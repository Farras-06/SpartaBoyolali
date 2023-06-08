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
  <!-- END section -->


  <section id="home" class="py-5 bg-light">
    <div class="container">
      @if ($pesan->status != 'Paid')
        <div class="row">
          <div class="col-sm-12 p-3 border bg-white">
            <h5>Deskripsi Pembelian</h5>
            <hr>
            <h6 class="text-dark">Destinasi : {{$destinasi->nama}}</h6>
            <h6 class="text-dark">Tanggal {{ $pesan->tanggal }}</h6>
            <h6 class="text-dark">Jam {{ $pesan->jam }}</h6>
            <h6 class="text-dark">Jumlah Tiket {{ $pesan->jumlah_tiket }}</h6>

          </div>
          <div class="col-sm-12 my-3">
            <h4>Silahkan Pilih Metode Pembayaran</h4>
          </div>

          <!-- LABEL DESTINASI -->
          <div class="col-sm-12">
            <button class="btn btn-success" id="pay-button">Pilih Metode Pembayaran</button>        
          </div>
        </div>
        <div class="row">
        </div>
      @else
        <div class="row">
          <h4>Anda Sudah Melakukan Pembayaran</h4>
        </div>

        <body>
          <div class="passenger">
            <div class="passenger-ticket">
              <div class="passenger-ticket__line">
                <b>Tiket {{ $destinasi->nama }}</b>
              </div>
              <div class="passenger-ticket__line">
                <div class="passenger-ticket__data">
                  <b>DATE</b><br>
                    {{ $pesan->tanggal }}
                </div>
                <div class="passenger-ticket__data">
                  <b>TICKET NO</b><br>
                  {{ $pesan->no_tiket }}
                </div>
              </div>
              <div class="passenger-ticket__line">
                <div class="passenger-ticket__data">
                  <b>Jumlah Tiket : {{ $pesan->jumlah_tiket }}</b><br>
                </div>
              </div>
              <div class="passenger-ticket__bottom">
                <div class="circle circle-left"></div>
                <div class="circle circle-right"></div>
              </div>
            </div>
              <div class="passenger-ticket__bottom">
                <div class="circle circle-left"></div>
                <div class="circle circle-right"></div>
              </div>
            </div>
          </div>
          </body>
          
      @endif
    </div>
  </section>

  <form action="{{ route('set-bayar') }}" method="post" id="form-bayar">
    @csrf
    <input type="hidden" value="{{ $pesan->id}}" name="id_pesanan">
  </form>
  


@endsection

@section('script-fe')

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="SB-Mid-client-exz9I60Ylg3mU6LH"></script>
 <script type="text/javascript">
      // For example trigger on button clicked, or any time you need
      var payButton = document.getElementById('pay-button');
      payButton.addEventListener('click', function () {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay('{{ $snapToken }}', {
          onSuccess: function(result){
            $('#form-bayar').submit();
            /* You may add your own implementation here */
            alert("payment success!"); console.log(result);
          },
          onPending: function(result){
            /* You may add your own implementation here */
            alert("wating your payment!"); console.log(result);
          },
          onError: function(result){
            /* You may add your own implementation here */
            alert("payment failed!"); console.log(result);
          },
          onClose: function(){
            /* You may add your own implementation here */
            alert('you closed the popup without finishing the payment');
          }
        })
      });
    </script>

@endsection
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

    </style>
  <!-- END section -->


  <section id="home" class="py-5 bg-light">
    <div class="container">
      <div class="row">
        <hr style="width:100%;margin-top: 1rem;margin-bottom: 1rem;border: 0;border-top: 3px solid black;">
        <div class="col-sm-6">
              <p style="margin-bottom: 0em !important"> <b>{{ $destinasi->nama }}</b> <br> 
              <img src="{{asset('img/map.png')}}" height="30" width="30" class="pic" style="padding:5px;"> {{ $destinasi->lokasi }} </p>
        </div>
        <div class="col-sm-6">
          <p style="float: right;margin-bottom: 0em !important"> <button class="btn btn-success">Buka</button> <br> 
          <img src="{{asset('img/clock.png')}}" height="30" width="30" class="pic" style="padding:5px;"> {{ $destinasi->jam_buka. ' - '. $destinasi->jam_tutup }}</p>
        </div>
        <hr style="width:100%;margin-top: 1rem;margin-bottom: 1rem;border: 0;border-top: 3px solid black;">
      </div>
      <div class="row">

          <!-- IMAGE DESTINASI -->
        <div class="col-sm-8  mb-5" data-aos="fade-up">
          <figure class="img-absolute">
            {{-- <img src="{{asset('sogo-master/images/food-1.jpg')}}" alt="Image" class="img-fluid"> --}}
          </figure>
          <img src="{{ asset('img/destinasi/'.$destinasi->gambar) }}" alt="Image" class="img-fluid rounded">
        </div>

          <!-- FORM TIKET -->
        <div class="col-sm-4 " data-aos="fade-up" style="background:white;padding-bottom: 50px;">
          <br>
          <form action="{{ route('store-pesanan') }}" method="post">
            @csrf
            <h4>Tiket Masuk {{ $destinasi->nama }}</h4>
            <p>@currency($destinasi->harga_tiket)</p>
            <div class="">
              <div class="">
                <label for="check-in">Tanggal</label>
                <input min="<?php echo date("Y-m-d"); ?>" type="date" id="" name="tanggal" autocomplete="off" class="" required>
              </div>
              <div class="">
                <label for="check-out">Jam</label>
                <input type="time" id="check-out" name="jam" autocomplete="off" required min="{{$destinasi->jam_buka}}" max="{{$destinasi->jam_tutup}}">
              </div>
            </div>
            <div class="other">
              <div class="input-group">
                <label for="adults">Jumlah Tiket</label>
                <p>
                    <input type="hidden" name="id_destinasi" value="{{ $destinasi->id }}">
                    <input type="number" min='1' id="jumlah" name="jumlah_tiket" value="1">
                </p>
              </div>
             
            </div>
            <div class="other">
              <div class="input-group">
                <label for="adults">Jumlah Bayar</label>
                <p>
                  <input type="text" name="jumlah_bayar" value="{{ $destinasi->harga_tiket }}" id="total" readonly>
                </p>
              </div>
            </div>
            <center>
              <button type="submit" class="btn btn-danger mb-2">
                Beli Tiket
              </button>
          </form>
        </div>
        
      </div>
    </div>
  </section>
  
  <!-- END section -->


@endsection

@section('script-fe')

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$('#jumlah').bind('click keyup', function(){
    let harga = '{{ $destinasi->harga_tiket  }}';
    let total = harga *  $(this).val();

    $("#total").val(total);
  //  $('<p/>').appendTo('#val').html(total); 
});
 
  $(function () {
    $(".date-picker").datepicker({
      dateFormat: 'D, d M'
    });
  })

  function onChangeFunction(e){
    console.log(e);
  }


  function spinner() {
//  SPINNER
$("#spinner").spinner();

//  INPUT ONLY NUMBERS
$('#spinner').keyup(function () { 
  console.log(this.value);

   this.value = this.value.replace(/[^0-9]/g,'');
});
}

// INPUT NUMBER MAX LENGHT
function maxLengthCheck(object) {
if (object.value.length > object.maxLength)
  object.value = object.value.slice(0, object.maxLength)
}



window.onload = spinner;
</script>

@endsection
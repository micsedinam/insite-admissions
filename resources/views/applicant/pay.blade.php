@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="card-header">Buy Admission Form & Pay Admission Fees</div> --}}

                <div class="card-body">
                  <div class="">
                    <div class="">
                      <img class="col-md-8 offset-md-2 mb-2" src="{{asset('img/insite-logo-black-text.png')}}" alt="IMC Logo">
                      <h2 class="col-md-8 offset-md-2 text-info">
                        BUY ADMISSION FORM
                      </h2>
                    </div>
                      
                      <form id="paymentForm" method="POST" action="{{route('payment')}}">
                          <div class="form-group">
                          <label class="" for="first-name">First Name</label>
                          <input class="form-control" type="text" id="first-name" />
                          </div>
                          <div class="form-group">
                          <label class="" for="last-name">Last Name</label>
                          <input class="form-control" type="text" id="last-name" />
                          </div>
                          <div class="form-group">
                          <label class="" for="phone">Phone Number</label>
                          <input class="form-control" type="number" id="phone" />
                          </div>
                          <div class="form-group">
                          <label class="" for="email">Email Address</label>
                          <input class="form-control" type="email" id="email-address" required />
                          </div>
                          <div class="">
                          <button class="btn btn-outline-primary btn-block" type="submit" onclick="payWithPaystack()"> Pay </button>
                          </div>
                      </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://js.paystack.co/v1/inline.js"></script>
<script>
    const paymentForm = document.getElementById('paymentForm');
    paymentForm.addEventListener("submit", payWithPaystack, false);
    function payWithPaystack(e) {
    e.preventDefault();
    let handler = PaystackPop.setup({
        key: 'pk_live_94fa6f698b2f040da1fa3196fb2483977685634b', // Replace with your public key
        //key: 'pk_test_10a9a9834d71beefa55ad22603d90ccf143abb1f', // Replace with your public key
        email: document.getElementById("email-address").value,
        firstname: document.getElementById("first-name").value,
        lastname: document.getElementById("last-name").value,
        phone: document.getElementById("phone").value,
        amount: 100 * 100, // the amount value is multiplied by 100 to convert to the lowest currency unit
        currency: 'GHS', // Use GHS for Ghana Cedis or USD for US Dollars
        ref: 'IMC'+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
        // label: "Optional string that replaces customer email"
        onClose: function(){
          swal({
            title: "Owwwwww!",
            text: "You cancelled the transaction",
            icon: "info",
            button: "Close"
          });
        },
        callback: function(response){
        let message = 'Payment complete! Reference: ' + response.reference;
        //alert(message);
        swal({
          title: "Good job!",
          text: message,
          icon: "success",
          button: "Okay",
        });

        window.location.href = "/verify?reference=" + response.reference;

        }
    });
    handler.openIframe();
    }
</script>
@endsection


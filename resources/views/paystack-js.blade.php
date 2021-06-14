<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form id="paymentForm">
                        <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email-address" required />
                        </div>
                        {{-- <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="tel" id="amount" required />
                        </div> --}}
                        <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" />
                        </div>
                        {{-- <div class="form-group">
                        <label for="last-name">Last Name</label>
                        <input type="text" id="last-name" />
                        </div> --}}
                        <div class="form-submit">
                        <x-button type="submit" onclick="payWithPaystack()"> Pay </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script src="https://js.paystack.co/v1/inline.js"></script>
<script>
    const paymentForm = document.getElementById('paymentForm');
    paymentForm.addEventListener("submit", payWithPaystack, false);
    function payWithPaystack(e) {
    e.preventDefault();
    let handler = PaystackPop.setup({
        key: 'pk_test_10a9a9834d71beefa55ad22603d90ccf143abb1f', // Replace with your public key
        email: document.getElementById("email-address").value,
        amount: 100 * 100, // the amount value is multiplied by 100 to convert to the lowest currency unit
        currency: 'GHS', // Use GHS for Ghana Cedis or USD for US Dollars
        ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
        // label: "Optional string that replaces customer email"
        onClose: function(){
        alert('Window closed.');
        },
        callback: function(response){
        // let message = 'Payment complete! Reference: ' + response.reference;
        // alert(message);

        window.location.href = "{{ route('test') }}";
        }
    });
    handler.openIframe();
    }
</script>
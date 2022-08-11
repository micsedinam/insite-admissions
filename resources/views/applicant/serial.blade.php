<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-lg mx-auto sm:px-6 md:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-md">
                <div class="p-6 bg-yellow-200 border-b border-gray-200">
                  <div class="bg-white rounded-xl py-5">
                    <img class="h-15 max-w-md px-5 py-4" src="{{asset('img/insite-logo-black-text.png')}}" alt="IMC Logo">
                    <h1 class="font-sans text-center font-extrabold text-3xl text-blue-800">
                      UNLOCK SERIAL AND PIN
                    </h1>
                  </div>
                    
                    <form action="{{ url('create') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group flex flex-col mb-4">
                        <label class="mb-2 font-bold text-lg text-grey-darkest" for="first-name">Full Name</label>
                        <input class="border rounded-xl py-2 px-3 text-grey-darkest" name="name" type="text" id="name" />
                        </div>
                        {{-- <div class="form-group flex flex-col mb-4">
                        <label class="mb-2 font-bold text-lg text-grey-darkest" for="last-name">Last Name</label>
                        <input class="border rounded-xl py-2 px-3 text-grey-darkest" type="text" id="last-name" />
                        </div> --}}
                        <div class="form-group flex flex-col mb-4">
                        <label class="mb-2 font-bold text-lg text-grey-darkest" for="email">Email Address</label>
                        <input class="border rounded-xl py-2 px-3 text-grey-darkest" name="email" type="email" id="email-address" required />
                        </div>
                        <div class="form-submit flex flex-col mb-4">
                        <button class="border rounded-xl bg-blue-800 hover:bg-blue-600 px-5 py-2 text-white text-base" type="submit"> Unlock </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
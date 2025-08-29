@extends('layouts.default', ['title' => 'Online Payment'])

@section('content')
@include('layouts.shared/page-title', ['title' => 'Online Payment'] )
<section class="lg:py-10 py-6">
  <div class="container">
    <div class="max-w-2xl mx-auto border border-default-200 rounded-lg p-6">
      <div class="mb-6 text-center">
        <img src="/images/brand/logo-dark.svg" class="h-8 mx-auto mb-2" alt="">
        <h3 class="text-xl font-semibold text-default-800">Payment details</h3>
        <p class="text-sm text-default-500">Complete your online payment securely</p>
      </div>

      <div class="grid gap-4">
        <div>
          <label class="block text-sm text-default-700 mb-2">Cardholder name</label>
          <input class="block w-full bg-transparent rounded-full py-2.5 px-4 border border-default-200" type="text" placeholder="John Appleseed">
        </div>
        <div>
          <label class="block text-sm text-default-700 mb-2">Card number</label>
          <input class="block w-full bg-transparent rounded-full py-2.5 px-4 border border-default-200" type="text" placeholder="1234 5678 9011 2345">
        </div>
        <div class="grid grid-cols-2 gap-4">
          <div>
            <label class="block text-sm text-default-700 mb-2">MM/YY</label>
            <input class="block w-full bg-transparent rounded-full py-2.5 px-4 border border-default-200" type="text" placeholder="MM/YY">
          </div>
          <div>
            <label class="block text-sm text-default-700 mb-2">CVV</label>
            <input class="block w-full bg-transparent rounded-full py-2.5 px-4 border border-default-200" type="text" placeholder="CVV">
          </div>
        </div>
      </div>

      <div class="flex items-center justify-between mt-6 text-sm">
        <div>
          <p class="text-default-600">Merchant name</p>
          <p class="font-medium text-default-800">Yum Restaurant</p>
        </div>
        <div class="text-right">
          <p class="text-default-600">Total amount</p>
          <p class="font-semibold text-default-800">{{ $order->formatted_total }}</p>
        </div>
      </div>

      <form class="mt-6" method="POST" action="{{ route('checkout.payment.complete', $order->id) }}">
        @csrf
        <button class="w-full inline-flex items-center justify-center rounded-full border border-primary bg-primary px-10 py-3 text-center text-sm font-medium text-white shadow-sm transition-all duration-500 hover:bg-primary-500">Pay</button>
      </form>

      <div class="text-center mt-4">
        <a href="{{ route('checkout.payment.cancel', $order->id) }}" class="text-default-500 hover:underline text-sm">Cancel and go back</a>
      </div>
    </div>
  </div>
</section>
@endsection


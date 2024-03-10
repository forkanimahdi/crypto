<!-- home.blade.php -->
@extends('layouts.index')

@section('content')
    @include('main.topSection.top_section')
    @include('main.cryptoTable.crypto_table')
    {{-- @foreach ($cryptos as $crypto)
        <div class="flex gap-x-6 text-white">
            <p>Name: {{ $crypto['name'] }}</p>
            <img src="https://s2.coinmarketcap.com/static/img/coins/64x64/{{ $crypto["id"] }}.png" alt="">
        </div>
    @endforeach --}}
@endsection

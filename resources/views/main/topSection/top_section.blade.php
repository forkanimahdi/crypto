<div class="pt-3 px-5">
    <h1 class="text-white text-2xl font-extrabold">Insight</h1>

</div>
<div class="flex items-center justify-evenly px-3 py-2 gap-x-5">

    <div class="h-[32vh] flex flex-col justify-around py-3  bg-[#323546] lg:w-[30%] rounded-lg">
        <div class="h-[15%] flex justify-between  items-center gap-x-2 px-4">
            <p class="text-white font-extrabold m-0">Trends</p>
            <i class="bi bi-fire text-orange-500 text-xl"></i>
        </div>
        <div class="h-[75%] flex  flex-col justify-around">
            @foreach ($trends as $top)
                <div class="h-[30%] px-4 flex items-center justify-between text-white">
                    <div class="flex text-md items-center gap-x-3">
                        <img width="30"
                            src="https://s2.coinmarketcap.com/static/img/coins/64x64/{{ $top['id'] }}.png"
                            alt="">
                        <div class="font-extrabold">{{ $top['name'] }}</div>
                        <div class="text-gray-400 ">{{ $top['symbol'] }}</div>
                    </div>
                    <p
                        class="font-extrabold mb-0 {{ $top['quote']['USD']['percent_change_24h'] < 0 ? 'text-danger' : 'text-success' }}">
                        {{ number_format($top['quote']['USD']['percent_change_24h'], 3) }} %</p>
                </div>
            @endforeach
        </div>
    </div>

    <div class="h-[32vh] flex flex-col justify-around bg-[#323546] lg:w-[30%] rounded-lg">

        <div id="carouselExampleSlidesOnly" class="carousel slide px-2" data-bs-ride="carousel">
            <div class="carousel-inner">
                <a href="" alt class="carousel-item active">
                    <img src="{{ asset('image/crypto1.webp') }}" class="d-block w-100 rounded-xl" alt="...">
                </a>
                <a href="" alt class="carousel-item">
                    <img src="{{ asset('image/crypto1.webp') }}" class="d-block w-100 rounded-xl" alt="...">
                </a>
                <a href="" alt class="carousel-item">
                    <img src="{{ asset('image/crypto1.webp') }}" class="d-block w-100 rounded-xl" alt="...">
                </a>
            </div>
        </div>
    </div>

    <div class="h-[32vh] flex flex-col justify-around py-3 bg-[#323546] lg:w-[30%] rounded-lg">
        <div class="h-[15%] flex justify-between  items-center gap-x-2 px-4">
            <p class="text-white font-extrabold m-0">Recently Added</p>
            <i class="bi bi-clock text-gray-400 text-xl"></i>
        </div>


        <div class="h-[75%] flex  flex-col justify-around">
            @foreach ($latest as $new)
                <div class="h-[30%] px-4 flex items-center justify-between text-white">
                    <div class="flex items-center gap-x-3">
                        <img width="30"
                            src="https://s2.coinmarketcap.com/static/img/coins/64x64/{{ $new['id'] }}.png"
                            alt="">
                        <div class="font-extrabold">{{ $new['name'] }}</div>
                        <div class="text-gray-400 ">{{ $new['symbol'] }}</div>
                    </div>
                    <p class="font-extrabold mb-0"> {{ number_format($new['quote']['USD']['price'], 3) }} $</p>
                </div>
            @endforeach
        </div>
    </div>

</div>

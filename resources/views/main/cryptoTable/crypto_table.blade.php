<div class="px-5">
    <div class="py-2">
        <h1 class="text-white text-2xl font-extrabold">Currencies</h1>

    </div>

    <table class="table">
        <thead>
            <tr class="bg-transparent ">
                <th class="bg-transparent text-white" scope="col">#</th>
                <th class="bg-transparent text-white" scope="col">Name</th>
                <th class="bg-transparent text-white" scope="col">price</th>
                <th class="bg-transparent text-white" scope="col">1h %</th>
                <th class="bg-transparent text-white" scope="col">24h %</th>
                <th class="bg-transparent text-white" scope="col">7d %</th>
                <th class="bg-transparent text-white" scope="col">Market Cap</th>
                <th class="bg-transparent text-white" scope="col">Volume 24h</th>
                <th class="bg-transparent text-white" scope="col">Chart</th>
                <th class="bg-transparent text-white" scope="col">Buy</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cryptos as $crypto)
                <tr valign="middle" class="h-[10vh] border-t-2 border-[#323546] ">
                    {{--  id and rank --}}
                    <td class="bg-transparent text-white">{{ $crypto['cmc_rank'] }}</td>
                    {{--  id and image + name + symbol --}}
                    <td class="bg-transparent text-white">
                        <div class="flex items-center gap-x-3">
                            <img width="35"
                                src="https://s2.coinmarketcap.com/static/img/coins/64x64/{{ $crypto['id'] }}.png"
                                alt="">
                            <div class="">{{ $crypto['name'] }}</div>
                            <div class="">{{ $crypto['symbol'] }}</div>
                        </div>
                    </td>
                    {{--  price --}}
                    <td class="bg-transparent text-white font-extrabold">
                        {{ number_format($crypto['quote']['USD']['price'], 3) }} $</td>
                    {{--  last hour change --}}
                    <td
                        class="bg-transparent font-extrabold {{ $crypto['quote']['USD']['percent_change_1h'] < 0 ? 'text-danger' : 'text-success' }}">
                        {!! $crypto['quote']['USD']['percent_change_1h'] < 0
                            ? '<i class="bi bi-arrow-down"></i>'
                            : '<i class="bi bi-arrow-up"></i>' !!}
                        {{ number_format($crypto['quote']['USD']['percent_change_1h'], 2) }} %
                    </td>
                    {{--  last 24 hour change --}}

                    <td
                        class="bg-transparent font-extrabold {{ $crypto['quote']['USD']['percent_change_24h'] < 0 ? 'text-danger' : 'text-success' }}">
                        {!! $crypto['quote']['USD']['percent_change_24h'] < 0
                            ? '<i class="bi bi-arrow-down"></i>'
                            : '<i class="bi bi-arrow-up"></i>' !!}
                        {{ number_format($crypto['quote']['USD']['percent_change_24h'], 2) }} %
                    </td>
                    {{--  last 7 day change --}}

                    <td
                        class="bg-transparent font-extrabold {{ $crypto['quote']['USD']['percent_change_7d'] < 0 ? 'text-danger' : 'text-success' }}">
                        {!! $crypto['quote']['USD']['percent_change_7d'] < 0
                            ? '<i class="bi bi-arrow-down"></i>'
                            : '<i class="bi bi-arrow-up"></i>' !!}
                        {{ number_format($crypto['quote']['USD']['percent_change_7d'], 2) }} %
                    </td>
                    {{--  MarketCap  --}}

                    <td class="bg-transparent text-white font-extrabold">
                        {{ number_format($crypto['quote']['USD']['market_cap'], 3) }}</td>
                    {{--  Volume  --}}

                    <td class="bg-transparent text-white">
                        {{ $crypto['crypto_volume'] }} {{ $crypto['symbol'] }}
                    </td>
                    <td class="bg-transparent">
                        <div class="">

                            <img class="{{ $crypto['quote']['USD']['percent_change_7d'] < 0 ? '-hue-rotate-60 saturate-200 brightness-50' : 'hue-rotate-90 saturate-150 brightness-75' }}" loading="lazy"
                                src="https://s3.coinmarketcap.com/generated/sparklines/web/7d/2781/{{ $crypto['id'] }}.svg"
                                alt="">
                        </div>
                    </td>

                    <td class="bg-transparent">
                        <a class="no-underline px-5 py-2 bg-green-600 rounded-full text-white" target="blank"
                            href="https://www.binance.com/en/crypto/buy/USD/{{ $crypto['symbol'] }}">Buy</a>
                    </td>


                </tr>
            @endforeach


        </tbody>
    </table>
</div>

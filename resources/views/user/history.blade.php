@extends('user.layout')

@section('content')
    <div class=" min-h-20"></div>
    <div class="container mx-auto px-4 py-8 mt-10">
        <div class="text-center mb-14">
            <h1 class="text-[54px] font-bold mb-2 custom-span text-[#5C4033]" data-aos="zoom-in-up">History</h1>
            <p class="text-[rgb(92,64,51)] font3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                tempor
                incididunt</p>
        </div>
        <div class="space-y-6">
            @if ($histories->isEmpty())
                <p class="text-center text-gray-500 font3 mb-16">Tidak ada data history untuk ditampilkan.</p>
            @else
                @foreach ($histories as $history)
                    <div
                        class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col lg:flex-row items-center border border-gray-200 relative">

                        <div class="flex-1 p-6">
                            <h2 class="text-2xl font-bold text-gray-800 mb-4 font3">Order ID: ABC- {{ $history->id }}</h2>
                            <div class="space-y-2">
                                <p class="text-gray-600 font3"><pre><strong>Order Date            :</strong>  {{ $history->order_date }}</pre></p>
                                <p class="text-gray-600 font3"><pre><strong>Address                  :</strong>  {{ $history->address }}</pre> </p>
                                <p class="text-gray-600 font3"><pre><strong>Total Price             :</strong>  Rp{{ number_format($history->total_price, 0, ',', '.') }}</pre></p>
                                <p class="text-gray-600 font3"><pre><strong>Tipe                         :</strong>  {{ $history->tipe == 1 ? 'Katalog' : ($history->tipe == 2 ? 'Custom' : 'Tidak Diketahui') }}</pre></p>
                                <p class="text-gray-600 font3"><pre><strong>Status                     :</strong>  {{ $history->is_validated == 0 ? 'Pembayaran Belum Divalidasi' : ($history->is_done == 0 ? 'Barang masih diproses' : ($history->is_done == 1 ? 'Barang sudah jadi' : ($history->is_done == 2 ?? 'Barang sudah diambil'))) }}</pre></p>
                            </div>
                        </div>

                        <div class="absolute bottom-4 right-4 px-4 py-2 rounded-lg"
                            style="background: linear-gradient(to right, #5C4033, #4D4C1C)">
                            <a href="{{ route('historydetail', $history->id) }}"
                                class=" font4 text-white block rounded-lg shadow font3 hover:bg-[#5C4033] hover:shadow-md  focus:ring-0 motion-reduce:transition-none dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong">
                                LIHAT DETAIL
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection

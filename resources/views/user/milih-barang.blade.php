@extends('user.layout')
@section('content')
    <div class=" min-h-20"></div>
    <div class="container mx-auto my-10 px-5">
        <div class="text-center mb-14">
            <h1 class="text-[54px] font-bold mb-2 custom-span text-[#5C4033]" data-aos="zoom-in-up">All Collection</h1>
            <p class="text-[rgb(92,64,51)] font3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                tempor
                incididunt</p>
        </div>
        <a href="{{ route('cart') }}">
            <div class="fixed z-50 bottom-4 right-4">
                <div class="relative">
                    <button class="bg-gray-200 hover:bg-gray-500 p-3 rounded-full shadow-2xl">
                        <img src="{{ asset('img/shopping-cart.png') }}" alt="Cart Button" class="w-14 h-14 p-1">
                    </button>
                    <span
                        class="absolute top-0 right-0 bg-[rgb(92,64,51)] border-white border text-white text-xs font-bold rounded-full w-6 h-6 flex items-center justify-center shadow-lg">
                        {{ count(session('cart', [])) }}
                    </span>
                </div>
            </div>
        </a>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5  px-12 place-items-center">
            @foreach ($catalog as $item)
                <div class="relative w-[250px] h-[310px] shadow-[0_3px_10px_rgb(0,0,0,0.2)] rounded-md grid grid-rows-7 mb-8"
                    style="background: linear-gradient(to right, #5C4033, #4D4C1C);">
                    <button class="row-span-7 flex flex-col gap-1 text-left"
                    onclick="window.location.href='{{ route('detail-barang', $item->id) }}'">
                        <img src="{{ asset('storage/uploads/catalog/' . $item->image) }}" alt="Image"
                            class="w-full h-[150px] object-cover rounded-sm">
                        <div class="pt-4 px-4 ">
                            <h1 class="font4 font-semibold text-[16px] text-[#F5E9D3]">{{ $item->name }}</h1>
                            <h1 class="font3 font-bold text-[14px] leading-4 text-[#F5E9D3]">Rp. {{ $item->price }}</h1>
                            <h1 class="font3 leading-5 mt-2 text-[12px] text-red-100">Stok Tersisa {{ $item->stock }} pcs
                            </h1>
                        </div>
                        <a class="flex justify-center" href="{{ route('add-cart', $item->id) }}">
                            <button
                            class="rounded-md font4 w-full inline-block !bg-[#dfdfdf] m-4 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-black shadow-2xl transition duration-150 ease-in-out focus:shadow-md focus:outline-none focus:ring-0  active:shadow-primary-2 motion-reduce:transition-none dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong">
                            Masukkan ke Tas
                        </button>
                        </a>
                    </button>
                </div>
            @endforeach
        </div>
    </div>
@endsection

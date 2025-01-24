@extends('user.layout')
@section('content')
<div class=" min-h-20"></div>
<div class="grid lg:grid-cols-2 grid-cols-1">
    <div class="flex justify-center mt-3">
        <img src="{{ asset('storage/uploads/catalog/' . $barang->image) }}" alt="" class="h-[495px] w-full m-20" />
    </div>

    <div class="flex flex-col justify-start m-20 relative">
        <h1 class="font-bold font4 lg:text-[44px] leading-10 text-[#5C4033]">{{ $barang->name }}</h1>
        <h1 class="font-bold font3 text-[38px] leading-20 text-[#5C4033]">Rp. {{ $barang->price }}</h1>
        <hr class="h-px w-full mt-4 mb-4 bg-gray-700 border-0 text-[#5C4033]">
        <h1 class="font-bold font3 text-[30px] leading-20 text-[#5C4033]">Stock Tersisa: {{ $barang->stock }}</h1>
        <hr class="h-px w-full mt-4 mb-5 bg-gray-700 border-0 text-[#5C4033]">
        <h1 class="font-bold font3 text-[20px] leading 5 text-[#5C4033]">Deskripsi: {{ $barang->description }}</h1>
        <div class="flex justify-center">
        <button
            type="button"
            onclick="window.location.href='{{ route('add-cart', $barang->id) }}'"
            class="font3 rounded-md absolute bottom-0 w-full h-16 inline-block !bg-[#7B5A49] px-6 pb-2 pt-2.5 text-3xl font-medium leading-normal text-[#F5E9D3] shadow-sm transition duration-150 ease-in-out hover:bg-[#6B4B3A] hover:shadow-md focus:bg-[#4B3226] focus:shadow-md focus:outline-none focus:ring-0 active:bg-[#3E2721] active:shadow-primary-2 motion-reduce:transition-none dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong" onclick="window.location.href='{{ route('milih-barang') }}'">
            Masukkan ke Tas
        </button>
    </div>
    </div>
</div>
@endsection
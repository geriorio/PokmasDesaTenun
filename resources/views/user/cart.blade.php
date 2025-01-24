@extends('user.layout')
@section('content')
    <div class="min-h-20"></div>
    <div class="container mx-auto my-10 px-5">
        <div class="text-center mb-14">
            <h1 class="text-[54px] font-bold mb-2 custom-span text-[#5C4033]" data-aos="zoom-in-up">Cart</h1>
        </div>
        
        @if ($cart == null)
            <div class="text-center">
                <h1 class="text-[30px] font3 font-bold mb-2 p-24 custom-span text-[#5C4033]" data-aos="zoom-in-up">
                    Your cart is empty, please add some items to your cart!
                </h1>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 px-12 place-items-center">
                @foreach ($cart as $value)
                    <div class="relative w-[250px] h-[350px] shadow-[0_3px_10px_rgb(0,0,0,0.2)] rounded-md mb-8 group"
                        style="background: linear-gradient(to right, #5C4033, #4D4C1C);">
                        
                        <!-- Gambar produk dengan tombol silang -->
                        <div class="relative h-2/3">
                            <img src="{{ asset('storage/uploads/catalog/' . $value['image']) }}" alt="{{ $value['name'] }}" 
                                class="w-full h-full object-cover rounded-sm transition-transform duration-300">
                            
                            <!-- Tombol silang di atas gambar -->
                            <a href="{{ route('delete-from-cart', $value) }}">
                                <button
                                    class="absolute top-2 right-2 text-white bg-red-500 rounded-full w-6 h-6 flex items-center justify-center hover:bg-red-700 focus:outline-none">
                                    &times;
                                </button>
                            </a>
                        </div>
            
                        <!-- Informasi produk di bawah gambar -->
                        <div class="pt-2 px-4 h-1/3 flex flex-col justify-between">
                            <h1 class="font4 font-semibold text-[16px] text-[#F5E9D3] group-hover:text-white transition-colors duration-300">{{ $value['name'] }}</h1>
                            <h1 class="font3 font-bold text-[14px] leading-4 text-[#F5E9D3] group-hover:text-white transition-colors duration-300">
                                Rp. {{ number_format($value['price'], 0, ',', '.') }}
                            </h1>
                            <h1 class="font3 leading-10 mt-2 text-[12px] text-red-100 group-hover:text-red-200 transition-colors duration-300">
                                Jumlah: {{ $value['quantity'] }}
                            </h1>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <!-- Button "Lanjutkan Pembayaran" placed below the cart items -->
            <div class="mt-8 flex justify-center">
                <a href="{{ route('detail-payment') }}" class=" font3 bg-gradient-to-r from-[#5C4033] to-[#4D4C1C] text-white px-10 py-4 rounded-md shadow-lg text-lg font-semibold hover:from-[#4d3626] hover:to-[#392b1a] transition-all duration-300">
                    Lanjutkan Pembayaran
                </a>
            </div>
        @endif
    </div>
@endsection
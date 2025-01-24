@extends('user.layout')

@section('content')
    <div class=" min-h-20"></div>
    <div class="container mx-auto px-4 py-8 mt-10">

        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800 font3">Detail Order ID #{{ $nama->id }}</h1>
        </div>

        <a href="{{route('history')}}"><button
                class=" bg-[#5C4033] text-white hover:bg-[#4D4C1C] px-4 py-2 my-5 rounded-md">Back</button></a>

        <div class="">
            @foreach ($order as $item)
                <div
                    class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col lg:flex-row items-center border border-gray-200 relative">

                    <div class="w-full lg:w-1/3  h-48 m-5">
                        <img src="{{ asset('storage/uploads/catalog/' . $item->barangJual->image) }}" alt="Sarung Tenun Biru"
                            class="object-contain w-full h-full">
                        <!-- Menggunakan object-contain agar gambar tidak terpotong dan sesuai ukuran card -->
                    </div>

                    <div class="flex-1 p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-4 font3">
                            <pre>Nama Barang : {{ $item->barangJual->name }}</pre>
                        </h2>
                        <div class="space-y-2">
                            <p class="text-gray-600 font3">
                                <pre><strong>Jumlah  :</strong>  {{ $item->quantity }}</pre>
                            </p>
                            <p class="text-gray-600 font3">
                                <pre><strong>Harga     :</strong>  {{ $item->price }}</pre>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

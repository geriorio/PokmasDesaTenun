@extends('user.layout')

@section('style')
    <style>
        .form-cont * {
            color: #5c4033;
        }
    </style>
@endsection
@section('content')
    <div class="grid grid-cols-2 pt-24">
        <div class="grid grid-cols-1 mx-32">
            <div class="grid grid-cols-1 md:grid-cols-2 place-items-center mt-24 overflow-auto h-[480px]">
                @foreach ($cart as $value)
                    <div class="relative w-[250px] h-[350px] shadow-[0_3px_10px_rgb(0,0,0,0.2)] rounded-md mb-6 group"
                        style="background: linear-gradient(to right, #5C4033, #4D4C1C);">
                        <!-- Gambar produk dengan tombol silang -->
                        <div class="relative h-2/3">
                            <img src="{{ asset('storage/uploads/catalog/' . $value['image']) }}" alt="{{ $value['name'] }}"
                                class="w-full h-full object-cover rounded-sm">
                        </div>

                        <!-- Informasi produk di bawah gambar -->
                        <div class="pt-2 px-4 h-1/3 flex flex-col justify-between">
                            <h1
                                class="font4 font-semibold text-[16px] text-[#F5E9D3] group-hover:text-white transition-colors duration-300">
                                {{ $value['name'] }}
                            </h1>
                            <h1
                                class="font3 font-bold text-[14px] leading-4 text-[#F5E9D3] group-hover:text-white transition-colors duration-300">
                                Rp. {{ number_format($value['price'], 0, ',', '.') }}
                            </h1>
                            <!-- Bagian jumlah dengan tombol -->
                            <div class="mt-2 mb-3 flex items-center justify-center">
                                <div class="flex items-center gap-2">
                                    <!-- Tombol Minus -->
                                    <button
                                        class="w-6 h-6 flex items-center justify-center border border-green-500 rounded-full text-green-500 hover:bg-green-500 hover:text-white transition-colors duration-300 decrement-btn"
                                        data-id="{{ $value['id'] }}">
                                        -
                                    </button>
                                    <!-- Angka Jumlah -->
                                    <span class=" text-[#F5E9D3] quantity"
                                        data-id="{{ $value['id'] }}">{{ $value['quantity'] }}</span>
                                    <!-- Tombol Plus -->
                                    <button
                                        class="increment-btn w-6 h-6 flex items-center justify-center border border-green-500 rounded-full text-green-500 hover:bg-green-500 hover:text-white transition-colors duration-300"
                                        data-id="{{ $value['id'] }}">
                                        +
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="w-full pt-24">
            <h1 class="w-full text-center custom-span text-5xl font-bold text-[#5c4033]">Pembayaran</h1>
            <div class="w-full justify-center flex">
                <form id="payment-form" class="contents">
                    <div class="w-[500px] shadow-xl h-fit p-8 form-cont gap-y-4 flex flex-col mb-16">
                        <div class="w-full hidden">
                            <p class="font-semibold">Nama</p>
                            <input type="text" name="customer_id"
                                class="w-full h-[35px] border-2 rounded border-[#5c4033] pl-1" value="{{ $customer->id }}">
                        </div>
                        <div class="w-full">
                            <p class="font-semibold">Nama</p>
                            <input type="text" name="customer_name"
                                class="w-full h-[35px] border-2 rounded border-[#5c4033] pl-1"
                                value="{{ $customer->name }}">
                        </div>
                        <div class="w-full">
                            <p class="font-semibold">Nomor HP</p>
                            <input type="text" name="customer_wa"
                                class="w-full h-[35px] border-2 rounded border-[#5c4033] pl-1"
                                value="{{ $customer->customer_wa }}">
                        </div>
                        <div class="w-full">
                            <p class="font-semibold">Alamat</p>
                            <input type="text" name="address"
                                class="w-full h-[35px] border-2 rounded border-[#5c4033] pl-1"
                                value="{{ $customer->address }}">
                        </div>
                        <div class="w-full">
                            <p class="font-semibold">Bukti Transfer</p>
                            <input
                                class="relative m-0 block w-full min-w-0 flex-auto cursor-pointer rounded border-2 border-[#5c4033] bg-transparent bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-surface transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:me-3 file:cursor-pointer file:overflow-hidden file:rounded-none file:border-0 file:border-e file:border-solid file:border-inherit file:bg-transparent file:px-3  file:py-[0.32rem] file:text-surface focus:border-primary focus:text-gray-700 focus:shadow-inset focus:outline-none"
                                type="file" name="image" />
                        </div>
                        <button type="button" data-te-ripple-init data-te-ripple-color="light" id="submit"
                            class="w-full h-[40px] bg-[#5c4033] !text-white font-semibold rounded mt-4">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function updateQuantityInSession(id, newQuantity) {
            fetch("{{ route('update-qty') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        id: id,
                        quantity: newQuantity
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log('Quantity updated in session');
                    } else {
                        console.error('Failed to update quantity in session');
                    }
                })
                .catch(error => {
                    console.error('Error updating quantity in session', error);
                });
        }

        document.addEventListener('DOMContentLoaded', function() {

            document.querySelectorAll('.increment-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const quantityElement = document.querySelector(`.quantity[data-id="${id}"]`);
                    let quantity = parseInt(quantityElement.innerText);
                    quantityElement.innerText = quantity + 1;

                    updateQuantityInSession(id, quantity + 1);
                });
            });

            document.querySelectorAll('.decrement-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const quantityElement = document.querySelector(`.quantity[data-id="${id}"]`);
                    let quantity = parseInt(quantityElement.innerText);
                    if (quantity > 1) {
                        quantityElement.innerText = quantity - 1;
                    }

                    updateQuantityInSession(id, quantity - 1);
                });
            });

            $('#submit').on('click', function() {
                Swal.fire({
                    icon: 'warning',
                    title: 'Konfirmasi Pembayaran',
                    text: 'Apakah anda yakin ingin memproses pembayaran ini?',
                    showDenyButton: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        const data = new FormData($('#payment-form')[0]);
                        fetch(`{{ route('katalog.store') }}`, {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                },
                                body: data
                            }).then(response => response.json())
                            .then(response => {
                                if (response.success) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil',
                                        text: 'Pembayaran berhasil'
                                    }).then(() => {
                                        window.location.href = '/home';
                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Gagal',
                                        text: response.message
                                    });
                                }
                            }).catch(error => {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal',
                                    text: 'Terjadi kesalahan pada sistem. Silahkan coba lagi'
                                });
                            });
                    }
                });
            });
        });
    </script>
@endsection

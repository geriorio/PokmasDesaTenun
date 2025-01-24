@extends('admin.layout')

@section('content')
    <div class="flex flex-col w-full py-8 rounded-lg shadow-xl items-center justify-center mb-10">
        <h1 class="text-center text-4xl uppercase font-bold mb-2">{{ $nama->customer_name }}</h1>
        <h1 class="text-center text-md uppercase font-bold mb-2">Order : {{ $nama->order_date }}</h1>

    </div>
    <a href="{{ route('viewOrder') }}">
        <button class="bg-blue-500 p-2 px-5 rounded-lg text-white hover:bg-blue-900 mb-5">
            Back
        </button>
    </a>
    @foreach ($order as $item)
        <div class="grid grid-cols-6 w-full py-8 rounded-lg shadow-md mb-10 bg-white">
            <div class="col-span-2 px-[30px] h-[200px]">
                @if ($item->barangJual->tipe == 2)
                    <img src="{{ asset('storage/uploads/request/' . $item->barangJual->image) }}" alt=""
                        class="w-full h-full">
                @else
                    <img src="{{ asset('storage/uploads/catalog/' . $item->barangJual->image) }}" alt=""
                        class="w-full h-full">
                @endif

            </div>
            <div class="col-span-4">
                <div class="flex flex-col gap-5">
                    <div>
                        <h1 class="text-left text-md font-bold ">Name : {{ $item->barangJual->name }}</h1>
                        <h1 class="text-left text-md font-bold ">Quantity : {{ $item->quantity }}</h1>
                        <h1 class="text-left text-md font-bold ">Price : {{ $item->price }}</h1>
                    </div>

                    <div clas="flex self-end">
                        @if ($detail_uang)
                            @if ($item->status == 1)
                                <button class="bg-blue-500 p-2 px-5 rounded-lg text-white hover:bg-blue-900 mb-5"
                                    onclick="update({{ $item->id }})">
                                    Accept
                                </button>
                                <button class="bg-red-500 p-2 px-5 rounded-lg text-white hover:bg-red-900 mb-5"
                                    onclick="updateDecline({{ $item->id }})">
                                    Decline
                                </button>
                            @else
                                @if ($item->status == 2)
                                    <p class="text-gray-500 text-sm font-dm mx-4">Accepted</p>
                                @elseif($item->status == 0)
                                    <p class="text-gray-500 text-sm font-dm mx-4">Declined</p>
                                @endif
                            @endif
                        @endif

                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('script')
    <script>
        function update(id) {
            console.log("data yang dihapus :", id);
            var url_update = "{{ route('acceptOrder', ':id') }}".replace(':id', id);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Remove it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url_update,
                        type: 'PUT',
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: async function(response) {
                            if (response.success) {
                                await Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: response.message,
                                    timer: 2000,
                                    showConfirmButton: false
                                })
                                window.location.reload();

                            } else {
                                await Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: response.message,
                                    timer: 2000,
                                    showConfirmButton: false
                                })
                            }
                        }
                    });
                }
            })
        }

        function updateDecline(id) {
            console.log("data yang dihapus :", id);
            var url_update = "{{ route('declineOrder', ':id') }}".replace(':id', id);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Remove it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url_update,
                        type: 'PUT',
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: async function(response) {
                            if (response.redirect) {
                                await Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: 'Redirecting...',
                                    timer: 2000,
                                    showConfirmButton: false
                                });
                                window.location.href = response.redirect;
                            } else if (response.success) {
                                await Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: response.message,
                                    timer: 2000,
                                    showConfirmButton: false
                                });
                                window.location.reload();
                            } else {
                                await Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: response.message,
                                    timer: 2000,
                                    showConfirmButton: false
                                });
                            }
                        },
                        error: function(xhr) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Something went wrong!',
                                timer: 2000,
                                showConfirmButton: false
                            });
                        }
                    });
                }
            });
        }
    </script>
@endsection

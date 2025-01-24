@extends('admin.layout')

@section('content')
    <div class="flex flex-col w-full py-8 rounded-lg shadow-xl items-center justify-center mb-10">
        <h1 class="text-center text-4xl uppercase font-bold mb-2">Order Selesai</h1>
    </div>
    <div
        class="data-table-container  px-8 w-full mb-1 @if (!request()->has('tab') || request()->get('tab') == 'table') {{ 'opacity-100' }} @else {{ 'hidden opacity-0' }} @endif">
        <div class="text-left lg:mt-[40px]">
            <h1 class="text-xl font-medium">From Catalog</h1>
        </div>
        <div class="flex flex-row flex-wrap lg:mt-[20px] gap-7">
            @foreach ($order_catalog_validate as $item)
                <div class="p-2 w-[250px] h-auto shadow-[0_3px_10px_rgb(0,0,0,0.2)] bg-white rounded-xl">
                    <div class="flex flex-col gap-1">
                        <p class="text-sm font-medium px-2 pt-4">Buyer : {{ $item->customer->name }}</p>
                        <p class="text-sm font-medium px-2">Order_date: <span
                                class="text-sm font-normal">{{ $item->order_date }}</span> </p>
                        <p class="text-sm font-medium px-2">No Whatsapp: <span
                                class="text-sm font-normal">{{ $item->customer->customer_wa }}</span> </p>
                        <p class="text-sm font-medium px-2 pb-4">Address: <span
                                class="text-sm font-normal">{{ $item->customer->address }}</span> </p>
                    </div>
                    <a href="{{ route('order.detail', $item->id) }}">
                        <button class="bg-black text-white w-full rounded-lg py-2">Details</button>
                    </a>
                    @php
                        $count = 0;
                    @endphp
                    @foreach ($item->orderDetails as $items)
                        @if ($items->status == 1)
                            @php
                                $count++;
                            @endphp
                        @endif
                    @endforeach
                    @if ($count == 0)
                        @if ($item->is_done == 0)
                            <button class=" bg-green-600 text-white w-full rounded-lg py-2 mt-2 hover:bg-green-800"
                                onclick="isdone({{ $item->id }})">Done</button>
                        @elseif($item->is_done == 1)
                            <button class=" bg-green-600 text-white w-full rounded-lg py-2 mt-2 hover:bg-green-800"
                                onclick="isdone({{ $item->id }})">Done</button>
                        @else
                            <button
                                class="bg-green-600 text-white w-full rounded-lg py-2 mt-2 hover:bg-green-800 disabled:bg-gray-400 disabled:cursor-not-allowed"
                                disabled>
                                Sudah diambil/dikirim
                            </button>
                        @endif
                    @endif

                </div>
            @endforeach

        </div>
        <div class="text-left lg:mt-[20px]">
            <h1 class="text-xl font-medium">From Request</h1>
        </div>
        <div class="flex flex-row flex-wrap lg:mt-[20px] gap-7">
            @foreach ($order_request_validate as $item)
                <div class="p-2 w-[250px] h-auto shadow-[0_3px_10px_rgb(0,0,0,0.2)] bg-white rounded-xl">
                    <div class="flex flex-col gap-1">
                        <p class="text-sm font-medium px-2 pt-4">Buyer : {{ $item->customer->name }}</p>
                        <p class="text-sm font-medium px-2">Order_date: <span
                                class="text-sm font-normal">{{ $item->order_date }}</span> </p>
                        <p class="text-sm font-medium px-2 pb-4">Total Price: <span
                                class="text-sm font-normal">{{ $item->customer->address }}</span> </p>
                    </div>
                    <a href="{{ route('order.detail', $item->id) }}">
                        <button class="bg-black text-white w-full rounded-lg py-2">Details</button>
                    </a>
                    @php
                        $count = 0;
                    @endphp
                    @foreach ($item->orderDetails as $items)
                        @if ($items->status == 1)
                            @php
                                $count++;
                            @endphp
                        @endif
                    @endforeach
                    @if ($count == 0)
                        @if ($item->is_done == 0)
                            <button class=" bg-green-600 text-white w-full rounded-lg py-2 mt-2 hover:bg-green-800"
                                onclick="isdone({{ $item->id }})">Done</button>
                        @else
                            <button
                                class="bg-green-600 text-white w-full rounded-lg py-2 mt-2 hover:bg-green-800 disabled:bg-gray-400 disabled:cursor-not-allowed"
                                disabled>
                                Already Done
                            </button>
                        @endif
                    @endif

                </div>
            @endforeach

        </div>
    </div>
@endsection

@section('script')
    <script>
        function isdone(id) {
            console.log(id);
            var url_update = "{{ route('DoneOrder', ':id') }}".replace(':id', id);
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to mark this order as done?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
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
    </script>
@endsection

@extends('admin.layout')

@section('content')
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .animated-input {
            animation: fadeIn 1s ease-in-out;
        }


        #inputContainer::-webkit-scrollbar {
            width: 0;
            height: 0;
        }

        #inputContainer:hover::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        #inputContainer::-webkit-scrollbar-thumb {
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 4px;
        }
    </style>

    <!-- Order from catalog -->
    <div class="flex flex-col w-full py-8 rounded-lg shadow-xl items-center justify-center mb-10">
        <h1 class="text-center text-4xl uppercase font-bold mb-2">Incoming Order</h1>
    </div>

    <div>
        <button
            class="btn-detail rounded bg-primary px-6 pb-2 pt-2.5 text-xs text-center font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgb(59,113,202)],0_4px_18px_0_rgba(20,164,77,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgb(59,113,202)],0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgb(59,113,202)],0_4px_18px_0_rgba(20,164,77,0.2)rgb(59,113,202)]rgba(20,164,77,0.1)]"
            data-te-toggle="modal" data-te-target="#Modal">Add Order Manually</button>
    </div>

    <div class="flex flex-col w-full py-8 rounded-lg shadow-xl items-center justify-center mb-10">
        <div class="w-full border-b-2 pt-3 shadow-lg">
            <div class="w-full grid grid-cols-2">
                <h5 class="table-layout-button @if (!request()->has('tab') || request()->get('tab') == 'table') {{ 'bg-gray-100 shadow-inner' }} @endif text-center md:text-2xl max-md:text-xl font-bold py-2 border-l-[1px] border-slate-300
                hover:cursor-pointer select-none transition-all ease-in"
                    data-tab-state="table">
                    Sudah Bayar</h5>
                <h5 class="cards-layout-button @if (request()->get('tab') == 'cards') {{ 'bg-gray-100 shadow-inner' }} @endif text-center md:text-2xl max-md:text-xl font-bold py-2 border-r-[1px] border-slate-300
                hover:cursor-pointer select-none transition-all ease-in"
                    data-tab-state="cards">
                    Belum Bayar</h5>
            </div>
        </div>
        <div
            class="data-table-container  px-8 w-full mb-1 @if (!request()->has('tab') || request()->get('tab') == 'table') {{ 'opacity-100' }} @else {{ 'hidden opacity-0' }} @endif">
            <div class="text-left lg:mt-[40px]">
                <h1 class="text-xl font-medium">From Catalog Sudah Bayar</h1>
            </div>
            <div class="flex flex-row flex-wrap lg:mt-[20px] gap-7">
                @foreach ($order_catalog_validate as $item)
                    <div class="p-2 w-[250px] h-auto shadow-[0_3px_10px_rgb(0,0,0,0.2)] bg-white rounded-xl">
                        <div class="flex flex-col gap-1">
                            <p class="text-sm font-medium px-2 pt-4">Buyer : {{ $item->customer->name }}</p>
                            <p class="text-sm font-medium px-2">Order_date: <span
                                    class="text-sm font-normal">{{ $item->order_date }}</span> </p>
                            <p class="text-sm font-medium px-2 pb-4">Total Price: <span
                                    class="text-sm font-normal">{{ $item->total_price }}</span> </p>
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
            <div class="text-left lg:mt-[20px]">
                <h1 class="text-xl font-medium">From Request Sudah Bayar</h1>
            </div>
            <div class="flex flex-row flex-wrap lg:mt-[20px] gap-7">
                @foreach ($order_request_validate as $item)
                    <div class="p-2 w-[250px] h-auto shadow-[0_3px_10px_rgb(0,0,0,0.2)] bg-white rounded-xl">
                        <div class="flex flex-col gap-1">
                            <p class="text-sm font-medium px-2 pt-4">Buyer : {{ $item->customer->name }}</p>
                            <p class="text-sm font-medium px-2">Order_date: <span
                                    class="text-sm font-normal">{{ $item->order_date }}</span> </p>
                            <p class="text-sm font-medium px-2 pb-4">Total Price: <span
                                    class="text-sm font-normal">{{ $item->total_price }}</span> </p>
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
        <div
            class="data-cards-container  px-8 w-full mb-1 @if (request()->get('tab') == 'cards') {{ 'opacity-100' }} @else {{ 'hidden opacity-0' }} @endif">
            <div class="text-left lg:mt-[40px]">
                <h1 class="text-xl font-medium">From Catalog Belum Bayar</h1>
            </div>
            <div class="flex flex-row flex-wrap lg:mt-[20px] gap-7">
                @foreach ($order_catalog_notvalidate as $item)
                    <div class="p-2 w-[250px] h-auto shadow-[0_3px_10px_rgb(0,0,0,0.2)] bg-white rounded-xl">
                        <div class="flex flex-col gap-1">
                            <p class="text-sm font-medium px-2 pt-4">Buyer : {{ $item->customer->name }}</p>
                            <p class="text-sm font-medium px-2">Order_date: <span
                                    class="text-sm font-normal">{{ $item->order_date }}</span> </p>
                            <p class="text-sm font-medium px-2 pb-4">Total Price: <span
                                    class="text-sm font-normal">{{ $item->total_price }}</span> </p>
                        </div>
                        <a href="{{ route('order.detail', $item->id) }}">
                            <button class="bg-black text-white w-full rounded-lg py-2 my-1">Details</button>
                        </a>
                        <button class="bg-warning text-white w-full rounded-lg py-2 my-1"
                            onclick='viewDetails({{ $item }})'>
                            Bukti Transfer
                        </button>
                        <button class="bg-success text-white w-full rounded-lg py-2 my-1"
                            onclick="isvalidate({{ $item->id }})">Validasi</button>
                    </div>
                @endforeach

            </div>
            <div class="text-left lg:mt-[20px]">
                <h1 class="text-xl font-medium">From Request Belum Bayar</h1>
            </div>
            <div class="flex flex-row flex-wrap lg:mt-[20px] gap-7">


            </div>
        </div>
    </div>

    <!-- Choose Barang Modal -->
    <div id="chooseBarangModal" class="hidden fixed inset-0 z-[55] bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-6 rounded-lg shadow-lg w-[90%] md:w-[50%] relative">
            <!-- Close Icon Button -->
            <button class="absolute top-2 right-2 text-gray-500" onclick="closeModal('chooseBarangModal')">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <h2 class="text-xl font-bold mb-4">Choose Barang</h2>
            <div class="flex flex-col gap-3">
                <!-- List Barang Dummy -->
                <div onclick="selectBarang('Benang Lusi Merah')"
                    class="cursor-pointer flex items-center gap-2 p-2 hover:bg-gray-100 rounded">
                    <img src="{{ asset('img/ulos.jpg') }}" class="w-12 h-12 object-cover rounded">
                    <span>Benang Lusi Merah</span>
                </div>
                <div onclick="selectBarang('Benang Pakan Hitam')"
                    class="cursor-pointer flex items-center gap-2 p-2 hover:bg-gray-100 rounded">
                    <img src="{{ asset('img/ntt.jpg') }}" class="w-12 h-12 object-cover rounded">
                    <span>Benang Pakan Hitam</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Catalog Modal -->
    <div id="modalCatalog" class="hidden fixed inset-0 z-[9999] bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-6 rounded-lg shadow-lg w-[90%] md:w-[50%] relative">
            <!-- Close Icon Button -->
            <button class="absolute top-2 right-2 text-gray-500" onclick="closeModal('modalCatalog')">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <h2 class="text-xl font-bold mb-4">Order Details - From Catalog</h2>
            <div>
                <h5 class="font-bold">Product : </h5>
                <div id="modal-anggota"></div>
            </div>

            <div class="flex justify-end mt-6 gap-3">
                <button class="bg-red-500 text-white px-4 py-2 rounded" onclick="rejectOrder()">Reject</button>
                <button class="bg-green-500 text-white px-4 py-2 rounded" onclick="acceptOrder()">Accept</button>
            </div>
        </div>
    </div>

    <!-- Modal order manual -->
    <div data-te-modal-init
        class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
        id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div data-te-modal-dialog-ref
            class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
            <div
                class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
                <div
                    class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                    <!--Modal title-->
                    <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                        id="exampleModalLabel">
                        Add Order
                    </h5>
                    <!--Close button-->
                    <button type="button"
                        class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                        data-te-modal-dismiss aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <!--Modal body-->
                <div class="relative flex-auto p-4" data-te-modal-body-ref>
                    <div class="h-[400px] p-2 overflow-hidden overflow-y-scroll" id="inputContainer">

                        <div class="mb-4 w-full">
                            <label for="tipe" class="ml-1">Tipe Pesanan</label>
                            <select id="tipe" name="tipe"
                                class="peer block w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                data-te-select-init>
                                <option value="" selected disabled hidden></option>
                                <option value="1">From Catalog</option>
                                <option value="2">By Request</option>
                            </select>
                        </div>
                        <div class="flex gap-x-4">
                            <div class="relative mb-3 w-full" data-te-input-wrapper-init>
                                <input type="text"
                                    class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                    id="customer_wa" name="customer_wa" placeholder="name" />
                                <label for="name"
                                    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">
                                    Customer WA
                                </label>
                                <div id="dropdown"
                                    class="absolute z-10 w-full mt-1 bg-gray-800 rounded-lg shadow-lg hidden">
                                    <ul id="dropdown-list" class="max-h-60 overflow-y-auto">
                                        <!-- Options will be dynamically added here -->
                                    </ul>
                                </div>
                            </div>
                            <div class="w-[30%]">
                                <button id="kuy"
                                    class=" bg-green-600 text-white w-full rounded-md h-[75%] font-medium text-xs text-center uppercase">SEARCH</button>
                            </div>
                        </div>
                        <div class="flex gap-x-4">
                            <div class="mb-4 w-full">
                                <label for="customer_name" class="ml-1">Customer Name</label>
                                <input class="rounded-md w-full animated-input" name="customer_name" id="customer_name">
                            </div>
                            <div class="mb-4 w-full">
                                <label for="price" class="ml-1">Address</label>
                                <input class="rounded-md w-full animated-input" id="customer_address"
                                    name="customer_address">
                            </div>
                        </div>
                        <div class="mb-4 w-full hidden" id="divtitle">
                            <label for="price" class="ml-1">Judul pesan</label>
                            <input class="rounded-md w-full" id="title">
                        </div>

                        <div class="w-full mb-2 hidden" id="photobutton">
                            <label for="price" class="ml-1">Upload foto request</label>
                            <div class="relative w-full mb-3" data-te-validate="input" data-te-input-wrapper-init>
                                <input
                                    class="relative m-0 block sm:col-span-4 col-span-2 w-full rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary disabled:opacity-60"
                                    type="file" name="image" accept=".png,.jpg,.jpeg" id="image">
                            </div>
                        </div>

                        <div class="mb-4 w-full hidden" id="divdesc">
                            <label for="desc" class="ml-1">Deskripsi</label>
                            <input type="text" class="rounded-md w-full" id="desc" name="desc">
                        </div>

                        <div class="mb-4 w-full hidden" id="divcolor">
                            <label for="desc" class="ml-1">Warna yang dipakai</label>
                            <input type="text" class="rounded-md w-full" id="color" name="color"
                                placeholder="Contoh: Biru, Merah">
                        </div>

                        <div class="mb-4 w-full" id="divsize">
                            <label for="desc" class="ml-1">Ukuran yang dipakai</label>
                            <input type="text" class="rounded-md w-full" id="size" name="size"
                                placeholder="Contoh: S, M, L">
                        </div>

                        <div class="flex gap-x-4">
                            <div class="mb-4 w-full hidden" id="divprice">
                                <label for="price" class="ml-1">Total Price</label>
                                <input class="rounded-md w-full animated-input " id="price">
                            </div>
                        </div>

                        <div class="mb-4 w-full">
                            <label for="order_date" class="ml-1">Order Date</label>
                            <input type="date" class="rounded-md w-full animated-input" name="order_date"
                                id="order_date">
                        </div>

                        <div class="flex flex-col hidden" id="divproduct">
                            <label for="price" class="ml-1">Produk yang dibeli</label>
                            <button id="btn-list"
                                class="mt-3 inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] "
                                data-te-ripple-init data-te-ripple-color="light" data-te-toggle="modal"
                                data-te-target="#detailModal">
                                Tambah barang
                            </button>
                        </div>

                        <div id="product-list" class="hidden">


                        </div>

                        <div class="flex flex-col" id="divinventory">
                            <label for="price" class="ml-1">Bahan-bahan yang dipakai</label>
                            <button id="btn-list-req"
                                class="mt-3 inline-block rounded bg-success px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] "
                                data-te-ripple-init data-te-ripple-color="light" data-te-toggle="modal"
                                data-te-target="#reqModal">
                                Tambah Bahan
                            </button>
                        </div>

                        <div id="invent-list" class="hidden">


                        </div>

                    </div>
                </div>

                <!-- Add bahan -->
                <div data-te-modal-init
                    class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                    id="detailModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div data-te-modal-dialog-ref
                        class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
                        <div
                            class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none">
                            <div
                                class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4">
                                <!--Modal title-->
                                <h5 class="text-xl font-medium leading-normal text-neutral-800" id="editModalLabel">
                                    List produk yang dibeli
                                </h5>
                                <!--Close button-->
                                <button type="button"
                                    class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                                    data-te-modal-dismiss aria-label="Close">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                            <!--Modal body-->
                            <div class="relative flex-auto p-4" data-te-modal-body-ref>
                                <form id="product-form" enctype="multipart/form-data">

                                    <div class="mb-4 w-full">
                                        <select id="name" name="name"
                                            class="peer block w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                            data-te-select-init>
                                            <option value="" selected disabled hidden></option>
                                            @foreach ($barang_juals as $barang_jual)
                                                <option value="{{ $barang_jual->name }}"
                                                    data-id="{{ $barang_jual->id }}"
                                                    data-price="{{ $barang_jual->price }}">{{ $barang_jual->name }}
                                                    ({{ $barang_jual->stock }})
                                                </option>
                                            @endforeach
                                        </select>
                                        <label data-te-select-label-ref>Nama Barang</label>
                                    </div>

                                    <div class="flex gap-x-4">
                                        <div class="mb-4 w-full">
                                            <label for="customer_wa" class="ml-1">Quantity</label>
                                            <input class="rounded-md w-full" type="number" name="quantity"
                                                id="quantity">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--Modal footer-->
                            <div
                                class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4">
                                <button type="button"
                                    class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
                                    data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                                    Close
                                </button>
                                <button type="button" id="submit-detail"
                                    class="ml-1 inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] "
                                    data-te-ripple-init data-te-ripple-color="light">
                                    Save changes
                                </button>
                            </div>
                        </div>
                    </div>
                </div>




                {{-- Detail Modal --}}
                <div data-te-modal-init
                    class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                    id="reqModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div data-te-modal-dialog-ref
                        class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
                        <div
                            class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none">
                            <div
                                class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4">
                                <!--Modal title-->
                                <h5 class="text-xl font-medium leading-normal text-neutral-800" id="editModalLabel">
                                    List bahan yang dipakai
                                </h5>
                                <!--Close button-->
                                <button type="button"
                                    class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                                    data-te-modal-dismiss aria-label="Close">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                            <!--Modal body-->
                            <div class="relative flex-auto p-4" data-te-modal-body-ref>
                                <form id="bahan-form">

                                    <div class="mb-4 w-full">
                                        <select id="name-req" name="name"
                                            class="peer block w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                            data-te-select-init>
                                            <option value="" selected disabled hidden></option>
                                            @foreach ($products as $bahan)
                                                <option value="{{ $bahan->name }}" data-id="{{ $bahan->id }}"
                                                    data-price="{{ $bahan->price }}"
                                                    data-quantity="{{ $bahan->quantity }}">{{ $bahan->name }}
                                                    ({{ $bahan->quantity }})
                                                </option>
                                            @endforeach
                                        </select>
                                        <label data-te-select-label-ref>Nama Bahan</label>
                                    </div>

                                    <div class="flex gap-x-4">
                                        <div class="mb-4 w-full">
                                            <label for="customer_wa" class="ml-1">Quantity</label>
                                            <input class="rounded-md w-full" type="number" name="quantity"
                                                id="quantity-req">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--Modal footer-->
                            <div
                                class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4">
                                <button type="button"
                                    class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
                                    data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                                    Close
                                </button>
                                <button type="button" id="submit-req-detail"
                                    class="ml-1 inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] "
                                    data-te-ripple-init data-te-ripple-color="light">
                                    Save changes
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Modal footer-->
                <div
                    class="flex justify-between flex-shrink-0 flex-wrap items-center  rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                    <div>
                        <h1 class="text-lg">
                            Total: <span class="font-bold">Rp.</span> <span class="font-bold" id="total"></span>
                        </h1>
                    </div>
                    <div class="flex justify-end">
                        <button type="button"
                            class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
                            data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                            Close
                        </button>
                        <button type="button" id="submits"
                            class="ml-1 inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                            data-te-ripple-init data-te-ripple-color="light">
                            Save changes
                        </button>
                        <button type="button" id="submit-request"
                            class="ml-1 hidden rounded bg-success px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                            data-te-ripple-init data-te-ripple-color="light">
                            Save changes
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div data-te-modal-init
        class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
        id="modalDetail" aria-labelledby="exampleModalLabel">
        <div data-te-modal-dialog-ref
            class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
            <div
                class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
                <div
                    class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                    <!--Modal title-->
                    <div class="flex items-center">
                        <h5 class="mr-2 font-bold text-xl">Pembeli: </h5>
                        <p id="modal-nama" class="font-bold text-lg"></p>
                    </div>
                    <!--Close button-->
                    <button type="button"
                        class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                        data-te-modal-dismiss aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <!--Modal body-->
                <div class="relative flex-auto p-4" data-te-modal-body-ref>

                    <div class="flex items-center">
                        <img class="ml-3" id="modal-order" alt="Bukti Transfer"
                            style="max-width: 100%; height: auto;" />
                    </div>

                    {{-- ketua --}}
                </div>
                <!--Modal footer-->
                <div
                    class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                    <button type="button"
                        class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
                        data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            const input = $('#customer_wa');
            const dropdown = $('#dropdown');
            const dropdownList = $('#dropdown-list');
            const teams = @json($customers);
            input.on('input', function() {
                const query = input.val().toUpperCase();
                dropdownList.empty();

                teams.forEach(team => {
                    if (team.customer_wa.toUpperCase().includes(query)) {
                        const listItem = $('<li>').text(team.customer_wa.toUpperCase())
                            .addClass('p-2 text-white cursor-pointer hover:bg-indigo-500')
                            .on('click', function() {
                                input.val(team.customer_wa.toUpperCase());
                                $('#score-field').html(team.customer_wa);
                                dropdown.addClass('hidden');
                            });
                        dropdownList.append(listItem);
                    }
                })
                dropdown.removeClass('hidden');
            });
        });

        document.getElementById('kuy').addEventListener('click', function() {
            const noWa = document.getElementById('customer_wa').value;

            fetch('/fetch-customer?no_wa=' + encodeURIComponent(noWa))
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById('customer_name').value = data.data.name;
                        document.getElementById('customer_address').value = data.data.address;
                        document.getElementById('customer_name').disabled = true;
                        document.getElementById('customer_address').disabled = true;
                        document.getElementById('customer_wa').disabled = true;
                    } else {
                        alert(data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });


        function viewDetails(item) {
            console.log(item);
            const modal = $('#modalDetail');
            $('#modal-nama').text(item.customer.name);
            const baseUrl = "{{ asset('storage/uploads/bukti_transfer') }}";
            const imageElement = $('#modal-order');

            if (item.link_bukti_tf) {
                const fullPath = `${baseUrl}/${item.link_bukti_tf}`;
                imageElement.attr('src', fullPath);
                imageElement.show();
            } else {
                imageElement.hide();
            }
            modal.modal('show');
        }


        function isvalidate(id) {
            console.log(id);
            var url_update = "{{ route('validateOrder', ':id') }}".replace(':id', id);
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to validate this order?",
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
        document.getElementById('tipe').addEventListener('change', function() {
            var value = this.value;

            var divTitle = document.getElementById('divtitle');
            var photoButton = document.getElementById('photobutton');
            var divDesc = document.getElementById('divdesc');
            var divProduct = document.getElementById('divproduct');
            var divInvent = document.getElementById('divinventory');
            var divprice = document.getElementById('divprice');
            var divProductList = document.getElementById('product-list');
            var divInventList = document.getElementById('invent-list');
            var divColor = document.getElementById('divcolor');
            var subKatalog = document.getElementById('submits');
            var subRequest = document.getElementById('submit-request');

            if (value === '1') {
                divTitle.classList.add('hidden');
                photoButton.classList.add('hidden');
                divColor.classList.add('hidden');
                subKatalog.classList.remove('hidden');
                subRequest.classList.add('hidden');
                divDesc.classList.add('hidden');
                divProduct.classList.remove('hidden');
                divInvent.classList.add('hidden');
                divProductList.classList.remove('hidden');
                divInventList.classList.add('hidden');
                divprice.classList.add('hidden');
            } else if (value === '2') {
                divTitle.classList.remove('hidden');
                divColor.classList.remove('hidden');
                subKatalog.classList.add('hidden');
                subRequest.classList.remove('hidden');
                photoButton.classList.remove('hidden');
                divDesc.classList.remove('hidden');
                divProduct.classList.add('hidden');
                divInvent.classList.remove('hidden');
                divProductList.classList.add('hidden');
                divInventList.classList.remove('hidden');
                divprice.classList.remove('hidden');
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#submit-request').on('click', async function(e) {
                e.preventDefault();

                var formData = new FormData();
                formData.append('customer_name', $('#customer_name').val());
                formData.append('customer_wa', $('#customer_wa').val());
                formData.append('address', $('#customer_address').val());
                formData.append('title', $('#title').val());
                formData.append('color', $('#color').val());
                formData.append('size', $('#size').val());
                formData.append('desc', $('#desc').val());
                formData.append('order_date', $('#order_date').val());
                formData.append('total_price', $('#price').val());
                formData.append('image', $('#image')[0].files[0]);
                formData.append('_token', "{{ csrf_token() }}");

                var productsReq = [];

                $('#invent-list .bahan-item').each(function() {
                    var bahan = {
                        name: $(this).find('.bahan-name').text(),
                        quantity: $(this).find('.bahan-quantity').text(),
                    };
                    productsReq.push(bahan);
                });

                formData.append('products', JSON.stringify(productsReq));

                await $.ajax({
                    url: "{{ route('order.request') }}",
                    type: "POST",
                    data: formData,
                    processData: false, // Wajib false untuk FormData
                    contentType: false, // Wajib false untuk FormData
                    success: async function(data) {
                        console.log("Masuk sukses");
                        if (data.success) {
                            await $('#createModal').modal('hide');
                            await Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: data.message,
                            });
                            window.location.reload();
                        } else {
                            await Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: data.message,
                            });
                        }
                    },
                    error: async function(err) {
                        console.log("Masuk error");
                        await Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: err.responseJSON.message,
                        });
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#submits').on('click', async function(e) {
                var name = $('#customer_name').val();
                var customer_wa = $('#customer_wa').val();
                var customer_address = $('#customer_address').val();
                var title = $('#title').val();
                var desc = $('#desc').val();
                var price = $('#price').val();
                var order_date = $('#order_date').val();

                var products = [];
                $('#product-list .product-item').each(function() {
                    var product = {
                        name: $(this).find('.product-name').text(),
                        quantity: $(this).find('.product-quantity').text(),
                        price: $(this).find('.product-price').text(),
                    };
                    products.push(product);
                });
                await $.ajax({
                    url: "{{ route('order.store') }}",
                    type: "POST",
                    data: {
                        customer_name: name,
                        customer_wa: customer_wa,
                        address: customer_address,
                        title: title,
                        desc: desc,
                        total_price: price,
                        order_date: order_date,
                        products: products,
                        _token: "{{ csrf_token() }}"
                    },
                    success: async function(data) {
                        if (data.success) {
                            await $('#createModal').modal('hide');
                            await Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: data.message,
                            });
                            window.location.reload();
                        } else {
                            await Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: data.message,
                            });
                        }
                    },
                    error: async function(err) {
                        await Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: err.responseJSON.message,
                        });
                    }
                });
            });
        });


        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }


        function selectBarang(barangName) {
            const activeInput = document.querySelector('.active-input');
            if (activeInput) {
                activeInput.value = barangName;
                activeInput.classList.remove('active-input');
            }
            closeModal('chooseBarangModal');
        }
    </script>

    <script>
        document.getElementById('price').addEventListener('input', function() {
            var price = parseFloat(this.value) || 0;
            var quantity = parseFloat(document.getElementById('quantity').value) || 1;
            var total = price * quantity;
            document.getElementById('total').textContent = total;
        });

        document.getElementById('quantity').addEventListener('input', function() {
            var price = parseFloat(document.getElementById('price').value) || 0;
            var quantity = parseFloat(this.value) || 1;
            var total = price * quantity;
            document.getElementById('total').textContent = total;
        });


        document.getElementById('btn-list').addEventListener('click', function() {
            $('#detailModal').modal('show');
        });
        let products = [];

        document.getElementById('btn-list-req').addEventListener('click', function() {
            $('#reqModal').modal('show');
        });
        let productsReq = [];

        $('#submit-req-detail').on('click', function() {
            var productName = $('#name-req').val();
            var quantity = parseInt($('#quantity-req').val(),
                10); // awalnya kalau cuma val dibacanya string, makanya diparse ke integer
            var selectedOption = document.querySelector('#name-req option:checked');
            var curQuantity = selectedOption ? parseInt(selectedOption.getAttribute('data-quantity'), 10) :
                0; // Convert to integer

            if (!productName || !quantity) {
                document.getElementById('error-message').textContent = "All fields are required.";
                return;
            }

            if (quantity > curQuantity) {
                alert('Quantity exceeds available stock');
                return;
            } else {

                productsReq.push({
                    name: productName,
                    quantity: quantity
                });

                selectedOption.setAttribute('data-quantity', curQuantity - quantity);

                renderInventList();
                $('#bahan-form')[0].reset();
                $('#reqModal').modal('hide');
            }
        });


        $('#submit-detail').on('click', function() {
            var productName = $('#name').val();
            var quantity = $('#quantity').val();
            var selectedOption = document.querySelector('#name option:checked');
            var unitprice = selectedOption ? selectedOption.getAttribute('data-price') : 0;
            var totalPrice = unitprice * quantity;
            if (!productName || !quantity) {
                alert("All fields are required.");
                return;
            }
            products.push({
                name: productName,
                quantity: quantity,
                price: unitprice,
                totalPrice: totalPrice
            });
            renderProductList();
            $('#product-form')[0].reset();
            $('#detailModal').modal('hide');
        });

        function renderProductList() {
            $('#product-list').empty();
            var totalSum = 0;

            products.forEach((product, index) => {

                totalSum += product.totalPrice;

                var productElement = `
                <div class="product-item border p-2 mt-2 relative" id="product-${index}">
                <button class="remove-product bg-red-500 text-white px-2 rounded absolute top-0 right-0 mt-1 mr-1" data-index="${index}">X</button>
                <p><strong>Name     :</strong> <span class="product-name">${product.name}</span></p>
                <p><strong>Quantity :</strong> <span class="product-quantity">${product.quantity}</span></p>
                <p><strong>Price    :</strong> <span class="product-price">${product.totalPrice}</span></p>
                </div>`;
                $('#product-list').append(productElement);
            });

            document.getElementById('price').value = totalSum;
            document.getElementById('total').textContent = totalSum;
        }

        $(document).on('click', '.remove-product', function() {
            var index = $(this).data('index');
            products.splice(index, 1);
            renderProductList();
        });

        // Inventory List

        function renderInventList() {
            $('#invent-list').empty();

            productsReq.forEach((bahan, index) => {
                var bahanElement = `
                <div class="bahan-item border p-2 mt-2 relative" id="bahan-${index}">
                <button class="remove-bahan bg-red-500 text-white px-2 rounded absolute top-0 right-0 mt-1 mr-1" data-index="${index}">X</button>
                <p><strong>Name     :</strong> <span class="bahan-name">${bahan.name}</span></p>
                <p><strong>Quantity :</strong> <span class="bahan-quantity">${bahan.quantity}</span></p>
                </div>`;
                $('#invent-list').append(bahanElement);
            });
        }

        $(document).on('click', '.remove-bahan', function() {
            var index = $(this).data('index');
            productsReq.splice(index, 1);
            renderInventList();
        });

        const cardsButton = document.querySelector(".cards-layout-button");
        const tableButton = document.querySelector(".table-layout-button");
        const dataCardsLayout = document.querySelector('.data-cards-container');
        const dataTableLayout = document.querySelector('.data-table-container');

        var lastLayout = localStorage.getItem('lastLayout');
        console.log("Last Layout:", lastLayout);

        tableButton.addEventListener('click', () => {

            localStorage.setItem("lastLayout", "cards");
            if (!tableButton.classList.contains('bg-gray-100')) {
                tableButton.classList.toggle('bg-gray-100');
                tableButton.classList.toggle('shadow-inner');
            }

            if (cardsButton.classList.contains('bg-gray-100')) {
                cardsButton.classList.toggle('bg-gray-100');
                cardsButton.classList.toggle('shadow-inner');
            }

            dataTableLayout.style.display = 'initial';
            dataCardsLayout.style.opacity = 0;
            dataTableLayout.style.opacity = 1;
            setTimeout(() => {
                dataCardsLayout.style.display = 'none';
            }, 330);
        });

        cardsButton.addEventListener('click', () => {

            if (!cardsButton.classList.contains('bg-gray-100')) {
                cardsButton.classList.toggle('bg-gray-100');
                cardsButton.classList.toggle('shadow-inner');
            }

            if (tableButton.classList.contains('bg-gray-100')) {
                tableButton.classList.toggle('bg-gray-100');
                tableButton.classList.toggle('shadow-inner');
            }

            dataTableLayout.style.opacity = 0;
            dataCardsLayout.style.opacity = 1;

            setTimeout(() => {
                dataTableLayout.style.display = 'none';
                dataCardsLayout.style.display = 'initial';
            }, 330);
        });

        window.addEventListener('DOMContentLoaded', () => {
            let scrollPosition = 0;

            window.addEventListener('scroll', () => {
                scrollPosition = window.scrollY;
            });
        });

        document.querySelectorAll('h5[data-tab-state]').forEach((el) => {
            el.addEventListener('click', () => {
                const url = new URL(window.location.href);
                url.searchParams.set('tab', el.dataset.tabState);
                window.history.pushState(null, null, url.toString());
            });
        });
    </script>
@endsection

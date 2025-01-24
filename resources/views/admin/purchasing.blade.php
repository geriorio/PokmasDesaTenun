@extends('admin.layout')

@section('content')
    <style>
        .status-pending {
            font-weight: bold;
            color: red;
        }

        .status-done {
            font-weight: bold;
            color: green;
        }

        #product-list::-webkit-scrollbar {
            width: 8px;
        }

        #product-list::-webkit-scrollbar-thumb {
            background-color: transparent;
            border-radius: 4px;
        }

        #product-list:hover::-webkit-scrollbar-thumb {
            background-color: black;
        }
    </style>

    <div class="flex flex-col w-full py-8 rounded-lg shadow-xl items-center justify-center mb-10">
        <h1 class="text-center text-4xl uppercase font-bold mb-2">PURCHASE ORDERS</h1>
    </div>
    @if ($kurang->count() != 0)
        <div id="accordionExample5" class="w-full mb-2">
            <div
                class="rounded-none border border-e-0 border-s-0 border-t-0 border-neutral-200 bg-white dark:border-neutral-600 dark:bg-body-dark">
                <h2 class="mb-0" id="headingTwo5">
                    <button
                        class="group relative flex w-full items-center rounded-none border-0 bg-neutral-100 px-5 py-4 text-left text-base text-red-700 transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none dark:bg-body-dark dark:text-white [&:not([data-twe-collapse-collapsed])]:bg-neutral-100 [&:not([data-twe-collapse-collapsed])]:text-red-600 [&:not([data-twe-collapse-collapsed])]:shadow-border-b dark:[&:not([data-twe-collapse-collapsed])]:bg-surface-dark dark:[&:not([data-twe-collapse-collapsed])]:text-primary dark:[&:not([data-twe-collapse-collapsed])]:shadow-white/10 "
                        type="button" data-twe-collapse-init data-twe-collapse-collapsed data-twe-target="#collapseTwo5"
                        aria-expanded="false" aria-controls="collapseTwo5">
                        Warning! terdapat product yang stoknya kurang dari 60
                        <span
                            class="-me-1 ms-auto h-5 w-5 shrink-0 rotate-[-180deg] transition-transform duration-200 ease-in-out group-data-[twe-collapse-collapsed]:me-0 group-data-[twe-collapse-collapsed]:rotate-0 motion-reduce:transition-none [&>svg]:h-6 [&>svg]:w-6 ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </span>
                    </button>
                </h2>
                <div id="collapseTwo5" class="!visible hidden" data-twe-collapse-item aria-labelledby="headingTwo5">
                    <div class="px-5 py-4">
                        @foreach ($kurang as $item)
                            <li class="text-sm">{{ $item->name }} {{ $item->quantity }} - {{ $item->supplier->name }}
                            </li>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="flex flex-col w-full  rounded-lg shadow-xl items-center justify-center mb-2">
        <div class="w-full flex flex-col items-end mb-3 px-8 pt-5">
            <div>
                <button
                    class="btn-detail mb-7 rounded bg-primary px-6 pb-2 pt-2.5 text-xs text-center font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgb(59,113,202)],0_4px_18px_0_rgba(20,164,77,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgb(59,113,202)],0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgb(59,113,202)],0_4px_18px_0_rgba(20,164,77,0.2)rgb(59,113,202)]rgba(20,164,77,0.1)]"
                    data-te-toggle="modal" data-te-target="#createModal">New Purchase Order</button>
            </div>

            <div class="relative mb-4 flex w-full flex-wrap items-stretch">
                <input id="advanced-search-input" type="search"
                    class="relative m-0 -mr-0.5 block w-[1px] min-w-0 flex-auto rounded-l border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none"
                    placeholder="Search" aria-label="Search" aria-describedby="button-addon1" />
                <!--Search button-->
                <button
                    class="relative z-[2] flex items-center rounded-r bg-primary px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-primary-700 hover:shadow-lg focus:bg-primary-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-primary-800 active:shadow-lg"
                    type="button" id="advanced-search-button" data-te-ripple-init data-te-ripple-color="light">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                        <path fill-rule="evenodd"
                            d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>
        <div id="datatable" class="w-full px-5 py-5" data-te-fixed-header="true"></div>
    </div>

    {{-- Create Modal --}}
    <div data-te-modal-init
        class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
        id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div data-te-modal-dialog-ref
            class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
            <div
                class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none">
                <div
                    class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4">
                    <!--Modal title-->
                    <h5 class="text-xl font-medium leading-normal text-neutral-800" id="createModalLabel">
                        Tambah Pembelian Bahan Baku
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
                    <div class="relative mb-4" data-te-input-wrapper-init>
                        <input type="text"
                            class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                            id="titless" name="title" placeholder="Title" />
                        <label for="title"
                            class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none">
                            Judul Pembelian
                        </label>
                    </div>
                    <div class="flex gap-x-4">
                        <div class="mb-4 w-full">
                            <label for="order_date" class="ml-1">Tanggal Pembelian</label>
                            <input type="date" name="order_date" class="rounded-md w-full" id="order_date">
                        </div>
                        <div class="mb-4 w-full">
                            <label for="" class="ml-1">Tanggal Sampai</label>
                            <input type="date" name="shipped_date" class="rounded-md w-full" id="shipped_date">
                        </div>
                    </div>

                    <div class="mb-4 w-full">
                        <select data-te-select-init id="supplier_id">
                            <option value="" selected disabled hidden></option>
                            @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                            @endforeach
                        </select>
                        <label data-te-select-label-ref>Supplier</label>
                    </div>

                    <div>
                        <h1 class="font-bold">List barang yang dibeli</h1>
                    </div>

                    <div id="product-list" class="h-[150px] overflow-hidden overflow-y-scroll">


                    </div>

                    <button id="btn-list"
                        class="mt-3 inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] "
                        data-te-ripple-init data-te-ripple-color="light" data-te-toggle="modal"
                        data-te-target="#detailModal">
                        Tambah barang
                    </button>
                </div>
                <!--Modal footer-->
                <div
                    class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4">
                    <button type="button"
                        class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
                        data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                        Close
                    </button>
                    <button id="submit"
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
        id="detailModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div data-te-modal-dialog-ref
            class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
            <div
                class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none">
                <div
                    class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4">
                    <!--Modal title-->
                    <h5 class="text-xl font-medium leading-normal text-neutral-800" id="editModalLabel">
                        Produk yang dibeli
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
                    <form id="product-form">
                        <div class="relative mb-4" data-te-input-wrapper-init>
                            <input type="hidden" id="edit-id" name="id" />
                            <input type="text"
                                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none"
                                id="name" name="name" placeholder="" autocomplete="off" />
                            <label for="title"
                                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none">
                                Nama produk
                            </label>
                            <div id="dropdown" class="absolute z-10 w-full mt-1 bg-white rounded-lg shadow-lg hidden">
                                <ul id="dropdown-list" class="max-h-60 overflow-y-auto">
                                </ul>
                            </div>

                        </div>
                        <div class="flex gap-x-4">
                            <div class="mb-4 w-full">
                                <label for="" class="ml-1">Quantity</label>
                                <input type="number" class="rounded-md w-full" name="quantity" id="quantity">
                            </div>
                            <div class="mb-4 w-full">
                                <label for="" class="ml-1">Harga satuan</label>
                                <input type="number" class="rounded-md w-full" id="price">
                            </div>
                        </div>
                        <div class="mb-4 w-full">
                            <select data-te-select-init id="unit">
                                <option value="" selected disabled hidden></option>
                                <option value="Kg">Kilogram</option>
                                <option value="Klos">Kelosan</option>
                            </select>
                            <label data-te-select-label-ref>Satuan</label>
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
    <div data-te-modal-init
        class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
        id="modalDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div data-te-modal-dialog-ref
            class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
            <div
                class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
                <div
                    class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                    <!--Modal title-->
                    <div class="flex items-center">
                        <h5 class="mr-2 font-bold text-xl">Title: </h5>
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
                        <h5 class="font-bold">Order Date : </h5>
                        <p class="ml-3" id="modal-order"></p>
                    </div>
                    <div class="flex items-center">
                        <h5 class="font-bold">Shipped Date : </h5>
                        <p class="ml-3" id="modal-shipped"></p>
                    </div>
                    <div>
                        <h5 class="font-bold">Products :</h5>
                        <p id="modal-product"></p>
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
    {{-- Edit Modal --}}
    <div data-te-modal-init
        class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
        id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div data-te-modal-dialog-ref
            class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
            <div
                class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none">
                <div
                    class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4">
                    <!--Modal title-->
                    <h5 class="text-xl font-medium leading-normal text-neutral-800" id="editModalLabel">
                        Edit Purchase Order
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
                    <div class="relative mb-4" data-te-input-wrapper-init>
                        <input type="hidden" id="edit-id" name="id" />
                        <input type="text"
                            class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none"
                            id="edit-title" name="title" placeholder="Title" />
                        <label for="title"
                            class="absolute left-3 top-[-1.5rem] mb-0 max-w-[90%] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out">
                            Judul Pembelian
                        </label>
                    </div>
                    <div class="flex gap-x-4">
                        <div class="mb-4 w-full">
                            <label for="" class="ml-1">Tanggal Pembelian</label>
                            <input type="date" class="rounded-md w-full" id="edit-order_date">
                        </div>
                        <div class="mb-4 w-full">
                            <label for="" class="ml-1">Tanggal Sampai</label>
                            <input type="date" class="rounded-md w-full" id="edit-shipped_date">
                        </div>
                    </div>
                    <div class="mb-4 w-full">
                        <select data-te-select-init id="edit-supplier_id">
                            <option value="" selected disabled hidden></option>
                            @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                            @endforeach
                        </select>
                        <label data-te-select-label-ref>Supplier</label>
                    </div>
                </div>
                <!--Modal footer-->
                <div
                    class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4">
                    <button type="button"
                        class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
                        data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                        Close
                    </button>
                    <button type="button" id="submit-edit"
                        class="ml-1 inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] "
                        data-te-ripple-init data-te-ripple-color="light">
                        Save changes
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection()
@section('script')
    <script>
        document.getElementById('supplier_id').addEventListener('change', function() {
            const supplierId = this.value;
            const input = $('#name');
            const dropdown = $('#dropdown');
            const dropdownList = $('#dropdown-list');

            dropdownList.empty();
            fetch(`purchasing/products-by-supplier/${supplierId}`)
                .then(response => response.json())
                .then(products => {
                    input.off('click').on('click', function() {
                        const query = input.val().toUpperCase();
                        dropdownList.empty();
                        products.forEach(product => {
                            if (product.name.toUpperCase().includes(query)) {
                                const listItem = $('<li>').text(product.name.toUpperCase())
                                    .addClass(
                                        'p-2 text-black cursor-pointer hover:bg-indigo-500')
                                    .on('click', function() {
                                        input.val(product.name.toUpperCase());
                                        $('#score-field').html(product.name);
                                        dropdown.addClass('hidden');
                                    });

                                if (product.quantity < 60) {
                                    listItem.addClass('bg-red-500 text-white');
                                    listItem.append(' (Stok Rendah)');
                                }

                                dropdownList.append(listItem);
                            }
                        });
                        dropdown.removeClass('hidden');
                    });
                })
                .catch(error => console.error('Error:', error));
        });




        $(document).ready(function() {
            $('#submit').on('click', async function(e) {
                // e.preventDefault();
                var title = $('#titless').val();
                var order_date = $('#order_date').val();
                var shipped_date = $('#shipped_date').val();
                var supplier_id = $('#supplier_id').val();
                var products = [];
                $('#product-list .product-item').each(function() {
                    var product = {
                        name: $(this).find('.product-name').text(),
                        quantity: $(this).find('.product-quantity').text(),
                        price: $(this).find('.product-price').text(),
                        unit: $(this).find('.product-unit').text(),
                        supplier_id: supplier_id
                    };
                    products.push(product);
                });
                await $.ajax({
                    url: "{{ route('purchase.store') }}",
                    type: "POST",
                    data: {
                        title: title,
                        order_date: order_date,
                        shipped_date: shipped_date,
                        supplier_id: supplier_id,
                        products: products, // Kirim array produk
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
                            window.location.reload(); // Refresh halaman setelah sukses
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


        const customDatatable = document.getElementById("datatable");
        const data = @json($purchases);

        const instance = new te.Datatable(
            customDatatable, {
                columns: [{
                        label: "Title",
                        field: "title",
                        width: 250,
                    },
                    {
                        label: "Tanggal Order",
                        field: "order_date",
                        width: 200,
                    },
                    {
                        label: "Tanggal Sampai",
                        field: "shipped_date",
                        width: 200,
                    },

                    {
                        label: "Supplier",
                        field: "supplier",
                        width: 150,
                    },
                    {
                        label: "Actions",
                        field: "actions",
                        width: 250,

                    },
                ],
                rows: data.map((purchase, i) => {

                    return {
                        ...purchase,
                        supplier: purchase.supplier.name,
                        order_date: new Date(purchase.order_date).toLocaleDateString('id-ID', {
                            weekday: 'long',
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric'
                        }),

                        shipped_date: new Date(purchase.shipped_date).toLocaleDateString('id-ID', {
                            weekday: 'long',
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric'

                        }),
                        actions: `
                        
                        <div class="flex">
                            <button data-te-ripple-init data-te-ripple-color="light" data-te-toggle="modal" data-te-target="#editModal"
                                data-id="${purchase.id}" 
                                data-title="${purchase.title}" 
                                data-order_date="${purchase.order_date}" 
                                data-shipped_date="${purchase.shipped_date}" 
                                data-supplier_id="${purchase.supplier_id}" 
                                class="edit-button mr-3 btn-detail block rounded bg-warning px-6 pb-2 pt-2.5 text-xs text-center font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)]">
                                <i class="fa-solid fa-pencil text-white"></i>
                            </button>

                            ${!purchase.status ?
                        `<button onclick="validatePurchase(${purchase.id})" 
                                                    class="mr-3 btn-detail block rounded bg-primary px-6 pb-2 pt-2.5 text-xs text-center font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700">
                                                    Validate
                                                </button>`
                                    :
                                    `<button class="mr-3 btn-detail block rounded bg-success px-6 pb-2 pt-2.5 text-xs text-center font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:bg-success-600 hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:bg-success-600 focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0" 
                                                    onclick='viewDetails(${JSON.stringify(purchase)})'>
                                                    View
                                                </button>`
                                }

                        
                            <button data-te-ripple-init data-te-ripple-color="light" onclick="deletePurchase(${purchase.id})"
                                class="mr-3 btn-detail block rounded bg-danger px-6 pb-2 pt-2.5 text-xs text-center font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)]">
                                <i class="fa-solid fa-trash-can text-white"></i>
                            </button>
                        </div>`
                    };

                }),
            }, {
                hover: true,
                stripped: true
            },
        );


        document.querySelectorAll('.edit-button').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const title = this.getAttribute('data-title');
                const order_date = this.getAttribute('data-order_date');
                const shipped_date = this.getAttribute('data-shipped_date');
                const supplier_id = this.getAttribute('data-supplier_id');

                document.getElementById('edit-id').value = id;
                document.getElementById('edit-title').value = title;
                document.getElementById('edit-order_date').value = order_date;
                document.getElementById('edit-shipped_date').value = shipped_date;

                const supplierSelect = document.getElementById('edit-supplier_id');
                const supplierOptions = supplierSelect.options;

                for (let i = 0; i < supplierOptions.length; i++) {
                    if (supplierOptions[i].value === supplier_id) {
                        supplierOptions[i].selected = true;
                        break;
                    }
                }
            });
        });
        const advancedSearchInput = document.getElementById('advanced-search-input');

        const search = (value) => {
            let [phrase, columns] = value.split(" in:").map((str) => str.trim());

            if (columns) {
                columns = columns.split(",").map((str) => str.toLowerCase().trim());
            }

            instance.search(phrase, columns);
        };

        document.getElementById("advanced-search-button").addEventListener("click", () => {
            search(advancedSearchInput.value);
        });

        advancedSearchInput.addEventListener("keydown", (e) => {
            search(e.target.value);
        });

        function deletePurchase(purchase_id) {
            Swal.fire({
                icon: "warning",
                title: "Konfirmasi",
                text: "Apakah anda yakin ingin menghapus data ini?",
                showDenyButton: true,
                denyButtonText: "Cancel",
                confirmButtonText: "Confirm",
            }).then((result) => {
                if (result.isConfirmed) {
                    const url = `{{ route('purchase.delete', '') }}/${purchase_id}`;
                    $.ajax({
                        url: url,
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: async function(res) {
                            if (res.success) {
                                await Swal.fire({
                                    title: 'SUCCESS',
                                    text: res.message,
                                    icon: "success"
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        location.reload();
                                        return;
                                    }
                                });
                                setTimeout(() => {
                                    location.reload();
                                }, 500);
                            }
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                title: 'Error',
                                text: xhr.responseText,
                                icon: 'error'
                            });
                        }
                    });
                }
            });
        }

        $(document).ready(function() {
            $('#submit-edit').click(function(e) {
                e.preventDefault();
                var id = $('#edit-id').val();
                var title = $('#edit-title').val();
                var order_date = $('#edit-order_date').val();
                var shipped_date = $('#edit-shipped_date').val();
                var supplier_id = $('#edit-supplier_id').val();

                console.log(id);
                $.ajax({
                    url: `{{ route('purchase.update', '') }}/${id}`,
                    method: "PUT",
                    data: {
                        _token: "{{ csrf_token() }}",
                        title: title,
                        order_date: order_date,
                        shipped_date: shipped_date,
                        supplier_id: supplier_id
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: response.message,
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        } else {
                            console.log(response);
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response.message,
                            })
                        }
                    },
                    error: function(response) {

                        alert('Terjadi kesalahan. Cek kembali data input.');
                        console.log(response.responseJSON.errors);
                    }
                });
            });
        });

        function viewDetails(item) {
            console.log(item);
            const modal = $('#modalDetail');
            $('#modal-nama').text(item.title);
            $('#modal-order').text(item.order_date);
            $('#modal-shipped').text(item.shipped_date);
            if (item.purchase_details.length == 0) {
                $('#modal-product').html(`<p>N/A</p>`);
            } else {
                const productHtml = item.purchase_details.map(anggota =>
                    `<li class="list-disc ml-4">${anggota.product.name} - ${anggota.quantity}  </li>`).join('');
                $('#modal-product').html('<ul class="list-inside">' + productHtml + '</ul>');
            }

            modal.modal('show');
        }
    </script>
    <script>
        document.getElementById('btn-list').addEventListener('click', function() {
            $('#detailModal').modal('show');
        });
        let products = [];

        $('#submit-detail').on('click', function() {
            var productName = $('#name').val();
            var quantity = $('#quantity').val();
            var price = $('#price').val();
            var unit = $('#unit').val();

            if (!productName || !quantity || !price || !unit) {
                alert("All fields are required.");
                return;
            }
            products.push({
                name: productName,
                quantity: quantity,
                price: price,
                unit: unit
            });

            renderProductList();
            $('#product-form')[0].reset();
            $('#detailModal').modal('hide');
        });


        function renderProductList() {
            $('#product-list').empty();

            products.forEach((product, index) => {
                var productElement = `
                <div class="product-item border p-2 mt-2 relative" id="product-${index}">
                <button class="remove-product bg-red-500 text-white px-2 rounded absolute top-0 right-0 mt-1 mr-1" data-index="${index}">X</button>
                <p><strong>Name     :</strong> <span class="product-name">${product.name}</span></p>
                <p><strong>Quantity :</strong> <span class="product-quantity">${product.quantity}</span></p>
                <p><strong>Price    :</strong> <span class="product-price">${product.price}</span></p>
                <p><strong>Unit     :</strong> <span class="product-unit">${product.unit}</span></p>
                </div>`;
                $('#product-list').append(productElement);
            });
        }

        $(document).on('click', '.remove-product', function() {
            var index = $(this).data('index');
            products.splice(index, 1);
            renderProductList();
        });
    </script>

    <script>
        function validatePurchase($purchase_id) {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda tidak dapat mengembalikan data yang sudah divalidasi!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Validasi!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `{{ route('purchase.accept', '') }}/${$purchase_id}`,
                        method: 'PUT',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: async function(res) {
                            if (res.success) {
                                await Swal.fire({
                                    title: 'SUCCESS',
                                    text: res.message,
                                    icon: "success"
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        location.reload();
                                        return;
                                    }
                                });
                                setTimeout(() => {
                                    location.reload();
                                }, 500);
                            }
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                title: 'Error',
                                text: xhr.responseText,
                                icon: 'error'
                            });
                        }
                    });
                }
            });
        }
    </script>
@endsection

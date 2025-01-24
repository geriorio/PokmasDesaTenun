@extends('admin.layout')

@section('content')
    <div class="flex flex-col w-full py-8 rounded-lg shadow-xl items-center justify-center mb-10">
        <h1 class="text-center text-4xl uppercase font-bold mb-2">Inventory</h1>
    </div>
    <div class="flex flex-col w-full py-8 rounded-lg shadow-xl items-center justify-center mb-10 px-8">
        <div class="relative w-full mb-3" data-te-input-wrapper-init>
            <input type="text"
                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                id="name" name="name" placeholder="Name" value="" />
            <label for="name"
                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">
                Nama Barang
            </label>
        </div>
        <div class="w-full mb-3">
            <select id="category" name="category" data-te-select-init data-te-select-filter="true">
                <option value="" selected disabled hidden></option>
                @foreach ($kategori as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
            <label data-te-select-label-ref>Kategori</label>
        </div>
        <div class="relative w-full mb-3" data-te-input-wrapper-init>
            <input type="number"
                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                id="quantity" name="quantity" placeholder="Quantity" value="" />
            <label for="url_ppt"
                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">
                Quantity
            </label>
        </div>
        <div class="w-full mb-3">
            <select id="unit" name="unit" data-te-select-init>
                <option value="" selected disabled hidden></option>
                @foreach ($unit as $item)
                    <option value="{{ $item }}">{{ $item }}</option>
                @endforeach
            </select>
            <label data-te-select-label-ref>Unit</label>
        </div>
        <div class="relative w-full mb-3" data-te-input-wrapper-init>
            <input type="text"
                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                id="price" name="price" placeholder="Quantity" value="" />
            <label for="url_ppt"
                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">
                Price
            </label>
        </div>
        <div class="w-full mb-3">
            <select id="supplier" name="supplier" data-te-select-init>
                <option value="" selected disabled hidden></option>
                @foreach ($supplier as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
            <label data-te-select-label-ref>Supplier</label>
        </div>

        <div class="relative w-full mb-3 ">
            <div>
                <button id="submit" type="button" data-te-ripple-init data-te-ripple-color="light"
                    class="save w-full inline-block rounded bg-primary px-6 pb-2 pt-2 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
                    Save Changes
                </button>
            </div>
        </div>

        <div class="w-full flex flex-col items-end mb-3 px-8 pt-5">
            <div class="relative mb-4 flex w-full flex-wrap items-stretch">
                <input id="datatable-search-input" type="search"
                    class="relative m-0 -mr-0.5 block w-[1px] min-w-0 flex-auto rounded-l border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
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
        <div id="datatable-barang" class="w-full px-5 py-5" data-te-max-height="460"></div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#submit').on('click', async function() {
                var name = $('#name').val();
                var unit = $('#unit').val();
                var quantity = $('#quantity').val();
                var price = $('#price').val();
                var category = $('#category').val();
                var supplier = $('#supplier').val();
                await $.ajax({
                    url: "{{ route(name: 'inventory.store') }}",
                    type: "POST",
                    data: {
                        name: name,
                        unit: unit,
                        quantity: quantity,
                        price: price,
                        category: category,
                        supplier_id: supplier,

                        _token: "{{ csrf_token() }}"
                    },
                    success: async function(data) {
                        if (data.success) {
                            await Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: data.message,
                                customClass: {
                                    confirmButton: 'swal2-confirm'
                                }
                            });
                            window.location.reload();
                        } else {
                            await Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: data.message,
                            })
                        }
                    },
                    error: async function(err) {
                        // console.log(JSON.parse(err));    
                        await Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: err.responseJSON.message,
                        })
                    }
                });

            })
        });

        const customdatatable = document.getElementById("datatable-barang");
        var data = JSON.parse(@json($products));

        var table = new te.Datatable(
            customdatatable, {
                columns: [{
                        label: "Nama Barang",
                        field: "name",
                        width: 220,
                    },
                    {
                        label: "Kategori",
                        field: "category",
                        width: 150,
                    },
                    {
                        label: "Kuantitas",
                        field: "quantity",
                        width: 150,
                    },
                    {
                        label: "Unit",
                        field: "unit",
                        width: 150,
                    },
                    {
                        label: "Price",
                        field: "price",
                        width: 170,
                    },
                    {
                        label: "Supplier",
                        field: "supplier",
                        width: 170,
                    },
                    {
                        label: "Action",
                        field: "detail",
                        width: 220,
                    },
                ],
                rows: data.map((item, i) => {
                    return {
                        ...item,
                        name: `  
                                                    <span id="name-${item.id}">${item.name}</span>
                                                    <input type="text" class="rounded-xl" id="input-name-${item.id}" value="${item.name}" style="display:none; width: 150px" />`,
                        category: `
                                                    <span id="category-${item.id}">${item.category}</span>
                                                    <select class="rounded-xl" id="input-category-${item.id}" style="display:none;">
                                                    <option value="" selected disabled hidden></option>
                                                        @foreach ($kategori as $item)
                                                            <option class="rounded-xl" value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach`,
                        quantity: `
                                                    <span id="quantity-${item.id}">${item.quantity}</span>
                                                    <input type="text" class="rounded-xl" id="input-quantity-${item.id}" value="${item.quantity}" style="display:none; width: 70px" />`,
                        unit: `
                                                    <span id="unit-${item.id}">${item.unit}</span>
                                                    <select class="rounded-xl" id="input-unit-${item.id}" style="display:none;  width: 100px">
                                                        @foreach ($unit as $item)
                                                            <option class="rounded-xl" value="{{ $item }}">{{ $item }}</option>
                                                        @endforeach`,
                        price: `
                                                    <span id="price-${item.id}">${item.price}</span>
                                                    <input type="text" class="rounded-xl" id="input-price-${item.id}" value="${item.price}" style="display:none; width: 100px" />`,
                        supplier: `
                                                    <span id="supplier-${item.id}">${item.supplier}</span>
                                                    <select class="rounded-xl" id="input-supplier-${item.id}" style="display:none;  width: 100px">
                                                        @foreach ($supplier as $item)
                                                            <option class="rounded-xl" value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach`,
                        detail: `
                                                    <div class="flex" id="action-buttons-${item.id}">
                                                        <button onclick='deleteBarang(${JSON.stringify(item.id)})' data-te-ripple-init data-te-ripple-color="light"
                                                            class="mr-3 btn-detail block mb-2 rounded bg-red-600 px-6 pb-2 pt-2.5 text-xs text-center font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_rgba(1100,124,77,0.3)] transition duration-150 ease-in-out hover:bg-red-900 hover:shadow-[0_8px_9px_-4px_rgba(1100,124,77,0.3),0_4px_18px_0_rgba(900,164,77,0.2)] focus:bg-red-600 focus:shadow-[0_8px_9px_-4px_rgba(1100,124,77,0.3),0_4px_18px_0_rgba(900,164,77,0.2)] focus:outline-none focus:ring-0 active:bg-red-700 active:shadow-[0_8px_9px_-4px_rgba(1100,124,77,0.3),0_4px_18px_0_rgba(9000,164,77,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(9000,164,77,0.2)] dark:hover:shadow-[0_8px_9px_-4px_rgba(1100,124,77,0.3),0_4px_18px_0_rgba(900,164,77,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(1100,124,77,0.3),0_4px_18px_0_rgba(900,164,77,0.1)]">
                                                            Delete
                                                        </button>
                                                        <button onclick='save(${JSON.stringify(item.id)})' class="mr-3 btn-detail block mb-2 rounded bg-success px-6 pb-2 pt-2.5 text-xs text-center font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:bg-success-600 hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:bg-success-600 focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:bg-success-700 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(20,164,77,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)]" 
                                                            style="display:none;">
                                                            Save
                                                        </button>
                                                        <button onclick='cancel(${JSON.stringify(item.id)})' data-te-ripple-init data-te-ripple-color="light"
                                                            class="mr-3 btn-detail block mb-2 rounded bg-success px-6 pb-2 pt-2.5 text-xs text-center font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:bg-success-600 hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:bg-success-600 focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:bg-success-700 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(20,164,77,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)]" style="display:none;">
                                                            Cancel
                                                        </button>
                                                        <button onclick='updateBarang(${JSON.stringify(item.id)})' data-te-ripple-init data-te-ripple-color="light"
                                                            class="mr-3 btn-detail block mb-2 rounded bg-success px-6 pb-2 pt-2.5 text-xs text-center font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:bg-success-600 hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:bg-success-600 focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:bg-success-700 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(20,164,77,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)]">
                                                            Update
                                                        </button>
                                                    </div>
                                                `
                    };
                }),
            }, {
                hover: true,
                striped: true,
            }
        );

        document.getElementById('datatable-search-input').addEventListener('input', (e) => {
            table.search(e.target.value);
        });

        function deleteBarang(id) {
            // console.log(id);
            var url_delete = "{{ route('inventory.delete', ':id') }}".replace(':id', id);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url_delete,
                        type: 'DELETE',
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
                                window.location.href = "{{ route('viewInventory') }}";
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


        function hideOtherButtons(id) {
            // console.Log(id);
            var buttonsContainer = document.getElementById(`action-buttons-${id}`);
            var buttons = buttonsContainer.getElementsByTagName('button');
            for (var i = 0; i < buttons.length; i++) {
                buttons[i].style.display = 'none';
            }
            buttonsContainer.getElementsByTagName('button')[1].style.display = 'block';
            buttonsContainer.getElementsByTagName('button')[2].style.display = 'block';
        }

        function showOtherButtons(id) {
            var buttonsContainer = document.getElementById(`action-buttons-${id}`);
            var buttons = buttonsContainer.getElementsByTagName('button');
            for (var i = 0; i < buttons.length; i++) {
                buttons[i].style.display = 'block';
            }
            buttonsContainer.getElementsByTagName('button')[1].style.display = 'none';
            buttonsContainer.getElementsByTagName('button')[2].style.display = 'none';
        }

        function updateBarang(id) {
            document.getElementById(`name-${id}`).style.display = 'none';
            document.getElementById(`input-name-${id}`).style.display = 'block';

            document.getElementById(`category-${id}`).style.display = 'none';
            document.getElementById(`input-category-${id}`).style.display = 'block';

            document.getElementById(`quantity-${id}`).style.display = 'none';
            document.getElementById(`input-quantity-${id}`).style.display = 'block';

            document.getElementById(`unit-${id}`).style.display = 'none';
            document.getElementById(`input-unit-${id}`).style.display = 'block';

            document.getElementById(`price-${id}`).style.display = 'none';
            document.getElementById(`input-price-${id}`).style.display = 'block';

            document.getElementById(`supplier-${id}`).style.display = 'none';
            document.getElementById(`input-supplier-${id}`).style.display = 'block';

            hideOtherButtons(id);
            console.log('Update kelompok dengan ID:', id);
        }

        function cancel(id) {
            document.getElementById(`name-${id}`).style.display = 'block';
            document.getElementById(`input-name-${id}`).style.display = 'none';

            document.getElementById(`category-${id}`).style.display = 'block';
            document.getElementById(`input-category-${id}`).style.display = 'none';

            document.getElementById(`quantity-${id}`).style.display = 'block';
            document.getElementById(`input-quantity-${id}`).style.display = 'none';

            document.getElementById(`unit-${id}`).style.display = 'block';
            document.getElementById(`input-unit-${id}`).style.display = 'none';

            document.getElementById(`price-${id}`).style.display = 'block';
            document.getElementById(`input-price-${id}`).style.display = 'none';

            document.getElementById(`supplier-${id}`).style.display = 'block';
            document.getElementById(`input-supplier-${id}`).style.display = 'none';

            showOtherButtons(id);
            console.log('Cancel update kelompok dengan ID:', id);
        }

        function save(id) {
            var newName = document.getElementById(`input-name-${id}`).value;
            var newCategory = document.getElementById(`input-category-${id}`).value;
            var newQuantity = document.getElementById(`input-quantity-${id}`).value;
            var newUnit = document.getElementById(`input-unit-${id}`).value;
            var newPrice = document.getElementById(`input-price-${id}`).value;
            var newSupplier = document.getElementById(`input-supplier-${id}`).value;

            var url_update = "{{ route('inventory.update', ':id') }}".replace(':id', id);
            $.ajax({
                url: url_update,
                type: 'PUT',
                data: {
                    _token: "{{ csrf_token() }}",
                    name: newName,
                    category: newCategory,
                    quantity: newQuantity,
                    unit: newUnit,
                    price: newPrice,
                    supplier_id: newSupplier
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
            })
        }
    </script>
@endsection

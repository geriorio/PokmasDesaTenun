@extends('admin.layout')

@section('content')


<div class="flex flex-col w-full py-8 rounded-lg shadow-xl items-center justify-center mb-10">
    <h1 class="text-center text-4xl uppercase font-bold mb-2">Customer</h1>
</div>

<div class="flex flex-col w-full  rounded-lg shadow-xl items-center justify-center mb-2">

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
    <div id="datatable-customer" class="w-full px-5 py-5" data-te-max-height="460"></div>
</div>
@endsection()
@section('script')
<script>

    const customdatatable = document.getElementById("datatable-customer");
    var data = JSON.parse(@json($customers));

    var table = new te.Datatable(
        customdatatable, {
        columns: [{
            label: "No",
            field: "no",
            width: 150,
        },
        {
            label: "Nama Customer",
            field: "nama",
            width: 300,
        },
        {
            label: "Alamat",
            field: "address",
            width: 300,
        },
        {
            label: "No WhatsApp",
            field: "customer_wa",
            width: 300,
        },
        {
            label: "Email",
            field: "email",
            width: 300,
        },

        {
            label: "Action",
            field: "detail",
            width: 400,
        },
        ],
        rows: data.map((item, i) => {
            return {
                ...item,
                nama: `  
                                                    <span id="name-${item.id}">${item.name}</span>
                                                    <input type="text" id="input-name-${item.id}" value="${item.name}" style="display:none;" />`,
                address: `
                                                    <span id="address-${item.id}">${item.address}</span>
                                                    <input type="text" id="input-address-${item.id}" value="${item.address}" style="display:none;" />`,
                customer_wa: `
                                                    <span id="customer_wa-${item.id}">${item.customer_wa}</span>
                                                    <input type="text" id="input-customer_wa-${item.id}" value="${item.customer_wa}" style="display:none;" />`,
                email: `
                                                    <span id="email-${item.id}">${item.email}</span>
                                                    <input type="text" id="input-email-${item.id}" value="${item.email}" style="display:none;" />`,
                detail: `
                                                    <div class="flex" id="action-buttons-${item.id}">
                                                        <button onclick='deleteCustomer(${JSON.stringify(item.id)})' data-te-ripple-init data-te-ripple-color="light"
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
                                                        <button onclick='updateCustomer(${JSON.stringify(item.id)})' data-te-ripple-init data-te-ripple-color="light"
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

    function updateCustomer(id) {
        document.getElementById(`name-${id}`).style.display = 'none';
        document.getElementById(`input-name-${id}`).style.display = 'block';
        document.getElementById(`address-${id}`).style.display = 'none';
        document.getElementById(`input-address-${id}`).style.display = 'block';
        document.getElementById(`customer_wa-${id}`).style.display = 'none';
        document.getElementById(`input-customer_wa-${id}`).style.display = 'block';
        document.getElementById(`email-${id}`).style.display = 'none';
        document.getElementById(`input-email-${id}`).style.display = 'block';
        hideOtherButtons(id);

    }

    function cancel(id) {
        document.getElementById(`name-${id}`).style.display = 'block';
        document.getElementById(`input-name-${id}`).style.display = 'none';
        document.getElementById(`address-${id}`).style.display = 'block';
        document.getElementById(`input-address-${id}`).style.display = 'none';
        document.getElementById(`customer_wa-${id}`).style.display = 'block';
        document.getElementById(`input-customer_wa-${id}`).style.display = 'none';
        document.getElementById(`email-${id}`).style.display = 'block';
        document.getElementById(`input-email-${id}`).style.display = 'none';
        showOtherButtons(id);
    }


    function save(id) {
        var newName = document.getElementById(`input-name-${id}`).value;
        var newAddress = document.getElementById(`input-address-${id}`).value;
        var newPhone = document.getElementById(`input-customer_wa-${id}`).value;
        var newEmail = document.getElementById(`input-email-${id}`).value;
        var url_update = "{{ route('customer.update', ':id') }}".replace(':id', id);

        $.ajax({
            url: url_update,
            type: 'PUT',
            data: {
                _token: "{{ csrf_token() }}",
                name: newName,
                address: newAddress,
                customer_wa: newPhone,
                email: newEmail,
            },
            success: async function (response) {
                if (response.success) {
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
            }
        });
    }

    function deleteCustomer(id) {
        var url_delete = "{{ route('customer.destroy', ':id') }}".replace(':id', id);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this! you will delete Customer with id " + id,
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
                    success: async function (response) {
                        if (response.success) {
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
                    }
                });

            }
        })
    }

    document.getElementById('datatable-search-input').addEventListener('input', (e) => {
        table.search(e.target.value);
    });
</script>
@endsection
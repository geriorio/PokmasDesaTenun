@extends('admin.layout')

@section('content')

<div class="flex flex-col w-full py-8 rounded-lg shadow-xl items-center justify-center mb-10">
    <h1 class="text-center text-4xl uppercase font-bold mb-2">Supplier</h1>
</div>

<div class="flex flex-col w-full  rounded-lg shadow-xl items-center justify-center mb-2">
    <div class="w-full flex flex-col items-end mb-3 px-8 pt-5">
        <div>
            <button
                class="btn-detail mb-7 rounded bg-primary px-6 pb-2 pt-2.5 text-xs text-center font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgb(59,113,202)],0_4px_18px_0_rgba(20,164,77,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgb(59,113,202)],0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgb(59,113,202)],0_4px_18px_0_rgba(20,164,77,0.2)rgb(59,113,202)]rgba(20,164,77,0.1)]"
                data-te-toggle="modal" data-te-target="#Modal">Add Supplier</button>
        </div>

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
    <div id="datatable-supplier" class="w-full px-5 py-5" data-te-max-height="460"></div>
</div>


<div data-te-modal-init
    class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none" id="Modal"
    tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div data-te-modal-dialog-ref
        class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
        <div
            class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
            <div
                class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                <!--Modal title-->
                <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                    id="exampleModalLabel">
                    Add Supplier
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
                <div class="relative mb-3" data-te-input-wrapper-init>
                    <input type="text"
                        class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                        id="name" name="name" placeholder="name" />
                    <label for="name"
                        class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">
                        Nama Supplier
                    </label>
                </div>
                <div class="relative mb-3" data-te-input-wrapper-init>
                    <input type="text"
                        class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                        id="address" name="address" placeholder="address" />
                    <label for="address"
                        class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">
                        Alamat
                    </label>
                </div>
                <div class="relative mb-3" data-te-input-wrapper-init>
                    <input type="text"
                        class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                        id="phone" name="phone" placeholder="phone" />
                    <label for="phone"
                        class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">
                        No Telepon
                    </label>
                </div>
                <div class="relative mb-3" data-te-input-wrapper-init>
                    <input type="text"
                        class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                        id="email" name="email" placeholder="email" />
                    <label for="email"
                        class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">
                        Email
                    </label>
                </div>
                <div class="relative mb-3" data-te-input-wrapper-init>
                    <input type="text"
                        class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                        id="note" name="note" placeholder="note" />
                    <label for="note"
                        class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">
                        Catatan
                    </label>
                </div>
            </div>
            <!--Modal footer-->
            <div
                class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                <button type="button"
                    class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
                    data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                    Close
                </button>
                <button type="button" id="submit"
                    class="ml-1 inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
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
    $(document).ready(function () {
        $('#submit').on('click', async function () {
            var name = $('#name').val();
            var address = $('#address').val();
            var phone = $('#phone').val();
            var email = $('#email').val();
            var note = $('#note').val();
            await $.ajax({
                url: "{{ route('supplier.store') }}",
                type: "POST",
                data: {
                    name: name,
                    address: address,
                    phone: phone,
                    email: email,
                    note: note,
                    _token: "{{ csrf_token() }}"
                },
                success: async function (data) {
                    if (data.success) {
                        await $('#Modal').modal('hide');
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
                error: async function (err) {
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

    const customdatatable = document.getElementById("datatable-supplier");
    var data = JSON.parse(@json($suppliers));

    var table = new te.Datatable(
        customdatatable, {
        columns: [{
            label: "No",
            field: "no",
            width: 150,
        },
        {
            label: "Nama Supplier",
            field: "nama",
            width: 300,
        },
        {
            label: "Alamat",
            field: "address",
            width: 300,
        },
        {
            label: "No Telepon",
            field: "phone",
            width: 300,
        },
        {
            label: "Email",
            field: "email",
            width: 300,
        },
        {
            label: "Catatan",
            field: "note",
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
                phone: `
                                                    <span id="phone-${item.id}">${item.phone}</span>
                                                    <input type="text" id="input-phone-${item.id}" value="${item.phone}" style="display:none;" />`,
                email: `
                                                    <span id="email-${item.id}">${item.email}</span>
                                                    <input type="text" id="input-email-${item.id}" value="${item.email}" style="display:none;" />`,
                note: `
                                                    <span id="note-${item.id}">${item.note}</span>
                                                    <input type="text" id="input-note-${item.id}" value="${item.note}" style="display:none;" />`,
                detail: `
                                                    <div class="flex" id="action-buttons-${item.id}">
                                                        <button onclick='deleteSupplier(${JSON.stringify(item.id)})' data-te-ripple-init data-te-ripple-color="light"
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
                                                        <button onclick='updateSupplier(${JSON.stringify(item.id)})' data-te-ripple-init data-te-ripple-color="light"
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

    function updateSupplier(id) {
        document.getElementById(`name-${id}`).style.display = 'none';
        document.getElementById(`input-name-${id}`).style.display = 'block';
        document.getElementById(`address-${id}`).style.display = 'none';
        document.getElementById(`input-address-${id}`).style.display = 'block';
        document.getElementById(`phone-${id}`).style.display = 'none';
        document.getElementById(`input-phone-${id}`).style.display = 'block';
        document.getElementById(`email-${id}`).style.display = 'none';
        document.getElementById(`input-email-${id}`).style.display = 'block';
        document.getElementById(`note-${id}`).style.display = 'none';
        document.getElementById(`input-note-${id}`).style.display = 'block';
        hideOtherButtons(id);

    }

    function cancel(id) {
        document.getElementById(`name-${id}`).style.display = 'block';
        document.getElementById(`input-name-${id}`).style.display = 'none';
        document.getElementById(`address-${id}`).style.display = 'block';
        document.getElementById(`input-address-${id}`).style.display = 'none';
        document.getElementById(`phone-${id}`).style.display = 'block';
        document.getElementById(`input-phone-${id}`).style.display = 'none';
        document.getElementById(`email-${id}`).style.display = 'block';
        document.getElementById(`input-email-${id}`).style.display = 'none';
        document.getElementById(`note-${id}`).style.display = 'block';
        document.getElementById(`input-note-${id}`).style.display = 'none';
        showOtherButtons(id);
    }


    function save(id) {
        var newName = document.getElementById(`input-name-${id}`).value;
        var newAddress = document.getElementById(`input-address-${id}`).value;
        var newPhone = document.getElementById(`input-phone-${id}`).value;
        var newEmail = document.getElementById(`input-email-${id}`).value;
        var newNote = document.getElementById(`input-note-${id}`).value;
        var url_update = "{{ route('supplier.update', ':id') }}".replace(':id', id);

        $.ajax({
            url: url_update,
            type: 'PUT',
            data: {
                _token: "{{ csrf_token() }}",
                name: newName,
                address: newAddress,
                phone: newPhone,
                email: newEmail,
                note: newNote
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

    function deleteSupplier(id) {
        var url_delete = "{{ route('supplier.destroy', ':id') }}".replace(':id', id);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this! you will delete supplier with id " + id,
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
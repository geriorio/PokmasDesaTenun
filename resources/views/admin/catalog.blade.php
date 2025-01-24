@extends('admin.layout')

@section('content')
    <div class="flex flex-col w-full py-8 rounded-lg shadow-xl items-center justify-center mb-10">
        <h1 class="text-center text-4xl uppercase font-bold mb-2">Catalog</h1>
    </div>
    <form data-te-validation-init action="{{ route('catalog.store') }}" method="POST" id="application-form"
        enctype="multipart/form-data"
        class="flex flex-col w-full py-8 rounded-lg shadow-xl items-center justify-center mb-10 px-8">
        @csrf
        <div class="relative w-full mb-3" data-te-input-wrapper-init>
            <input type="text"
                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                id="name" name="name" placeholder="Catalog Name" value="" />
            <label for="name"
                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">
                Catalog Name
            </label>
        </div>
        <div class="relative w-full mb-3" data-te-validate="input" data-te-input-wrapper-init>
            <input
                class="relative m-0 block sm:col-span-4 col-span-2 w-full rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary disabled:opacity-60"
                type="file" name="image" accept=".png,.jpg,.jpeg" id="image">
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 sm:gap-4 w-full">
            <div class="relative w-full mb-3" data-te-input-wrapper-init>
                <input type="text"
                    class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                    id="quantity" name="quantity" placeholder="Quantity" value="" />
                <label for="quantity"
                    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">
                    Quantity
                </label>
            </div>
            <div class="relative w-full mb-3" data-te-input-wrapper-init>
                <input type="text"
                    class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                    id="price" name="price" placeholder="price" value="" />
                <label for="price"
                    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">
                    Unit Price
                </label>
            </div>
        </div>
        <div class="relative w-full mb-3" data-te-input-wrapper-init>
            <textarea
                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                id="description" rows="2" placeholder="Your message" name="description"></textarea>
            <label for="description"
                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">
                Enter your description</label>
        </div>
        <button type="submit" data-te-ripple-init data-te-ripple-color="light"
            class="save w-full inline-block rounded bg-primary mt-3 px-6 pb-2 pt-2.5 tepxt-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
            Save Changes
        </button>
    </form>
    <div class="container  mx-auto mt-4 pb-12 w-full font-dm">
        <div class=" grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-10">
            @foreach ($catalogtipe1 as $item)
                <div
                    class="relative p-2 w-[250px] h-[250px] shadow-[0_3px_10px_rgb(0,0,0,0.2)] bg-white rounded-sm grid grid-rows-7">
                    <button
                        class="absolute top-1 right-1 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center 
                    hover:bg-red-600"
                        onclick="deleteCatalog({{ $item->id }})">
                        &times;
                    </button>

                    <div class="row-span-6 flex flex-col gap-1">
                        <img src="{{ asset('storage/uploads/catalog/' . $item->image) }}" alt="Image"
                            class="w-full h-[45%] object-cover rounded-sm">
                        <h1 class="text-lg font-bold px-1">{{ $item->name }}</h1>
                        <div class="grid grid-cols-6 gap-x-2">
                            <p class="text-sm col-span-2 font-medium px-1">Kuantitas</p>
                            <p class="text-sm col-span-4 font-normal">: {{ $item->stock }}</p>
                            <p class="text-sm col-span-2 font-medium px-1">Harga</p>
                            <p class="text-sm col-span-4 font-normal">: {{ $item->price }}</p>
                        </div>
                    </div>
                    <button class="bg-primary text-white font-bold uppercase text-sm w-full rounded-lg py-1"
                        onclick="openEditModal({{ $item->id }})">Details</button>
                </div>
            @endforeach

        </div>
    </div>

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
                        Edit Catalog
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
                            Nama Catalog
                        </label>
                    </div>
                    <div class="relative mb-4" data-te-input-wrapper-init>
                        <input
                        class="relative m-0 block sm:col-span-4 col-span-2 w-full rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary disabled:opacity-60"
                        type="file" name="edit-image" accept=".png,.jpg,.jpeg" id="image">
                        <label for="title"
                            class="absolute left-3 top-[-1.5rem] mb-0 max-w-[90%] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out">
                            Image
                        </label>
                    </div>
                    <div class="relative mb-4" data-te-input-wrapper-init>
                        <input type="text"
                            class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none"
                            id="edit-description" name="Description" placeholder="Description" />
                        <label for="description"
                            class="absolute left-3 top-[-1.5rem] mb-0 max-w-[90%] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out">
                            Description
                        </label>
                    </div>

                    <div class="flex gap-x-4">
                        <div class="mb-4 w-full">
                            <label for="" class="ml-1">Kuantitas</label>
                            <input type="text" class="rounded-md w-full" id="edit-order_date">
                        </div>
                        <div class="mb-4 w-full">
                            <label for="" class="ml-1">Harga</label>
                            <input type="text" class="rounded-md w-full" id="edit-shipped_date">
                        </div>
                    </div>
                </div>
                <div
                    class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4">
                    <button type="button"
                        class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
                        data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                        Close
                    </button>
                    <button type="button" id="submit-edit"
                        class="ml-1 inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] "
                        data-te-ripple-init data-te-ripple-color="light" onclick="save()">
                        Save changes 
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function openEditModal(id) {
            $.ajax({
                url: `catalog/${id}/edit`,
                method: 'GET',
                success: function(item) {
                    console.log(item);
                    const modal = new te.Modal(document.getElementById('editModal'));
                    $('#edit-id').val(item.id);
                    $('#edit-title').val(item.name);
                    $('#edit-order_date').val(item.stock);
                    $('#edit-shipped_date').val(item.price);
                    $('#edit-description').val(item.description);
                    modal.show();
                },
                error: function(error) {
                    console.log(error);
                    alert('Gagal mengambil data.');
                }
            });
        }


        @if (Session::has('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ Session::get('success') }}',
                didClose: () => {
                    window.location.href = '{{ route('view.catalog') }}';
                }
            });
        @endif
        @if (Session::has('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ Session::get('error') }}',
            });
        @endif

        function deleteCatalog(id) {
            console.log("data yang dihapus :", id);
            var url_delete = "{{ route('catalog.delete', ':id') }}".replace(':id', id);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
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

        function save() {
            var id = document.getElementById(`edit-id`).value;
            var title = document.getElementById(`edit-title`).value;
            var description = document.getElementById(`edit-description`).value;
            var order_date = document.getElementById(`edit-order_date`).value;
            var shipped_date = document.getElementById(`edit-shipped_date`).value;
            var url_update = "{{ route('catalog.update', ':id') }}".replace(':id', id);
            $.ajax({
                url: url_update,
                type: 'PUT',
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id,
                    title: title,
                    description: description,
                    order_date: order_date,
                    shipped_date: shipped_date
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

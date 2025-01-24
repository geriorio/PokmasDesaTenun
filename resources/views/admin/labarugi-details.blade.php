@extends('admin.layout')

@section('content')
    <div class="flex flex-col w-full py-8 rounded-lg shadow-xl items-center justify-center mb-10">
        <h1 class="text-center text-4xl uppercase font-bold mb-2">Laba Rugi
            {{ \Carbon\Carbon::parse($details[0]['date'])->format('F Y') }}</h1>
    </div>

    <div class="flex flex-col w-full rounded-lg shadow-xl items-center justify-center mb-2">
        <div class="w-full flex flex-col items-end mb-3 px-8 pt-5">
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
            <div class="w-full flex justify-between">
                @if ($total >= 0)
                    <p class="font-medium">Total Pendapatan: <span class="text-green-600">+
                            Rp{{ number_format($total) }}</span>
                    </p>
                @else
                    <p class="font-medium">Total Pendapatan: <span class="text-red-600">-
                            Rp{{ number_format($total) }}</span>
                    </p>
                @endif
                {{-- <select id="pnl-filter"
                    class="w-1/3 py-1 px-2 rounded focus:outline-none text-[var(--primary)] font-semibold">
                    <option value="">Filter Laba/Rugi</option>
                    <option value="profit">Laba</option>
                    <option value="loss">Rugi</option>
                </select> --}}
            </div>
        </div>
        <div id="datatable" class="w-full px-5 py-5" data-te-fixed-header="true"></div>
    </div>
@endsection
@section('script')
    <script>
        const customDatatable = document.getElementById("datatable");
        const data = @json($details);
        console.log(data);
        const instance = new te.Datatable(
            customDatatable, {
                columns: [{
                        label: "Judul",
                        field: "title",
                        sort: true
                    },
                    {
                        label: "Tanggal",
                        field: "date",
                        sort: true
                    }, {
                        label: "Jumlah Total",
                        field: "total",
                        sort: true
                    },
                ],
                rows: data.map((detail, i) => {

                    return {
                        ...detail,
                        title: detail.title == '-' ? 'Pendapatan Order' : detail.title,
                        total: detail.type == 'order' ?
                            `<p class="font-semibold text-green-700">+ Rp${new Intl.NumberFormat('id-ID').format(detail.total)}</p>` :
                            `<p class="font-semibold text-red-700">- Rp${new Intl.NumberFormat('id-ID').format(detail.total)}</p>`,
                        // total: Rp${new Intl.NumberFormat('id-ID').format(detail.total)},
                        date: new Date(detail.date).toLocaleDateString('id-ID', {
                            weekday: 'long',
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric'
                        })
                    };

                }),
            }, {
                hover: true,
                stripped: true
            },
        );
    </script>
@endsection

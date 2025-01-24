@extends('admin.layout')

@section('content')
    <div class="flex flex-col w-full py-8 rounded-lg shadow-xl items-center justify-center mb-10">
        <h1 class="text-center text-4xl uppercase font-bold mb-2">Laba Rugi</h1>
    </div>

    <section class="w-full shadow-xl min-h-full p-8">
        <div class="flex w-full gap-x-4">
            <div class="relative flex w-full" data-twe-input-wrapper-init data-twe-input-group-ref>
                <input type="search" id="search"
                    class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0"
                    placeholder="Search" aria-label="Search" id="exampleFormControlInput" aria-describedby="basic-addon1" />
                <label for="exampleFormControlInput"
                    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[0.9rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none">Search
                </label>
                <button
                    class="relative z-[2] -ms-0.5 flex items-center rounded-e bg-primary px-5  text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2"
                    type="button" id="button-addon1" data-twe-ripple-init data-twe-ripple-color="light">
                    <span class="[&>svg]:h-5 [&>svg]:w-5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </span>
                </button>
            </div>
            <select id="pnl-filter" class="w-1/3 py-1 px-2 rounded focus:outline-none text-[var(--primary)] font-semibold">
                <option value="">Filter Laba/Rugi</option>
                <option value="profit">Laba</option>
                <option value="loss">Rugi</option>
            </select>
            <select id="sort-options"
                class="w-1/3 py-1 px-2 rounded focus:outline-none text-[var(--primary)] font-semibold">
                <option value="">Sort</option>
                <option value="terlama">Terbaru</option>
                <option value="terbaru">Terlama</option>
            </select>
        </div>
        <div class="w-full grid grid-cols-4 max-[540px]:grid-cols-2 gap-4 mt-6" id="pnl-container">
            @foreach ($pnls as $pnl)
                <div class="shadow-lg w-full h-fit p-4 rounded-lg">
                    @if ($pnl['total'] >= 0)
                        <p class="font-medium">Pendapatan: <span class="text-green-600">+
                                Rp{{ number_format($pnl['total']) }}</span>
                        </p>
                    @else
                        <p class="font-medium">Pendapatan: <span class="text-red-600">-
                                Rp{{ number_format($pnl['total']) }}</span>
                        </p>
                    @endif
                    <p class="font-medium">{{ \Carbon\Carbon::parse($pnl['month'])->format('F Y') }}</p>
                    <button type="button"
                        class="w-fit px-4 text-sm mt-1 bg-primary text-white py-2 rounded font-semibold transition">
                        Details
                    </button>
                </div>
            @endforeach
        </div>
    </section>

    <script>
        const pnls = @json($pnls);

        $('#search').on('input', function() {
            var value = $(this).val().toLowerCase();
            $('#pnl-container > div').each(function() {
                var matches = $(this).text().toLowerCase().indexOf(value) > -1;
                $(this).toggle(matches);
            });
        });

        let filteredPnls = [...pnls];


        function renderPnL(data) {
            const pnlContainer = $('#pnl-container');
            pnlContainer.empty();

            data.forEach(pnl => {
                pnlContainer.append(`
                <div class="shadow-lg w-full h-fit p-4 rounded-lg">
                    <p class="font-medium">Pendapatan: 
                        <span class="${pnl.total >= 0 ? 'text-green-600' : 'text-red-600'}">
                            Rp${new Intl.NumberFormat('id-ID').format(pnl.total)}
                        </span>
                    </p>
                    <p class="font-medium">${new Date(pnl.month + '-01').toLocaleString('id-ID', { month: 'long', year: 'numeric' })}</p>
                    <button type="button" onclick="window.location.href = '{{ route('labarugi.show', '') }}/${pnl.month}'"
                        class="w-full px-4 text-sm mt-1 bg-primary text-white py-2 rounded font-semibold transition">
                        Details
                    </button>
                </div>
            `);
            });
        }


        function sortPnLs(data) {
            const sortType = $('#sort-options').val();
            if (sortType === 'terlama') {

                return data.sort((a, b) => new Date(b.month + '-01') - new Date(a.month + '-01'));
            } else if (sortType === 'terbaru') {

                return data.sort((a, b) => new Date(a.month + '-01') - new Date(b.month + '-01'));
            }
            return data;
        }


        function filterPnLs() {
            const filterType = $('#pnl-filter').val();
            if (filterType === 'profit') {
                return pnls.filter(pnl => pnl.total > 0);
            } else if (filterType === 'loss') {
                return pnls.filter(pnl => pnl.total < 0);
            }
            return [...pnls];
        }


        function updatePnLs() {

            filteredPnls = filterPnLs();
            const sortedPnls = sortPnLs(filteredPnls);
            renderPnL(sortedPnls);
        }
        renderPnL(pnls);
        $('#sort-options').on('change', updatePnLs);
        $('#pnl-filter').on('change', updatePnLs);
    </script>
@endsection

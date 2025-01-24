@extends('user.layout')
@section('styles')
    <style>
        div[data-te-select-options-list-ref] div[data-te-select-option-ref]>span {
            max-width: 97%;
            overflow: hidden;
            word-wrap: normal;
            white-space: normal;
        }

        div[data-te-select-option-ref] {
            height: auto !important;
            min-height: 38px;
            padding-block: 7px;
        }
    </style>
@endsection

@section('content')
    <div class="min-h-28">
    </div>
    <h1 class=" mt-4 text-center mb-5 text-[54px] font-bold custom-span text-[#5C4033]">Registration</h1>
    <section class="max-w-[1100px] mx-auto pt-3 pb-16 mb-16">
        <div class="block rounded-xl bg-white/10 backdrop-blur-md p-6 ">
            <form data-te-validation-init action="{{route('register.store')}}" method="POST" id="application-form">
                @csrf
                <div class="grid sm:grid-cols-2 sm:gap-10">
                    <div class="relative mb-6" data-te-validate="input"
                        @error('name') data-te-validation-state="invalid" data-te-invalid-feedback="{{ $message }}" @enderror
                        data-te-input-wrapper-init>
                        <input type="text" value="{{ old('name') ?? '' }}"
                            {{ empty(old('name')) ? '' : 'data-te-input-state-active' }}
                            class="peer block min-h-[auto]  w-full rounded  border-0 bg-transparent px-3 py-[0.6rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                            id="exampleInput123" aria-describedby="emailHelp123" placeholder="Team KevinCS"
                            name="name"/>
                        <label for="exampleInput123"
                            class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.6rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">
                            Nama Lengkap
                        </label>
                    </div>
                    <div class="relative mb-6" data-te-validate="input"
                        @error('address') data-te-validation-state="invalid" data-te-invalid-feedback="{{ $message }}" @enderror
                        data-te-input-wrapper-init>
                        <input type="text" value="{{ old('address') ?? '' }}"
                            {{ empty(old('address')) ? '' : 'data-te-input-state-active' }}
                            class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.6rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                            id="address" aria-describedby="address" placeholder="Sekolah saya" name="address" />
                        <label for="address"
                            class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.6rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">
                            Alamat
                        </label>
                        <small data-te-invalid-feedback></small>
                    </div>
                </div>
                <div class="grid sm:grid-cols-2 sm:gap-10">
                    <div class="relative mb-8" data-te-validate="input"
                        @error('customer_wa') data-te-validation-state="invalid" data-te-invalid-feedback="{{ $message }}" @enderror
                        data-te-input-wrapper-init>
                        <input type="text" value="{{ old('customer_wa') ?? '' }}"
                            {{ empty(old('customer_wa')) ? '' : 'data-te-input-state-active' }}
                            class="peer block min-h-[auto]  w-full rounded  border-0 bg-transparent px-3 py-[0.6rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                            id="customer_wa" aria-describedby="emailHelp123" placeholder="Team KevinCS" name="customer_wa" />
                        <label for="customer_wa"
                            class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.6rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">
                            No Whatsapp
                        </label>    
                        <small data-te-invalid-feedback></small>
                    </div>
                    <div class="relative mb-8" data-te-validate="input"
                        @error('email') data-te-validation-state="invalid" data-te-invalid-feedback="{{ $message }}" @enderror
                        data-te-input-wrapper-init>
                        <input type="text" value="{{ old('email') ?? '' }}"
                            {{ empty(old('email')) ? '' : 'data-te-input-state-active' }}
                            class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.6rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                            id="email" aria-describedby="email" placeholder="Sekolah saya" name="email" />
                        <label for="email"
                            class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.6rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">
                            Email (Optional)
                        </label>
                        <small data-te-invalid-feedback></small>
                    </div>
                </div>
                <div class="grid sm:grid-cols-2 sm:gap-10">

                    <div class="relative mb-4" data-te-validate="input"
                        @error('password') data-te-validation-state="invalid" data-te-invalid-feedback="{{ $message }}" @enderror
                        data-te-input-wrapper-init>
                        <input type="password"
                            class="peer block min-h-[auto]  w-full rounded  border-0 bg-transparent px-3 py-[0.6rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                            id="password" aria-describedby="emailHelp123" placeholder="Team KevinCS" name="password" />
                        <label for="password"
                            class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.6rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">
                            Password
                        </label>
                        <small data-te-invalid-feedback></small>

                    </div>
                    <div class="relative mb-4" data-te-validate="input"
                        @error('passwordConfirmation') data-te-validation-state="invalid" data-te-invalid-feedback="{{ $message }}" @enderror
                        data-te-input-wrapper-init>
                        <input type="password"
                            class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.6rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                            id="passwordConfirmation" aria-describedby="passwordConfirmation" placeholder="Sekolah saya"
                            name="passwordConfirmation" />
                        <label for="passwordConfirmation"
                            class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.6rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">
                            Password Confirmation
                        </label>
                        <small data-te-invalid-feedback></small>
                    </div>
                </div>
                <button type="submit"
                    class="font4 inline-block w-full rounded-sm bg-[#454556] px-6 pb-2 pt-2 mt-6 text-md font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:bg-[#454556] focus:bg-bg-[#454556]  focus:outline-none focus:ring-0 active:bg-primary-700"
                    style="background: linear-gradient(to right, #5C4033, #4D4C1C);"
                    id="submitButton" data-te-ripple-init data-te-ripple-color="light">
                    SUBMIT
                </button>
            </form>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(() => {
            $('form[data-te-validation-init]').attr('data-te-validated', true);
            $('input[data-te-input-state-active] ~ div').attr('data-te-input-state-active', true);
            $('textarea[data-te-input-state-active] ~ div').attr('data-te-input-state-active', true);
        })
        @if (Session::has('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ Session::get('success') }}',
                didClose: () => {
                    window.location.href = '{{ route('teamRegister') }}';
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
    </script>
@endsection

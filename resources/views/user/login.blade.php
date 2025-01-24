@extends('user.layout')

<style>
    form {
        background: linear-gradient(45deg, #5C4033, #4D4C1C);
        background-size: 500%;
        animation: bg-animation 15s infinite alternate;
        box-shadow: 0px 0px 20px 10px #00000024;
    }

    body {
        overflow: hidden;
    }

    @keyframes bg-animation {
        0% {
            background-position: left;
        }

        100% {
            background-position: right;
        }
    }



    @media screen and (max-width: 570px) {
        input {
            font-size: 0.9rem !important;
        }
    }

    @media screen and (min-width: 570px) {
        input {
            font-size: 1.15rem !important;
        }
    }


    input:focus {
        border-color: #63006c !important;
        box-shadow: var(--tw-ring-inset) 0 0 0 calc(0px + var(--tw-ring-offset-width)) var(--tw-ring-color) !important;
    }

    input::placeholder {
        color: #ffffff !important;
        allign-text: left;
    }
</style>


@section('content')
    @if (session('error'))
        <script>
            Swal.fire({
                title: "ERROR!",
                text: "{{ session('error') }}",
                icon: "error"
            });
        </script>
    @elseif (session('success'))
        <script>
            Swal.fire({
                title: "SUCCESS!",
                text: "{{ session('success') }}",
                icon: "success"
            });
        </script>
    @endif
    <div class="flex min-h-screen w-screen items-center justify-center">
        <form action="{{route('login.store')}}" method="POST"
            class="bg-cyan-300 w-[80%] md:w-[50%] lg:w-[35%] my-[20px] rounded-xl px-10 py-5 overflow-hidden">
            @csrf
            <h1 class="text-center text-slate-100 py-[20px] text-[30px] sm:text-4xl font-unbounded font-bold">LOGIN</h1>
            <div class="flex flex-col items-center">
                <input
                    class="bg-white bg-opacity-[0.1] block text-left my-2 w-[100%] p-3 border-solid border-[1px] border-white rounded-lg "
                    type="text" placeholder="Nomor Telepon" name="customer_wa">
                <input
                    class="bg-white bg-opacity-[0.1] block text-left my-2 w-[100%] p-3 border-solid border-[1px] border-white rounded-lg "
                    type="password" placeholder="Password" name="password">

                <button id="submitButton"
                    class="hover:bg-[#4D4C1C] text-white bg-opacity-[0.7] bg-[#4D4C1C] hover:border-[#4D4C1C] border border-white font4 text-sm font-bold py-3 px-6 rounded-lg w-1/2 mt-[2.5rem] transition duration-300 ease-in-out"
                    type="submit">LOGIN</button>
                <a class="text-center underline text-slate-100 text-sm mt-2"
                    href="">Forget Password</a>
            </div>
        </form>
    </div>
@endsection

@section('script')
@endsection

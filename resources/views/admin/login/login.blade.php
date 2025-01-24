<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project Manpro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bona+Nova+SC:ital,wght@0,400;0,700;1,400&family=Playwrite+GB+S:ital,wght@0,100..400;1,100..400&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Bona+Nova+SC:ital,wght@0,400;0,700;1,400&family=Playwrite+GB+S:ital,wght@0,100..400;1,100..400&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/css/tw-elements.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com/3.4.5"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

</head>
<style>
    ::-webkit-scrollbar {
        width: 10px;
    }

    ::-webkit-scrollbar-thumb {
        background: rgb(23, 24, 56);
        background: linear-gradient(180deg, #7B4B3A 0%, rgba(69, 69, 86, 1) 100%);
        border-radius: 8px;
    }

    ::-webkit-scrollbar-track {
        width: 0;
        background: #454556;
        /* background-color: transparent !important; */
    }

    label {
        color: #454556 !important;
    }

    .swal2-confirm {
        background: rgb(46, 143, 255) !important;
    }

    .swal2-deny,
    .swal2-cancel {
        background: rgb(255, 79, 79) !important;
    }

    input,
    textarea,
    select {
        color: #454556 !important;
    }

    input:focused {
        outline: #454556 !important;
    }

    input:disabled,
    textarea:disabled {
        background: #aaaaaa50 !important;
    }

    pre {
        font-family: "Ubuntu", sans-serif;
        font-weight: 400;
        font-style: normal;
    }
</style>

<body>

    <script>
        tailwind.config = {
            darkMode: "class",
            corePlugins: {
                preflight: false,
            },
        };
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    @if (session()->has('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('error') }}',
            })
        </script>
    @endif
    <section class="w-screen h-screen flex items-center justify-center bg-gray-100">
        <div class="w-full max-w-md bg-white p-8 shadow-lg rounded-md">
            <h2 class="text-2xl font-bold text-center mb-6">Login Admin</h2>
            <form action="{{ route('admin.auth') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                    <input type="text" id="email" name="email"
                        class="w-full border border-gray-300 p-3 rounded focus:outline-none focus:ring focus:ring-blue-300"
                        placeholder="Enter your email" required>
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
                    <input type="password" id="password" name="password"
                        class="w-full border border-gray-300 p-3 rounded focus:outline-none focus:ring focus:ring-blue-300"
                        placeholder="Enter your password" required>
                </div>
                <button type="submit" class="w-full bg-primary text-white py-3 rounded hover:bg-primary-600 transition">
                    Login
                </button>
            </form>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/tw-elements/js/tw-elements.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
</body>

</html>

<style>
    .custom-span {

        font-family: "Satisfy", cursive;
        font-weight: 400;
        font-style: normal;

    }

    .font2 {
        font-family: "Bona Nova SC", serif;
        font-weight: 400;
        font-style: normal;
    }

    .font3 {
        font-family: "Ubuntu", sans-serif;
        font-weight: 400;
        font-style: normal;
    }

    .font4 {
        font-family: "Ubuntu", sans-serif;
        font-weight: bold;
        font-style: normal;
    }
</style>

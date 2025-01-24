<style>
    .nav-link {
        color: #5C4033;
        font-family: "Ubuntu", sans-serif;

        font-weight: bold;
        text-decoration: none;
        letter-spacing: -1px;
        text-decoration: none;
        font-size: 16px;
    }

    .nav-links {
        color: #5C4033;
        font-family: "Ubuntu", sans-serif;
        font-weight: bold;
        text-decoration: none;
        letter-spacing: -1px;
        text-decoration: none;
        font-size: 16px;
    }

    .nav-link::after {
        content: '';
        display: block;
        width: 0;
        height: 2px;
        background-color: #000000;
        transition: width .3s;
    }

    .nav-link.active::after {
        width: 100% !important;
    }

    .nav-link:hover::after {
        width: 100%;
        transition: width .3s;
    }

    .register-button {
        font-size: 14px;
        color: #ffffff;
        font-weight: bold;
        padding: 8px 14px;
        background: linear-gradient(to right, #5C4033, #4D4C1C);
        border: 2px solid #5C4033;
        border-radius: 5px;
    }

    .register-button:hover {
        color: #ffffff;
        background: linear-gradient(to right, #5C4033, #4D4C1C);
        border: 2px solid #5C4033;
    }

    .signin-button {
        color: #5C4033;
        font-size: 14px;
        font-weight: bold;
        padding: 8px 11px;
        border: 2px solid #5C4033;
        border-radius: 5px;
    }

    .signin-button:hover {
        background: linear-gradient(to right, #5C4033, #4D4C1C);
        border: 2px solid #141414;
        color: #ffffff;
    }
</style>

<!-- Main navigation container -->
<nav class="relative px-8 max-lg:px-2 flex w-full flex-wrap items-center justify-between bg-zinc-50 py-2 shadow-dark-mild"
    data-twe-navbar-ref>
    <div class="flex w-full flex-wrap items-center justify-between px-3">
        <div>
            <a class="mx-2 my-1 flex items-center lg:mb-0 lg:mt-0" href="#">
                <img src="{{ asset('img/logo.png') }}" alt="" class="h-[40px]">
            </a>
        </div>

        <!-- Hamburger button for mobile view -->
        <button
            class="block border-0 bg-transparent px-2 text-black/50 hover:no-underline hover:shadow-none focus:no-underline focus:shadow-none focus:outline-none focus:ring-0 lg:hidden"
            type="button" data-twe-collapse-init data-twe-target="#navbarSupportedContent4"
            aria-controls="navbarSupportedContent4" aria-expanded="false" aria-label="Toggle navigation">
            <!-- Hamburger icon -->
            <span class="[&>svg]:w-7 [&>svg]:stroke-black/50">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
                        clip-rule="evenodd" />
                </svg>
            </span>
        </button>

        <!-- Collapsible navbar container -->
        <div class="!visible mt-2 hidden flex-grow basis-[100%] items-center lg:mt-0 lg:!flex lg:basis-auto"
            id="navbarSupportedContent4" data-twe-collapse-item>
            <!-- Left links -->
            <ul class="list-style-none mx-auto flex flex-col ps-0 lg:mt-1 lg:flex-row" data-twe-navbar-nav-ref>
                <!-- Home link -->
                <li class="my-4 px-4" data-twe-nav-item-ref>
                    <a class="nav-link max-sm:!text-sm" aria-current="page" href="{{ route('user.home') }}"
                        data-twe-nav-link-ref>HOME</a>
                </li>
                <li class="my-4 px-4" data-twe-nav-item-ref>
                    <a class="nav-link max-sm:!text-sm" aria-current="page" href="{{ route('milih-barang') }}"
                        data-twe-nav-link-ref>CATALOG</a>
                </li>
                <li class="my-4 px-4" data-twe-nav-item-ref>
                    <a class="nav-link max-sm:!text-sm" aria-current="page" href="#" data-twe-nav-link-ref>ABOUT
                        US</a>
                </li>
                @if (session()->has('phone'))
                    <li class="my-4 px-4" data-twe-nav-item-ref>
                        <a class="nav-link max-sm:!text-sm" aria-current="page" href="{{ route('history') }}"
                            data-twe-nav-link-ref>HISTORY</a>
                    </li>
                @endif
                <li class="my-4 px-4" data-twe-nav-item-ref>
                    <a class="nav-link max-sm:!text-sm" aria-current="page" href="#" data-twe-nav-link-ref>CONTACT
                        US</a>
                </li>
            </ul>
            @if (!session()->has('phone'))
                <div class="flex items-center gap-x-4 max-lg:py-2 max-lg:ps-3">
                    <button type="button" data-twe-ripple-init data-twe-ripple-color="light"
                        class="register-button duration-300 ease max-sm:!text-sm">
                        REGISTER
                    </button>
                    <button type="button" data-twe-ripple-init data-twe-ripple-color="light"
                        class="signin-button duration-300 ease max-sm:!text-sm">
                        SIGN IN
                    </button>
                </div>
            @else
                <li class="my-4 px-4" data-twe-nav-item-ref>
                    <a class="nav-link max-sm:!text-sm" aria-current="page" href="{{ route('logout') }}"
                        data-twe-nav-link-ref>LOG OUT</a>
                </li>
            @endif
        </div>
    </div>
</nav>

<!-- Main navigation container -->
<style>
    .navbar {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 60px;
        background-color: #ffffff;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 100;
        transition: all 0.3s ease-in-out;
        opacity: 1;
        visibility: visible;
    }

    .navbar.hide-nav {
        height: 0px;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease-in-out;
        overflow: hidden;
    }

    .nav-menu {
        display: flex;
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .nav-link {
        color: #5C4033;
        font-family: "Ubuntu", sans-serif;

        font-weight: bold;
        text-decoration: none;
        letter-spacing: -1px;
        padding: 0px 24px;
        text-decoration: none;
        font-size: 16px;
    }

    .nav-links {
        color: #5C4033;
        font-family: "Ubuntu", sans-serif;

        font-weight: bold;
        text-decoration: none;
        letter-spacing: -1px;
        padding: 0px 24px;
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

    .mini-logo {
        position: absolute;
        left: 28px;
    }

    .mini-logo>img {
        width: 150px;
    }

    .hamburger {
        position: absolute;
        right: 16px;
        padding-left: 20px;
        z-index: 7;
        transition: all 0.2s ease-in-out;
        display: none;
    }

    .ham {
        cursor: pointer;
        -webkit-tap-highlight-color: transparent;
        transition: transform 400ms;
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
        user-select: none;
        width: 50px !important;
    }

    .hamRotate.active {
        transform: rotate(45deg);
    }

    .hamRotate180.active {
        transform: rotate(180deg);
    }

    .line {
        fill: none;
        transition: stroke-dasharray 400ms, stroke-dashoffset 400ms;
        stroke: #fff;
        stroke-width: 3.9;
        stroke-linecap: round;
    }

    .ham6 .top {
        stroke-dasharray: 40 172;
    }

    .ham6 .middle {
        stroke-dasharray: 40 111;
    }

    .ham6 .bottom {
        stroke-dasharray: 40 172;
    }

    .ham6.active .top {
        stroke-dashoffset: -132px;
    }

    .ham6.active .middle {
        stroke-dashoffset: -71px;
    }

    .ham6.active .bottom {
        stroke-dashoffset: -132px;
    }

    .nav.hide-nav .hamburger {
        opacity: 0;
    }

    .hamburger>svg {
        color: white;
        width: 40px;
        height: 40px;
        padding: 0px 5px;
        border-radius: 10px;
    }

    .login-container {
        position: absolute;
        right: 28px;
        top: 17px;
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
        ;
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

    @media (max-width: 1024px) {
        .nav-link {
            padding: 0px 18px;
        }

        .register-button {
            font-size: 12px;
            font-weight: 600;
            padding: 5px 10px;
        }

        .signin-button {
            font-size: 12px;
            font-weight: 600;
            padding: 5px 10px;
        }
    }


    @media (max-width: 991px) {
        .hamburger {
            display: block;
        }

        .hamburger>svg.active {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .nav-collapse {
            position: fixed;
            top: 60px;
            background-color: rgba(45, 72, 56, 0.9);
            width: 100%;
            height: 0;
            overflow-y: hidden;
            transition: height 0.3s ease-in-out;
        }

        .nav-collapse.active {
            height: 340px;
            transition: height 0.3s ease-in-out;
        }

        .nav-menu {
            flex-direction: column;
            text-align: center;
        }

        .nav-link {
            padding: 20px 0px;
        }

        .nav-link:active {
            background-color: #dedace;
            color: #141414;
        }

        .nav-link::after {
            display: none;
        }

        .login-container {
            position: relative;
            display: flex;
            justify-content: center;
            top: 0;
            right: 0;
            padding: 20px 0px;
            border-top: 2px solid rgba(165, 165, 165, 0.5);
        }

        .register-button,
        .signin-button {
            margin: 0px 5px;
            padding: 8px 15px;
            font-size: 14px;
        }
    }

    .registbtn {
        margin-bottom: 30px !important;
    }

    .form-login {
        margin-top: 10vh !important;
    }

    .form-forgot {
        margin-top: 23vh !important;
    }

    @media screen and (max-width: 780px) {

        .form-forgot {
            margin-top: -5vh !important;
        }

        .form-regist {
            padding: 4rem 0 !important;
        }

        .forgotinput {
            width: 350px !important;
        }

        .forgotbtn {
            width: 350px !important;
        }

        .registbtn {
            width: 350px !important;
        }

    }



    @media screen and (min-width: 873px) {
        #phone-input {
            width: 880px !important;
        }

    }


    #logo-bg {
        margin-top: 20px;
        width: 95%;
        z-index: -1;
    }

    option {
        /* transparent */
        background-color: #CCCAB2;
        color: black;
    }

    /* CHECKBOX STYLE */
    .checkbox-wrapper-33 {
        --s-xsmall: 0.625em;
        --s-small: 1.2em;
        --border-width: 1px;
        --c-primary: #CCCAB5;
        --c-primary-20-percent-opacity: #CCCAB5;
        --c-primary-10-percent-opacity: #CCCAB5;
        --t-base: 0.4s;
        --t-fast: 0.2s;
        --e-in: ease-in;
        --e-out: cubic-bezier(.11, .29, .18, .98);
    }

    .checkbox-wrapper-33 .visuallyhidden {
        border: 0;
        clip: rect(0 0 0 0);
        height: 1px;
        margin: -1px;
        overflow: hidden;
        padding: 0;
        position: absolute;
        width: 1px;
    }

    .checkbox-wrapper-33 .checkbox {
        display: flex;
        align-items: center;
        justify-content: flex-start;
    }

    .checkbox-wrapper-33 .checkbox+.checkbox {
        margin-top: var(--s-small);
    }

    .checkbox-wrapper-33 .checkbox__symbol {
        display: inline-block;
        display: flex;
        margin-right: calc(var(--s-small) * 0.7);
        border: var(--border-width) solid var(--c-primary);
        position: relative;
        border-radius: 0.1em;
        width: 1.5em;
        height: 1.5em;
        transition: box-shadow var(--t-base) var(--e-out), background-color var(--t-base);
        box-shadow: 0 0 0 0 var(--c-primary-10-percent-opacity);
    }

    .checkbox-wrapper-33 .checkbox__symbol:after {
        content: "";
        position: absolute;
        top: 0.5em;
        left: 0.5em;
        width: 0.25em;
        height: 0.25em;
        background-color: #CCCAB5;
        opacity: 0;
        border-radius: 3em;
        transform: scale(1);
        transform-origin: 50% 50%;
    }

    .checkbox-wrapper-33 .checkbox .icon-checkbox {
        width: 1em;
        height: 1em;
        margin: auto;
        fill: none;
        stroke-width: 3;
        stroke: currentColor;
        stroke-linecap: round;
        stroke-linejoin: round;
        stroke-miterlimit: 10;
        color: #CCCAB5;
        display: inline-block;
    }

    .checkbox-wrapper-33 .checkbox .icon-checkbox path {
        transition: stroke-dashoffset var(--t-fast) var(--e-in);
        stroke-dasharray: 30px, 31px;
        stroke-dashoffset: 31px;
    }

    .checkbox-wrapper-33 .checkbox__textwrapper {
        margin: 0;
    }

    .checkbox-wrapper-33 .checkbox__trigger:checked+.checkbox__symbol:after {
        -webkit-animation: ripple-33 1.5s var(--e-out);
        animation: ripple-33 1.5s var(--e-out);
    }

    .checkbox-wrapper-33 .checkbox__trigger:checked+.checkbox__symbol .icon-checkbox path {
        transition: stroke-dashoffset var(--t-base) var(--e-out);
        stroke-dashoffset: 0px;
    }

    .checkbox-wrapper-33 .checkbox__trigger:focus+.checkbox__symbol {
        box-shadow: 0 0 0 0.25em var(--c-primary-20-percent-opacity);
    }

    @-webkit-keyframes ripple-33 {
        from {
            transform: scale(0);
            opacity: 1;
        }

        to {
            opacity: 0;
            transform: scale(20);
        }
    }

    @keyframes ripple-33 {
        from {
            transform: scale(0);
            opacity: 1;
        }

        to {
            opacity: 0;
            transform: scale(20);
        }
    }

    /* END CHECKBOX STYLE */

    .float-container input {
        border: none;
        font-size: 20px;
        /* Increase font size */
        outline: 0;
        padding: 20px 0 14px;
        width: 100%;
        background-color: transparent;
        /* Make background transparent */
    }

    .float-container input:focus {
        color: #CCCAB2 !important;
    }

    .float-container label {
        /* Set font family */
        font-size: 30px !important;
        position: absolute;
        transform-origin: top left;
    }
</style>

<nav class="navbar">
    <div class="mini-logo">
        <img src="{{ asset('img/logo.png') }}" alt="">
    </div>
    <div class="nav-collapse">
        <ul class="nav-menu">
            <a href="{{ route('user.home') }}" class="nav-link">
                <li>HOME</li>
            </a>
            <a href="{{ route('milih-barang') }}" class="nav-link">
                <li>CATALOG</li>
            </a>
            <a href="" class="nav-link">
                <li>ABOUT US</li>
            </a>
            @if (session()->has('phone'))
                <a href="{{ route('history') }}" class="nav-link">
                    <li>HISTORY</li>
                </a>
            @endif
            <a href="" class="nav-link">
                <li>CONTACT US</li>
            </a>

        </ul>
        <div class="login-container">
            @if (session()->has('phone'))
                <a class="nav-links flex select-none" id="dropdownKatalogButton" aria-expanded="false">
                    <img src="{{ asset('img/faqPerson.png') }}" alt="Profile Photo"
                        class="w-7 h-7 rounded-full mr-2 hidden xl:inline-block">
                    {{ Session::get('name') }}
                    <span class="ml-1 m-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" class="w-4 h-4">
                            <path
                                d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" />
                        </svg>
                    </span>
                </a>
                <ul
                    class="absolute z-[99999] hidden min-w-max list-none bg-gray-50  text-gray-900 rounded-lg shadow-md p-2 text-base xl:ml-7">
                    <li><a class="block px-4 py-2 font4 text-red-900" href="{{ route('logout') }}">Log Out</a>
                    </li>
                </ul>
            @elseif (!session()->has('phone'))
                <a href="{{ route('register') }}" class="register-button duration-300 ease">REGISTER</a>
                <a href="{{ route('login') }}" class="signin-button duration-300 ease">SIGN IN</a>
            @endif
        </div>
    </div>
    <div class="hamburger" id="hamburger">
        <svg class="ham ham6" viewBox="0 0 100 100" width="49" onclick="this.classList.toggle('active')">
            <path class="line top"
                d="m 30,33 h 40 c 13.100415,0 14.380204,31.80258 6.899646,33.421777 -24.612039,5.327373 9.016154,-52.337577 -12.75751,-30.563913 l -28.284272,28.284272" />
            <path class="line middle"
                d="m 70,50 c 0,0 -32.213436,0 -40,0 -7.786564,0 -6.428571,-4.640244 -6.428571,-8.571429 0,-5.895471 6.073743,-11.783399 12.286435,-5.570707 6.212692,6.212692 28.284272,28.284272 28.284272,28.284272" />
            <path class="line bottom"
                d="m 69.575405,67.073826 h -40 c -13.100415,0 -14.380204,-31.80258 -6.899646,-33.421777 24.612039,-5.327373 -9.016154,52.337577 12.75751,30.563913 l 28.284272,-28.284272" />
        </svg>
    </div>
</nav>

<script>
    $(document).ready(function() {
        $('#dropdownKatalogButton').on('click', function() {
            const dropdownMenu = $(this).next();
            dropdownMenu.toggleClass('hidden');
        });
    });
</script>

<style>
    footer {
        z-index: 1;
    }

    body {
        margin: 0;
    }

    .content {
        flex: 1;
    }

    footer {
        position: relative;
        overflow: hidden;
    }

    .yellow {
        bottom: 50vh;
        right: 50vw;
        background-color: #4D4C1C;
        transform-origin: bottom right;
    }

    .red {
        bottom: 50vh;
        left: 50vw;
        background-color: #5C4033;
        animation-delay: -20s;
        transform-origin: bottom left;
    }

    .blue {
        top: 50vh;
        right: 50vw;
        background-color: #5C4033;
        animation-delay: -20s;
        transform-origin: top right;
    }

    .green {
        top: 50vh;
        left: 50vw;
        background-color: #4D4C1C;
        animation-delay: -20s;
        transform-origin: top left;
    }

    .box {
        position: absolute;
        width: 200vw;
        height: 200vh;
        animation: roundaction 40s linear infinite;
        filter: blur(200px);
    }

    @keyframes roundaction {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>
<footer id="footer" class=" sections footer-section flex flex-col items-center justify-center relative w-full">
    <div class="absolute inset-0 overflow-hidden z-0 bg-[#454556] h-auto min-h-screen">
        <div class="box red"></div>
        <div class="box blue"></div>
        <div class="box yellow"></div>
        <div class="box green"></div>
    </div>
    <div class="h-auto flex flex-col items-center justify-center z-10 relative text-white m-[10px] mb-0 ">
        <div class="w-full flex items-center justify-center lg:flex-row max-lg:flex-col">
            <div
                class="flex justify-center items-center max-sm:w-full xl:w-[37%] xl:max-w-[600px] max-sm:pt-5  
                lg:w-[34%] pr-10 max-lg:pt-9 max-lg:pb-5 max-lg:w-9/12 max-lg:pr-0 max-lg:min-w-[570px] max-lg:mr-7 max-sm:min-w-0">
                <div class="flex justify-center items-center w-full">
                    <img src="{{ asset('img/logo2.png') }}">
                </div>
            </div>
            <div class=" xl:mx-8 sm:mx-9 max-lg:hidden"></div>

            <div class="flex lg:h-[273px] items-center max-lg:w-full max-lg:justify-center max-lg:items-center">
                <div
                    class="max-lg:w-9/12 max-lg:flex max-lg:justify-center max-lg:items-center max-sm:flex-col max-lg:max-w-[515.4px] max-lg:min-w-[515.4px] max-sm:min-w-0 ">
                    <div class="max-lg:flex max-lg:flex-col max-lg:justify-between max-lg:h-[99.2px] max-sm:h-[95px]">
                    </div>
                </div>
            </div>

            <div class=" xl:ml-28 sm:mx-9 bg-white max-lg:hidden"></div>
            <div class="lg:hidden max-lg:flex-initial w-full flex justify-center items-center py-5">
                <hr class="w-9/12 border-t-2 opacity-85 max-lg:max-w-[515.4px] max-lg:min-w-[515.4px] max-sm:min-w-0">
            </div>
            <div
                class="xl:pr-8 xl:w-auto lg:w-[350px] lg:pr-0 max-lg:w-full max-lg:flex max-lg:justify-center max-lg:items-center max-lg:pb-5">
                <div class="max-lg:w-9/12">
                    <h1 class="font4 pb-4 text-3xl text-[#cfc4b2] max-lg:pt-0 max-lg:pb-5 max-lg:text-center max-lg:text-2xl t">
                        CONTACT INFORMATION</h1>
                    <p class="text-base max-lg:text-center font3 text-[#cfc4b2] max-lg:py-1">Whatsapp: 081233455678</p>
                    <p class="text-base max-lg:text-center font3 text-[#cfc4b2] max-lg:py-1">Email: SugengBejo@gmail.com</p>
                </div>
            </div>
        </div>

    </div>
    <div class="relative z-20 text-white text-center w-full">
        <hr class="w-full border border-t-1  mb-4 opacity-30 box-border">
        <p class="text-sm mb-4 text-[#cfc4b2] font4">Copyright © 2024</p>
    </div>
</footer>

@extends('user.layout')
@section('style')
    <style>
        .custom-shape-divider-bottom-1725791922 .shape-fill {
            fill: #FFFFFF;
        }

        .custom-shape-divider-bottom-1725791922 {
            position: absolute;
            bottom: 0;
            top: 10px;
            width: 100%;
            height: auto;
            z-index: 5;
            transform: rotate(180deg);
        }

        .swiper {
            width: 50%;
            height: 80%;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }



        .swiper-container-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }


        .swiper-button-prev,
        .swiper-button-next {
            position: relative;
            top: auto;
        }

        .custom-shape-divider-bottom-1725791922 img {
            position: relative;
            display: block;
            width: 100%;
            margin-top: -1px;
            transform: scale(-1);
        }

        .swiper-pagination {
            position: absolute;
            z-index: 1000;
            left: 0;
            right: 0;
            text-align: center;
        }
    </style>
@section('content')
    <a href="{{ route('cart') }}">
        <div class="fixed z-50 bottom-4 right-4">
            <div class="relative">
                <button class="bg-gray-200 hover:bg-gray-500 p-3 rounded-full shadow-2xl">
                    <img src="{{ asset('img/shopping-cart.png') }}" alt="Cart Button" class="w-14 h-14 p-1">
                </button>
                <span
                    class="absolute top-0 right-0 bg-[rgb(92,64,51)] border-white border text-white text-xs font-bold rounded-full w-6 h-6 flex items-center justify-center shadow-lg">
                    {{ count(session('cart', [])) }}
                </span>
            </div>
        </div>
    </a>
    <div class="bg-[#ffff]">
        <div class="relative z-1 w-full">
            <div class="swiper2 !w-full !h-full mySwiper2 relative overflow-x-hidden">
                <div class="swiper-wrapper">
                    <div class="swiper-slide relative">
                        <img class="relative z-0 filter brightness-75 h-full w-full max-xl:object-cover"
                            src="{{ asset('img/duas.png') }}" alt="">
                        <a href="#"
                            class="font3 absolute bottom-28 transform right-[480px] bg-[#7B4B3A] text-[#e9ded7] hover:text-[#C29545] px-4 py-2 border border-[#7B4B3A] rounded-lg text-lg font-extrabold z-10">BELI
                            SEKARANG</a>
                    </div>
                    <div class="swiper-slide relative">
                        <img class="relative z-0 filter brightness-75 h-full w-full max-xl:object-cover"
                            src="{{ asset('img/satus.png') }}" alt="">
                    </div>

                </div>
                <div class="swiper-pagination max-sm:hidden"></div>
            </div>
        </div>
    </div>

    <div class="container mx-auto my-10 mt-20 w-[80%] justify-start">
        <div class="text-start">
            <h1 class="text-[54px] font-bold mb-4 custom-span text-[#5C4033]" data-aos="zoom-in-up">Batik Berkah Mojo</h1>
            <p class="text-[#5C4033] font3">Batik Berkah Mojo memproduksi kain batik tulis dan cap pewarna alam serta tenun berkhas Jombangan.</p>
        </div>
        <div class="grid sm:grid-cols-1 lg:grid-cols-2  mt-8 gap-14 place-items-center">
                <div class="relative w-full h-[310px] max-sm:h-[260px] shadow-[0_3px_10px_rgb(0,0,0,0.2)] rounded-md grid grid-rows-7 mb-8"
                    style="background: linear-gradient(to right, #5C4033, #4D4C1C);">
                    <div class="row-span-3 flex flex-col gap-1">
                        <img src="{{ asset('img/benangimport.png') }}" alt="Image"
                            class="w-full !h-[260px] object-cover rounded-sm">
                        <a class="flex justify-center" href="">
                            <button
                            class="rounded-md font3 w-full inline-block m-2  px-6  text-lg font-medium uppercase leading-normal text-white shadow-2xl transition duration-150 ease-in-out focus:shadow-md focus:outline-none focus:ring-0  active:shadow-primary-2 motion-reduce:transition-none dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong"
                            style="background: linear-gradient(to right, #5C4033, #4D4C1C);">
                            BENANG IMPORT
                        </button>
                        </a>
                    </div>
                </div>
                <div class="relative w-full h-[310px] max-sm:h-[260px] shadow-[0_3px_10px_rgb(0,0,0,0.2)] rounded-md grid grid-rows-7 mb-8"
                    style="background: linear-gradient(to right, #5C4033, #4D4C1C);">
                    <div class="row-span-3 flex flex-col gap-1">
                        <img src="{{ asset('img/benanglokal.png') }}" alt="Image"
                            class="w-full !h-[260px] object-cover rounded-sm">
                        <a class="flex justify-center" href="">
                            <button
                                class="rounded-md font3 w-full inline-block m-2   px-6  text-lg font-medium uppercase leading-normal text-white shadow-2xl transition duration-150 ease-in-out focus:shadow-md focus:outline-none focus:ring-0  active:shadow-primary-2 motion-reduce:transition-none dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong"
                                style="background: linear-gradient(to right, #5C4033, #4D4C1C);">
                                BENANG LOKAL
                            </button>
                        </a>
                    </div>
                </div>
        </div>
    </div>
    </div>

    <div class="container mx-auto my-10 w-[80%] justify-center">
        <div class="text-center">
            <h1 class="text-[54px] font-bold mb-4 custom-span text-[#5C4033]" data-aos="zoom-in-up">Our Collection</h1>
            <p class="text-[#5C4033] font3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt</p>
        </div>
        <div class="grid sm:grid-cols-1 md:grid-cols-2 2xl:grid-cols-4 mt-8 place-items-center">
            @foreach ($catalog as $item)
                <div class="relative w-[250px] h-[310px] shadow-[0_3px_10px_rgb(0,0,0,0.2)] rounded-md grid grid-rows-7 mb-8"
                    style="background: linear-gradient(to right, #5C4033, #4D4C1C);">
                    <div class="row-span-7 flex flex-col gap-1">
                        <img src="{{ asset('storage/uploads/catalog/' . $item->image) }}" alt="Image"
                            class="w-full h-[150px] object-cover rounded-sm">
                        <div class="pt-2 px-4 ">
                            <h1 class="font4 font-semibold text-[16px] text-[#F5E9D3]">{{ $item->name }}</h1>
                            <h1 class="font3 font-bold text-[14px] leading-4 text-[#F5E9D3]">Rp. {{ $item->price }}
                            </h1>
                            <h1 class="font3 leading-5 mt-2 text-[12px] text-red-100">Stok Tersisa {{ $item->stock }}
                                pcs
                            </h1>
                        </div>
                        <a class="flex justify-center" href="{{ route('add-cart', $item->id) }}">
                            <button
                                class="rounded-md font4 w-full inline-block !bg-[#dfdfdf] m-4 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-black shadow-2xl transition duration-150 ease-in-out focus:shadow-md focus:outline-none focus:ring-0  active:shadow-primary-2 motion-reduce:transition-none dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong">
                                Masukkan ke Tas
                            </button>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    </div>

    <div class=" w-[80%] h-auto mx-auto mt-[150px]">
        <h1 data-aos="fade-up" class=" text-[54px] custom-span text-[#5C4033]">Our Location</h1>
    </div>
    <div class=" flex justify-center my-14 ">
        <div class="w-[80%] flex justify-center max-lg:mx-10">
            <iframe class="w-full"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.022392792926!2d112.3524248745699!3d-7.572537192441641!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e786c60f0a10641%3A0xa76cf05cf5c8979d!2sBATIK%20BERKAH%20MOJO!5e0!3m2!1sid!2sid!4v1734248163684!5m2!1sid!2sid"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
@endsection()

@section('script')
    <script>
        var swiper4 = new Swiper(".mySwiper4", {
            slidesPerView: 4,
            spaceBetween: 200,
            freeMode: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                1500: {
                    slidesPerView: 4,
                    spaceBetween: 35,
                },
                1200: {
                    slidesPerView: 2,
                    spaceBetween: 5,
                },
                0: {
                    slidesPerView: 1,
                }
            }
        });
        var swiper3 = new Swiper(".mySwiper3", {
            slidesPerView: 3,
            spaceBetween: 120,
            freeMode: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                1500: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
                1200: {
                    slidesPerView: 2,
                    spaceBetween: 5,
                },
                0: {
                    slidesPerView: 1,
                }
            }
        });
        var swiper2 = new Swiper(".mySwiper2", {
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: {
                delay: 8000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            }
        });
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 5,
            spaceBetween: 120,
            freeMode: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                1500: {
                    slidesPerView: 5,
                    spaceBetween: 120,
                },
                1150: {
                    slidesPerView: 4,
                    spaceBetween: 100,
                },
                900: {
                    slidesPerView: 3,
                    spaceBetween: 80,
                },
                600: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                0: {
                    slidesPerView: 1,
                }
            }
        });
    </script>
@endsection

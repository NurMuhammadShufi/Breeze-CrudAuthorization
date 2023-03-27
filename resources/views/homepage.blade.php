<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Twitter Chat - Breeze</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/logo-black.png') }}" type="image/x-icon" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="scrollbar-thin scrollbar-track-accent scrollbar-thumb-purple-600  ">

    {{-- Navbar Start --}}
    <nav x-data="{ isOpen: false }" class="relative bg-slate-100">
        <div class="container lg:px-32 px-12 py-4 mx-auto">
            <div class="lg:flex lg:items-center lg:justify-between ">
                <div class="flex items-center justify-between">
                    <a href="/" class="font-bold text-slate-800 text-lg"><span
                            class="text-primary font-normal">Tweet</span> Chat</a>

                    <!-- Mobile menu button -->
                    <div class="flex lg:hidden">
                        <button x-cloak @click="isOpen = !isOpen" type="button"
                            class="text-slate-800 hover:text-gray-600 dark:hover:text-gray-400 focus:outline-none focus:text-slate-800"
                            aria-label="toggle menu">
                            <svg x-show="!isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16" />
                            </svg>

                            <svg x-show="isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
                <div x-cloak :class="[isOpen ? 'translate-x-0 opacity-100 ' : 'opacity-0 -translate-x-full']"
                    class="absolute inset-x-0 z-20 w-full px-6 py-4 transition-all duration-300 ease-in-out bg-white lg:mt-0 lg:p-0 lg:top-0 lg:relative lg:bg-transparent lg:w-auto lg:opacity-100 lg:translate-x-0 lg:flex lg:items-center">
                    <div class="flex flex-col -mx-6 lg:flex-row lg:items-center lg:mx-8">
                        <a href="#"
                            class="px-3 py-2 mx-3 mt-2 text-slate-800 transition-colors duration-300 transform rounded-md lg:mt-0 hover:text-white dark:hover:bg-gray-700">Home</a>
                        <a href="#"
                            class="px-3 py-2 mx-3 mt-2 text-slate-800 transition-colors duration-300 transform rounded-md lg:mt-0 hover:text-white dark:hover:bg-gray-700">About</a>
                        <a href="#"
                            class="px-3 py-2 mx-3 mt-2 text-slate-800 transition-colors duration-300 transform rounded-md lg:mt-0 hover:text-white dark:hover:bg-gray-700">Features</a>
                        <a href="#"
                            class="px-3 py-2 mx-3 mt-2 text-slate-800 transition-colors duration-300 transform rounded-md lg:mt-0 hover:text-white dark:hover:bg-gray-700">Contact</a>
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/timeline') }}"
                                    class="px-3 py-2 mx-3 mt-2 transition-colors duration-300 transform rounded-md lg:mt-0 text-white hover:text-white dark:hover:bg-gray-700 ">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}"
                                    class="px-3 py-2 mx-3 mt-2 border border-accent transition-colors duration-300 transform rounded-md lg:mt-0 text-slate-800 hover:text-white dark:hover:bg-gray-700">Login</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="px-3 py-2 mx-3 mt-2 bg-primary transition-colors duration-300 transform rounded-md lg:mt-0 text-white hover:text-white dark:hover:bg-gray-700">Register</a>
                                @endif
                            @endauth
                        @endif
                    </div>

                    <div class="flex items-center mt-4 lg:mt-0">
                        <a href="https://github.com/NurMuhammadShufi/Breeze-CrudAuthorization"
                            class="text-black p-2 rounded-md transition-colors duration-300 transform dark:hover:bg-gray-700 hover:text-white"
                            aria-label="Github">
                            <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.026 2C7.13295 1.99937 2.96183 5.54799 2.17842 10.3779C1.395 15.2079 4.23061 19.893 8.87302 21.439C9.37302 21.529 9.55202 21.222 9.55202 20.958C9.55202 20.721 9.54402 20.093 9.54102 19.258C6.76602 19.858 6.18002 17.92 6.18002 17.92C5.99733 17.317 5.60459 16.7993 5.07302 16.461C4.17302 15.842 5.14202 15.856 5.14202 15.856C5.78269 15.9438 6.34657 16.3235 6.66902 16.884C6.94195 17.3803 7.40177 17.747 7.94632 17.9026C8.49087 18.0583 9.07503 17.99 9.56902 17.713C9.61544 17.207 9.84055 16.7341 10.204 16.379C7.99002 16.128 5.66202 15.272 5.66202 11.449C5.64973 10.4602 6.01691 9.5043 6.68802 8.778C6.38437 7.91731 6.42013 6.97325 6.78802 6.138C6.78802 6.138 7.62502 5.869 9.53002 7.159C11.1639 6.71101 12.8882 6.71101 14.522 7.159C16.428 5.868 17.264 6.138 17.264 6.138C17.6336 6.97286 17.6694 7.91757 17.364 8.778C18.0376 9.50423 18.4045 10.4626 18.388 11.453C18.388 15.286 16.058 16.128 13.836 16.375C14.3153 16.8651 14.5612 17.5373 14.511 18.221C14.511 19.555 14.499 20.631 14.499 20.958C14.499 21.225 14.677 21.535 15.186 21.437C19.8265 19.8884 22.6591 15.203 21.874 10.3743C21.089 5.54565 16.9181 1.99888 12.026 2Z">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    {{-- Navbar End --}}

    {{-- Hero Start --}}
    <div class="container lg:px-32 px-10 py-16 mx-auto bg-slate-100 h-screen flex items-center justify-center">
        <div class="items-center w-full lg:flex">
            <div class="w-full lg:w-1/2">
                <div class="lg:max-w-lg">
                    <h1 class="text-3xl font-semibold text-gray-800  lg:text-4xl">Best place to choose
                        <br> your <span class="text-primary ">clothes</span>
                    </h1>

                    <p class="mt-3 text-gray-800">Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit. Porro beatae error laborum ab amet sunt recusandae? Reiciendis natus perspiciatis optio.
                    </p>

                    <button
                        class="w-full px-5 py-2 mt-6 text-sm tracking-wider text-white uppercase transition-colors duration-300 transform bg-primary rounded-lg lg:w-auto hover:bg-violet-800 focus:outline-none">Shop
                        Now</button>
                </div>
            </div>
            <div class="flex items-center justify-center w-full mt-6 lg:mt-0 lg:w-1/2">
                <img class="w-full h-full lg:max-w-3xl" src="https://merakiui.com/images/components/Catalogue-pana.svg"
                    alt="Catalogue-pana.svg">
            </div>
        </div>
    </div>
    {{-- Hero End --}}

    {{-- About Start --}}
    <section class="bg-slate-50">
        <div class="container lg:px-32 px-12 py-12 mx-auto">
            <div class="lg:-mx-6 lg:flex lg:items-center">
                <img class="object-cover object-center lg:w-1/2 lg:mx-6 w-full rounded-lg lg:h-[36rem]"
                    src="https://images.unsplash.com/photo-1499470932971-a90681ce8530?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80"
                    alt="">

                <div class="mt-8 lg:w-1/2 lg:px-6 lg:mt-0">
                    <p class="text-5xl font-semibold text-primary ">“</p>

                    <h1 class="text-2xl font-semibold text-slate-800 lg:text-3xl lg:w-96">
                        Help us improve our productivity
                    </h1>

                    <p class="max-w-lg mt-6 text-slate-500 ">
                        “ Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore quibusdam ducimus libero ad
                        tempora doloribus expedita laborum saepe voluptas perferendis delectus assumenda rerum, culpa
                        aperiam dolorum, obcaecati corrupti aspernatur a. ”
                    </p>

                    <h3 class="mt-6 text-lg font-medium text-primary">Mia Brown</h3>
                    <p class="text-slate-500">Marketing Manager at Stech</p>
                </div>
            </div>
        </div>
    </section>
    {{-- About End --}}

    {{-- Feature Start --}}
    <section class="bg-slate-800 ">
        <div class="container lg:px-32 px-12 py-12 mx-auto">
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                <div>
                    <svg class="w-8 h-8" viewBox="0 0 30 30" fill="none">
                        <path
                            d="M29.6931 14.2283L22.7556 6.87823C22.3292 6.426 21.6175 6.40538 21.1652 6.83212C20.7137 7.25851 20.6927 7.9706 21.1195 8.42248L27.3284 15L21.1195 21.5783C20.6927 22.0302 20.7137 22.7419 21.1652 23.1687C21.3827 23.3738 21.6606 23.4754 21.9374 23.4754C22.2363 23.4754 22.5348 23.3569 22.7557 23.1233L29.6932 15.7729C30.1022 15.339 30.1023 14.6618 29.6931 14.2283Z"
                            fill="#f1f5f9" />
                        <path
                            d="M8.88087 21.578L2.67236 15L8.88087 8.42215C9.30726 7.97028 9.28664 7.25812 8.83476 6.83179C8.38323 6.4054 7.67073 6.42603 7.2444 6.87791L0.306858 14.2279C-0.102245 14.6614 -0.102245 15.3391 0.306858 15.7726L7.24475 23.123C7.466 23.3574 7.76413 23.4755 8.06302 23.4755C8.33976 23.4755 8.61767 23.3735 8.83476 23.1684C9.28705 22.742 9.30726 22.0299 8.88087 21.578Z"
                            fill="#f1f5f9" />
                        <path
                            d="M16.8201 3.08774C16.2062 2.99476 15.6317 3.41622 15.5379 4.03011L12.2379 25.6302C12.1441 26.2445 12.566 26.8186 13.1803 26.9124C13.238 26.921 13.295 26.9252 13.3516 26.9252C13.898 26.9252 14.3773 26.5266 14.4624 25.97L17.7624 4.3699C17.8562 3.7556 17.4343 3.1815 16.8201 3.08774Z"
                            fill="#7e22ce" />
                    </svg>

                    <h1 class="mt-4 text-xl font-semibold text-gray-800 dark:text-white">Default Taiwindcss Config</h1>

                    <p class="mt-2 text-gray-500">Lorem ipsum dolor sit amet, consectetur adipiscing
                        elit. Dignissim fusce tortor, ac sed malesuada blandit. Et mi gravida sem feugiat.</p>
                </div>

                <div>
                    <svg class="w-8 h-8" viewBox="0 0 30 30" fill="none">
                        <path
                            d="M27.3633 7.08984H26.4844V6.21094C26.4844 4.75705 25.3015 3.57422 23.8477 3.57422H4.39453C2.94064 3.57422 1.75781 4.75705 1.75781 6.21094V21.1523H0.878906C0.393516 21.1523 0 21.5459 0 22.0312V23.7891C0 25.2429 1.18283 26.4258 2.63672 26.4258H27.3633C28.8172 26.4258 30 25.2429 30 23.7891V9.72656C30 8.27268 28.8172 7.08984 27.3633 7.08984ZM3.51562 6.21094C3.51562 5.72631 3.9099 5.33203 4.39453 5.33203H23.8477C24.3323 5.33203 24.7266 5.72631 24.7266 6.21094V7.08984H20.332C18.8781 7.08984 17.6953 8.27268 17.6953 9.72656V21.1523H3.51562V6.21094ZM1.75781 23.7891V22.9102H17.6953V23.7891C17.6953 24.0971 17.7489 24.3929 17.8465 24.668H2.63672C2.15209 24.668 1.75781 24.2737 1.75781 23.7891ZM28.2422 23.7891C28.2422 24.2737 27.8479 24.668 27.3633 24.668H20.332C19.8474 24.668 19.4531 24.2737 19.4531 23.7891V9.72656C19.4531 9.24193 19.8474 8.84766 20.332 8.84766H27.3633C27.8479 8.84766 28.2422 9.24193 28.2422 9.72656V23.7891Z"
                            fill="#f1f5f9" />
                        <path
                            d="M24.7266 21.1523H22.9688C22.4834 21.1523 22.0898 21.5459 22.0898 22.0312C22.0898 22.5166 22.4834 22.9102 22.9688 22.9102H24.7266C25.212 22.9102 25.6055 22.5166 25.6055 22.0312C25.6055 21.5459 25.212 21.1523 24.7266 21.1523Z"
                            fill="#7e22ce" />
                        <path
                            d="M23.8477 12.3633C24.3331 12.3633 24.7266 11.9698 24.7266 11.4844C24.7266 10.999 24.3331 10.6055 23.8477 10.6055C23.3622 10.6055 22.9688 10.999 22.9688 11.4844C22.9688 11.9698 23.3622 12.3633 23.8477 12.3633Z"
                            fill="#7e22ce" />
                    </svg>

                    <h1 class="mt-4 text-xl font-semibold text-gray-800 dark:text-white">Fully Responsive Components
                    </h1>

                    <p class="mt-2 text-gray-500">Lorem ipsum dolor sit amet, consectetur adipiscing
                        elit. Dignissim fusce tortor, ac sed malesuada blandit. Et mi gravida sem feugiat.</p>
                </div>

                <div>
                    <svg class="w-8 h-8" viewBox="0 0 30 30" fill="none">
                        <g clip-path="url(#clip0)">
                            <path
                                d="M26.599 4.339a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zM7.151 25.661a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zM23.486 13.163a8.636 8.636 0 00-1.19-2.873l1.123-1.123-2.592-2.59L19.705 7.7a8.636 8.636 0 00-2.873-1.19V4.921h-3.664v1.586a8.634 8.634 0 00-2.873 1.19l-1.122-1.12-2.592 2.589 1.123 1.123a8.636 8.636 0 00-1.19 2.873H4.922l-.002 3.663h1.592A8.626 8.626 0 007.704 19.7l-1.127 1.127 2.59 2.591 1.128-1.127a8.623 8.623 0 002.873 1.19v1.597h3.664v-1.597a8.628 8.628 0 002.873-1.19l1.128 1.128 2.59-2.592-1.127-1.127a8.627 8.627 0 001.19-2.873h1.593v-3.664h-1.593zM15 19.256a4.255 4.255 0 110-8.511 4.255 4.255 0 010 8.51z"
                                fill="#7e22ce" />
                            <path
                                d="M5.276 23.2c-.42 0-.823.105-1.182.302A13.853 13.853 0 011.172 15C1.172 7.375 7.375 1.172 15 1.172c.927 0 1.854.092 2.754.274a.586.586 0 00.232-1.149A15.111 15.111 0 0015 0C10.993 0 7.226 1.56 4.393 4.393A14.902 14.902 0 000 15c0 3.37 1.144 6.66 3.228 9.296-.268.4-.413.872-.413 1.365 0 .657.257 1.275.721 1.74a2.444 2.444 0 001.74.721c.658 0 1.276-.256 1.74-.721.465-.465.721-1.083.721-1.74s-.256-1.276-.72-1.74a2.445 2.445 0 00-1.74-.72zm.912 3.373a1.28 1.28 0 01-.912.377 1.28 1.28 0 01-.911-.377 1.28 1.28 0 01-.378-.912c0-.344.134-.668.378-.912a1.28 1.28 0 01.911-.377c.345 0 .668.134.912.378.243.243.377.567.377.911 0 .344-.134.668-.377.912zM26.772 5.703a2.465 2.465 0 00-.308-3.104 2.446 2.446 0 00-1.74-.721c-.658 0-1.276.256-1.74.72a2.445 2.445 0 00-.721 1.74c0 .658.256 1.276.72 1.741.465.465 1.083.72 1.74.72.42 0 .824-.104 1.183-.3A13.854 13.854 0 0128.828 15c0 7.625-6.203 13.828-13.828 13.828-.918 0-1.836-.09-2.728-.269a.586.586 0 00-.23 1.15c.968.193 1.963.291 2.958.291 4.007 0 7.773-1.56 10.607-4.393A14.902 14.902 0 0030 15c0-3.37-1.145-6.66-3.228-9.297zm-2.96-.452a1.28 1.28 0 01-.377-.912c0-.344.134-.668.377-.911a1.28 1.28 0 01.912-.378 1.29 1.29 0 010 2.578 1.28 1.28 0 01-.912-.377z"
                                fill="#f1f5f9" />
                            <path
                                d="M12.582 25.078c0 .324.263.586.586.586h3.664a.586.586 0 00.586-.586v-1.136a9.179 9.179 0 002.199-.911l.802.802a.586.586 0 00.829 0l2.59-2.592a.586.586 0 000-.828l-.802-.802a9.169 9.169 0 00.911-2.199h1.132a.586.586 0 00.586-.585v-3.664a.586.586 0 00-.586-.586h-1.132a9.17 9.17 0 00-.911-2.199l.797-.797a.587.587 0 000-.829l-2.592-2.59a.586.586 0 00-.829 0l-.795.797a9.177 9.177 0 00-2.2-.912V4.922a.586.586 0 00-.585-.586h-3.664a.586.586 0 00-.586.586v1.126a9.169 9.169 0 00-2.199.91l-.796-.795a.586.586 0 00-.828 0l-2.592 2.59a.585.585 0 000 .828l.797.797a9.173 9.173 0 00-.911 2.199h-1.13a.586.586 0 00-.586.585l-.002 3.664a.585.585 0 00.586.586h1.132c.207.77.512 1.507.911 2.2l-.801.8a.586.586 0 000 .83l2.59 2.59a.586.586 0 00.829 0l.801-.801a9.185 9.185 0 002.2.911v1.136zm-1.97-3.28a.586.586 0 00-.732.078l-.713.714-1.761-1.763.712-.713a.586.586 0 00.078-.732 8.02 8.02 0 01-1.11-2.679.586.586 0 00-.572-.462H5.507l.002-2.492h1.005a.586.586 0 00.572-.463 8.022 8.022 0 011.11-2.678.586.586 0 00-.078-.733l-.708-.708 1.763-1.761.707.707c.196.196.5.228.733.078a8.016 8.016 0 012.678-1.11.586.586 0 00.463-.573v-1h2.492v1c0 .277.193.515.463.573a8.024 8.024 0 012.678 1.11c.232.15.537.118.732-.078l.708-.707 1.762 1.761-.708.708a.586.586 0 00-.078.732 8.027 8.027 0 011.11 2.679c.058.27.297.463.573.463h1.007v2.492h-1.007a.586.586 0 00-.573.462 8.02 8.02 0 01-1.11 2.679.586.586 0 00.078.732l.713.713-1.761 1.762-.714-.713a.586.586 0 00-.732-.078 8.027 8.027 0 01-2.678 1.11.586.586 0 00-.463.573v1.011h-2.492v-1.01a.586.586 0 00-.463-.574 8.021 8.021 0 01-2.678-1.11z"
                                fill="#f1f5f9" />
                            <path
                                d="M19.841 15A4.847 4.847 0 0015 10.158 4.847 4.847 0 0010.158 15 4.847 4.847 0 0015 19.841 4.847 4.847 0 0019.841 15zm-8.51 0A3.674 3.674 0 0115 11.33 3.674 3.674 0 0118.67 15 3.674 3.674 0 0115 18.67 3.674 3.674 0 0111.33 15z"
                                fill="#f1f5f9" />
                            <path
                                d="M20.395 2.216a.59.59 0 00.415-.172.593.593 0 00.171-.415.59.59 0 00-.586-.586.589.589 0 00-.586.586.589.589 0 00.586.587zM9.63 27.794a.59.59 0 00-.586.586.59.59 0 00.586.586.59.59 0 00.586-.586.59.59 0 00-.586-.585z"
                                fill="#7e22ce" />
                        </g>
                        <defs>
                            <clipPath id="clip0">
                                <path fill="#fff" d="M0 0h30v30H0z" />
                            </clipPath>
                        </defs>
                    </svg>

                    <h1 class="mt-4 text-xl font-semibold text-gray-800 dark:text-white">RTL Languages Support</h1>

                    <p class="mt-2 text-gray-500">Lorem ipsum dolor sit amet, consectetur adipiscing
                        elit. Dignissim fusce tortor, ac sed malesuada blandit. Et mi gravida sem feugiat.</p>
                </div>
            </div>
        </div>
    </section>
    {{-- Feature End --}}

    {{-- Contact Start --}}
    <section class="bg-slate-100 lg:h-full sm:h-screen flex justify-center items-center border-none">
        <div class="container lg:px-32 px-12 py-12 mx-auto ">
            <div>
                <h1 class="mt-2 text-2xl font-semibold text-slate-800 md:text-3xl">We’d love to hear
                    from you</h1>
                <p class="mt-3 text-slate-600">Our friendly team is always here to chat.</p>
            </div>

            <div
                class="grid grid-cols-1 gap-12 mt-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 bg-slate-800 rounded-lg">

                <div class="p-4 rounded-lg bg-slate-800 md:p-6">
                    <span class="inline-block  text-slate-100 rounded-lg bg-blue-100/8">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                        </svg>
                    </span>
                    <h2 class="mt-4 text-base font-medium text-slate-100">Chat to sales</h2>
                    <p class="mt-2 text-sm text-slate-100">Speak to our friendly team.</p>
                    <p class="mt-2 text-sm text-slate-100">hello@merakiui.com</p>
                </div>

                <div class="p-4 rounded-lg bg-slate-800 md:p-6">
                    <span class="inline-block  text-slate-100 rounded-lg bg-blue-100/8">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                        </svg>
                    </span>
                    <h2 class="mt-4 text-base font-medium text-slate-100">Chat to support</h2>
                    <p class="mt-2 text-sm text-slate-100">We’re here to help.</p>
                    <p class="mt-2 text-sm text-slate-100">Start new chat</p>
                </div>

                <div class="p-4 rounded-lg bg-slate-800 md:p-6">
                    <span class="inline-block  text-slate-100 rounded-lg bg-blue-100/8">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                        </svg>
                    </span>
                    <h2 class="mt-4 text-base font-medium text-slate-100">Visit us</h2>
                    <p class="mt-2 text-sm text-slate-100">Visit our office HQ..</p>
                    <p class="mt-2 text-sm text-slate-100">100 Smith Street</p>
                </div>

                <div class="p-4 rounded-lg bg-slate-800 md:p-6">
                    <span class="inline-block text-slate-100 rounded-lg bg-blue-100/8">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                        </svg>
                    </span>
                    <h2 class="mt-4 text-base font-medium text-slate-100">Call us</h2>
                    <p class="mt-2 text-sm text-slate-100">Mon-Fri from 8am to 5pm.</p>
                    <p class="mt-2 text-sm text-slate-100">+1 (555) 000-0000</p>
                </div>
            </div>
        </div>
    </section>
    {{-- Contact End --}}

    {{-- Footer Start --}}
    <footer class="bg-slate-50">
        <div class="container p-6 mx-auto">
            <hr class="h-px bg-gray-800 border-none">
            <div class="flex justify-center items-center py-2">
                <p class="text-center text-slate-800">&copy; TCB 2023 - All rights reserved</p>
            </div>
        </div>
    </footer>
    {{-- Footer End --}}
</body>

</html>

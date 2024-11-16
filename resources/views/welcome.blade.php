<x-guest-layout>

    <div class="min-h-full">
        <nav class="bg-gray-800">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="shrink-0">
                            <img class="size-8"
                                src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=500"
                                alt="Your Company">
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                <a href="#"
                                    class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white"
                                    aria-current="page">Dashboard</a>
                                <a href="#"
                                    class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Team</a>
                                <a href="#"
                                    class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Projects</a>
                                <a href="#"
                                    class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Calendar</a>
                                <a href="#"
                                    class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Reports</a>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">
                            <button type="button"
                                class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">View notifications</span>
                                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" aria-hidden="true" data-slot="icon">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                                </svg>
                            </button>

                            <!-- Profile dropdown -->
                            <div class="relative ml-3">
                                <div>
                                    <button type="button"
                                        class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                        id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                        <span class="absolute -inset-1.5"></span>
                                        <span class="sr-only">Open user menu</span>
                                        <img class="size-8 rounded-full"
                                            src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                            alt="">
                                    </button>
                                </div>

                                <!--
                Dropdown menu, show/hide based on menu state.

                Entering: "transition ease-out duration-100"
                  From: "transform opacity-0 scale-95"
                  To: "transform opacity-100 scale-100"
                Leaving: "transition ease-in duration-75"
                  From: "transform opacity-100 scale-100"
                  To: "transform opacity-0 scale-95"
              -->
                                {{-- <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5 focus:outline-none"
                                    role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                    tabindex="-1">
                                    <!-- Active: "bg-gray-100 outline-none", Not Active: "" -->
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                        tabindex="-1" id="user-menu-item-0">Your Profile</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                        tabindex="-1" id="user-menu-item-1">Settings</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                        tabindex="-1" id="user-menu-item-2">Sign out</a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="-mr-2 flex md:hidden">
                        <!-- Mobile menu button -->
                        <button type="button"
                            class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                            aria-controls="mobile-menu" aria-expanded="false">
                            <span class="absolute -inset-0.5"></span>
                            <span class="sr-only">Open main menu</span>
                            <!-- Menu open: "hidden", Menu closed: "block" -->
                            <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true" data-slot="icon">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                            <!-- Menu open: "block", Menu closed: "hidden" -->
                            <svg class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true" data-slot="icon">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <div class="md:hidden" id="mobile-menu">
                <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <a href="#" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white"
                        aria-current="page">Dashboard</a>
                    <a href="#"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Team</a>
                    <a href="#"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Projects</a>
                    <a href="#"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Calendar</a>
                    <a href="#"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Reports</a>
                </div>
                <div class="border-t border-gray-700 pb-3 pt-4">
                    <div class="flex items-center px-5">
                        <div class="shrink-0">
                            <img class="size-10 rounded-full"
                                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt="">
                        </div>
                        <div class="ml-3">
                            <div class="text-base/5 font-medium text-white">Tom Cook</div>
                            <div class="text-sm font-medium text-gray-400">tom@example.com</div>
                        </div>
                        <button type="button"
                            class="relative ml-auto shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                            <span class="absolute -inset-1.5"></span>
                            <span class="sr-only">View notifications</span>
                            <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true" data-slot="icon">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                            </svg>
                        </button>
                    </div>
                    <div class="mt-3 space-y-1 px-2">
                        <a href="#"
                            class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Your
                            Profile</a>
                        <a href="#"
                            class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Settings</a>
                        <a href="#"
                            class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Sign
                            out</a>
                    </div>
                </div>
            </div>
        </nav>

        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Dashboard</h1>
            </div>
        </header>

        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                {{--  --}}
                {{-- create a div with margin --}}
                <div class="mb-8">
                    <div>
                        <!-- Offcanvas -->
                        <!-- An Alpine.js and Tailwind CSS component by https://pinemix.com -->
                        <div x-data="{
                            open: false,
                            mobileFullWidth: false,
                        
                            // 'start', 'end', 'top', 'bottom'
                            position: 'end',
                        
                            // 'xs', 'sm', 'md', 'lg', 'xl'
                            size: 'md',
                        
                            // Set transition classes based on position
                            transitionClasses: {
                                'x-transition:enter-start'() {
                                    if (this.position === 'start') {
                                        return '-translate-x-full rtl:translate-x-full';
                                    } else if (this.position === 'end') {
                                        return 'translate-x-full rtl:-translate-x-full';
                                    } else if (this.position === 'top') {
                                        return '-translate-y-full';
                                    } else if (this.position === 'bottom') {
                                        return 'translate-y-full';
                                    }
                                },
                                'x-transition:leave-end'() {
                                    if (this.position === 'start') {
                                        return '-translate-x-full rtl:translate-x-full';
                                    } else if (this.position === 'end') {
                                        return 'translate-x-full rtl:-translate-x-full';
                                    } else if (this.position === 'top') {
                                        return '-translate-y-full';
                                    } else if (this.position === 'bottom') {
                                        return 'translate-y-full';
                                    }
                                },
                            },
                        }" x-on:keydown.esc.prevent="open = false">
                            <!-- Placeholder -->
                            <!-- Offcanvas Toggle Button -->
                            <button x-on:click="open = true" type="button"
                                class="inline-flex items-center justify-center gap-2 rounded-lg border border-zinc-800 bg-zinc-800 px-3 py-2 text-sm font-medium leading-5 text-white hover:border-zinc-900 hover:bg-zinc-900 hover:text-white focus:outline-none focus:ring-2 focus:ring-zinc-500/50 active:border-zinc-700 active:bg-zinc-700 dark:border-zinc-700/50 dark:bg-zinc-700/50 dark:ring-zinc-700/50 dark:hover:border-zinc-700 dark:hover:bg-zinc-700/75 dark:active:border-zinc-700/50 dark:active:bg-zinc-700/50">
                                Create a new project
                            </button>

                            <!-- END Placeholder -->

                            <!-- Offcanvas Backdrop -->
                            <div x-cloak x-show="open" x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                x-transition:leave="transition ease-in duration-200"
                                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                x-bind:aria-hidden="!open" tabindex="-1" role="dialog"
                                aria-labelledby="pm-offcanvas-title"
                                class="z-90 fixed inset-0 overflow-hidden bg-zinc-700/75 backdrop-blur-sm dark:bg-zinc-950/50">
                                <!-- Offcanvas Sidebar -->
                                <div x-cloak x-show="open" x-on:click.away="open = false" x-bind="transitionClasses"
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-end="translate-x-0 translate-y-0"
                                    x-transition:leave="transition ease-in duration-200"
                                    x-transition:leave-start="translate-x-0 translate-y-0" role="document"
                                    class="absolute flex w-full flex-col bg-white shadow-lg will-change-transform dark:bg-zinc-900 dark:text-zinc-100 dark:shadow-zinc-950"
                                    x-bind:class="{
                                        'h-dvh top-0 end-0': position === 'end',
                                        'h-dvh top-0 start-0': position === 'start',
                                        'bottom-0 start-0 end-0': position === 'top',
                                        'bottom-0 start-0 end-0': position === 'bottom',
                                        'h-64': position === 'top' || position === 'bottom',
                                        'sm:max-w-xs': size === 'xs' && !(position === 'top' ||
                                            position === 'bottom'),
                                        'sm:max-w-sm': size === 'sm' && !(position === 'top' ||
                                            position === 'bottom'),
                                        'sm:max-w-md': size === 'md' && !(position === 'top' ||
                                            position === 'bottom'),
                                        'sm:max-w-lg': size === 'lg' && !(position === 'top' ||
                                            position === 'bottom'),
                                        'sm:max-w-xl': size === 'xl' && !(position === 'top' ||
                                            position === 'bottom'),
                                        'max-w-72': !mobileFullWidth && !(position === 'top' ||
                                            position === 'bottom'),
                                    }">
                                    <!-- Header -->
                                    <div
                                        class="flex min-h-16 flex-none items-center justify-between border-b border-zinc-100 px-5 dark:border-zinc-800 md:px-7">
                                        <h3 id="pm-offcanvas-title" class="py-5 font-semibold">Title</h3>

                                        <!-- Close Button -->
                                        <button x-on:click="open = false" type="button"
                                            class="inline-flex items-center justify-center gap-2 rounded-lg border border-zinc-200 bg-white px-3 py-2 text-xs font-semibold leading-5 text-zinc-800 hover:border-zinc-300 hover:text-zinc-900 hover:shadow-sm focus:ring-zinc-300/25 active:border-zinc-200 active:shadow-none dark:border-zinc-700 dark:bg-transparent dark:text-zinc-300 dark:hover:border-zinc-600 dark:hover:text-zinc-200 dark:focus:ring-zinc-600/50 dark:active:border-zinc-700">
                                            <svg class="hi-solid hi-x -mx-1 inline-block size-4" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                        <!-- END Close Button -->
                                    </div>
                                    <!-- END Header -->

                                    <!-- Content -->
                                    <div class="flex grow flex-col overflow-y-auto p-5 md:p-7">
                                        
                                        
                                    </div>
                                    <!-- END Content -->
                                </div>
                                <!-- END Offcanvas Sidebar -->
                            </div>
                            <!-- END Offcanvas Backdrop -->
                        </div>
                        <!-- END Offcanvas -->


                    </div>
                </div>
                {{--  --}}

                <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-8">
                    <article class="rounded-xl bg-white p-4 ring ring-indigo-50 sm:p-6 lg:p-8">
                        <div class="flex items-start sm:gap-8">
                            <div class="hidden sm:grid sm:size-20 sm:shrink-0 sm:place-content-center sm:rounded-full sm:border-2 sm:border-indigo-500"
                                aria-hidden="true">
                                <div class="flex items-center gap-1">
                                    <span class="h-8 w-0.5 rounded-full bg-indigo-500"></span>
                                    <span class="h-6 w-0.5 rounded-full bg-indigo-500"></span>
                                    <span class="h-4 w-0.5 rounded-full bg-indigo-500"></span>
                                    <span class="h-6 w-0.5 rounded-full bg-indigo-500"></span>
                                    <span class="h-8 w-0.5 rounded-full bg-indigo-500"></span>
                                </div>
                            </div>

                            <div>
                                <strong
                                    class="rounded border border-indigo-500 bg-indigo-500 px-3 py-1.5 text-[10px] font-medium text-white">
                                    Episode #101
                                </strong>

                                <h3 class="mt-4 text-lg font-medium sm:text-xl">
                                    <a href="#" class="hover:underline"> Some Interesting Podcast Title </a>
                                </h3>

                                <p class="mt-1 text-sm text-gray-700">
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam nulla amet
                                    voluptatum sit
                                    rerum, atque, quo culpa ut necessitatibus eius suscipit eum accusamus, aperiam
                                    voluptas
                                    exercitationem facere aliquid fuga. Sint.
                                </p>

                                <div class="mt-4 sm:flex sm:items-center sm:gap-2">
                                    <div class="flex items-center gap-1 text-gray-500">
                                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>

                                        <p class="text-xs font-medium">48:32 minutes</p>
                                    </div>

                                    <span class="hidden sm:block" aria-hidden="true">&middot;</span>

                                    <p class="mt-2 text-xs font-medium text-gray-500 sm:mt-0">
                                        Featuring <a href="#" class="underline hover:text-gray-700">Barry</a>,
                                        <a href="#" class="underline hover:text-gray-700">Sandra</a> and
                                        <a href="#" class="underline hover:text-gray-700">August</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="rounded-xl bg-white p-4 ring ring-indigo-50 sm:p-6 lg:p-8">
                        <div class="flex items-start sm:gap-8">
                            <div class="hidden sm:grid sm:size-20 sm:shrink-0 sm:place-content-center sm:rounded-full sm:border-2 sm:border-indigo-500"
                                aria-hidden="true">
                                <div class="flex items-center gap-1">
                                    <span class="h-8 w-0.5 rounded-full bg-indigo-500"></span>
                                    <span class="h-6 w-0.5 rounded-full bg-indigo-500"></span>
                                    <span class="h-4 w-0.5 rounded-full bg-indigo-500"></span>
                                    <span class="h-6 w-0.5 rounded-full bg-indigo-500"></span>
                                    <span class="h-8 w-0.5 rounded-full bg-indigo-500"></span>
                                </div>
                            </div>

                            <div>
                                <strong
                                    class="rounded border border-indigo-500 bg-indigo-500 px-3 py-1.5 text-[10px] font-medium text-white">
                                    Episode #101
                                </strong>

                                <h3 class="mt-4 text-lg font-medium sm:text-xl">
                                    <a href="#" class="hover:underline"> Some Interesting Podcast Title </a>
                                </h3>

                                <p class="mt-1 text-sm text-gray-700">
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam nulla amet
                                    voluptatum sit
                                    rerum, atque, quo culpa ut necessitatibus eius suscipit eum accusamus, aperiam
                                    voluptas
                                    exercitationem facere aliquid fuga. Sint.
                                </p>

                                <div class="mt-4 sm:flex sm:items-center sm:gap-2">
                                    <div class="flex items-center gap-1 text-gray-500">
                                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>

                                        <p class="text-xs font-medium">48:32 minutes</p>
                                    </div>

                                    <span class="hidden sm:block" aria-hidden="true">&middot;</span>

                                    <p class="mt-2 text-xs font-medium text-gray-500 sm:mt-0">
                                        Featuring <a href="#" class="underline hover:text-gray-700">Barry</a>,
                                        <a href="#" class="underline hover:text-gray-700">Sandra</a> and
                                        <a href="#" class="underline hover:text-gray-700">August</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="rounded-xl bg-white p-4 ring ring-indigo-50 sm:p-6 lg:p-8">
                        <div class="flex items-start sm:gap-8">
                            <div class="hidden sm:grid sm:size-20 sm:shrink-0 sm:place-content-center sm:rounded-full sm:border-2 sm:border-indigo-500"
                                aria-hidden="true">
                                <div class="flex items-center gap-1">
                                    <span class="h-8 w-0.5 rounded-full bg-indigo-500"></span>
                                    <span class="h-6 w-0.5 rounded-full bg-indigo-500"></span>
                                    <span class="h-4 w-0.5 rounded-full bg-indigo-500"></span>
                                    <span class="h-6 w-0.5 rounded-full bg-indigo-500"></span>
                                    <span class="h-8 w-0.5 rounded-full bg-indigo-500"></span>
                                </div>
                            </div>

                            <div>
                                <strong
                                    class="rounded border border-indigo-500 bg-indigo-500 px-3 py-1.5 text-[10px] font-medium text-white">
                                    Episode #101
                                </strong>

                                <h3 class="mt-4 text-lg font-medium sm:text-xl">
                                    <a href="#" class="hover:underline"> Some Interesting Podcast Title </a>
                                </h3>

                                <p class="mt-1 text-sm text-gray-700">
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam nulla amet
                                    voluptatum sit
                                    rerum, atque, quo culpa ut necessitatibus eius suscipit eum accusamus, aperiam
                                    voluptas
                                    exercitationem facere aliquid fuga. Sint.
                                </p>

                                <div class="mt-4 sm:flex sm:items-center sm:gap-2">
                                    <div class="flex items-center gap-1 text-gray-500">
                                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>

                                        <p class="text-xs font-medium">48:32 minutes</p>
                                    </div>

                                    <span class="hidden sm:block" aria-hidden="true">&middot;</span>

                                    <p class="mt-2 text-xs font-medium text-gray-500 sm:mt-0">
                                        Featuring <a href="#" class="underline hover:text-gray-700">Barry</a>,
                                        <a href="#" class="underline hover:text-gray-700">Sandra</a> and
                                        <a href="#" class="underline hover:text-gray-700">August</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>

            </div>
        </main>
    </div>

</x-guest-layout>

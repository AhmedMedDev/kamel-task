<!doctype html>
<!-- dir="rtl" for RTL support -->
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    {{-- <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}

    <link href="https://fonts.bunny.net/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />

    <!-- Tailwind CSS Play CDN (perfect for development/testing purposes) -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio"></script>

    <!-- Tailwind CSS v3 Configuration -->
    <script>
        const defaultTheme = tailwind.defaultTheme;

        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    fontFamily: {
                        sans: ["Inter", ...defaultTheme.fontFamily.sans],
                    },
                    keyframes: {
                        "full-tl": {
                            "0%": {
                                transform: "translateX(0)"
                            },
                            "100%": {
                                transform: "translateX(-100%)"
                            },
                        },
                        "full-tr": {
                            "0%": {
                                transform: "translateX(0)"
                            },
                            "100%": {
                                transform: "translateX(100%)"
                            },
                        },
                    },
                    animation: {
                        "full-tl": "full-tl 25s linear infinite",
                        "full-tr": "full-tr 25s linear infinite",
                    },
                },
            },
        };
    </script>

    <!-- Alpine Plugins -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/focus@3.x.x/dist/cdn.min.js"></script>

    <!-- Alpine Core -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Alpine x-cloak style (https://alpinejs.dev/directives/cloak) -->
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="bg-white text-zinc-900 antialiased dark:bg-zinc-900 dark:text-zinc-100 font-sans ">

    <!-- Notification -->
    <!-- An Alpine.js and Tailwind CSS component by https://pinemix.com -->
    <div x-data="{
        // Options
        position: 'top-end', // 'top-start', 'top-end', 'bottom-start', 'bottom-end'
        autoClose: true,
        autoCloseDelay: 5000,
    
        // Helpers
        notifications: [],
        nextId: 1,
    
        // Set transition classes based on position
        transitionClasses: {
            'x-transition:enter-start'() {
                if (this.position === 'top-start' || this.position === 'bottom-start') {
                    return 'opacity-0 -translate-x-12 rtl:translate-x-12';
                } else if (this.position === 'top-end' || this.position === 'bottom-end') {
                    return 'opacity-0 translate-x-12 rtl:-translate-x-12';
                }
            },
            'x-transition:leave-end'() {
                if (this.position === 'top-start' || this.position === 'bottom-start') {
                    return 'opacity-0 -translate-x-12 rtl:translate-x-12';
                } else if (this.position === 'top-end' || this.position === 'bottom-end') {
                    return 'opacity-0 translate-x-12 rtl:-translate-x-12';
                }
            },
        },
    
        // Trigger a notification
        triggerNotification(message, type, link) {
            const id = this.nextId++;
    
            this.notifications.push({ id, message, type, link, visible: false });
    
            setTimeout(() => {
                const index = this.notifications.findIndex(n => n.id === id);
    
                if (index > -1) {
                    this.notifications[index].visible = true;
                }
            }, 30);
    
            if (this.autoClose) {
                setTimeout(() => this.dismissNotification(id), this.autoCloseDelay);
            }
        },
    
        // Dismiss a notification
        dismissNotification(id) {
            const index = this.notifications.findIndex(n => n.id === id);
    
            if (index > -1) {
                this.notifications[index].visible = false;
    
                setTimeout(() => {
                    this.notifications.splice(index, 1);
                }, 300);
            }
        }
    }">

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
                                    <a href="/dashboard"
                                        :class="{'bg-gray-900 text-white': window.location.pathname === '/dashboard', 'text-gray-300 hover:bg-gray-700 hover:text-white': window.location.pathname !== '/projects'}"
                                        class="rounded-md px-3 py-2 text-sm font-medium"
                                        aria-current="page">Projects</a>
                                    <a href="/my-assigned-tasks"
                                        :class="{'bg-gray-900 text-white': window.location.pathname === '/tasks', 'text-gray-300 hover:bg-gray-700 hover:text-white': window.location.pathname !== '/tasks'}"
                                        class="rounded-md px-3 py-2 text-sm font-medium">My Assigned Tasks</a>
                                </div>
                            </div>
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-4 flex items-center md:ml-6" x-data="notificationApp">

                                <button @click="logout()" type="button"
                                    class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white">Logout</button>

                                {{--  --}}
                                <!-- Offcanvas -->
                                <!-- An Alpine.js and Tailwind CSS component by https://pinemix.com -->
                                <div x-on:keydown.esc.prevent="open = false">

                                    <button type="button" x-on:click="open = true"
                                        class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                                        <span class="absolute -inset-1.5"></span>
                                        <span class="sr-only">View notifications</span>
                                        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor" aria-hidden="true" data-slot="icon">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                                        </svg>
                                        <span x-show="notifications.some(notification => !notification.read_at)"
                                            class="absolute top-0 right-0 block h-2 w-2 transform translate-x-1/2 -translate-y-1/2 rounded-full bg-red-600 ring-2 ring-white"></span>
                                    </button>

                                    <!-- Offcanvas Backdrop -->
                                    <div x-cloak x-show="open" x-transition:enter="transition ease-out duration-300"
                                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                        x-transition:leave="transition ease-in duration-200"
                                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                        x-bind:aria-hidden="!open" tabindex="-1" role="dialog"
                                        aria-labelledby="pm-offcanvas-title"
                                        class="z-90 fixed inset-0 overflow-hidden bg-zinc-700/75 backdrop-blur-sm dark:bg-zinc-950/50">
                                        <!-- Offcanvas Sidebar -->
                                        <div x-cloak x-show="open" x-on:click.away="open = false"
                                            x-bind="transitionClasses"
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
                                                <h3 id="pm-offcanvas-title" class="py-5 font-semibold">Notifications
                                                </h3>

                                                <!-- Close Button -->
                                                <button x-on:click="open = false" type="button"
                                                    class="inline-flex items-center justify-center gap-2 rounded-lg border border-zinc-200 bg-white px-3 py-2 text-xs font-semibold leading-5 text-zinc-800 hover:border-zinc-300 hover:text-zinc-900 hover:shadow-sm focus:ring-zinc-300/25 active:border-zinc-200 active:shadow-none dark:border-zinc-700 dark:bg-transparent dark:text-zinc-300 dark:hover:border-zinc-600 dark:hover:text-zinc-200 dark:focus:ring-zinc-600/50 dark:active:border-zinc-700">
                                                    <svg class="hi-solid hi-x -mx-1 inline-block size-4"
                                                        fill="currentColor" viewBox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
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
                                                <template x-for="notification in notifications" :key="notification.id">
                                                    <div :class="{
                                                        'bg-gray-100 dark:bg-gray-800': notification
                                                            .read_at,
                                                        'bg-blue-100 dark:bg-blue-800': !notification.read_at
                                                    }"
                                                        class="mb-4 rounded-lg p-4 shadow-md">
                                                        <div class="flex justify-between">
                                                            <div>
                                                                <h4 class="text-lg font-semibold"
                                                                    x-text="notification.title"></h4>
                                                                <p class="text-sm text-gray-600 dark:text-gray-400"
                                                                    x-text="notification.data.message"></p>
                                                            </div>
                                                        </div>
                                                        <div class="mt-4 flex items-center justify-between">
                                                            <div class="flex items-center gap-2 text-gray-500">
                                                                <div class="flex items-center">
                                                                    <svg class="size-4" fill="none"
                                                                        stroke="currentColor" viewBox="0 0 24 24"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z">
                                                                        </path>
                                                                    </svg>
                                                                    <p class="text-xs font-medium ml-2"
                                                                        x-text="new Date(notification.created_at).toLocaleDateString()">
                                                                    </p>
                                                                </div>
                                                                <button x-on:click="markAsRead(notification.id)"
                                                                    class="inline-block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:relative">
                                                                    Mark as read
                                                                </button>
                                                                <button
                                                                    x-on:click="deleteNotification(notification.id)"
                                                                    class="inline-block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:relative">
                                                                    Delete
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </template>
                                            </div>
                                            <!-- END Content -->
                                        </div>
                                        <!-- END Offcanvas Sidebar -->
                                    </div>
                                    <!-- END Offcanvas Backdrop -->
                                </div>
                                <!-- END Offcanvas -->

                                {{--  --}}


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
                        <a href="#"
                            class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white"
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
                    <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $title }}</h1>
                </div>
            </header>

            <main x-data="app()">
                <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                    {{ $slot }}
                </div>
            </main>
        </div>


        <!-- Notifications Container -->
        <div x-cloak x-show="notifications.length > 0" role="region" aria-label="Notifications"
            class="fixed z-50 flex w-72 gap-2"
            :class="{
                'flex-col-reverse': position === 'top-start' || position === 'top-end',
                'flex-col': position === 'bottom-start' || position === 'bottom-end',
                'top-4': position === 'top-end' || position === 'top-start',
                'bottom-4': position === 'bottom-end' || position === 'bottom-start',
                'end-4': position === 'top-end' || position === 'bottom-end',
                'start-4': position === 'top-start' || position === 'bottom-start',
            }">
            <template x-for="notification in notifications" :key="notification.id">
                <div x-show="notification.visible" x-bind="transitionClasses"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-end="opacity-100 translate-x-0"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-x-0"
                    class="flex items-center justify-between gap-4 rounded-lg border border-zinc-200/75 bg-white p-4 text-sm shadow-sm dark:border-zinc-700/75 dark:bg-zinc-800"
                    role="alert" :aria-live="notification.type === 'error' ? 'assertive' : 'polite'">
                    <template x-if="notification.type !== 'neutral'">
                        <div class="flex size-8 flex-none items-center justify-center rounded-full"
                            :class="{
                                'bg-green-100 text-green-700 dark:bg-green-600/25 dark:text-green-100': notification
                                    .type === 'success',
                                'bg-rose-100 text-rose-700 dark:bg-rose-600/25 dark:text-rose-100': notification
                                    .type === 'error',
                                'bg-teal-100 text-teal-700 dark:bg-teal-600/25 dark:text-teal-100': notification
                                    .type === 'info',
                                'bg-amber-100 text-amber-700 dark:bg-amber-600/25 dark:text-amber-100': notification
                                    .type === 'warning'
                            }">
                            <!-- Success Icon -->
                            <template x-if="notification.type === 'success'">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                    class="hi-micro hi-check inline-block size-4">
                                    <path fill-rule="evenodd"
                                        d="M12.416 3.376a.75.75 0 0 1 .208 1.04l-5 7.5a.75.75 0 0 1-1.154.114l-3-3a.75.75 0 0 1 1.06-1.06l2.353 2.353 4.493-6.74a.75.75 0 0 1 1.04-.207Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </template>
                            <!-- END Success Icon -->

                            <!-- Error Icon -->
                            <template x-if="notification.type === 'error'">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                    class="hi-micro hi-x-mark inline-block size-4">
                                    <path
                                        d="M5.28 4.22a.75.75 0 0 0-1.06 1.06L6.94 8l-2.72 2.72a.75.75 0 1 0 1.06 1.06L8 9.06l2.72 2.72a.75.75 0 1 0 1.06-1.06L9.06 8l2.72-2.72a.75.75 0 0 0-1.06-1.06L8 6.94 5.28 4.22Z" />
                                </svg>
                            </template>
                            <!-- END Error Icon -->

                            <!-- Warning Icon -->
                            <template x-if="notification.type === 'warning'">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                    class="hi-micro hi-shield-exclamation inline-block size-4">
                                    <path fill-rule="evenodd"
                                        d="M7.5 1.709a.75.75 0 0 1 1 0 8.963 8.963 0 0 0 4.84 2.217.75.75 0 0 1 .654.72 10.499 10.499 0 0 1-5.647 9.672.75.75 0 0 1-.694-.001 10.499 10.499 0 0 1-5.647-9.672.75.75 0 0 1 .654-.719A8.963 8.963 0 0 0 7.5 1.71ZM8 5a.75.75 0 0 1 .75.75v2a.75.75 0 0 1-1.5 0v-2A.75.75 0 0 1 8 5Zm0 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </template>
                            <!-- END Warning Icon -->

                            <!-- Info Icon -->
                            <template x-if="notification.type === 'info'">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                    class="hi-micro hi-information-circle inline-block size-4">
                                    <path fill-rule="evenodd"
                                        d="M15 8A7 7 0 1 1 1 8a7 7 0 0 1 14 0ZM9 5a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM6.75 8a.75.75 0 0 0 0 1.5h.75v1.75a.75.75 0 0 0 1.5 0v-2.5A.75.75 0 0 0 8.25 8h-1.5Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </template>
                            <!-- END Info Icon -->
                        </div>
                    </template>
                    <div class="flex-grow">
                        <div x-text="notification.message"></div>
                        <template x-if="notification.link">
                            <a @click="notification.link === '#' ? $event.preventDefault() : null"
                                :href="notification.link"
                                class="group mt-2 inline-flex items-center gap-1 rounded-lg bg-zinc-100 px-2 py-0.5 text-xs font-medium text-zinc-950 hover:bg-zinc-200/75 hover:text-zinc-950 dark:bg-zinc-700 dark:text-zinc-200 dark:hover:bg-zinc-600/50 dark:hover:text-zinc-50">
                                <span>Check it out</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                    class="hi-micro hi-arrow-right inline-block size-3 opacity-50 transition ease-out group-hover:translate-x-0.5">
                                    <path fill-rule="evenodd"
                                        d="M2 8a.75.75 0 0 1 .75-.75h8.69L8.22 4.03a.75.75 0 0 1 1.06-1.06l4.5 4.5a.75.75 0 0 1 0 1.06l-4.5 4.5a.75.75 0 0 1-1.06-1.06l3.22-3.22H2.75A.75.75 0 0 1 2 8Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </template>
                    </div>
                    <button @click="dismissNotification(notification.id)" type="button"
                        class="flex-none text-zinc-500 hover:text-zinc-700 active:text-zinc-500 dark:text-zinc-400 dark:hover:text-zinc-300 dark:active:text-zinc-400">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="hi-mini hi-x-mark inline-block size-5" aria-hidden="true">
                            <path
                                d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z" />
                        </svg>
                        <span class="sr-only">Close Notification</span>
                    </button>
                </div>
            </template>
        </div>
        <!-- END Notifications Container -->
    </div>
    <!-- END Notification -->
    <script>
        function notificationApp() {
            return {
                open: false,
                mobileFullWidth: false,
                position: 'end',
                size: 'md',
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


                notifications: [],

                init() {
                    this.fetchNotifications();
                },

                async fetchNotifications() {
                    try {
                        let response = await fetch('api/notifications', {
                            method: 'GET',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'Authorization': 'Bearer ' + localStorage.getItem('token')
                            }
                        });

                        let data = await response.json();

                        if (!response.ok) {
                            console.error('Error fetching notifications:', data);
                            return;
                        }

                        this.notifications = data.payload;

                        console.log(this.notifications);

                    } catch (error) {
                        console.error('Error:', error);
                    }
                },

                // create markAllAsRead function
                async markAllAsRead() {
                    try {
                        let response = await fetch('api/notifications', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'Authorization': 'Bearer ' + localStorage.getItem('token')
                            }
                        });

                        let data = await response.json();

                        if (!response.ok) {
                            console.error('Error marking all notifications as read:', data);
                            return;
                        }

                        this.notifications = this.notifications.map(notification => {
                            notification.read_at = new Date().toISOString();
                            return notification;
                        });

                        console.log(this.notifications);

                    } catch (error) {
                        console.error('Error:', error);
                    }
                },

                // create markAsRead function
                async markAsRead(id) {
                    try {
                        let response = await fetch(`api/notifications/${id}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'Authorization': 'Bearer ' + localStorage.getItem('token')
                            }
                        });

                        let data = await response.json();

                        if (!response.ok) {
                            console.error('Error marking notification as read:', data);
                            return;
                        }

                        this.notifications = this.notifications.map(notification => {
                            if (notification.id === id) {
                                notification.read_at = new Date().toISOString();
                            }
                            return notification;
                        });

                        console.log(this.notifications);

                    } catch (error) {
                        console.error('Error:', error);
                    }
                },

                // create deleteNotification function
                async deleteNotification(id) {
                    try {
                        let response = await fetch(`api/notifications/${id}`, {
                            method: 'DELETE',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'Authorization': 'Bearer ' + localStorage.getItem('token')
                            }
                        });

                        let data = await response.json();

                        if (!response.ok) {
                            console.error('Error deleting notification:', data);
                            return;
                        }

                        this.notifications = this.notifications.filter(notification => notification.id !== id);

                        console.log(this.notifications);

                    } catch (error) {
                        console.error('Error:', error);
                    }
                },

                // create deleteAllNotifications function
                async deleteAllNotifications() {
                    try {
                        let response = await fetch('api/notifications', {
                            method: 'DELETE',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'Authorization': 'Bearer ' + localStorage.getItem('token')
                            }
                        });

                        let data = await response.json();

                        if (!response.ok) {
                            console.error('Error deleting all notifications:', data);
                            return;
                        }

                        this.notifications = [];

                        console.log(this.notifications);

                    } catch (error) {
                        console.error('Error:', error);
                    }
                },

                // logout function
                logout() {
                    localStorage.removeItem('token');
                    window.location.href = '/login';
                }
            }
        }
    </script>

</body>
</html>

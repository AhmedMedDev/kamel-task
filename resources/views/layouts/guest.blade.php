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

        const modalData = {
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
        }
        
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
        {{ $slot }}

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

</body>

</html>

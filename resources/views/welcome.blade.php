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
                                        x-bind="transitionClasses" x-transition:enter="transition ease-out duration-300"
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
                                            <h3 id="pm-offcanvas-title" class="py-5 font-semibold">Notifications</h3>

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
                                                            <button x-on:click="deleteNotification(notification.id)"
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

        <main x-data="app()">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                {{--  --}}
                {{-- create a div with margin --}}
                <div class="mb-8">
                    <div>
                        <!-- Offcanvas -->
                        <!-- An Alpine.js and Tailwind CSS component by https://pinemix.com -->
                        <div x-on:keydown.esc.prevent="open = false">
                            <!-- Placeholder -->
                            <!-- Offcanvas Toggle Button -->

                            <div class="flex">
                                <button
                                    class="inline-block rounded border border-indigo-600 px-12 py-3 text-sm font-medium text-indigo-600 hover:bg-indigo-600 hover:text-white focus:outline-none focus:ring active:bg-indigo-500"
                                    x-on:click="openCreationForm()" type="button">
                                    Create a new project
                                </button>

                                {{-- // create a filter section that filters the projects based on their status (active or
                                completed)
                                // please make 3 boxes, one for all projects, one for active projects and one for
                                completed projects
                                // when a box is clicked, it should filter the projects based on their status
                                // the active box should have a different background color than the completed box
                                // the all projects box should have a different background color than the active and
                                completed boxes
                                // the all projects box should be the default selected box
                                // the all projects box should have a different background color when it is selected --}}

                                <div class="flex gap-4 ml-2">
                                    <button
                                        :class="filters.status === 0 ? 'inline-block rounded border border-indigo-600 px-12 py-3 text-sm font-medium text-white bg-indigo-600' : 'inline-block rounded border border-indigo-600 px-12 py-3 text-sm font-medium text-indigo-600 hover:bg-indigo-600 hover:text-white focus:outline-none focus:ring active:bg-indigo-500'"
                                        x-on:click="filterProjects(0)" type="button">
                                        All 
                                    </button>

                                    <button
                                        :class="filters.status === 1 ? 'inline-block rounded border border-indigo-600 px-12 py-3 text-sm font-medium text-white bg-indigo-600' : 'inline-block rounded border border-indigo-600 px-12 py-3 text-sm font-medium text-indigo-600 hover:bg-indigo-600 hover:text-white focus:outline-none focus:ring active:bg-indigo-500'"
                                        x-on:click="filterProjects(1)" type="button">
                                        Active 
                                    </button>

                                    <button
                                        :class="filters.status === 2 ? 'inline-block rounded border border-indigo-600 px-12 py-3 text-sm font-medium text-white bg-indigo-600' : 'inline-block rounded border border-indigo-600 px-12 py-3 text-sm font-medium text-indigo-600 hover:bg-indigo-600 hover:text-white focus:outline-none focus:ring active:bg-indigo-500'"
                                        x-on:click="filterProjects(2)" type="button">
                                        Completed 
                                    </button>
                                </div>
                            </div>

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
                                        <h3 id="pm-offcanvas-title" class="py-5 font-semibold">
                                            Create a new project
                                        </h3>

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
                                        <form @submit.prevent="submitForm" class="mt-8 grid grid-cols-8 gap-6">
                                            <div class="col-span-8">
                                                <label for="Title" class="block text-sm font-medium text-gray-700">
                                                    Title </label>

                                                <input type="text" id="Title" name="title"
                                                    x-model="form.title"
                                                    class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm" />
                                                <span x-show="errors.title" class="text-red-500 text-sm"
                                                    x-text="errors.title"></span>
                                            </div>

                                            <div class="col-span-8">
                                                <label for="Description"
                                                    class="block text-sm font-medium text-gray-700"> Description
                                                </label>

                                                <textarea id="Description" name="description" x-model="form.description"
                                                    class="mt-1 w-full rounded-lg border-gray-200 align-top shadow-sm sm:text-sm" rows="4"></textarea>
                                                <span x-show="errors.description" class="text-red-500 text-sm"
                                                    x-text="errors.description"></span>
                                            </div>

                                            <div class="col-span-8">
                                                <label for="DueDate" class="block text-sm font-medium text-gray-700">
                                                    Due Date </label>

                                                <input type="date" id="DueDate" name="due_date"
                                                    x-model="form.due_date"
                                                    class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm" />
                                                <span x-show="errors.due_date" class="text-red-500 text-sm"
                                                    x-text="errors.due_date"></span>
                                            </div>

                                            <div class="col-span-8">
                                                <label for="Status" class="block text-sm font-medium text-gray-700">
                                                    Status </label>

                                                <select id="Status" name="status" x-model="form.status"
                                                    class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm">
                                                    <option value="1">Active</option>
                                                    <option value="2">Completed</option>
                                                </select>
                                                <span x-show="errors.status" class="text-red-500 text-sm"
                                                    x-text="errors.status"></span>
                                            </div>

                                            <div class="col-span-6 sm:flex sm:items-center sm:gap-4">
                                                <button type="submit" x-show="!loading && editingProjectId === ''"
                                                    class="inline-block shrink-0 rounded-md border border-blue-600 bg-blue-600 px-12 py-3 text-sm font-medium text-white transition hover:bg-transparent hover:text-blue-600 focus:outline-none focus:ring active:text-blue-500">
                                                    Create Project
                                                </button>

                                                <button type="button" x-show="!loading && editingProjectId !== ''"
                                                    x-on:click="updateProject"
                                                    class="inline-block shrink-0 rounded-md border border-blue-600 bg-blue-600 px-12 py-3 text-sm font-medium text-white transition hover:bg-transparent hover:text-blue-600 focus:outline-none focus:ring active:text-blue-500">
                                                    Update Project
                                                </button>


                                                <button type="button" x-show="loading" disabled
                                                    class="flex shrink-0 rounded-md border border-blue-600 bg-transparent px-12 py-3 text-sm font-medium text-blue-600 transition  focus:outline-none focus:ring active:bg-blue-500">
                                                    <svg class="animate-spin h-5 w-5 mr-3"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24">
                                                        <circle class="opacity-25" cx="12" cy="12"
                                                            r="10" stroke="currentColor" stroke-width="4">
                                                        </circle>
                                                        <path class="opacity-75" fill="currentColor"
                                                            d="M4 12a8 8 0 018-8V0c4.418 0 8 3.582 8 8h-2c0-3.314-2.686-6-6-6V0c-3.314 0-6 2.686-6 6H4z">
                                                        </path>
                                                    </svg>
                                                    Loading
                                                </button>
                                            </div>
                                        </form>

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

                {{-- Projects --}}
                <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-8">
                    <template x-for="project in projects" :key="project.id">
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
                                        Project #<span x-text="project.id"></span>
                                    </strong>

                                    <h3 class="mt-4 text-lg font-medium sm:text-xl">
                                        <a href="#" class="hover:underline" x-text="project.title"></a>
                                    </h3>

                                    <p class="mt-1 text-sm text-gray-700" x-text="project.description"></p>

                                    <div class="mt-4 sm:flex sm:items-center sm:gap-2">
                                        <div class="flex items-center gap-1 text-gray-500">
                                            <svg class="size-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>

                                            <p class="text-xs font-medium"
                                                x-text="new Date(project.due_date).toLocaleDateString()"></p>
                                        </div>

                                        <span class="hidden sm:block" aria-hidden="true">&middot;</span>

                                        <p class="mt-2 text-xs font-medium text-gray-500 sm:mt-0">
                                            <span
                                                class="whitespace-nowrap rounded-full bg-purple-100 px-2.5 py-0.5 text-sm text-purple-700"
                                                x-text="project.status === 1 ? 'Active' : 'Completed'"">
                                            </span>
                                        </p>
                                    </div>

                                    <span
                                        class="inline-flex -space-x-px overflow-hidden rounded-md border bg-white shadow-sm mt-5">
                                        <button x-on:click="editProject(project.id)"
                                            class="inline-block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:relative">
                                            Edit
                                        </button>

                                        <button
                                            class="inline-block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:relative">
                                            View
                                        </button>

                                        <button x-on:click="deleteProject(project.id)"
                                            class="inline-block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:relative">
                                            Delete
                                        </button>
                                    </span>

                                </div>
                            </div>
                        </article>
                    </template>
                </div>

                <div class="mt-8">
                    <ol class="flex justify-center gap-1 text-xs font-medium ">
                        <li>
                            <button @click="fetchProjects(pagination.prev_page_url)"
                                :disabled="!pagination.prev_page_url"
                                :class="{ 'opacity-50 cursor-not-allowed': !pagination.prev_page_url }"
                                class="inline-flex size-8 items-center justify-center rounded border border-gray-100 bg-white text-gray-900 rtl:rotate-180">
                                <span class="sr-only">Prev Page</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-3" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </li>

                        <template x-for="link in pagination.links" :key="link.label">
                            <li>
                                <button @click="fetchProjects(link.url)" :disabled="!link.url || link.active"
                                    :class="{
                                        'bg-blue-600 text-white border-blue-600': link.active,
                                        'bg-white text-gray-900 border-gray-100': !link.active,
                                        'opacity-50 cursor-not-allowed': !link.url
                                    }"
                                    x-text="link.label"
                                    class="block size-8 rounded border border-gray-100 bg-white text-center leading-8 text-gray-900">
                                </button>
                            </li>
                        </template>

                        <li>
                            <button @click="fetchProjects(pagination.next_page_url)"
                                :disabled="!pagination.next_page_url"
                                :class="{ 'opacity-50 cursor-not-allowed': !pagination.next_page_url }"
                                class="inline-flex size-8 items-center justify-center rounded border border-gray-100 bg-white text-gray-900 rtl:rotate-180">
                                <span class="sr-only">Next Page</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-3" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </li>
                    </ol>
                    {{--  --}}

                </div>
                {{-- Projects --}}

            </div>
        </main>
    </div>

    <script>
        // notificationApp function
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
        // create submitForm function
        function app() {
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
                form: {
                    title: '',
                    description: '',
                    due_date: '',
                    status: 1,
                },
                errors: {},
                loading: false,
                projects: [],
                editingProjectId: '',
                pagination: {
                    current_page: 1,
                    prev_page_url: null,
                    next_page_url: null,
                    links: [],
                },
                filters: {
                    status: 0,
                },
                init() {
                    this.fetchProjects();
                },
                openCreationForm() {
                    this.open = true;
                    this.editingProjectId = '';
                    this.form = {
                        title: '',
                        description: '',
                        due_date: '',
                        status: 1,
                    };
                },
                validate() {
                    this.errors = {};

                    if (!this.form.title) {
                        this.errors.title = 'Title is required.';
                    } else if (typeof this.form.title !== 'string' || this.form.title.length > 255) {
                        this.errors.title = 'Title must be a string with a maximum length of 255 characters.';
                    }

                    if (!this.form.description) {
                        this.errors.description = 'Description is required.';
                    } else if (typeof this.form.description !== 'string') {
                        this.errors.description = 'Description must be a string.';
                    }

                    if (!this.form.due_date) {
                        this.errors.due_date = 'Due date is required.';
                    } else if (isNaN(Date.parse(this.form.due_date)) || new Date(this.form.due_date) <= new Date()) {
                        this.errors.due_date = 'Due date must be a valid date and after today.';
                    }

                    if (!this.form.status) {
                        this.errors.status = 'Status is required.';
                    } else if (![1, 2].includes(parseInt(this.form.status))) {
                        this.errors.status = 'Status must be either 1 (Active) or 2 (Completed).';
                    }

                    return Object.keys(this.errors).length === 0;
                },
                async submitForm() {

                    if (!this.validate()) {
                        return;
                    }

                    this.loading = true;

                    try {

                        // api/projects endpoint + send token in the header 
                        let response = await fetch('api/projects', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'Authorization': 'Bearer ' + localStorage.getItem('token')
                            },
                            body: JSON.stringify(this.form)
                        });

                        let data = await response.json();

                        if (!response.ok) {
                            this.errors = data.errors;
                            return;
                        }

                        this.fetchProjects();

                        this.loading = false;

                        // reset form
                        this.form = {
                            title: '',
                            description: '',
                            due_date: '',
                            status: 1,
                        };

                        this.open = false;

                        this.triggerNotification('Project created successfully!', 'success')

                    } catch (error) {
                        console.error('Error:', error);
                    } finally {

                    }
                },
                async fetchProjects(url = '/api/projects') {
                    try {
                        let response = await fetch(url, {
                            method: 'GET',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'Authorization': 'Bearer ' + localStorage.getItem('token')
                            }
                        });

                        let data = await response.json();

                        if (!response.ok) {
                            console.error('Error fetching projects:', data);
                            return;
                        }

                        this.projects = data.payload.data;
                        this.pagination = {
                            current_page: data.payload.current_page,
                            prev_page_url: data.payload.prev_page_url,
                            next_page_url: data.payload.next_page_url,
                            links: data.payload.links.filter(
                                (link) => !link.label.includes('Previous') && !link.label.includes('Next')
                            ),
                        };

                        console.log(this.projects);

                    } catch (error) {
                        console.error('Error:', error);
                    }
                },
                // write editProject function, pass project id as parameter
                editProject(id) {

                    let project = this.projects.find(project => project.id === id);
                    if (project) {
                        this.form = {
                            title: project.title,
                            description: project.description,
                            due_date: project.due_date,
                            status: project.status,
                        };
                        this.editingProjectId = id;
                        this.open = true;
                    }
                },
                // write updateProject function
                async updateProject() {
                    if (!this.validate()) {
                        return;
                    }

                    this.loading = true;

                    try {
                        let response = await fetch(`api/projects/${this.editingProjectId}`, {
                            method: 'PUT',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'Authorization': 'Bearer ' + localStorage.getItem('token')
                            },
                            body: JSON.stringify(this.form)
                        });

                        let data = await response.json();

                        if (!response.ok) {
                            this.errors = data.errors;
                            return;
                        }

                        this.fetchProjects();

                        this.loading = false;

                        // reset form
                        this.form = {
                            title: '',
                            description: '',
                            due_date: '',
                            status: 1,
                        };

                        this.editingProjectId = '';

                        this.open = false;

                        this.triggerNotification('Project updated successfully!', 'success')

                    } catch (error) {
                        console.error('Error:', error);
                    } finally {
                        this.loading = false;
                    }
                },
                // deleteProject function
                async deleteProject(id) {
                    if (!confirm('Are you sure you want to delete this project?')) {
                        return;
                    }

                    try {
                        let response = await fetch(`api/projects/${id}`, {
                            method: 'DELETE',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'Authorization': 'Bearer ' + localStorage.getItem('token')
                            }
                        });

                        let data = await response.json();

                        if (!response.ok) {
                            console.error('Error deleting project:', data);
                            return;
                        }

                        this.fetchProjects();

                        this.triggerNotification('Project deleted successfully!', 'success')

                    } catch (error) {
                        console.error('Error:', error);
                    }
                },
                // filterProjects function
                filterProjects(status) {
                    this.filters.status = status;

                    let url = (status === 0) ? '/api/projects' : `/api/projects?filters[status][$eq]=${status}`;

                    this.fetchProjects(url);
                },

            }
        }
    </script>
</x-guest-layout>

<x-app-layout>

    <x-slot:title>
        Tasks
    </x-slot>

    <!-- Modal -->
    <!-- An Alpine.js and Tailwind CSS component by https://pinemix.com -->
    <div x-data="{ open: false }" x-on:keydown.esc.prevent="open = false">
        <!-- Placeholder -->

        <button x-on:click="open = true" type="button" 
            class="inline-flex items-center justify-center gap-2 rounded-lg border border-zinc-800 bg-zinc-800 px-3 py-2 text-sm font-medium leading-5 text-white hover:border-zinc-900 hover:bg-zinc-900 hover:text-white focus:outline-none focus:ring-2 focus:ring-zinc-500/50 active:border-zinc-700 active:bg-zinc-700 dark:border-zinc-700/50 dark:bg-zinc-700/50 dark:ring-zinc-700/50 dark:hover:border-zinc-700 dark:hover:bg-zinc-700/75 dark:active:border-zinc-700/50 dark:active:bg-zinc-700/50">
            Create a new task
        </button>
        <!-- END Modal Toggle Button -->
        <!-- END Placeholder -->

        <!-- Modal Backdrop -->
        <div x-cloak x-show="open" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" x-bind:aria-hidden="!open" tabindex="-1" role="dialog"
            class="z-90 fixed inset-0 overflow-y-auto overflow-x-hidden bg-zinc-900/75 p-4 backdrop-blur-sm will-change-auto lg:p-8">
            <!-- Modal Dialog -->
            <div x-cloak x-show="open" x-on:click.away="open = false"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90 -translate-y-full"
                x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                x-transition:leave-end="opacity-0 scale-125 translate-y-full" role="document"
                class="mx-auto flex w-full max-w-md flex-col overflow-hidden rounded-lg bg-white shadow-sm will-change-auto dark:bg-zinc-800 dark:text-zinc-100">
                <div class="flex items-center justify-between bg-zinc-50 px-5 py-4 dark:bg-zinc-700/20">
                    <h3 class="text-lg font-bold">
                        Create Task
                    </h3>
                    <div class="-my-4">
                        <button x-on:click="open = false" type="button"
                            class="inline-flex items-center justify-center gap-2 rounded-lg border border-zinc-200 bg-white px-3 py-2 text-xs font-semibold leading-5 text-zinc-800 hover:border-zinc-300 hover:text-zinc-900 hover:shadow-sm focus:ring-zinc-300/25 active:border-zinc-200 active:shadow-none dark:border-zinc-700 dark:bg-transparent dark:text-zinc-300 dark:hover:border-zinc-600 dark:hover:text-zinc-200 dark:focus:ring-zinc-600/50 dark:active:border-zinc-700">
                            <svg class="hi-solid hi-x -mx-1 inline-block size-4" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="grow p-5">
                    <form @submit.prevent="submitForm" class=" grid grid-cols-8 gap-6">
                        <div class="col-span-8">
                            <label for="Title" class="block text-sm font-medium text-gray-700">
                                Title </label>

                            <input type="text" id="Title" name="title" x-model="form.title"
                                class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm" />
                            <span x-show="errors.title" class="text-red-500 text-sm" x-text="errors.title"></span>
                        </div>

                        <div class="col-span-8">
                            <label for="Description" class="block text-sm font-medium text-gray-700"> Description
                            </label>

                            <textarea id="Description" name="description" x-model="form.description"
                                class="mt-1 w-full rounded-lg border-gray-200 align-top shadow-sm sm:text-sm" rows="4"></textarea>
                            <span x-show="errors.description" class="text-red-500 text-sm"
                                x-text="errors.description"></span>
                        </div>

                        <div class="col-span-8">
                            <label for="Status" class="block text-sm font-medium text-gray-700">
                                Status </label>

                            <select id="Status" name="status" x-model="form.status"
                                class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm">
                                <option value="1">TO DO</option>
                                <option value="2">IN PROGRESS</option>
                                <option value="3">DONE</option>
                            </select>
                            <span x-show="errors.status" class="text-red-500 text-sm" x-text="errors.status"></span>
                        </div>

                        <div class="col-span-8">
                            <label for="UserId" class="block text-sm font-medium text-gray-700">
                                Assign To </label>

                            <select id="UserId" name="user_id" x-model="form.user_id"
                                class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm">
                                <option value="">Select User</option>
                                <template x-for="user in users" :key="user.id">
                                    <option x-bind:value="user.id" x-text="user.name"></option>
                                </template>
                            </select>
                            <span x-show="errors.user_id" class="text-red-500 text-sm" x-text="errors.user_id"></span>
                        </div>

                    </form>
                </div>
                <div
                    class="flex items-center justify-end gap-1.5 border-t border-zinc-100 px-5 py-4 dark:border-zinc-700/50">
                    <button x-on:click="open = false" type="button"
                        class="inline-flex items-center justify-center gap-2 rounded-lg border border-zinc-200 bg-white px-3 py-2 text-sm font-semibold leading-5 text-zinc-800 hover:border-zinc-300 hover:text-zinc-900 hover:shadow-sm focus:ring-zinc-300/25 active:border-zinc-200 active:shadow-none dark:border-zinc-700 dark:bg-transparent dark:text-zinc-300 dark:hover:border-zinc-600 dark:hover:text-zinc-200 dark:focus:ring-zinc-600/50 dark:active:border-zinc-700">
                        Close
                    </button>
                    <button type="button" x-show="!loading && editingTaskId === ''" x-on:click="submitForm()"
                        class="inline-flex items-center justify-center gap-2 rounded-lg border border-zinc-800 bg-zinc-800 px-3 py-2 text-sm font-medium leading-5 text-white hover:border-zinc-900 hover:bg-zinc-900 hover:text-white focus:outline-none focus:ring-2 focus:ring-zinc-500/50 active:border-zinc-700 active:bg-zinc-700 dark:border-zinc-700/50 dark:bg-zinc-700/50 dark:ring-zinc-700/50 dark:hover:border-zinc-700 dark:hover:bg-zinc-700/75 dark:active:border-zinc-700/50 dark:active:bg-zinc-700/50">
                        Save changes
                    </button>

                    <button type="button" x-show="!loading && editingTaskId !== ''" x-on:click="updateTask"
                        class="inline-flex items-center justify-center gap-2 rounded-lg border border-zinc-800 bg-zinc-800 px-3 py-2 text-sm font-medium leading-5 text-white hover:border-zinc-900 hover:bg-zinc-900 hover:text-white focus:outline-none focus:ring-2 focus:ring-zinc-500/50 active:border-zinc-700 active:bg-zinc-700 dark:border-zinc-700/50 dark:bg-zinc-700/50 dark:ring-zinc-700/50 dark:hover:border-zinc-700 dark:hover:bg-zinc-700/75 dark:active:border-zinc-700/50 dark:active:bg-zinc-700/50">
                        Update Task
                    </button>

                    <button type="button" x-show="loading" disabled
                        class="flex shrink-0 rounded-md border border-blue-600 bg-transparent px-12 py-3 text-sm font-medium text-blue-600 transition  focus:outline-none focus:ring active:bg-blue-500">
                        <svg class="animate-spin h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4">
                            </circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0c4.418 0 8 3.582 8 8h-2c0-3.314-2.686-6-6-6V0c-3.314 0-6 2.686-6 6H4z">
                            </path>
                        </svg>
                        Loading
                    </button>
                </div>
            </div>
            <!-- END Modal Dialog -->
        </div>
        <!-- END Modal Backdrop -->

        {{-- Main --}}
        <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-8 mt-8">
            <template x-for="task in tasks" :key="task.id">
                <article class="rounded-xl border-2 border-gray-100 bg-white">
                    <div class="flex items-start gap-4 p-4 sm:p-6 lg:p-8">
                        <div class="block shrink-0">
                            <img alt=""
                                src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8YXZhdGFyfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=800&q=60"
                                class="size-14 rounded-lg object-cover" />
                        </div>
                        <div>
                            <h3 class="font-medium sm:text-lg">
                                <a href="#" class="hover:underline" x-text="task.title"></a>
                            </h3>
                            <p class="line-clamp-2 text-sm text-gray-700" x-text="task.description"></p>
                            <div class="mt-2 sm:flex sm:items-center sm:gap-2">
                                <span class="hidden sm:block" aria-hidden="true">&middot;</span>
                                <p class="hidden sm:block sm:text-xs sm:text-gray-500">
                                    Created at
                                    <a href="#" class="font-medium underline hover:text-gray-700"
                                        x-text="task.created_by"></a>
                                    <span x-text="new Date(task.created_at).toLocaleDateString()"></span>
                                </p>
                                <span class="hidden sm:block" aria-hidden="true">&middot;</span>
                                <p class="hidden sm:block sm:text-xs sm:text-gray-500">
                                    last update
                                    <a href="#" class="font-medium underline hover:text-gray-700"
                                        x-text="task.updated_by"></a>
                                    <span x-text="new Date(task.updated_at).toLocaleDateString()"></span>
                                </p>
                            </div>
                            <div class="mt-2 sm:flex sm:items-center sm:gap-2">
                                {{-- // update , delete buttons --}}
                                <span class="inline-flex overflow-hidden rounded-md border bg-white shadow-sm">
                                    <button class="inline-block border-e p-3 text-gray-700 hover:bg-gray-50 focus:relative"
                                        x-on:click="editTask(task.id)">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                    </button>
    
                                    <button class="inline-block p-3 text-gray-700 hover:bg-gray-50 focus:relative"
                                        x-on:click="deleteTask(task.id)">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <strong
                            class="-mb-[2px] -me-[2px] inline-flex items-center gap-1 rounded-ee-xl rounded-ss-xl bg-green-600 px-3 py-1.5 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                            </svg>
                            <span class="text-[10px] font-medium sm:text-xs"
                                x-text="task.status === 1 ? 'TO DO' : task.status === 2 ? 'IN PROGRESS' : 'DONE'"></span>
                        </strong>
                    </div>
                </article>
            </template>
        </div>
        {{-- END Main --}}
    </div>
    <!-- END Modal -->


    <script>
        // Alpine.js
        // app functionality
        function app() {
            return {
                form: {
                    title: '',
                    description: '',
                    due_date: '',
                    status: 1,
                    project_id: '',
                    user_id: '',
                },
                errors: {},
                loading: false,
                tasks: [],
                editingTaskId: '',
                pagination: {
                    current_page: 1,
                    prev_page_url: null,
                    next_page_url: null,
                    links: [],
                },
                users: [],
                filters: {
                    status: 0,
                },
                init() {
                    this.fetchTasks();
                    this.fetchUsers();
                },
                async fetchUsers() {
                    try {
                        let response = await fetch('api/users', {
                            method: 'GET',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'Authorization': 'Bearer ' + localStorage.getItem('token')
                            }
                        });

                        let data = await response.json();

                        if (!response.ok) {
                            console.error('Error fetching users:', data);
                            return;
                        }

                        this.users = data.payload;

                    } catch (error) {
                        console.error('Error:', error);
                    }
                },
                openCreationForm() {
                    this.open = true;
                    this.editingTaskId = '';

                    this.form = {
                        title: '',
                        description: '',
                        due_date: '',
                        status: 1,
                        project_id: this.form.project_id,
                        user_id: '',
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

                    if (!this.form.status) {
                        this.errors.status = 'Status is required.';
                    } else if (![1, 2, 3].includes(parseInt(this.form.status))) {
                        this.errors.status = 'Status must be either 1 (TO_DO), 2 (IN_PROGRESS), or 3 (DONE).';
                    }

                    if (!this.form.project_id) {
                        this.errors.project_id = 'Project ID is required.';
                    }

                    return Object.keys(this.errors).length === 0;
                },
                async submitForm() {

                    if (!this.validate()) {
                        return;
                    }

                    this.loading = true;

                    try {

                        let response = await fetch('api/tasks', {
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

                        this.fetchTasks();

                        this.loading = false;

                        this.form = {
                            title: '',
                            description: '',
                            due_date: '',
                            status: 1,
                            project_id: this.form.project_id,
                            user_id: '',
                        };

                        this.open = false;

                        this.triggerNotification('Task created successfully!', 'success')

                    } catch (error) {
                        console.error('Error:', error);
                    } finally {
                        this.loading = false;
                    }
                },
                async fetchTasks(url = '/api/tasks') {
                    let urlParams = new URLSearchParams(window.location.search);
                    let projectId = urlParams.get('project_id');

                    // if (!projectId) {
                    //     let user = JSON.parse(localStorage.getItem('user'));
                    //     url = 'api/tasks?filters[user_id][$eq]=' + user.id;
                    // }

                    // if project_id not found in url params, show alert message and return to projects page
                    if (!projectId) {
                        alert('Project ID not found in URL params. Redirecting to projects page...');
                        window.location.href = '/dashboard';
                        return;
                    }

                    this.form.project_id = projectId;

                    url = 'api/tasks?filters[project_id][$eq]=' + projectId;

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
                            console.error('Error fetching tasks:', data);
                            return;
                        }

                        this.tasks = data.payload.data;
                        this.pagination = {
                            current_page: data.payload.current_page,
                            prev_page_url: data.payload.prev_page_url,
                            next_page_url: data.payload.next_page_url,
                            links: data.payload.links.filter(
                                (link) => !link.label.includes('Previous') && !link.label.includes('Next')
                            ),
                        };

                        console.log(this.tasks);

                    } catch (error) {
                        console.error('Error:', error);
                    }
                },
                editTask(id) {

                    let task = this.tasks.find(task => task.id === id);
                    
                    if (task) {
                        this.form = {
                            title: task.title,
                            description: task.description,
                            due_date: task.due_date,
                            status: task.status,
                            project_id: task.project_id,
                            user_id: task.user_id,
                        };
                        this.editingTaskId = id;
                        this.open = true;
                    }
                },
                async updateTask() {
                    if (!this.validate()) {
                        return;
                    }

                    this.loading = true;

                    try {
                        let response = await fetch(`api/tasks/${this.editingTaskId}`, {
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

                        this.fetchTasks();

                        this.loading = false;

                        this.form = {
                            title: '',
                            description: '',
                            due_date: '',
                            status: 1,
                            project_id: '',
                            user_id: '',
                        };

                        this.editingTaskId = '';

                        this.open = false;

                        this.triggerNotification('Task updated successfully!', 'success')

                    } catch (error) {
                        console.error('Error:', error);
                    } finally {
                        this.loading = false;
                    }
                },
                async deleteTask(id) {
                    if (!confirm('Are you sure you want to delete this task?')) {
                        return;
                    }

                    try {
                        let response = await fetch(`api/tasks/${id}`, {
                            method: 'DELETE',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'Authorization': 'Bearer ' + localStorage.getItem('token')
                            }
                        });

                        let data = await response.json();

                        if (!response.ok) {
                            console.error('Error deleting task:', data);
                            return;
                        }

                        this.fetchTasks();

                        this.triggerNotification('Task deleted successfully!', 'success')

                    } catch (error) {
                        console.error('Error:', error);
                    }
                },
                filterTasks(status) {
                    this.filters.status = status;

                    let url = (status === 0) ? '/api/tasks' : `/api/tasks?filters[status][$eq]=${status}`;

                    this.fetchTasks(url);
                },
            }
        }
    </script>
</x-app-layout>

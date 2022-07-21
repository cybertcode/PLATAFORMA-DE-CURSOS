<div>
    <div class="bg-gray-200 py-4 mb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex">
            <button class="bg-white shadow h-12 px-4 rounded-lg text-gray-700 mr-4">
                <i class="fas fa-home"></i> Todos los cursos
            </button>
            <!-- component categorías -->
            {{-- Trabajamos con alpinejs --}}
            <div class="flex justify-center" x-data="{ open: false }">
                <div class="relative inline-block ">
                    <!-- Dropdown toggle button -->
                    <button
                        class="relative z-10 h-12 flex items-center p-2 text-sm text-gray-600 bg-white border border-transparent rounded-md focus:border-blue-500 focus:ring-opacity-40 dark:focus:ring-opacity-40 focus:ring-blue-300 dark:focus:ring-blue-400 focus:ring dark:text-white dark:bg-gray-800 focus:outline-none"
                        x-on:click="open=!open">
                        <i class="fas fa-tags"></i>
                        <span class="mx-1">Categorías</span>
                        <svg class="w-5 h-5 mx-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 15.713L18.01 9.70299L16.597 8.28799L12 12.888L7.40399 8.28799L5.98999 9.70199L12 15.713Z"
                                fill="currentColor"></path>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div class="absolute right-0 z-20 w-56 py-2 mt-2 overflow-hidden bg-white rounded-md shadow-xl dark:bg-gray-800"
                        x-show="open" x-on:click.away="open=false">
                        <a href="#"
                            class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                            view profile
                        </a>

                        <a href="#"
                            class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                            Settings
                        </a>

                        <a href="#"
                            class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                            Keyboard shortcuts
                        </a>

                        <hr class="border-gray-200 dark:border-gray-700 ">

                        <a href="#"
                            class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                            Company profile
                        </a>

                        <a href="#"
                            class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                            Team
                        </a>

                        <a href="#"
                            class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                            Invite colleagues
                        </a>

                        <hr class="border-gray-200 dark:border-gray-700 ">

                        <a href="#"
                            class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                            Help
                        </a>
                        <a href="#"
                            class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                            Sign Out
                        </a>
                    </div>

                </div>
            </div>
            <!-- component niveles -->
            {{-- Trabajamos con alpinejs --}}
            <div class="flex justify-center ml-4" x-data="{ open: false }">
                <div class="relative inline-block ">
                    <!-- Dropdown toggle button -->
                    <button
                        class="relative z-10 h-12 flex items-center p-2 text-sm text-gray-600 bg-white border border-transparent rounded-md focus:border-blue-500 focus:ring-opacity-40 dark:focus:ring-opacity-40 focus:ring-blue-300 dark:focus:ring-blue-400 focus:ring dark:text-white dark:bg-gray-800 focus:outline-none"
                        x-on:click="open=!open">
                        <i class="fas fa-layer-group"></i>
                        <span class="mx-1">Niveles</span>
                        <svg class="w-5 h-5 mx-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 15.713L18.01 9.70299L16.597 8.28799L12 12.888L7.40399 8.28799L5.98999 9.70199L12 15.713Z"
                                fill="currentColor"></path>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div class="absolute right-0 z-20 w-56 py-2 mt-2 overflow-hidden bg-white rounded-md shadow-xl dark:bg-gray-800"
                        x-show="open" x-on:click.away="open=false">
                        <a href="#"
                            class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                            view profile
                        </a>

                        <a href="#"
                            class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                            Settings
                        </a>

                        <a href="#"
                            class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                            Keyboard shortcuts
                        </a>

                        <hr class="border-gray-200 dark:border-gray-700 ">

                        <a href="#"
                            class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                            Company profile
                        </a>

                        <a href="#"
                            class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                            Team
                        </a>

                        <a href="#"
                            class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                            Invite colleagues
                        </a>

                        <hr class="border-gray-200 dark:border-gray-700 ">

                        <a href="#"
                            class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                            Help
                        </a>
                        <a href="#"
                            class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                            Sign Out
                        </a>
                    </div>



                </div>
            </div>
        </div>
    </div>
    {{-- CURSOS --}}
    <div
        class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-y-6 gap-x-8 ">
        @foreach ($courses as $course)
            <article class="bg-white shadow-lg rounded overflow-hidden ">
                <img class="h-36 w-full object-cover" src="{{ Storage::url($course->image->url) }}" alt="">
                <div class="px-6 py-4">
                    <h1 class="text-xl text-gray-700 mb-2 leading-6">{{ Str::limit($course->title, 40) }}</h1>
                    <p class="text-gray-500 text-sm mb-2">Prof: {{ $course->teacher->name }}</p>
                    <div class="flex">
                        <ul class="flex text-sm">
                            <li class="mr-1">
                                <i class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-400"></i>
                            </li>
                            <li class="mr-1">
                                <i class="fas fa-star text-{{ $course->rating >= 2 ? 'yellow' : 'gray' }}-400"></i>
                            </li>
                            <li class="mr-1">
                                <i class="fas fa-star text-{{ $course->rating >= 3 ? 'yellow' : 'gray' }}-400"></i>
                            </li>
                            <li class="mr-1">
                                <i class="fas fa-star text-{{ $course->rating >= 4 ? 'yellow' : 'gray' }}-400"></i>
                            </li>
                            <li class="mr-1">
                                <i class="fas fa-star text-{{ $course->rating == 5 ? 'yellow' : 'gray' }}-400"></i>
                            </li>
                        </ul>
                        <p class="text-sm text-gray-500 ml-auto">
                            <i class="fas fa-users"></i>
                            ({{ $course->students_count }})
                        </p>
                    </div>
                    <a href="{{ route('courses.show', $course) }}"
                        class=" text-center w-full mt-4 bg-blue-400 px-8 py-2 font-semibold  hover:bg-blue-500 text-white inline-flex items-center space-x-2 rounded">
                        <i class="fas fa-info-circle w-5 h-5 fill-current"></i>
                        <span>Mas information</span>
                    </a>
                </div>
            </article>
        @endforeach
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 my-2">
        {{ $courses->links() }}
    </div>
</div>

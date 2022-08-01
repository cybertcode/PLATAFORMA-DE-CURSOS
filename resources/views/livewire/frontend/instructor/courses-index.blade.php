<div class="container">
    {{-- Nuestro componente --}}
    <x-frontend.table-responsive>
        <table class="w-full whitespace-nowrap">
            <thead>
                <tr tabindex="0"
                    class="focus:outline-none h-16 w-full text-sm leading-none text-gray-800 dark:text-white ">
                    <th class="font-normal text-left pl-4">Item</th>
                    <th class="font-normal text-left pl-12">Nombre del curso</th>
                    <th class="font-normal text-left pl-12">Matriculados</th>
                    <th class="font-normal text-left pl-20">Calificación</th>
                    <th class="font-normal text-left pl-20">Estado</th>
                    <th class="font-normal text-left pl-16">Acciones</th>
                </tr>
            </thead>
            <tbody class="w-full">
                @forelse($courses as $course)
                    <tr tabindex="0"
                        class="focus:outline-none h-20 text-sm leading-none text-gray-800 dark:text-white  bg-white dark:bg-gray-800  hover:bg-gray-100 dark:hover:bg-gray-900  border-b border-t border-gray-100 dark:border-gray-700 ">
                        <td>{{ $course->id }}</td>
                        <td class="pl-4 cursor-pointer">
                            <div class="flex items-center">
                                <div class="w-10 h-10">
                                    <img class="w-full h-full" src="{{ Storage::url($course->image->url) }}"
                                        alt="{{ $course->title }}" />
                                </div>
                                <div class="pl-4">
                                    <p class="font-medium">{{ $course->title }}</p>
                                    <p class="text-xs leading-3 text-gray-600 dark:text-gray-200  pt-2">
                                        {{ $course->category->name }}
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="pl-12">
                            <p class="text-sm font-medium leading-none text-gray-800 dark:text-white ">
                                {{ $course->students->count() }}</p>
                            <div class="w-24 h-3 bg-gray-100 dark:bg-gray-700  rounded-full mt-2">
                                <div class="w-20 h-3 bg-green-progress rounded-full">Matriculados</div>
                            </div>
                        </td>
                        <td class="pl-12">
                            <div class="flex item-center">
                                <p class="font-medium mr-2">{{ $course->rating }}</p>
                                <ul class="flex text-sm">
                                    <li class="mr-1">
                                        <i
                                            class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-400"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i
                                            class="fas fa-star text-{{ $course->rating >= 2 ? 'yellow' : 'gray' }}-400"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i
                                            class="fas fa-star text-{{ $course->rating >= 3 ? 'yellow' : 'gray' }}-400"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i
                                            class="fas fa-star text-{{ $course->rating >= 4 ? 'yellow' : 'gray' }}-400"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i
                                            class="fas fa-star text-{{ $course->rating == 5 ? 'yellow' : 'gray' }}-400"></i>
                                    </li>
                                </ul>
                            </div>
                            <p class="text-xs leading-3 text-gray-600 dark:text-gray-200  mt-2">Valoración del curso</p>
                        </td>
                        <td class="pl-20">
                            @switch($course->status)
                                @case(1)
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Borrador</span>
                                @break

                                @case(2)
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Revisión</span>
                                @break

                                @case(3)
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Publicado</span>
                                @break

                                @default
                            @endswitch
                            {{-- <p class="text-xs leading-3 text-gray-600 dark:text-gray-200  mt-2">$4,200 left</p> --}}
                        </td>
                        <td class="pl-20">
                            <p class="font-medium">22.12.21</p>
                            <p class="text-xs leading-3 text-gray-600 dark:text-gray-200  mt-2">34 days</p>
                        </td>
                        <td class="pl-16">
                            <div class="flex items-center">
                                <img class="shadow-md w-8 h-8 rounded-full"
                                    src="https://cdn.tuk.dev/assets/templates/olympus/projects(8).png"
                                    alt="collaborator 1" />
                                <img class="shadow-md w-8 h-8 rounded-full -ml-2"
                                    src="https://cdn.tuk.dev/assets/templates/olympus/projects(9).png"
                                    alt="collaborator 2" />
                                <img class="shadow-md w-8 h-8 rounded-full -ml-2"
                                    src="https://cdn.tuk.dev/assets/templates/olympus/projects(10).png"
                                    alt="collaborator 3" />
                                <img class="shadow-md w-8 h-8 rounded-full -ml-2"
                                    src="https://cdn.tuk.dev/assets/templates/olympus/projects(11).png"
                                    alt="collaborator 4" />
                            </div>
                        </td>
                        <td class="px-7 2xl:px-0">
                            <button onclick="dropdownFunction(this)"
                                class="w-5 focus:ring-2 rounded-md focus:outline-none ml-7" role="button"
                                aria-label="options">
                                <img class="w-5" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/table_3-svg1.svg"
                                    alt="dropdown">
                            </button>
                            <div
                                class="dropdown-content bg-white dark:bg-gray-800  shadow w-24 absolute z-30 right-0 mr-6 hidden">
                                <div tabindex="0"
                                    class="focus:outline-none focus:text-indigo-600 text-xs w-full hover:bg-indigo-700 py-4 px-4 cursor-pointer hover:text-white">
                                    <p>Edit</p>
                                </div>
                                <div tabindex="0"
                                    class="focus:outline-none focus:text-indigo-600 text-xs w-full hover:bg-indigo-700 py-4 px-4 cursor-pointer hover:text-white">
                                    <p>Delete</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                        <tr tabindex="0"
                            class="focus:outline-none h-20 text-sm leading-none text-gray-800 dark:text-white  bg-white dark:bg-gray-800  hover:bg-gray-100 dark:hover:bg-gray-900  border-b border-t border-gray-100 dark:border-gray-700 ">
                            <td colspan="6" class="pl-4 cursor-pointer text-red-700 text-center">
                                No encontramos ninguna coincidencia con su búsqueda !
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
            <div class="px-6 py-4">
                {{ $courses->links() }}
            </div>
        </x-frontend.table-responsive>
    </div>
    <script>
        function dropdownFunction(element) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            let list = element.parentElement.parentElement.getElementsByClassName("dropdown-content")[0];
            list.classList.add("target");
            for (i = 0; i < dropdowns.length; i++) {
                if (!dropdowns[i].classList.contains("target")) {
                    dropdowns[i].classList.add("hidden");
                }
            }
            list.classList.toggle("hidden");
        }
    </script>

<div>
    <x-slot name="course">
        {{ $course->slug }}
    </x-slot>
    <h1 class="text-2xl font-bold mb-4">ESTUDIANTES DEL CURSO</h1>
    {{-- Nuestro componente --}}
    <x-frontend.table-responsive>
        {{-- <div class="flex justify-start items-center py-2 relative">
            <input wire:model='search'
                class="text-sm leading-none text-left text-gray-600 px-4 py-3 w-full border rounded border-gray-300 outline-none h-9"
                type="text" placeholder="Buscar estudiante" />
        </div> --}}
        <table class="w-full whitespace-nowrap table-auto">
            <thead>
                <tr tabindex="0"
                    class="focus:outline-none h-16 w-full text-sm leading-none text-gray-800 dark:text-white ">
                    <th class="font-normal text-left pl-4">Item</th>
                    <th class="font-normal text-left pl-12">Nombre del estudiante</th>
                    <th class="font-normal text-left pl-12">Correo</th>
                    <th class="font-normal text-left pl-16">Acciones</th>
                </tr>
            </thead>
            <tbody class="w-full">
                @forelse($students as $student)
                    <tr tabindex="0"
                        class="focus:outline-none h-20 text-sm leading-none text-gray-800 dark:text-white  bg-white dark:bg-gray-800  hover:bg-gray-100 dark:hover:bg-gray-900  border-b border-t border-gray-100 dark:border-gray-700 ">
                        <td>{{ $student->id }}</td>
                        <td class="pl-4 cursor-pointer">
                            <div class="flex items-center">
                                <div class="w-10 h-10">
                                    @isset($student->profile_photo_url)
                                        <img id="picture" src="{{ $student->profile_photo_url }}" alt=""
                                            class="h-10 w-10 rounded-full object-cover object-center">
                                    @else
                                        <img id="picture"
                                            src="https://images.pexels.com/photos/4498362/pexels-photo-4498362.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                            alt="" class="h-10 w-10 rounded-full object-cover object-center">
                                    @endisset
                                </div>
                                <div class="pl-4">
                                    <p class="font-medium">{{ $student->name }}</p>
                                    <p class="text-xs leading-3 text-gray-600 dark:text-gray-200  pt-2">
                                        {{ $student->created_at->format('d-m-Y') }}
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="pl-12">
                            <p class="text-sm font-medium leading-none text-gray-800 dark:text-white ">
                                {{ $student->email }}</p>
                        </td>
                        <td class="px-7 2xl:px-0 ">
                            <div class="">
                                <button onclick="dropdownFunction(this)"
                                    class="w-5 focus:ring-2 rounded-md focus:outline-none ml-7 " role="button"
                                    aria-label="options">
                                    <img class="w-5 flex items-stretch"
                                        src="https://tuk-cdn.s3.amazonaws.com/can-uploader/table_3-svg1.svg"
                                        alt="dropdown">
                                </button>
                            </div>
                            <div
                                class="dropdown-content bg-white dark:bg-gray-800  shadow w-24 absolute z-30 right-0 mr-6 hidden ">
                                <div tabindex="0"
                                    class="focus:outline-none focus:text-indigo-600 text-xs w-full hover:bg-indigo-700 py-4 px-4 cursor-pointer hover:text-white">
                                    <a href="#">Ver</a>
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
            {{ $students->links() }}
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

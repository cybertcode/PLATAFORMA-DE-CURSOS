<x-app-layout>
    {{-- Portada --}}
    <section class="bg-cover" style="background-image: url({{ asset('frontend/img/estudiante.jpg') }})">
        <div class="max-w-7xl mx-auto px-4 ms:px-6 lg:px-8 py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-white font-fold text-4xl">Lorem ipsum dolor sit amet.</h1>
                <p class="text-white text-lg mt-2 mb-10">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id,
                    maiores
                    enim
                    natus molestiae eveniet
                    tenetur.</p>
                <!-- component -->
                {{-- Incluimos el componente del buscador --}}
                @livewire('frontend.course.search')
            </div>
        </div>
    </section>
    <section class="mt-24">
        <h1 class="text-gray-600 text-center text-3xl mb-6">CONTENIDO</h1>
        <div
            class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-y-6 gap-x-8">
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('frontend/img/estudiante.jpg') }}"
                        alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Lorem ipsum dolor sit.</h1>
                </header>
                <p class="text-sm text-gray-500">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nemo deleniti
                    ducimus amet facere, cupiditate voluptates!</p>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('frontend/img/estudiante.jpg') }}"
                        alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Lorem, ipsum dolor.</h1>
                </header>
                <p class="text-sm text-gray-500">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nemo deleniti
                    ducimus amet facere, cupiditate voluptates!</p>

            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('frontend/img/estudiante.jpg') }}"
                        alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Lorem, ipsum.</h1>
                </header>
                <p class="text-sm text-gray-500">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nemo deleniti
                    ducimus amet facere, cupiditate voluptates!</p>

            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('frontend/img/estudiante.jpg') }}"
                        alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Lorem ipsum dolor sit amet.</h1>
                </header>
                <p class="text-sm text-gray-500">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nemo deleniti
                    ducimus amet facere, cupiditate voluptates!</p>

            </article>
        </div>
    </section>
    <section class="mt-24 bg-gray-700 py-12">
        <h1 class="text-center text-white text-3xl">Lorem ipsum dolor sit amet.</h1>
        <p class="text-center text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores rem hic vero,
            numquam nulla veniam?</p>
        <div class="flex justify-center mt-4">
            <a href="{{ route('courses.index') }}"
                class="min-w-auto w-32 h-10 text-center bg-blue-300 p-2 rounded-b-xl hover:bg-blue-500 text-white font-semibold transition-transform hover:translate-y-2 ease-in-out">
                Catálogo
            </a>
        </div>
    </section>
    <section class="my-24">
        <h1 class="text-center text-3xl text-gray-600">ÚLTIMOS CURSOS</h1>
        <p class="text-center text-gray-500 text-sm mb-6">Lorem ipsum dolor sit amet consectetur.</p>
        <div
            class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-y-6 gap-x-8">
            @foreach ($courses as $course)
                <x-frontend.course-card :course="$course" />
            @endforeach
        </div>
    </section>
</x-app-layout>

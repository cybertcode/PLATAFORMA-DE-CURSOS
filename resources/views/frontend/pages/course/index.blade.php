<x-app-layout>
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
    {{-- /************************************
     * INCLUIMOS EL COMPONENTE LIVEWIRE *
     ************************************/ --}}
    @livewire('frontend.course.course-index');
</x-app-layout>

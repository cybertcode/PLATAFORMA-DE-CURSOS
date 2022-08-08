<x-app-layout>
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 py-12">
        <h1 class="text-gray-500 text-3xl font-bold">Detalle del curso</h1>
        @if (session('error'))
            <p class="text-red-500 font-bold">{{ session('error') }}</p>
        @elseif(session('success'))
            <p class="text-blue-500 font-bold">{{ session('success') }}</p>
        @endif
        <div class="card text-gray-600">
            <div class="card-body">
                <article class="flex items-center">
                    <img src="{{ Storage::url($course->image->url) }}" alt=""
                        class="h-12 w-12 object-cover object-center">
                    <h1 class="text-lg ml-2">{{ $course->title }}</h1>
                    <p class="text-xl font-bold ml-auto">S/. {{ $course->price->value }}</p>
                </article>
                <div class="flex justify-end my-4">
                    <a href="{{ route('payment.pay', $course) }}" class="btn btn-primary p-2">Comprar este curso</a>
                </div>
                <hr>
                <p class="text-sm mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia quod inventore
                    info illo
                    accusantium voluptates! <a class="text-red-500 font-bold" href="#">términos y condiciones</a>
                </p>
            </div>
        </div>


    </div>
</x-app-layout>

<x-app-layout>
    <div class="container py-8 grid grid-cols-5">
        <aside>
            <h1 class="font-bold text-lg mb-4">Edición del curso</h1>
            <ul>
                <li class="leading-7 mb-1 border-l-4 border-indigo-400 pl-2"><a href="">Información del curso</a>
                </li>
                <li class="leading-7 mb-1 border-l-4 border-transparent pl-2"><a href="">Lecciones del curso</a>
                </li>
                <li class="leading-7 mb-1 border-l-4 border-transparent pl-2"><a href="">Metas del curso</a></li>
                <li class="leading-7 mb-1 border-l-4 border-transparent pl-2"><a href="">Estudiantes</a></li>
            </ul>
        </aside>
        <div class="col-span-4 card">
            <div class="card-body text-gray-600">
                <h1 class="text-2xl font-bold">INFORMACIÓN DEL CURSO</h1>
                <hr class="mt-2 mb-6">
                {!! Form::model($course, [
                    'route' => ['instructor.courses.update', $course],
                    'method' => 'PUT',
                    'class' => '',
                    'files' => true,
                ]) !!}
                @include('frontend.pages.instructor.course.partials.form')
                <div class="flex justify-end">
                    {!! Form::submit('Actualizar curso', [
                        'class' =>
                            'px-4 py-2 text-sm text-white duration-150 bg-indigo-600 rounded-md hover:bg-indigo-700 active:shadow-lg cursor-pointer',
                    ]) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <x-slot name="js">
        {{-- ckeditor cdn --}}
        <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
        <script src="{{ asset('frontend/js/instructor/course/form.js') }}"></script>
    </x-slot>
</x-app-layout>

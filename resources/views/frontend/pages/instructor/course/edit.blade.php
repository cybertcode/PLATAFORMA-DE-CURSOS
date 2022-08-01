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
                    'class' => 'form-horizontal',
                ]) !!}
                <div class="mb-4">
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        {!! Form::label('title', 'Título') !!}
                        {!! Form::text('title', null, [
                            'class' =>
                                'w-full py-2 pl-12 pr-4 text-gray-500 border rounded-md outline-none bg-gray-50 focus:bg-white focus:border-indigo-600',
                            'required' => 'required',
                        ]) !!}
                        <small class="text-danger">{{ $errors->first('title') }}</small>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                        {!! Form::label('slug', 'Slug') !!}
                        {!! Form::text('slug', null, [
                            'class' =>
                                'w-full py-2 pl-12 pr-4 text-gray-500 border rounded-md outline-none bg-gray-50 focus:bg-white focus:border-indigo-600',
                            'required' => 'required',
                        ]) !!}
                        <small class="text-danger">{{ $errors->first('slug') }}</small>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="form-group{{ $errors->has('subtitle') ? ' has-error' : '' }}">
                        {!! Form::label('subtitle', 'Sub título') !!}
                        {!! Form::text('subtitle', null, [
                            'class' =>
                                'w-full py-2 pl-12 pr-4 text-gray-500 border rounded-md outline-none bg-gray-50 focus:bg-white focus:border-indigo-600',
                            'required' => 'required',
                        ]) !!}
                        <small class="text-danger">{{ $errors->first('subtitle') }}</small>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        {!! Form::label('description', 'Descripción') !!}
                        {!! Form::textarea('description', null, [
                            'class' =>
                                'w-full py-2 pl-12 pr-4 text-gray-500 border rounded-md outline-none bg-gray-50 focus:bg-white focus:border-indigo-600',
                            'required' => 'required',
                        ]) !!}
                        <small class="text-danger">{{ $errors->first('description') }}</small>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-4">
                    <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                        {!! Form::label('category_id', 'Categoría') !!}
                        {!! Form::select('category_id', $categories, null, [
                            'id' => 'category_id',
                            'class' =>
                                'w-full p-2 text-gray-500 bg-white border rounded-md shadow-sm outline-none appearance-none focus:border-indigo-600',
                            'required' => 'required',
                        ]) !!}
                        <small class="text-danger">{{ $errors->first('category_id') }}</small>
                    </div>
                    <div class="form-group{{ $errors->has('level_id') ? ' has-error' : '' }}">
                        {!! Form::label('level_id', 'Nivel') !!}
                        {!! Form::select('level_id', $levels, null, [
                            'id' => 'level_id',
                            'class' =>
                                'w-full p-2 text-gray-500 bg-white border rounded-md shadow-sm outline-none appearance-none focus:border-indigo-600',
                            'required' => 'required',
                        ]) !!}
                        <small class="text-danger">{{ $errors->first('level_id') }}</small>
                    </div>
                    <div class="form-group{{ $errors->has('price_id') ? ' has-error' : '' }}">
                        {!! Form::label('price_id', 'Nivel') !!}
                        {!! Form::select('price_id', $prices, null, [
                            'id' => 'price_id',
                            'class' =>
                                'w-full p-2 text-gray-500 bg-white border rounded-md shadow-sm outline-none appearance-none focus:border-indigo-600',
                            'required' => 'required',
                        ]) !!}
                        <small class="text-danger">{{ $errors->first('price_id') }}</small>
                    </div>
                </div>
                <h1 class="text-2xl font-bold mt-8 mb-2">Imagen</h1>
                <div class="grid grid-cols-2 gap-4">
                    <figure>
                        <img src="{{ Storage::url($course->image->url) }}" alt=""
                            class="w-full h-64 bg-cover bg-center">
                    </figure>
                    <div>
                        <p class="mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim dolores
                            doloremque
                            molestias explicabo neque illo inventore at quasi delectus mollitia.</p>
                        <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                            {!! Form::label('file', 'Subir Imagen') !!}
                            {!! Form::file('file', ['class' => 'form-input w-full']) !!}
                            <p class="help-block">solo imagen jpeg</p>
                            <small class="text-danger">{{ $errors->first('file') }}</small>
                        </div>
                    </div>
                </div>
                <div class="btn-group pull-right">
                    {!! Form::reset('Reset', ['class' => 'btn btn-warning']) !!}
                    {!! Form::submit('Add', ['class' => 'btn btn-Add']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <x-slot name="js">
        {{-- ckeditor cdn --}}
        <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
        <script>
            document.getElementById("title").addEventListener('keyup', slugChange);

            function slugChange() {
                title = document.getElementById("title").value;
                document.getElementById('slug').value = slug(title);
            }
            // del profe del curso
            // function slug(str) {
            // var $slug = '';
            // var trimmed = str.trim(str);
            // $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
            // replace(/-+/g, '-').
            // replace(/^-|-$/g, '');
            // return $slug.toLowerCase();
            // }
            function slug(str) {
                var $slug = '';
                var trimmed = str.trim(str);
                $slug = trimmed.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ')
                    .toLowerCase()
                    .replace(/^\s+|\s+$/gm, '')
                    .replace(/\s+/g, '-');
                return $slug.toLowerCase();
            }

            /**********************
             * Activamos ckeditor *
             **********************/
            ClassicEditor
                .create(document.querySelector('#description'), {
                    toolbar: ['heading', '|', 'bold', 'italic', 'link', 'blockQuote'],
                    heading: {
                        options: [{
                                model: 'paragraph',
                                title: 'Paragraph',
                                class: 'ck-heading_paragraph'
                            },
                            {
                                model: 'heading1',
                                view: 'h1',
                                title: 'Heading 1',
                                class: 'ck-heading_heading1'
                            },
                            {
                                model: 'heading2',
                                view: 'h2',
                                title: 'Heading 2',
                                class: 'ck-heading_heading2'
                            }
                        ]
                    }
                })
                .catch(error => {
                    console.log(error);
                });
        </script>
    </x-slot>
</x-app-layout>

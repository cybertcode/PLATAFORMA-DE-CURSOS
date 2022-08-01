<div class="mb-4">
    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
        {!! Form::label('title', 'Título') !!}
        {!! Form::text('title', null, [
            'class' =>
                'w-full py-2 pl-12 pr-4 text-gray-500 border rounded-md outline-none bg-gray-50 focus:bg-white focus:border-indigo-600' .
                ($errors->has('title') ? ' border border-red-500' : ''),
        ]) !!}
        <strong class="text-red-600 text-xs">{{ $errors->first('title') }}</strong>
    </div>
</div>
<div class="mb-4">
    <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
        {!! Form::label('slug', 'Slug') !!}
        {!! Form::text('slug', null, [
            'class' =>
                'w-full py-2 pl-12 pr-4 text-gray-500 border rounded-md outline-none bg-gray-50 focus:bg-white focus:border-indigo-600' .
                ($errors->has('slug') ? ' border border-red-500' : ''),
            'readonly' => '',
        ]) !!}
        <strong class="text-red-600 text-xs">{{ $errors->first('slug') }}</strong>
    </div>
</div>
<div class="mb-4">
    <div class="form-group{{ $errors->has('subtitle') ? ' has-error' : '' }}">
        {!! Form::label('subtitle', 'Sub título') !!}
        {!! Form::text('subtitle', null, [
            'class' =>
                'w-full py-2 pl-12 pr-4 text-gray-500 border rounded-md outline-none bg-gray-50 focus:bg-white focus:border-indigo-600' .
                ($errors->has('subtitle') ? ' border border-red-500' : ''),
        ]) !!}
        <strong class="text-red-600 text-xs">{{ $errors->first('subtitle') }}</strong>
    </div>
</div>
<div class="mb-4">
    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
        {!! Form::label('description', 'Descripción') !!}
        {!! Form::textarea('description', null, [
            'class' =>
                'w-full py-2 pl-12 pr-4 text-gray-500 border rounded-md outline-none bg-gray-50 focus:bg-white focus:border-indigo-600' .
                ($errors->has('description') ? ' border border-red-500' : ''),
        ]) !!}
        <strong class="text-red-600 text-xs">{{ $errors->first('description') }}</strong>
    </div>
</div>
<div class="grid grid-cols-3 gap-4">
    <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
        {!! Form::label('category_id', 'Categoría') !!}
        {!! Form::select('category_id', $categories, null, [
            'id' => 'category_id',
            'class' =>
                'w-full p-2 text-gray-500 bg-white border rounded-md shadow-sm outline-none appearance-none focus:border-indigo-600' .
                ($errors->has('category_id') ? ' border border-red-500' : ''),
        ]) !!}
        <strong class="text-red-600 text-xs">{{ $errors->first('category_id') }}</strong>
    </div>
    <div class="form-group{{ $errors->has('level_id') ? ' has-error' : '' }}">
        {!! Form::label('level_id', 'Nivel') !!}
        {!! Form::select('level_id', $levels, null, [
            'id' => 'level_id',
            'class' =>
                'w-full p-2 text-gray-500 bg-white border rounded-md shadow-sm outline-none appearance-none focus:border-indigo-600' .
                ($errors->has('level_id') ? ' border border-red-500' : ''),
            'required' => 'required',
        ]) !!}
        <strong class="text-red-600 text-xs">{{ $errors->first('level_id') }}</strong>
    </div>
    <div class="form-group{{ $errors->has('price_id') ? ' has-error' : '' }}">
        {!! Form::label('price_id', 'Nivel') !!}
        {!! Form::select('price_id', $prices, null, [
            'id' => 'price_id',
            'class' =>
                'w-full p-2 text-gray-500 bg-white border rounded-md shadow-sm outline-none appearance-none focus:border-indigo-600' .
                ($errors->has('price_id') ? ' border border-red-500' : ''),
            'required' => 'required',
        ]) !!}
        <strong class="text-red-600 text-xs">{{ $errors->first('price_id') }}</strong>
    </div>
</div>
<h1 class="text-2xl font-bold mt-8 mb-2">Imagen</h1>
<div class="grid grid-cols-2 gap-4">
    <figure>
        @isset($course->image)
            <img id="picture" src="{{ Storage::url($course->image->url) }}" alt=""
                class="w-full h-64 object-cover object-center">
        @else
            <img id="picture"
                src="https://images.pexels.com/photos/4498362/pexels-photo-4498362.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                alt="" class="w-full h-64 object-cover object-center">
        @endisset
    </figure>
    <div>
        <p class="mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim dolores
            doloremque
            molestias explicabo neque illo inventore at quasi delectus mollitia.</p>
        <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
            {!! Form::label('file', 'Subir Imagen') !!}
            {!! Form::file('file', [
                'class' => 'form-input w-full' . ($errors->has('file') ? ' border border-red-500' : ''),
            ]) !!}
            <p class="help-block">solo imagen jpeg</p>
            <strong class="text-red-600 text-xs">{{ $errors->first('file') }}</strong>
        </div>
    </div>
</div>

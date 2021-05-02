<div class="mb-4">

    {!! Form::label('title','Título del curso', ['class' => 'block text-sm font-medium text-gray-700']) !!}
    {!! Form::text('title', null, ['class' => 'mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md' . ($errors->has('title') ? ' border-red-600' : '')]) !!}
    @error('title')
        <strong class="text-xs text-red-600">{{ $message }}</strong>
    @enderror

</div>

<div class="mb-4">
    
    {!! Form::label('slug','Slug del curso', ['class' => 'block text-sm font-medium text-gray-700']) !!}
    {!! Form::text('slug', null, ['readonly' => 'readonly', 'class' => 'mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md' . ($errors->has('slug') ? ' border-red-600' : '')]) !!}

    @error('slug')
        <strong class="text-xs text-red-600">{{ $message }}</strong>
    @enderror
</div>

<div class="mb-4">

    {!! Form::label('subtitle','Subtítulo del curso', ['class' => 'block text-sm font-medium text-gray-700']) !!}
    {!! Form::text('subtitle', null, ['class' => 'mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md' . ($errors->has('subtitle') ? ' border-red-600' : '')]) !!}

    @error('subtitle')
        <strong class="text-xs text-red-600">{{ $message }}</strong>
    @enderror
</div>

<div class="mb-4">

    {!! Form::label('description','Descripción', ['class' => 'block text-sm font-medium text-gray-700']) !!}
    {!! Form::textarea('description', null, ['class' => 'shadow-sm focus:ring-blue-500 focus:border-blue-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md' . ($errors->has('description') ? ' border-red-600' : '')]) !!}

    @error('description')
        <strong class="text-xs text-red-600">{{ $message }}</strong>
    @enderror
</div>

<div class="grid grid-cols-6 gap-6">

    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
        {!! Form::label('category_id', 'Categoría', ['class' => 'block text-sm font-medium text-gray-700']) !!}
        {!! Form::select('category_id', $categories, null, ['class' => 'mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md']) !!}
    </div>

    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
        {!! Form::label('level_id', 'Nivel', 'Categoría', ['class' => 'block text-sm font-medium text-gray-700']) !!}
        {!! Form::select('level_id', $levels, null, ['class' => 'mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md']) !!}
    </div>

    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
        {!! Form::label('price_id', 'Precio', 'Categoría', ['class' => 'block text-sm font-medium text-gray-700']) !!}
        {!! Form::select('price_id', $prices, null, ['class' => 'mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md']) !!}
    </div>

</div>

<h1 class="text-2xl font-bold mt-8 mb-2">Portada del curso</h1>

<div class="grid grid-cols-2 gap-4">

    <figure>
        @isset($course->image)
            <img id="picture" class="w-full h-64 object-cover object-center" src="{{ Storage::url($course->image->url) }}" alt="">  
        @else
            <img id="picture" class="w-full h-64 object-cover object-center" src="https://images.pexels.com/photos/5905710/pexels-photo-5905710.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt=""> 
        @endisset
    </figure>

    <div>
        <p class="mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione amet id non voluptates aspernatur minima nobis. Earum minus labore nemo maxime tenetur consectetur aut, at reiciendis vel, incidunt eum exercitationem?</p>
        {!! Form::file('file', ['class' => 'form-input w-full' . ($errors->has('file') ? ' border-red-600' : ''), 'id' => 'file', 'accept'=> 'image/*']) !!}

    @error('file')
        <strong class="text-xs text-red-600">{{ $message }}</strong>
    @enderror

    </div>

</div>
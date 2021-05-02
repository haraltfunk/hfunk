@props(['course']) 

<article class="bg-white shadow-lg rounded overflow-hidden">
    <img class="h-36 w-full object-cover" src="{{ Storage::url($course->image->url) }}" alt="{{ $course->title }}">

    <div class="px-6 py-4">
        <h1 class="text-xl text-gray-700 mb-2 leading-6">{{ Str::limit($course->title, 40) }}</h1>
        <p class="text-gray-500 text-sm mb-2 mt-auto">Prof: {{ $course->teacher->name }}</p>

        <div class="flex">

            <ul>
                <li class="fas fa-star text-{{ $course->rating >= 0.5 ? 'yellow' : 'gray' }}-400"></li>
                <li class="fas fa-star text-{{ $course->rating >= 1.5 ? 'yellow' : 'gray' }}-400"></li>
                <li class="fas fa-star text-{{ $course->rating >= 2.5 ? 'yellow' : 'gray' }}-400"></li>
                <li class="fas fa-star text-{{ $course->rating >= 3.5 ? 'yellow' : 'gray' }}-400"></li>
                <li class="fas fa-star text-{{ $course->rating >= 4.5 ? 'yellow' : 'gray' }}-400"></li>
            </ul>

            <p class="text-sm text-gray-500 ml-auto mb-2">
                <i class="fas fa-users"></i>
                ({{ $course->students_count }})
            </p>

        </div>

        <a href="{{ route('courses.show', $course) }}" class="block w-full text-center px-4 py-2 border border-transparent rounded-md shadow-sm text-md font-bold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            Más información
        </a>

    </div>

</article>
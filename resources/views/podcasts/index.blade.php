<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-50">
                    <ul class="grid gap-4 grid-cols-1 lg:grid-cols-3 md:grid-cols-2 ">
                        @foreach($podcasts as $podcast)
                            <li class=" bg-white border-x-indigo-700 dark:bg-gray-800">
                                <h3 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"> {{$podcast->title}}</h3>
                                <div class="mb-lg-2 bg-gray-900 sm:rounded-lg p-2">
                                    <span class="dark:text-indigo-500 font-bold"> Summary: </span><p class="font-sans text-gray-50">  {{$podcast->description}}</p>
                                    <span class="dark:text-indigo-500 font-bold mt-2">Author:</span> <p class="font-sans text-gray-50">{{ $podcast->user->name }}</p>
                                </div>
                                @if($podcast->audio)
                                    <audio class="my-6 pr-12" controls>
                                        <source src="{{ 'storage/'  .$podcast->audio }}" type="{{ Storage ::mimeType($podcast->audio) }}">
                                    </audio>
                                @endif
                                @if($podcast->image)
                                    <img class="h-64 object-center object-cover w-full mb-4" src="{{ 'storage/' .$podcast->image}}" >
                                @endif
                            </li>

                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

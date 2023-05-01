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
                    <x-cards.podcast-public-card :podcasts="$podcasts"/>
                     <!-- There's no need to pass any data to this component because the controllers does it directly inside the index() method
                     !Correction: actually, there's a hole in this approach, so, we should the data from podcasts inside the component tag -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

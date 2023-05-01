<ul class="grid gap-6 grid-cols-1 lg:grid-cols-3 md:grid-cols-2 ">
    @foreach($podcasts as $podcast)
        <li class=" bg-white border-x-indigo-700 dark:bg-gray-800">
            <h3 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"> {{$podcast->title}}</h3>
            <div class="mb-lg-2 bg-gray-900 sm:rounded-lg p-5">
                <div class="bg-origin-content bg-cover border-6 border-gray-900 mb-6 h-64 sm:rounded-lg relative"

                     @if($podcast->image) style="background-image: url( {{ 'storage/'.$podcast->image }} )"
                     @else style="background-image: url( {{ 'storage/images/placeholder.jpg' }} )"
                    @endif>

                    <audio class="absolute bottom-5 left-6 mb-2 p-2" controls>
                        @if($podcast->audio) <source src="{{ 'storage/'  .$podcast->audio }}" type="{{ Storage ::mimeType($podcast->audio) }}">
                        @else <source src="{{ 'storage/audios/CJ-from-GTA-SA-Aw-Shit-Here-go-again.mp3' }}" type="audio/mp3">
                    </audio>
                    @endif

                </div>
                <span class="dark:text-indigo-500 font-bold "> Summary </span><p class="font-sans text-gray-50 mt-2 mb-8">  {{$podcast->description}}</p>
                <div class="flex flex-col items-end mr-2"><span class="dark:text-indigo-500 font-bold ">Author</span> <p class="flex font-sans text-gray-50">{{ $podcast->user->name }}</p></div>
            </div>
        </li>
    @endforeach
</ul>

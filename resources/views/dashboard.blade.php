<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Artists') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   @foreach ($artists as $artist)
                   <div class="row">
                        <div class="col-8">
                            {{ $artist['name'] }}
                        </div>
                        <div class="col-4">
                            <span class="artist">
                                <a href="{{ url('album').'/'.$artist['id'] }}" >
                                    See Albums</a>
                            </span>
                        </div>
                   </div>
                   @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

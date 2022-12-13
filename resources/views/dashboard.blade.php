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
                    <form class="form-horizontal" id="artist" method="post" action="{{ route('get.album')}}">
                   {{ $artist['name'] }}@csrf
                   <input type="hidden" name="id" value="{{ $artist['id'] }}">
                   <span class="artist"><input type="submit"
                    class="btn btn-sm border-t-neutral-50" value="See albums"></span>
                    </form>
                   </div>
                   @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $albums[0]->artist }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                   <div class="row">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                        <span class="text-danger">{{ $error }}</span>
                    @endforeach
                    @endif
                     <table class="table table-striped">
                        <thead>
                            <th>Album Name</th>
                            <th>Year</th>
                            <th>Actions</th>
                        </thead>
                    @foreach ($albums as $album)
                        <form class="form-horizontal" method="post" id="artist" action="{{ route('update.album')}}">
                       @csrf
                       @method('PUT')
                            <tr>
                                <td><input type="text" class="form-control" name="album_name"
                                value="{{ $album->album_name }}"></td>
                                <td><input type="text" class="form-control" name="year"
                                    value="{{ $album->year }}"></td>
                                <td><input type="hidden" name="id" value="{{ $album->id }}">
                                    <span class="artist">
                                    <input type="submit" class="btn btn-warning" value="Update">
                        </form>
                        <form class="form-horizontal" method="post" id="delete" action="{{ route('delete.album')}}">
                            @method('delete')@csrf
                            <input type="hidden" name="id" value="{{ $album->id }}">
                                    <input type="submit" class="btn btn-danger" value="Delete ">
                        </span>
                        </form>
                                </td>
                            </tr>

                    @endforeach
                     </table>
                   </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $header }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if ( session ('status'))
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-5">
                <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-gray-800 dark:text-green-400" role="alert">
                    <span class="font-medium"> Success!</span> {{ session ('status') }}
                </div>
            </div>
        @endif

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                <h2 class="float-left">{{ $header }}</h2>


                <a href="{{ url('announcement/add') }}">
                    <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" type="button" class="float-right rounded-full bg-sky-400 p-1 hover:bg-orange-700" >
                        Add Announcement
                    </button>
                </a>

                    <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <!-- <th>Sub_Header</th> -->
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($announcements as $announcement)
                                    <tr>
                                        <td class="text-center">{{ $announcement->header }}</td>
                                        <!-- <td class="text-center">{{ $announcement->sub_header }}</td> -->
                                        <td class="text-center">{{ $announcement->description }}</td>
                                        <td class="text-center"><img src="/images/{{ $announcement->image }}" width="100px"></td>
                                        <td class="text-center">
                                            <a href="{{ url('announcement/update/' . $announcement->id) }}">
                                                <button class="rounded-full bg-orange-400 p-1 hover:bg-green-700" >Update
                                                </button>
                                            </a>

                                            <a href="{{ url('announcement/delete/' . $announcement->id) }}">
                                                <button class="rounded-full bg-red-600 p-1 hover:bg-green-700" >Delete
                                                </button>
                                            </a>
                                        </td>
                                        </td>
                                    </tr>
                                <tr>
                                @endforeach
                                
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
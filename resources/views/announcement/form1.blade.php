<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $header }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form method="POST" action="{{ (url()->current() == url ('/announcement/add') ) ? url('/announcement/add'):url('/announcement/update/' . $announcement->id) }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Header -->
                        <div>
                            <x-input-label for="header" :value="__('Title')" />
                            <x-text-input id="header" class="block mt-1 w-full" type="text" name="header" placeholder="Header" required  />
                        </div>

                        <!-- Sub Header -->
                        <!-- <div class="mt-4">
                            <x-input-label for="sub_header" :value="__('Sub_Header')" />
                            <x-text-input id="sub_header" class="block mt-1 w-full" type="text" name="sub_header" placeholder="Sub Header" required  />
                        </div> -->

                        <!-- Description -->
                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Description')" />
                            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description"  placeholder="Description" required />
                            <!-- style="height:150px" -->
                        </div>

                        <!-- Images -->
                        <div class="mt-4">
                            <x-input-label for="image" :value="__('Image')" />
                            <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" placeholder="image" required />
                        </div>


                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Add Announcement') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
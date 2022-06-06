<form method="POST" action="{{ route('manufacturer.store') }}" id="form_create"
        class="mt-1 mb-2 flex items-center text-center">
        @csrf
        <label for="title" class="w-1/5 mx-2 block text-base font-bold text-gray-700">manufacturer title</label>

        <input type="text" name="title" id="title" autocomplete="given-name"  value="@if(isset($manufacturer)){{$manufacturer->title}}@endif"
            class="mx-2 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

        <label for="link" class="w-1/5 mx-2 block text-base font-bold text-gray-700">manufacturer link</label>

        <input type="text" name="link" id="link" autocomplete="given-name" value="@if(isset($manufacturer)){{$manufacturer->link}}@endif"
            class="mx-2 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        <x-button form="form_create" class="bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 w-1/4">
            Add
        </x-button>
    </form>

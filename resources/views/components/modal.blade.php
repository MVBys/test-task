<div class="modal flex justify-center items-center z-50S fixed top-0 left-0 w-full h-full bg-slate-200 ">
    <div class="max-w-lg ">

            <div class="  bg-white shadow-xl rounded-xl">
                <div id='modal_contant' class="p-6">


                    {{$slot}}

                    <div class="flex gap-2 mt-0 lg:mt-6 max-w-7xl">
                        <div class="mt-3 rounded-lg sm:mt-0 sm:ml-3">
                            <button
                                class="items-center block px-4 py-2 text-base font-medium text-center text-white transition duration-500 ease-in-out transform bg-blue-600 rounded-xl hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>

    </div>
</div>

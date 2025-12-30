@if (session('success'))
    <div id="popup-modal"
        class="flex overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-black/50 bg-opacity-50">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white border border-gray-200 rounded-lg shadow-lg p-4 md:p-6">
                <button type="button" onclick="document.getElementById('popup-modal').style.display='none';"
                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-9 h-9 ms-auto inline-flex justify-center items-center"
                    data-modal-hide="popup-modal">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18 17.94 6M18 18 6.06 6" />
                    </svg>
                    <span class="sr-only">Tutup modal</span>
                </button>
                <div class="p-4 md:p-5 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="mx-auto mb-4 text-green-500 w-12 h-12">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>

                    <h3 id="modal-title" class="mb-6 text-lg font-semibold text-gray-900">{{ session('success') }}</h3>
                    <div class="flex items-center space-x-4 justify-center">
                        <button data-modal-hide="popup-modal" type="button"
                            onclick="document.getElementById('popup-modal').style.display='none';"
                            class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-red-300 shadow-sm font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none transition duration-200">
                            Oke
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
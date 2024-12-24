<div id="popup-modal-overlay" class="hidden fixed inset-0 bg-black bg-opacity-50 z-40"></div>
<div id="top-left-modal" data-modal-placement="top-left" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 items-center justify-center lg:pl-[250px] xl:justify-center w-full h-full">
    <div class="relative w-full max-w-2xl mx-4 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
        <div class="flex items-center justify-between px-4 py-3 bg-[#28666e] text-white rounded-t-lg">
            <h3 class="text-lg font-semibold">
                {{ __('messages.Passenger Feedbacks') }}
            </h3>
            <button type="button" class="text-white hover:text-gray-200 bg-transparent rounded p-1 focus:outline-none" data-modal-hide="top-left-modal">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
        </div>
        <div class="p-5 space-y-4 bg-gray-50 dark:bg-gray-900 rounded-b-lg">
            @forelse($feedbacks as $feedback)
                <div class="feedback-item flex justify-start  p-4 bg-white dark:bg-gray-700 rounded-lg shadow">
                    @if ($feedback->reviewer->image)
                        <img src="{{ asset('storage/' . $feedback->reviewer->image) }}"
                            alt="Passenger Image"
                            class="w-8 h-8 md:w-12 md:h-12 m-2 mr-4 rounded-full shadow-lg ">
                    @else
                        <img src="{{ asset('https://ui-avatars.com/api/?name=' . $feedback->reviewer->name . '+' . $feedback->reviewer->lastname) }}"
                            alt="Default Image"
                            class="w-8 h-8 md:w-12 md:h-12 m-2 mr-4 rounded-full shadow-lg">
                    @endif
                    <div class="text-left">
                        <div>
                            <p class="font-semibold text-gray-800 dark:text-green-300">
                                {{ $feedback->reviewer->name }} {{ $feedback->reviewer->lastname }}
                            </p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                {{ $feedback->created_at->format('F j, Y, g:i a') }}
                            </p>
                        </div>
                        <p class="mt-2 text-sm text-gray-700 dark:text-gray-300">
                            {{ $feedback->feedback }}
                        </p>
                    </div>
                </div>
            @empty
                <div class="text-center p-5 bg-gray-100 dark:bg-gray-700 rounded-lg">
                    <p class="text-base font-medium text-gray-500 dark:text-gray-300">
                        You have no feedback available.
                    </p>
                </div>
            @endforelse
        </div>
    </div>
</div>
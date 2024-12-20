<x-app-layout>
    <div class="min-h-screen bg-animation flex items-center justify-center py-12 px-6 sm:px-12">
        <div class="max-w-4xl w-full bg-white rounded-xl shadow-lg">
            <!-- Header Section -->
            <div class="bg-[#c9dde2] p-4 sm:p-6 text-center text-customgreen-500 rounded-lg ">

                <div class="flex items-center justify-center mb-3">
                    <!-- Verified Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-customgreen-500 rounded-full p-1 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm-1.293 14.293l-4-4 1.414-1.414L11 12.586l4.293-4.293 1.414 1.414-5 5a1 1 0 01-1.414 0z"></path>
                    </svg>
                
                   
                    <h1 class="text-xl sm:text-2xl font-bold text-customgreen-500">{{ __('messages.Verify Your Identity') }}</h1>
                </div>
                <p>{{ __('messages.Upload a clear photo of yourself holding your ID or passport. Your information will remain secure and private.') }}</p>
            </div>
            
            
            <form id="uploadForm" 
                  action="{{ route('profile.upload-id-document') }}" 
                  method="POST" 
                  enctype="multipart/form-data"
                  class="bg-white p-6 sm:p-6 rounded-lg   mx-auto ">
                @csrf

              
                <div class="min-h-[10vh] sm:min-h-[20vh] flex justify-center items-center  bg-[#c9dde2] border rounded-lg border-customgreen-400 ">
                    <div class="text-center">
                        <div id="camera" class="mb-4 mt-4 border rounded-lg shadow-md mx-auto"></div>
                        <div id="captured-image-container" class="hidden">
                            <img id="captured-image" class="mx-auto rounded-lg border mb-2" alt="Captured Image" />
                            <button type="button" id="retake" 
                                    class="text-white bg-gradient-to-r from-red-400 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 mb-2">
                                    {{ __('messages.Retake Image') }}
                            </button>
                        </div>
                        <button type="button" id="capture" 
                                class="text-white bg-gradient-to-r from-customgreen-400 via-customgreen-500 to-customgreen-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                {{ __('messages.Take a Picture') }}
                        </button>
                        <input type="hidden" id="image_data" name="image_data">
                    </div>
                </div>

                
                <div class="flex justify-center mt-4">
                    <button type="submit" class="relative inline-flex items-center justify-center p-0.5 mb-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-gray-900 to-gray-900 hover:text-white focus:ring-4 focus:outline-none">
                        <span class="relative px-5 py-2.5 bg-white rounded-md group-hover:bg-opacity-0">
                            {{ __('messages.Upload Image') }}
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <div class="bg-gradient-to-r from-blue-600 to-blue-400 flex items-center justify-center min-h-screen p-4">
        <div class="max-w-md w-full bg-white rounded-lg shadow-md p-6 text-center">

            <div class="text-green-500 mb-4">

                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-person-check mx-auto" viewBox="0 0 16 16">
                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                    <path d="M8.256 14a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z"/>
                </svg>
            </div>


            <h1 class="text-2xl font-bold-serif">You've been verified</h1>


            <p class="text-gray-500 mt-2 font-serif">Your profile has been successfully verified. Thank you for completing the verification process.</p>


            <a href="{{ route('profile.index') }}" class="inline-block mt-4 px-6 py-2 bg-green-500 text-white font-serif rounded-lg hover:bg-green-600 transition duration-200">
                Back to Profile
            </a>
        </div>
    </div>
</x-app-layout>

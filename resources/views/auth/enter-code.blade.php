<x-app-layout>
    <div class="absolute inset-0 bg-gradient-to-b from-blue-800 via-green-900 to-blue-900 flex items-center justify-center px-4 overflow-hidden">
        <div class="max-w-md w-full bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-700 text-center">Verify Your Email</h2>
            <p class="text-gray-600 text-center mt-2">We’ve sent a verification link to your email address.</p>

            <form method="POST" action="{{ route('enter.code') }}" class="mt-6">
                @csrf
                <!-- Button to redirect to Mailtrap Inbox -->
                <a href="https://mail.google.com/mail" class="w-full mt-4 bg-blue-600 text-white p-2 rounded-lg text-center inline-block">
                    Go to Mail to verify your email
                </a>
            </form>
        </div>
    </div>
</x-app-layout>
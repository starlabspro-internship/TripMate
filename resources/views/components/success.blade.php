<div x-data="{
        showSuccess: '{{ session('success') ? 'true' : 'false' }}' === 'true',
        successMessage: '{{ session('success') }}',
        successDescription: '{{session('description')}}',
        showError: '{{ session('error') ? 'true' : 'false' }}' === 'true',
        errorMessage: '{{ session('error') }}',
        errorDescription: '{{session('description')}}',
        hideTimeout: null
    }"
     x-init="
        if (showSuccess) { hideTimeout = setTimeout(() => showSuccess = false, 3000); }
        if (showError) { hideTimeout = setTimeout(() => showError = false, 3000); }
     "
     @mouseenter="clearTimeout(hideTimeout)"
     @mouseleave="hideTimeout = setTimeout(() => { showSuccess = false; showError = false; }, 3000)"
     class="fixed bottom-11 right-6 z-50"
>
    <div x-show="showSuccess" x-transition.opacity.duration.500ms class="flex items-center gap-2 fixed bottom-5 right-5 bg-gradient-to-b from-emerald-200 to-emerald-50 border-2 border-white/80 text-white px-6 py-3 rounded-lg shadow-lg">
        <div>
        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            viewBox="-26 -26 102.00 102.00" xml:space="preserve" width="30px" height="30px" fill="#000000" class="border-2 border-white rounded-full shadow-md shadow-emerald-400">
            <g id="SVGRepo_bgCarrier" stroke-width="0" transform="translate(0,0), scale(1)">
            <rect x="-26" y="-26" width="102.00" height="102.00" rx="51" fill="#ebfff0" strokewidth="0"></rect></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#ff0000" stroke-width="0.4"></g>
            <g id="SVGRepo_iconCarrier"> <circle style="fill:#25AE88;" cx="25" cy="25" r="25"></circle>
            <polyline style="fill:none;stroke:#FFFFFF;stroke-width:5;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;" points=" 38,15 22,33 12,25 "></polyline> </g></svg>
        </div>
        <div class="grid">
            <span class="text-gray-800" x-text="successMessage"></span>
            <span class="text-gray-600" x-text="successDescription"></span>
        </div>
    </div>

    <div x-show="showError" x-transition.opacity.duration.500ms class="flex items-center gap-2 fixed bottom-5 right-5 bg-gradient-to-b from-red-200 to-red-50 border-2 border-white/80 text-white px-6 py-3 rounded-lg shadow-lg">
        <div>
            <svg width="30px" height="30px" viewBox="-7.44 -7.44 38.88 38.88" fill="none" xmlns="http://www.w3.org/2000/svg" class="border-2 border-white shadow-md shadow-red-300 rounded-full"
                 transform="rotate(0)" stroke="#000000" stroke-width="0.00024000000000000003"><g id="SVGRepo_bgCarrier" stroke-width="0" transform="translate(0,0), scale(1)">
                    <rect x="-7.44" y="-7.44" width="38.88" height="38.88" rx="19.44" fill="#f5e5e6" strokewidth="0"></rect></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier">
                    <path d="M21.7605 15.92L15.3605 4.4C14.5005 2.85 13.3105 2 12.0005 2C10.6905 2 9.50047 2.85 8.64047 4.4L2.24047 15.92C1.43047
                    17.39 1.34047 18.8 1.99047 19.91C2.64047 21.02 3.92047 21.63 5.60047 21.63H18.4005C20.0805 21.63 21.3605 21.02 22.0105
                    19.91C22.6605 18.8 22.5705 17.38 21.7605 15.92ZM11.2505 9C11.2505 8.59 11.5905 8.25 12.0005 8.25C12.4105 8.25 12.7505 8.59
                    12.7505 9V14C12.7505 14.41 12.4105 14.75 12.0005 14.75C11.5905 14.75 11.2505 14.41 11.2505 14V9ZM12.7105 17.71C12.6605
                    17.75 12.6105 17.79 12.5605 17.83C12.5005 17.87 12.4405 17.9 12.3805 17.92C12.3205 17.95 12.2605 17.97 12.1905 17.98C12.1305
                    17.99 12.0605 18 12.0005 18C11.9405 18 11.8705 17.99 11.8005 17.98C11.7405 17.97 11.6805 17.95 11.6205 17.92C11.5605 17.9
                    11.5005 17.87 11.4405 17.83C11.3905 17.79 11.3405 17.75 11.2905 17.71C11.1105 17.52 11.0005 17.26 11.0005 17C11.0005 16.74
                    11.1105 16.48 11.2905 16.29C11.3405 16.25 11.3905 16.21 11.4405 16.17C11.5005 16.13 11.5605 16.1 11.6205 16.08C11.6805 16.05
                    11.7405 16.03 11.8005 16.02C11.9305 15.99 12.0705 15.99 12.1905 16.02C12.2605 16.03 12.3205 16.05 12.3805 16.08C12.4405 16.1
                    12.5005 16.13 12.5605 16.17C12.6105 16.21 12.6605 16.25 12.7105 16.29C12.8905 16.48 13.0005 16.74 13.0005 17C13.0005 17.26 12.8905
                    17.52 12.7105 17.71Z" fill="#ff2424"></path> </g></svg>
        </div>
        <div class="grid">
            <span class="text-gray-800" x-text="errorMessage"></span>
            <span class="text-gray-600" x-text="errorDescription"></span>
        </div>
    </div>
</div>


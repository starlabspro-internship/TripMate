<x-app-layout>
    <div class="justify-center flex mt-20 mb-10">
        <div class="bg-white shadow-md rounded-lg p-6 w-1/2">
            <h2 class="text-xl font-semibold text-gray-800 mb-4 text-center">{{ __('messages.Upload and Preview Document') }}</h2>
            <div id="drop-area"
                 class="border-dashed border-2 border-blue-800 bg-gray-100 rounded-lg py-12 text-center hover:bg-gray-200 transition">
                <p class="text-gray-600 font-medium">{{ __('messages.Upload your file here or') }}<</p>
                <label for="document-upload"  class="text-blue-500 flex justify-center py-4 cursor-pointer hover:underline">
                    <svg width="50px" height="50px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="icomoon-ignore"> </g> <path d="M12.025 16.156l-0.756-0.756 4.775-4.775 4.775 4.775-0.756 0.756-3.488-3.488v13.956h-1.069v-13.956l-3.481 3.488zM26.194 9.569c0-0.088 0.012-0.169 0.012-0.25 0-4.569-3.7-8.269-8.269-8.269-3.287 0-6.119 1.925-7.45 4.706-0.575-0.287-1.225-0.456-1.912-0.456-2.112 0-3.862 1.537-4.2 3.55-2.513 0.863-4.325 3.244-4.325 6.050 0 3.531 2.862 6.394 6.394 6.394h6.938v-1.069h-6.938c-2.938 0-5.325-2.394-5.325-5.331 0-2.275 1.45-4.3 3.606-5.044l0.6-0.206 0.106-0.625c0.263-1.544 1.587-2.662 3.15-2.662 0.5 0 0.981 0.119 1.431 0.344l0.975 0.487 0.469-0.981c1.188-2.481 3.731-4.088 6.481-4.088 3.969 0 7.2 3.231 7.2 7.2 0 0.019 0 0.044-0.006 0.069-0.006 0.050-0.006 0.106-0.006 0.162l-0.025 1.088 1.087 0.006c2.637 0.006 4.787 2.162 4.787 4.8 0 2.631-2.144 4.781-4.775 4.794h-7.488v1.069h7.494c3.225-0.019 5.837-2.637 5.837-5.863-0.006-3.244-2.619-5.869-5.85-5.875z" fill="#000000"> </path> </g></svg>
                </label>
                <p class="mt-2 text-sm text-gray-500">{{ __('messages.Supported formats: JPG, PNG, PDF. Max size: 25MB') }}</p>
            </div>

                <form method="POST" action="{{ route('profile.background') }}" enctype="multipart/form-data" class=" p-1  mx-auto border-4 border-transparent rounded-3xl mt-8 ">
                    @csrf
                <input
                    type="file"
                    id="document-upload"
                    name="background_document"
                    accept="image/jpeg, image/png, application/pdf"
                    class="hidden"
                    onchange="previewFile()"
                />
            <div id="preview-container" class="mt-4 hidden">
                <h3 class="text-md font-medium text-gray-700 mb-2">{{ __('messages.Preview:') }}</h3>
                <div id="preview" class="border border-gray-300 rounded-lg overflow-hidden"></div>
            </div>
            <div class="flex justify-center mt-6 gap-x-4">
                <button type="submit" class="px-8 flex items-center justify-center mb-6 border bg-blue-500 hover:border-blue-900 hover:bg-blue-800 text-white text-base py-2 rounded-full tracking-wide font-medium cursor-pointer transition ease-in duration-500">
                    {{ __('Upload') }}
                </button>
                <button id="change-file-btn" class="hidden underline flex items-center mb-6 text-blue-500" onclick="changeFile()">
                    {{ __('messages.Change File') }}
                </button>
            </div>
            </form>
        </div>
    </div>
    <script>
        function previewFile() {
            const fileInput = document.getElementById('document-upload');
            const previewContainer = document.getElementById('preview-container');
            const preview = document.getElementById('preview');
            const dropArea = document.getElementById('drop-area');
            const changeFileBtn = document.getElementById('change-file-btn');

            const file = fileInput.files[0];
            if (file) {
                const reader = new FileReader();
                dropArea.classList.add('hidden');
                changeFileBtn.classList.remove('hidden');

                if (file.type === 'image/jpeg' || file.type === 'image/png') {
                    reader.onload = () => {
                        previewContainer.classList.remove('hidden');
                        preview.innerHTML = `<img src="${reader.result}" alt="Uploaded Image" class="w-full h-auto object-contain">`;
                    };
                    reader.readAsDataURL(file);
                }
                else if (file.type === 'application/pdf') {
                    reader.onload = () => {
                        previewContainer.classList.remove('hidden');
                        preview.innerHTML = `<embed src="${reader.result}" type="application/pdf" class="w-full h-[800px]" />`;
                    };
                    reader.readAsDataURL(file);
                }
                else {
                    previewContainer.classList.remove('hidden');
                    preview.innerHTML = `<p class="text-red-500 text-sm">Unsupported file type. Please upload JPG, PNG, or PDF.</p>`;
                }
            } else {
                previewContainer.classList.add('hidden');
            }
        }
        function changeFile() {
            const fileInput = document.getElementById('document-upload');
            const dropArea = document.getElementById('drop-area');
            const previewContainer = document.getElementById('preview-container');
            const preview = document.getElementById('preview');
            const changeFileBtn = document.getElementById('change-file-btn');

            fileInput.value = '';
            dropArea.classList.remove('hidden');
            previewContainer.classList.add('hidden');
            changeFileBtn.classList.add('hidden');
        }

    </script>
</x-app-layout>

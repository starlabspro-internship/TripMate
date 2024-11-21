<x-app-layout>
    <div class="h-full bg-gray-200 p-8">
        <div class="bg-white rounded-lg shadow-xl pb-8">
            <div class="w-full h-[250px]">
                <img src="https://vojislavd.com/ta-template-demo/assets/img/profile-background.jpg" 
                     alt="Profile Background" 
                     class="w-full h-full object-cover rounded-tl-lg rounded-tr-lg">
            </div>
            <div class="flex flex-col items-center -mt-20">
                <div class="w-32 h-32">
                    @if(auth()->user()->image)
                        <img src="{{ asset('storage/' . auth()->user()->image) }}" 
                             alt="User Image" 
                             class="w-full h-full rounded-full object-cover border-2 border-[#76A8B2]">
                    @else
                        <img src="{{ asset('https://eu.ui-avatars.com/api/?name=' . urlencode(auth()->user()->name . ' ' . auth()->user()->lastname) . '&size=250') }}" 
                             alt="Default Image" 
                             class="w-full h-full rounded-full object-cover border-2 border-[#76A8B2]">
                    @endif
                </div>
                <div class="flex items-center space-x-2 mt-2">
                    <p class="text-2xl font-semibold">
                        {{ auth()->user()->name }} {{ auth()->user()->lastname }}
                        @if($user->verification_status === 'verified')
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-4 h-4 text-orange inline ml-2" viewBox="0 0 24 24">
                                <path d="M12 0a12 12 0 1 0 12 12A12 12 0 0 0 12 0zm-1.7 18.3l-4.6-4.6 1.4-1.4 3.2 3.2 7.2-7.2 1.4 1.4z"/>
                            </svg>
                        @endif
                    </p>
                    
                </div>
                <p class="text-sm text-gray-500">{{ auth()->user()->city }}</p>
                    <div class="flex justify-center gap-x-3 py-3 mx-8 text-blue-900 text-sm">
                    <div class="text-center w-20 flex flex-col items-center">
                        <h2 class="text-xl font-bold">12</h2>
                        <svg xmlns="http://www.w3.org/2000/svg" width="35px" height="35px" viewBox="0 -4.5 32 32" fill="none" class="mt-2">
                            <path d="M27.0766 14.7692H24.615C23.9353 14.7692 23.3843 15.3202 23.3843 15.9999V20.923C23.3843 21.6027 23.9353 22.1538 24.615 22.1538H27.0766C27.7563 22.1538 28.3074 21.6027 28.3074 20.923V15.9999C28.3074 15.3202 27.7563 14.7692 27.0766 14.7692Z" fill="url(#paint0_linear_103_1486)"/>
                            <path d="M7.38469 14.7693H4.92315C4.24342 14.7693 3.69238 15.3203 3.69238 16.0001V20.9231C3.69238 21.6029 4.24342 22.1539 4.92315 22.1539H7.38469C8.06443 22.1539 8.61546 21.6029 8.61546 20.9231V16.0001C8.61546 15.3203 8.06443 14.7693 7.38469 14.7693Z" fill="url(#paint1_linear_103_1486)"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M28.3078 9.84615H3.69238L7.16378 1.51479C7.54598 0.597508 8.44225 0 9.43598 0H22.5641C23.5579 0 24.4541 0.597508 24.8364 1.51479L28.3078 9.84615ZM24.6155 7.38462H7.38469L9.43598 2.46154H22.5641L24.6155 7.38462Z" fill="url(#paint2_linear_103_1486)"/>
                            <path d="M3.07692 6.15381H1.84615C0.826551 6.15381 0 6.98036 0 7.99996C0 9.01957 0.826551 9.84612 1.84615 9.84612H3.07692C4.09653 9.84612 4.92308 9.01957 4.92308 7.99996C4.92308 6.98036 4.09653 6.15381 3.07692 6.15381Z" fill="url(#paint3_linear_103_1486)"/>
                            <path d="M30.1536 6.15393H28.9228C27.9032 6.15393 27.0767 6.98048 27.0767 8.00008C27.0767 9.01969 27.9032 9.84624 28.9228 9.84624H30.1536C31.1732 9.84624 31.9997 9.01969 31.9997 8.00008C31.9997 6.98048 31.1732 6.15393 30.1536 6.15393Z" fill="url(#paint4_linear_103_1486)"/>
                            <path d="M24.6153 7.38464H7.3845C4.66556 7.38464 2.46143 9.58878 2.46143 12.3077V14.7693C2.46143 17.4882 4.66556 19.6923 7.3845 19.6923H24.6153C27.3342 19.6923 29.5383 17.4882 29.5383 14.7693V12.3077C29.5383 9.58878 27.3342 7.38464 24.6153 7.38464Z" fill="url(#paint5_linear_103_1486)"/>
                            <path d="M7.38488 16C8.74435 16 9.84642 14.8979 9.84642 13.5384C9.84642 12.179 8.74435 11.0769 7.38488 11.0769C6.02541 11.0769 4.92334 12.179 4.92334 13.5384C4.92334 14.8979 6.02541 16 7.38488 16Z" fill="white"/>
                            <path d="M24.6153 16C25.9748 16 27.0769 14.8979 27.0769 13.5384C27.0769 12.179 25.9748 11.0769 24.6153 11.0769C23.2559 11.0769 22.1538 12.179 22.1538 13.5384C22.1538 14.8979 23.2559 16 24.6153 16Z" fill="white"/>
                            <path d="M14.7692 12.3077C14.7692 11.6279 14.2181 11.0769 13.5384 11.0769C12.8587 11.0769 12.3076 11.6279 12.3076 12.3077V14.7692C12.3076 15.4489 12.8587 16 13.5384 16C14.2181 16 14.7692 15.4489 14.7692 14.7692V12.3077Z" fill="#000000" fill-opacity="0.4"/>
                            <path d="M19.692 12.3077C19.692 11.6279 19.141 11.0769 18.4612 11.0769C17.7815 11.0769 17.2305 11.6279 17.2305 12.3077V14.7692C17.2305 15.4489 17.7815 16 18.4612 16C19.141 16 19.692 15.4489 19.692 14.7692V12.3077Z" fill="#000000" fill-opacity="0.4"/>
                            <defs>
                            <linearGradient id="paint0_linear_103_1486" x1="25.8458" y1="14.7692" x2="25.8458" y2="22.1538" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#3873E5"/>
                            <stop offset="1" stop-color="#2A5CDD"/>
                            </linearGradient>
                            <linearGradient id="paint1_linear_103_1486" x1="6.15392" y1="14.7693" x2="6.15392" y2="22.1539" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#3873E5"/>
                            <stop offset="1" stop-color="#2A5CDD"/>
                            </linearGradient>
                            <linearGradient id="paint2_linear_103_1486" x1="16.0001" y1="0" x2="16.0001" y2="9.84615" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#57A6F5"/>
                            <stop offset="1" stop-color="#3C79E7"/>
                            </linearGradient>
                            <linearGradient id="paint3_linear_103_1486" x1="2.46154" y1="6.15381" x2="2.46154" y2="9.84612" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#58A8F6"/>
                            <stop offset="1" stop-color="#3B78E7"/>
                            </linearGradient>
                            <linearGradient id="paint4_linear_103_1486" x1="29.5382" y1="6.15393" x2="29.5382" y2="9.84624" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#58A8F6"/>
                            <stop offset="1" stop-color="#3B78E7"/>
                            </linearGradient>
                            <linearGradient id="paint5_linear_103_1486" x1="15.9999" y1="7.38464" x2="15.9999" y2="19.6923" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#58A8F6"/>
                            <stop offset="1" stop-color="#3B78E7"/>
                            </linearGradient>
                            </defs>
                        </svg>
                    </div>
                    <div class="text-center w-20 flex flex-col items-center">
                        <h2 class="text-xl font-bold">10</h2>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="30px" width="30px" version="1.1" id="Layer_1" viewBox="0 0 511.998 511.998" xml:space="preserve" class="mt-2">
                            <path style="fill:#0055B8;" d="M379.569,502.173c-6.999,0-14.042-1.241-20.927-3.69l-94.201-33.498  c-0.667-0.215-3.757-0.879-8.441-0.879s-7.774,0.664-8.487,0.895l-94.153,33.482c-6.886,2.449-13.927,3.69-20.927,3.69  c-15.348,0-29.566-5.927-40.037-16.69c-10.861-11.163-16.591-26.442-16.135-43.018l2.748-99.938  c0.001-3.789-2.99-12.993-5.248-16.095l-60.934-79.197C0.558,231.29-3.127,211.831,2.714,193.848  c5.842-17.982,20.261-31.559,39.56-37.248l95.898-28.27c3.603-1.17,11.432-6.858,13.686-9.966l56.491-82.426  c11.374-16.598,28.742-26.115,47.65-26.115s36.277,9.518,47.65,26.115l56.519,82.469c2.227,3.065,10.056,8.754,13.707,9.938  l95.848,28.255c19.3,5.689,33.719,19.266,39.56,37.248c5.842,17.983,2.157,37.442-10.112,53.388l-60.964,79.235  c-2.228,3.065-5.219,12.267-5.217,16.106l2.747,99.89c0.455,16.574-5.274,31.851-16.135,43.016  C409.135,496.246,394.917,502.173,379.569,502.173z"/>
                            <path style="fill:#0071CE;" d="M278.348,425.876c-12.292-4.371-32.405-4.371-44.696,0l-94.2,33.496  c-12.293,4.372-22.056-2.723-21.697-15.764l2.748-99.938c0.358-13.042-5.857-32.171-13.813-42.511l-60.964-79.235  c-7.956-10.341-4.226-21.819,8.287-25.507l95.898-28.27c12.514-3.689,28.786-15.512,36.162-26.273l56.519-82.468  c7.375-10.763,19.444-10.763,26.819,0l56.519,82.468c7.375,10.761,23.649,22.584,36.162,26.273l95.898,28.27  c12.513,3.689,16.243,15.167,8.287,25.507l-60.964,79.235c-7.956,10.341-14.171,29.47-13.813,42.511l2.748,99.938  c0.358,13.041-9.405,20.136-21.696,15.764L278.348,425.876z"/>
                        </svg>
                    </div>
                    <div class="text-center w-20 flex flex-col items-center">
                        <h2 class="text-xl font-bold">7</h2>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="30px" width="30px" version="1.1" id="Layer_1" viewBox="0 0 511.999 511.999" xml:space="preserve" class="mt-2">
                            <g>
                                <path style="fill:#CEE8FA;" d="M65.656,171.198c0,0,48.611-21.542,111.193-28.371c10.021-1.094,51.499-30.663,51.763-30.857   c27.24-19.995,48.404,59.228,48.404,59.228c0.244-1.399,0.485-2.837,0.72-4.309c0.105-0.656,0.209-1.319,0.311-1.987   c2.367-15.383,11.792-34.016,11.725-49.606c-0.044-10.168-0.88-19.042-2.868-24.876c-18.093-53.145-61.589-35.634-61.589-35.634   s-30.338-40.747-53.387-39.498c-0.256-0.008-0.516-0.035-0.769-0.034v0.093c-2.219,0.214-4.368,0.821-6.409,1.919   C105.192,49.282,97.3,45.276,83.938,49.918C51.539,61.171,50.69,58.162,54.771,83.133   C61.593,124.859,64.381,155.241,65.656,171.198z"/>
                                <path style="fill:#CEE8FA;" d="M297.221,228.58c0,0,40.042-17.745,91.593-23.371c8.255-0.901,42.422-25.259,42.638-25.418   c22.44-16.472,39.871,48.788,39.871,48.788c0.201-1.153,0.4-2.337,0.593-3.549c0.087-0.54,0.172-1.086,0.256-1.637   c1.949-12.672,9.715-28.02,9.658-40.863c-0.037-8.375-0.726-15.685-2.363-20.491c-14.904-43.776-50.733-29.353-50.733-29.353   s-24.989-33.566-43.974-32.536c-0.211-0.006-0.426-0.029-0.633-0.027v0.076c-1.829,0.175-3.598,0.676-5.279,1.58   c-49.058,26.374-55.559,23.075-66.566,26.897c-26.688,9.269-27.388,6.791-24.027,27.361   C293.875,190.409,296.172,215.436,297.221,228.58z"/>
                            </g>
                            <path style="fill:#2D527C;" d="M493.911,157.124c-12.896-37.878-40.501-41.966-51.77-41.966c-2.71,0-5.233,0.198-7.501,0.503  c-10.462-12.241-29.534-30.787-49.013-30.787c-0.262,0-0.523,0.003-0.782,0.009c-0.252-0.009-0.529,0.003-0.824-0.014  c-1.196,0.008-2.358,0.156-3.473,0.426c-3.144,0.529-6.135,1.551-8.922,3.049c-35.822,19.258-47.42,21.79-55.094,23.464  c-2.874,0.627-5.845,1.275-9.254,2.46c-0.776,0.27-1.525,0.528-2.256,0.778c-0.067-12.802-1.271-22.471-3.678-29.544  c-14.437-42.402-43.637-48.733-59.76-48.733c-3.851,0-7.39,0.357-10.454,0.854c-11.582-13.709-35.09-37.619-58.154-37.619  c-0.32,0-0.639,0.005-0.958,0.014c-0.323-0.014-0.668-0.021-0.993-0.018c-1.22,0.011-2.404,0.166-3.539,0.45  c-3.513,0.577-6.855,1.71-9.959,3.379c-43.891,23.595-58.239,26.726-67.734,28.799c-3.395,0.741-6.907,1.507-10.86,2.881  c-3.54,1.229-6.698,2.286-9.507,3.226c-13.85,4.634-22.21,7.431-27.579,15.589c-5.799,8.812-4.26,18.232-2.129,31.269  c4.91,30.032,8.511,59.139,10.708,86.523v18.9c0,31.09,11.797,59.472,31.138,80.925c-40.285,19.684-66.651,62.71-66.651,112.866  v111.939c0,8.424,6.829,15.253,15.253,15.253h362.238c8.423,0,15.253-6.829,15.253-15.253s-6.83-15.253-15.253-15.253H283.241  v-76.955c0-34.814,19.353-62.882,48.75-71.729c15.328,9.161,33.229,14.443,52.347,14.443c56.435,0,102.349-45.915,102.349-102.349  v-15.706c0.098-0.587,0.197-1.155,0.293-1.76l0.272-1.727c0.628-4.088,2.224-9.132,3.912-14.474  c2.796-8.842,5.965-18.863,5.923-28.776C497.038,171.544,495.999,163.255,493.911,157.124z M309.155,145.846  c2.402-0.804,5.104-1.708,8.13-2.759c1.687-0.586,3.392-0.958,5.752-1.473c9.869-2.154,23.374-5.101,62.722-26.231  c5.811,0.194,20.671,12.945,30.746,26.414c4.21,5.656,11.364,7.846,17.832,5.082c0.572-0.195,3.739-1.213,7.802-1.213  c3.868,0,15.644,0,22.893,21.293c0.311,0.915,1.251,4.304,1.493,12.335c-6.277-8.906-15.401-17.419-27.735-17.419  c-5.645,0-11.257,1.911-16.267,5.554c-11.524,8.263-30.5,20.64-36.195,22.712c-31.447,3.514-58.578,11.241-75.769,17.088  c-1.821-17.324-4.249-35.294-7.25-53.649c-0.276-1.689-0.604-3.694-0.851-5.436C304.419,147.429,306.871,146.61,309.155,145.846z   M78.803,147.694c-2.228-21.617-5.224-44.061-8.976-67.022c-0.484-2.962-1.091-6.672-1.371-9.269  c2.613-1.049,6.681-2.41,10.654-3.74c2.907-0.973,6.173-2.067,9.837-3.339c2.232-0.775,4.381-1.243,7.355-1.893  c11.824-2.581,28.018-6.115,75.673-31.735c0.079-0.043,0.243-0.13,0.647-0.169c0.034-0.003,0.067-0.006,0.101-0.011  c0.011,0,0.021,0,0.032-0.002l0.223-0.006c8.929,0,28.307,17.599,40.103,33.383c4.195,5.634,11.386,7.8,17.852,5.073  c0.612-0.217,4.98-1.692,10.651-1.692c14.352,0,24.452,9.179,30.881,28.061c0.598,1.757,1.997,7.228,2.053,20.026  c0.009,2.01-0.239,4.227-0.668,6.582c-10.705-19.123-22.658-28.462-36.331-28.462c-6.264,0-12.266,2.059-17.855,6.135  c-14.582,10.459-38.479,25.997-45.083,28.114c-40.112,4.44-74.378,14.573-94.866,21.731  C79.452,148.849,79.138,148.265,78.803,147.694z M80.932,191.016v-9.518c16.418-6.223,53.451-18.694,97.572-23.509  c15.349-1.676,56.618-31.874,59.073-33.682c1.917,1.318,7.753,6.524,15.454,24.47c4.643,10.819,7.805,21.312,8.859,24.983v17.254  c0,49.891-40.59,90.479-90.481,90.479C121.52,281.495,80.932,240.907,80.932,191.016z M252.734,404.538v76.955H45.418v-96.686  c0-44.304,25.041-79.923,62.916-90.597c18.38,11.277,39.98,17.791,63.077,17.791c49.27,0,91.729-29.621,110.575-71.978v4.881  c0,25.05,9.06,48.015,24.057,65.823C273.701,328.032,252.734,363.461,252.734,404.538z M384.338,316.748  c-39.615,0-71.845-32.228-71.845-71.843v-5.979c14.129-5.246,43.367-14.777,77.977-18.554c12.033-1.313,40.948-21.726,48.322-27.054  c5.133,5.07,12.913,21.804,17.388,37.742v13.845C456.181,284.52,423.953,316.748,384.338,316.748z"/>                  
                        </svg>
                    </div>
                </div>
                @if (auth()->user()->verification_status==='pending')
                <a href="{{ route('profile.verify-user') }}" 
    class="w-full sm:w-1/3 bg-gray/20 backdrop-blur-md border border-[#A2D5F2] rounded-md p-2 my-1 mx-1 flex items-center justify-between shadow-sm hover:shadow-lg cursor-pointer hover:scale-105 transition duration-300 hover:border-sky-500">
    <div>
        <h4 class="font-medium text-sm">Verify Profile</h4>
        <p class="text-xs text-gray-500">Verify your profile for safety.</p>
    </div>
    <span class="text-gray-500 text-base">&#8594;</span>
</a>

         
                @endif
            </div>
        </div>

        <!-- Main Content Section -->
        <div class="my-4 flex flex-col 2xl:flex-row space-y-4 2xl:space-y-0 2xl:space-x-4">
            <!-- Personal Info Section -->
            <div class="w-full flex flex-col 2xl:w-1/3">
                <div class="bg-white rounded-lg shadow-xl p-8 flex-1">
                    <h4 class="text-xl text-gray-900 font-bold">Personal Info</h4>
                    <ul class="mt-2 text-gray-700">
                        <li class="flex border-y py-2">
                            <span class="font-bold w-24">Full Name:</span>
                            <span>{{ auth()->user()->name }} {{ auth()->user()->lastname }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-24">Birthday:</span>
                            <span>{{ auth()->user()->birthday->format('d M Y') }}</span>
                        </li>
                        <li class="flex border-y py-2">
                            <span class="font-bold w-24">Email:</span>
                            <span>{{ auth()->user()->email }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-24">Joined:</span>
                            <span>{{ auth()->user()->created_at->format('d M Y') }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-24">Mobile:</span>
                            <span>{{ auth()->user()->phone }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-24">Email:</span>
                            <span>{{ auth()->user()->email }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-24">City:</span>
                            <span>{{ auth()->user()->city }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-24">Address:</span>
                            <span>{{ auth()->user()->address }}</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Ride History Section -->
            <div class="flex flex-col w-full 2xl:w-2/3">
                <div class="bg-white rounded-lg shadow-xl p-8 flex-1">
                    <h4 class="text-xl text-gray-900 font-bold">Ride History</h4>
                    <div class="relative px-4">
                        <div class="absolute h-full border border-dashed border-opacity-20 border-secondary"></div>
        
                                <!-- start::Timeline item -->
                                <div class="flex items-center w-full my-6 -ml-1.5">
                                    <div class="w-1/12 z-10">
                                        <div class="w-3.5 h-3.5 bg-blue-600 rounded-full"></div>
                                    </div>
                                    <div class="w-11/12">
                                        <p class="text-sm">Profile informations changed.</p>
                                        <p class="text-xs text-gray-500">3 min ago</p>
                                    </div>
                                </div>
                                <!-- end::Timeline item -->
        
                                <!-- start::Timeline item -->
                                <div class="flex items-center w-full my-6 -ml-1.5">
                                    <div class="w-1/12 z-10">
                                        <div class="w-3.5 h-3.5 bg-blue-600 rounded-full"></div>
                                    </div>
                                    <div class="w-11/12">
                                        <p class="text-sm">
                                            Connected with <a href="#" class="text-blue-600 font-bold">Colby Covington</a>.</p>
                                        <p class="text-xs text-gray-500">15 min ago</p>
                                    </div>
                                </div>
                                <!-- end::Timeline item -->
        
                                <!-- start::Timeline item -->
                                <div class="flex items-center w-full my-6 -ml-1.5">
                                    <div class="w-1/12 z-10">
                                        <div class="w-3.5 h-3.5 bg-blue-600 rounded-full"></div>
                                    </div>
                                    <div class="w-11/12">
                                        <p class="text-sm">Invoice <a href="#" class="text-blue-600 font-bold">#4563</a> was created.</p>
                                        <p class="text-xs text-gray-500">57 min ago</p>
                                    </div>
                                </div>
                                <!-- end::Timeline item -->
        
                                <!-- start::Timeline item -->
                                <div class="flex items-center w-full my-6 -ml-1.5">
                                    <div class="w-1/12 z-10">
                                        <div class="w-3.5 h-3.5 bg-blue-600 rounded-full"></div>
                                    </div>
                                    <div class="w-11/12">
                                        <p class="text-sm">
                                            Message received from <a href="#" class="text-blue-600 font-bold">Cecilia Hendric</a>.</p>
                                        <p class="text-xs text-gray-500">1 hour ago</p>
                                    </div>
                                </div>
                                <!-- end::Timeline item -->
        
                                <!-- start::Timeline item -->
                                <div class="flex items-center w-full my-6 -ml-1.5">
                                    <div class="w-1/12 z-10">
                                        <div class="w-3.5 h-3.5 bg-blue-600 rounded-full"></div>
                                    </div>
                                    <div class="w-11/12">
                                        <p class="text-sm">New order received <a href="#" class="text-blue-600 font-bold">#OR9653</a>.</p>
                                        <p class="text-xs text-gray-500">2 hours ago</p>
                                    </div>
                                </div>
                                <!-- end::Timeline item -->
        
                                <!-- start::Timeline item -->
                                <div class="flex items-center w-full my-6 -ml-1.5">
                                    <div class="w-1/12 z-10">
                                        <div class="w-3.5 h-3.5 bg-blue-600 rounded-full"></div>
                                    </div>
                                    <div class="w-11/12">
                                        <p class="text-sm">
                                            Message received from <a href="#" class="text-blue-600 font-bold">Jane Stillman</a>.</p>
                                        <p class="text-xs text-gray-500">2 hours ago</p>
                                    </div>
                                </div>
                                <!-- end::Timeline item -->
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
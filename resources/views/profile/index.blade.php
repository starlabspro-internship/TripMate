<x-app-layout>
    <div class="h-full bg-gray-200 p-8">
        <div class="bg-white rounded-lg shadow-xl pb-8">
            <div class="w-full h-[250px]">
                <img src="https://vojislavd.com/ta-template-demo/assets/img/profile-background.jpg"
                     alt="Profile Background"
                     class="w-full h-full object-cover rounded-tl-lg rounded-tr-lg">
            </div>
            @if(session('success'))
                <div class="bg-green-100 text-green-700 border border-green-200 p-4 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif
            <div class="flex flex-col items-center -mt-20">
                <div class="w-32 h-32">
                    @if(auth()->user()->image)
                        <img src="{{ asset('storage/' . auth()->user()->image) }}"
                             alt="User Image"
                             class="w-full h-full rounded-full object-cover border-2 border-[#76A8B2]">
                    @else
                        <img
                            src="{{ asset('https://eu.ui-avatars.com/api/?name=' . urlencode(auth()->user()->name . ' ' . auth()->user()->lastname) . '&size=250') }}"
                            alt="Default Image"
                            class="w-full h-full rounded-full object-cover border-2 border-[#76A8B2]">
                    @endif
                </div>
                <div class="flex items-center space-x-2 mt-2">
                    <p class="text-2xl font-semibold">
                        {{ auth()->user()->name }} {{ auth()->user()->lastname }}
                        @if($user->verification_status === 'verified')
                            <svg xmlns="http://www.w3.org/2000/svg" fill="orange"
                                 class="w-4 h-4 text-orange inline ml-2" viewBox="0 0 24 24">
                                <path
                                    d="M12 0a12 12 0 1 0 12 12A12 12 0 0 0 12 0zm-1.7 18.3l-4.6-4.6 1.4-1.4 3.2 3.2 7.2-7.2 1.4 1.4z"/>
                            </svg>
                        @endif
                    </p>

                </div>
                <p class="text-sm text-gray-500">{{ auth()->user()->city }}</p>
                <div class="flex justify-center gap-x-3 py-3 mx-8 text-blue-900 text-sm">
                    <div class="text-center w-20 flex flex-col items-center">
                        <h2 class="text-xl font-bold">12</h2>
                        <svg xmlns="http://www.w3.org/2000/svg" width="35px" height="35px" viewBox="0 -4.5 32 32"
                             fill="none" class="mt-2">
                            <path
                                d="M27.0766 14.7692H24.615C23.9353 14.7692 23.3843 15.3202 23.3843 15.9999V20.923C23.3843 21.6027 23.9353 22.1538 24.615 22.1538H27.0766C27.7563 22.1538 28.3074 21.6027 28.3074 20.923V15.9999C28.3074 15.3202 27.7563 14.7692 27.0766 14.7692Z"
                                fill="url(#paint0_linear_103_1486)"/>
                            <path
                                d="M7.38469 14.7693H4.92315C4.24342 14.7693 3.69238 15.3203 3.69238 16.0001V20.9231C3.69238 21.6029 4.24342 22.1539 4.92315 22.1539H7.38469C8.06443 22.1539 8.61546 21.6029 8.61546 20.9231V16.0001C8.61546 15.3203 8.06443 14.7693 7.38469 14.7693Z"
                                fill="url(#paint1_linear_103_1486)"/>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M28.3078 9.84615H3.69238L7.16378 1.51479C7.54598 0.597508 8.44225 0 9.43598 0H22.5641C23.5579 0 24.4541 0.597508 24.8364 1.51479L28.3078 9.84615ZM24.6155 7.38462H7.38469L9.43598 2.46154H22.5641L24.6155 7.38462Z"
                                  fill="url(#paint2_linear_103_1486)"/>
                            <path
                                d="M3.07692 6.15381H1.84615C0.826551 6.15381 0 6.98036 0 7.99996C0 9.01957 0.826551 9.84612 1.84615 9.84612H3.07692C4.09653 9.84612 4.92308 9.01957 4.92308 7.99996C4.92308 6.98036 4.09653 6.15381 3.07692 6.15381Z"
                                fill="url(#paint3_linear_103_1486)"/>
                            <path
                                d="M30.1536 6.15393H28.9228C27.9032 6.15393 27.0767 6.98048 27.0767 8.00008C27.0767 9.01969 27.9032 9.84624 28.9228 9.84624H30.1536C31.1732 9.84624 31.9997 9.01969 31.9997 8.00008C31.9997 6.98048 31.1732 6.15393 30.1536 6.15393Z"
                                fill="url(#paint4_linear_103_1486)"/>
                            <path
                                d="M24.6153 7.38464H7.3845C4.66556 7.38464 2.46143 9.58878 2.46143 12.3077V14.7693C2.46143 17.4882 4.66556 19.6923 7.3845 19.6923H24.6153C27.3342 19.6923 29.5383 17.4882 29.5383 14.7693V12.3077C29.5383 9.58878 27.3342 7.38464 24.6153 7.38464Z"
                                fill="url(#paint5_linear_103_1486)"/>
                            <path
                                d="M7.38488 16C8.74435 16 9.84642 14.8979 9.84642 13.5384C9.84642 12.179 8.74435 11.0769 7.38488 11.0769C6.02541 11.0769 4.92334 12.179 4.92334 13.5384C4.92334 14.8979 6.02541 16 7.38488 16Z"
                                fill="white"/>
                            <path
                                d="M24.6153 16C25.9748 16 27.0769 14.8979 27.0769 13.5384C27.0769 12.179 25.9748 11.0769 24.6153 11.0769C23.2559 11.0769 22.1538 12.179 22.1538 13.5384C22.1538 14.8979 23.2559 16 24.6153 16Z"
                                fill="white"/>
                            <path
                                d="M14.7692 12.3077C14.7692 11.6279 14.2181 11.0769 13.5384 11.0769C12.8587 11.0769 12.3076 11.6279 12.3076 12.3077V14.7692C12.3076 15.4489 12.8587 16 13.5384 16C14.2181 16 14.7692 15.4489 14.7692 14.7692V12.3077Z"
                                fill="#000000" fill-opacity="0.4"/>
                            <path
                                d="M19.692 12.3077C19.692 11.6279 19.141 11.0769 18.4612 11.0769C17.7815 11.0769 17.2305 11.6279 17.2305 12.3077V14.7692C17.2305 15.4489 17.7815 16 18.4612 16C19.141 16 19.692 15.4489 19.692 14.7692V12.3077Z"
                                fill="#000000" fill-opacity="0.4"/>
                            <defs>
                                <linearGradient id="paint0_linear_103_1486" x1="25.8458" y1="14.7692" x2="25.8458"
                                                y2="22.1538" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#3873E5"/>
                                    <stop offset="1" stop-color="#2A5CDD"/>
                                </linearGradient>
                                <linearGradient id="paint1_linear_103_1486" x1="6.15392" y1="14.7693" x2="6.15392"
                                                y2="22.1539" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#3873E5"/>
                                    <stop offset="1" stop-color="#2A5CDD"/>
                                </linearGradient>
                                <linearGradient id="paint2_linear_103_1486" x1="16.0001" y1="0" x2="16.0001"
                                                y2="9.84615" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#57A6F5"/>
                                    <stop offset="1" stop-color="#3C79E7"/>
                                </linearGradient>
                                <linearGradient id="paint3_linear_103_1486" x1="2.46154" y1="6.15381" x2="2.46154"
                                                y2="9.84612" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#58A8F6"/>
                                    <stop offset="1" stop-color="#3B78E7"/>
                                </linearGradient>
                                <linearGradient id="paint4_linear_103_1486" x1="29.5382" y1="6.15393" x2="29.5382"
                                                y2="9.84624" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#58A8F6"/>
                                    <stop offset="1" stop-color="#3B78E7"/>
                                </linearGradient>
                                <linearGradient id="paint5_linear_103_1486" x1="15.9999" y1="7.38464" x2="15.9999"
                                                y2="19.6923" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#58A8F6"/>
                                    <stop offset="1" stop-color="#3B78E7"/>
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>
                    <div class="text-center w-20 flex flex-col items-center">
                        <h2 class="text-xl font-bold">10</h2>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="30px"
                             width="30px" version="1.1" id="Layer_1" viewBox="0 0 511.998 511.998" xml:space="preserve"
                             class="mt-2">
                            <path style="fill:#0055B8;"
                                  d="M379.569,502.173c-6.999,0-14.042-1.241-20.927-3.69l-94.201-33.498  c-0.667-0.215-3.757-0.879-8.441-0.879s-7.774,0.664-8.487,0.895l-94.153,33.482c-6.886,2.449-13.927,3.69-20.927,3.69  c-15.348,0-29.566-5.927-40.037-16.69c-10.861-11.163-16.591-26.442-16.135-43.018l2.748-99.938  c0.001-3.789-2.99-12.993-5.248-16.095l-60.934-79.197C0.558,231.29-3.127,211.831,2.714,193.848  c5.842-17.982,20.261-31.559,39.56-37.248l95.898-28.27c3.603-1.17,11.432-6.858,13.686-9.966l56.491-82.426  c11.374-16.598,28.742-26.115,47.65-26.115s36.277,9.518,47.65,26.115l56.519,82.469c2.227,3.065,10.056,8.754,13.707,9.938  l95.848,28.255c19.3,5.689,33.719,19.266,39.56,37.248c5.842,17.983,2.157,37.442-10.112,53.388l-60.964,79.235  c-2.228,3.065-5.219,12.267-5.217,16.106l2.747,99.89c0.455,16.574-5.274,31.851-16.135,43.016  C409.135,496.246,394.917,502.173,379.569,502.173z"/>
                            <path style="fill:#0071CE;"
                                  d="M278.348,425.876c-12.292-4.371-32.405-4.371-44.696,0l-94.2,33.496  c-12.293,4.372-22.056-2.723-21.697-15.764l2.748-99.938c0.358-13.042-5.857-32.171-13.813-42.511l-60.964-79.235  c-7.956-10.341-4.226-21.819,8.287-25.507l95.898-28.27c12.514-3.689,28.786-15.512,36.162-26.273l56.519-82.468  c7.375-10.763,19.444-10.763,26.819,0l56.519,82.468c7.375,10.761,23.649,22.584,36.162,26.273l95.898,28.27  c12.513,3.689,16.243,15.167,8.287,25.507l-60.964,79.235c-7.956,10.341-14.171,29.47-13.813,42.511l2.748,99.938  c0.358,13.041-9.405,20.136-21.696,15.764L278.348,425.876z"/>
                        </svg>
                    </div>
                    <div class="text-center w-20 flex flex-col items-center">
                        <h2 class="text-xl font-bold">7</h2>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="30px"
                             width="30px" version="1.1" id="Layer_1" viewBox="0 0 511.999 511.999" xml:space="preserve"
                             class="mt-2">
                            <g>
                                <path style="fill:#CEE8FA;"
                                      d="M65.656,171.198c0,0,48.611-21.542,111.193-28.371c10.021-1.094,51.499-30.663,51.763-30.857   c27.24-19.995,48.404,59.228,48.404,59.228c0.244-1.399,0.485-2.837,0.72-4.309c0.105-0.656,0.209-1.319,0.311-1.987   c2.367-15.383,11.792-34.016,11.725-49.606c-0.044-10.168-0.88-19.042-2.868-24.876c-18.093-53.145-61.589-35.634-61.589-35.634   s-30.338-40.747-53.387-39.498c-0.256-0.008-0.516-0.035-0.769-0.034v0.093c-2.219,0.214-4.368,0.821-6.409,1.919   C105.192,49.282,97.3,45.276,83.938,49.918C51.539,61.171,50.69,58.162,54.771,83.133   C61.593,124.859,64.381,155.241,65.656,171.198z"/>
                                <path style="fill:#CEE8FA;"
                                      d="M297.221,228.58c0,0,40.042-17.745,91.593-23.371c8.255-0.901,42.422-25.259,42.638-25.418   c22.44-16.472,39.871,48.788,39.871,48.788c0.201-1.153,0.4-2.337,0.593-3.549c0.087-0.54,0.172-1.086,0.256-1.637   c1.949-12.672,9.715-28.02,9.658-40.863c-0.037-8.375-0.726-15.685-2.363-20.491c-14.904-43.776-50.733-29.353-50.733-29.353   s-24.989-33.566-43.974-32.536c-0.211-0.006-0.426-0.029-0.633-0.027v0.076c-1.829,0.175-3.598,0.676-5.279,1.58   c-49.058,26.374-55.559,23.075-66.566,26.897c-26.688,9.269-27.388,6.791-24.027,27.361   C293.875,190.409,296.172,215.436,297.221,228.58z"/>
                            </g>
                            <path style="fill:#2D527C;"
                                  d="M493.911,157.124c-12.896-37.878-40.501-41.966-51.77-41.966c-2.71,0-5.233,0.198-7.501,0.503  c-10.462-12.241-29.534-30.787-49.013-30.787c-0.262,0-0.523,0.003-0.782,0.009c-0.252-0.009-0.529,0.003-0.824-0.014  c-1.196,0.008-2.358,0.156-3.473,0.426c-3.144,0.529-6.135,1.551-8.922,3.049c-35.822,19.258-47.42,21.79-55.094,23.464  c-2.874,0.627-5.845,1.275-9.254,2.46c-0.776,0.27-1.525,0.528-2.256,0.778c-0.067-12.802-1.271-22.471-3.678-29.544  c-14.437-42.402-43.637-48.733-59.76-48.733c-3.851,0-7.39,0.357-10.454,0.854c-11.582-13.709-35.09-37.619-58.154-37.619  c-0.32,0-0.639,0.005-0.958,0.014c-0.323-0.014-0.668-0.021-0.993-0.018c-1.22,0.011-2.404,0.166-3.539,0.45  c-3.513,0.577-6.855,1.71-9.959,3.379c-43.891,23.595-58.239,26.726-67.734,28.799c-3.395,0.741-6.907,1.507-10.86,2.881  c-3.54,1.229-6.698,2.286-9.507,3.226c-13.85,4.634-22.21,7.431-27.579,15.589c-5.799,8.812-4.26,18.232-2.129,31.269  c4.91,30.032,8.511,59.139,10.708,86.523v18.9c0,31.09,11.797,59.472,31.138,80.925c-40.285,19.684-66.651,62.71-66.651,112.866  v111.939c0,8.424,6.829,15.253,15.253,15.253h362.238c8.423,0,15.253-6.829,15.253-15.253s-6.83-15.253-15.253-15.253H283.241  v-76.955c0-34.814,19.353-62.882,48.75-71.729c15.328,9.161,33.229,14.443,52.347,14.443c56.435,0,102.349-45.915,102.349-102.349  v-15.706c0.098-0.587,0.197-1.155,0.293-1.76l0.272-1.727c0.628-4.088,2.224-9.132,3.912-14.474  c2.796-8.842,5.965-18.863,5.923-28.776C497.038,171.544,495.999,163.255,493.911,157.124z M309.155,145.846  c2.402-0.804,5.104-1.708,8.13-2.759c1.687-0.586,3.392-0.958,5.752-1.473c9.869-2.154,23.374-5.101,62.722-26.231  c5.811,0.194,20.671,12.945,30.746,26.414c4.21,5.656,11.364,7.846,17.832,5.082c0.572-0.195,3.739-1.213,7.802-1.213  c3.868,0,15.644,0,22.893,21.293c0.311,0.915,1.251,4.304,1.493,12.335c-6.277-8.906-15.401-17.419-27.735-17.419  c-5.645,0-11.257,1.911-16.267,5.554c-11.524,8.263-30.5,20.64-36.195,22.712c-31.447,3.514-58.578,11.241-75.769,17.088  c-1.821-17.324-4.249-35.294-7.25-53.649c-0.276-1.689-0.604-3.694-0.851-5.436C304.419,147.429,306.871,146.61,309.155,145.846z   M78.803,147.694c-2.228-21.617-5.224-44.061-8.976-67.022c-0.484-2.962-1.091-6.672-1.371-9.269  c2.613-1.049,6.681-2.41,10.654-3.74c2.907-0.973,6.173-2.067,9.837-3.339c2.232-0.775,4.381-1.243,7.355-1.893  c11.824-2.581,28.018-6.115,75.673-31.735c0.079-0.043,0.243-0.13,0.647-0.169c0.034-0.003,0.067-0.006,0.101-0.011  c0.011,0,0.021,0,0.032-0.002l0.223-0.006c8.929,0,28.307,17.599,40.103,33.383c4.195,5.634,11.386,7.8,17.852,5.073  c0.612-0.217,4.98-1.692,10.651-1.692c14.352,0,24.452,9.179,30.881,28.061c0.598,1.757,1.997,7.228,2.053,20.026  c0.009,2.01-0.239,4.227-0.668,6.582c-10.705-19.123-22.658-28.462-36.331-28.462c-6.264,0-12.266,2.059-17.855,6.135  c-14.582,10.459-38.479,25.997-45.083,28.114c-40.112,4.44-74.378,14.573-94.866,21.731  C79.452,148.849,79.138,148.265,78.803,147.694z M80.932,191.016v-9.518c16.418-6.223,53.451-18.694,97.572-23.509  c15.349-1.676,56.618-31.874,59.073-33.682c1.917,1.318,7.753,6.524,15.454,24.47c4.643,10.819,7.805,21.312,8.859,24.983v17.254  c0,49.891-40.59,90.479-90.481,90.479C121.52,281.495,80.932,240.907,80.932,191.016z M252.734,404.538v76.955H45.418v-96.686  c0-44.304,25.041-79.923,62.916-90.597c18.38,11.277,39.98,17.791,63.077,17.791c49.27,0,91.729-29.621,110.575-71.978v4.881  c0,25.05,9.06,48.015,24.057,65.823C273.701,328.032,252.734,363.461,252.734,404.538z M384.338,316.748  c-39.615,0-71.845-32.228-71.845-71.843v-5.979c14.129-5.246,43.367-14.777,77.977-18.554c12.033-1.313,40.948-21.726,48.322-27.054  c5.133,5.07,12.913,21.804,17.388,37.742v13.845C456.181,284.52,423.953,316.748,384.338,316.748z"/>
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
            <div class="mb-4 w-full flex flex-col 2xl:w-1/3">
                <div class="bg-white rounded-lg shadow-xl p-8 flex-1">
                    <h4 class="text-xl text-gray-900 font-bold">Personal Info</h4>
                    <ul class="mt-2 text-gray-700">
                        <li class="flex border-y py-2">
                            <span class="font-bold w-24">Full Name:</span>
                            <span>{{ auth()->user()->name }} {{ auth()->user()->lastname }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-24">Birthday:</span>
                            <span>{{ auth()->user()->birthday }}</span>
                        </li>
                        <li class="flex border-y py-2">
                            <span class="font-bold w-24">Email:</span>
                            <span>{{ auth()->user()->email }}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-24">Joined:</span>
                            <span>{{ auth()->user()->created_at}}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-24">Mobile:</span>
                            <span>{{ auth()->user()->phone }}</span>
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
            <div x-data="tabs()"  class="flex flex-col w-full 2xl:w-2/3 overflow-y-auto max-h-[430px]">
                <div class="mb-4 container mx-auto px-2 py-4 bg-white rounded-lg shadow-xl flex-1 overflow-y-auto">
                    <h2 class="text-2xl font-semibold mb-4 text-gray-800">
                        {{ "Completed Rides Of " . auth()->user()->name }}
                    </h2>
                    <div class="flex gap-2 mb-4">
                        <button @click="currentTab = 'driver'"
                                class="px-4 py-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-medium text-sm">
                            Driver
                        </button>
                        <button @click="currentTab = 'passenger'"
                                class="px-4 py-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-medium text-sm">
                            Passenger
                        </button>
                    </div>
                    <div id="bookings" class="space-y-4 ">
                        @foreach ($bookings as $ride)
                            <div
                                id="passenger"
                                x-show="currentTab === 'passenger'"
                                class="bg-white shadow-md rounded-lg border border-gray-200 overflow-hidden max-w-4xl mx-auto">
                                <div class="flex justify-between items-center p-4 cursor-pointer bg-gray-100" onclick="toggleDetails(this)">
                                    <div>
                                        <div class="flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" width="30px" height="30px" viewBox="0 0 48 48" enable-background="new 0 0 48 48" id="Layer_1" version="1.1" xml:space="preserve">
                                    <path d="M39.092,20.218c-1.368-0.565-2.83-0.8-4.038-0.889c-0.096-0.165-0.192-0.329-0.29-0.492  c-0.258-0.433-0.503-0.842-0.703-1.26c-1.98-4.134-4.973-5.889-9.139-5.354c-0.563,0.071-1.224-0.076-1.925-0.232  c-0.472-0.105-0.959-0.214-1.466-0.268c-3.204-0.34-5.437,0.635-6.837,2.978c-0.658,1.102-1.383,2.201-2.084,3.264  c-0.32,0.485-0.641,0.971-0.956,1.458c-0.005,0.008-0.005,0.019-0.011,0.027c-1.388,0.265-2.779,0.932-3.692,1.818  C6.486,22.69,5.845,24.361,6.096,26.1c0.322,2.235,2.1,4.313,5.002,5.866c0,0.001,0.001,0.003,0.002,0.005  c1.04,1.824,2.323,4.078,5.271,4.078c0.121,0,0.244-0.004,0.37-0.012c2.168-0.132,3.636-1.367,4.388-3.645l6.263-0.241  c0.03,0.063,0.061,0.12,0.091,0.184c0.264,0.562,0.562,1.198,1.076,1.714c1.037,1.043,2.214,1.586,3.423,1.586  c0.119,0,0.239-0.005,0.358-0.016c1.711-0.151,3.36-1.343,4.903-3.53c2.172-0.258,4.573-1.068,5.026-4.447  C42.769,23.91,41.641,21.273,39.092,20.218z M16.411,15.727c0.999-1.671,2.466-2.271,4.908-2.015  c0.394,0.042,0.806,0.134,1.243,0.231c0.838,0.188,1.708,0.381,2.614,0.264c3.289-0.42,5.477,0.886,7.081,4.236  c0.138,0.286,0.288,0.559,0.441,0.826c-5.654-0.065-12.104-0.101-18.57,0.026c0.05-0.076,0.1-0.153,0.15-0.229  C14.992,17.985,15.73,16.867,16.411,15.727z M16.619,34.041c-1.738,0.111-2.541-0.925-3.575-2.703  c1.203-2.837,2.312-2.756,3.622-2.342c1.47,0.462,2.29,1.252,2.646,2.553C18.831,33.207,18.02,33.955,16.619,34.041z M32.164,33.627  c-0.74,0.066-1.471-0.268-2.188-0.988c-0.269-0.27-0.479-0.719-0.682-1.152c-0.037-0.079-0.074-0.158-0.111-0.235  c0.866-1.669,2.208-2.405,4.464-2.458l1.728,2.474C34.279,32.724,33.175,33.537,32.164,33.627z M40.287,27.376  c-0.234,1.751-1.088,2.459-3.289,2.723l-2.01-2.88c-0.184-0.262-0.481-0.42-0.802-0.427c-3.23-0.052-5.365,1.021-6.662,3.354  l-6.492,0.25c-0.629-1.623-1.868-2.71-3.767-3.308c-3.15-0.99-4.761,0.759-5.762,2.808c-1.979-1.181-3.222-2.642-3.429-4.081  c-0.158-1.094,0.27-2.141,1.269-3.112c0.795-0.772,2.247-1.353,3.453-1.381c7.388-0.173,14.852-0.116,21.18-0.038  c1.656,0.021,3.161,0.291,4.352,0.782C40.418,22.932,40.547,25.432,40.287,27.376z"/>--}}
                                    </svg>
                                            <h3 class="text-lg font-medium text-gray-900 flex items-center gap-2">
                                                {{ $ride->trip->origincity->name }}
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-green-900" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M5 12h14M12 5l7 7-7 7"/>
                                                </svg>
                                                {{ $ride->trip->destinationcity->name }}
                                            </h3>
                                        </div>
                                        <p class="flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="mb-1 ml-1" width="20px" height="20px" viewBox="0 0 24 24" fill="none">
                                                <rect x="3" y="6" width="18" height="15" rx="2" stroke="#33363F" stroke-width="2"/>
                                                <path d="M3 10C3 8.11438 3 7.17157 3.58579 6.58579C4.17157 6 5.11438 6 7 6H17C18.8856 6 19.8284 6 20.4142 6.58579C21 7.17157 21 8.11438 21 10H3Z" fill="#33363F"/>
                                                <path d="M7 3L7 6" stroke="#33363F" stroke-width="2" stroke-linecap="round"/>
                                                <path d="M17 3L17 6" stroke="#33363F" stroke-width="2" stroke-linecap="round"/>
                                                <rect x="7" y="12" width="4" height="2" rx="0.5" fill="#33363F"/>
                                                <rect x="7" y="16" width="4" height="2" rx="0.5" fill="#33363F"/>
                                                <rect x="13" y="12" width="4" height="2" rx="0.5" fill="#33363F"/>
                                                <rect x="13" y="16" width="4" height="2" rx="0.5" fill="#33363F"/>
                                            </svg>
                                            &nbsp;&nbsp;{{ $ride->trip->departure_time->format('d/m') }}
                                        </p>
                                    </div>
                                    <svg class="w-5 h-5 text-gray-500 transform transition-transform" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M12 15l-6-6h12l-6 6z"/>
                                    </svg>
                                </div>
                                <div class="details hidden px-4 py-2">
                                    <p class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="mb-0.5 ml-1" width="20px" height="20px" viewBox="0 0 24 24" fill="none">
                                            <path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M12 6V12" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M16.24 16.24L12 12" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        {{ $ride->trip->departure_time->format('H:i') }}
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-green-900" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14M12 5l7 7-7 7"/>
                                        </svg>
                                        {{ $ride->trip->arrival_time->format('H:i') }}
                                    </p>
                                    <p class="flex items-center gap-2 ml-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24" fill="none">
                                            <path d="M16 8.94444C15.1834 7.76165 13.9037 7 12.4653 7C9.99917 7 8 9.23858 8 12C8 14.7614 9.99917 17 12.4653 17C13.9037 17 15.1834 16.2384 16 15.0556M7 10.5H11M7 13.5H11M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg><span>Price:</span> {{ $ride->trip->price }} €</p>
                                    <p class="flex items-center gap-2 ml-1">
                                        <!-- Passenger SVG -->
                                        <svg fill="#000000" height="20px" width="20px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 128 128" xml:space="preserve">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                            </g><g id="SVGRepo_iconCarrier">
                                                <path d="M44.7,46.3c-2.1-13.7,17.6-17.8,20.8-3.9l5.4,26.8l20.1,0c5.8,0,8.9,4.7,8.9,9v36.4c0,8.9-12.6,8.8-12.6-0.2V86.2H61.6 c-6,0-9.7-4.1-10.6-8.8L44.7,46.3z"></path>
                                                <path d="M54.1,30.3c6.5,0,11.8-5.2,11.9-11.8C66,12,60.7,6.7,54.1,6.7c-6.5,0-11.8,5.2-11.8,11.7C42.3,25,47.5,30.3,54.1,30.3"></path>
                                                <path d="M28.4,60.6c-1.4-7.6,8.6-9.4,10-1.8l4.4,23.9c1,5,4.6,9.2,9.8,10.8c1.6,0.5,3.3,0.5,4.8,0.6l14.5,0.1 c7.7,0,7.7,10.1-0.1,10.1l-15.2-0.1c-2.3,0-4.7-0.3-7-1c-9-2.7-15.3-10.1-16.9-18.7L28.4,60.6z"></path> </g>
                                    </svg>
                                        <span>Role:</span> Passenger
                                    </p>
                                </div>
                            </div>

                        @endforeach

                        @foreach ($trips as $ride)
                            <div
                                id="driver"
                                x-show="currentTab === 'driver'"
                                class="bg-white shadow-md rounded-lg border border-gray-200 overflow-hidden max-w-4xl mx-auto">
                                <div class="flex justify-between items-center p-4 cursor-pointer bg-gray-100" onclick="toggleDetails(this)">
                                    <div>
                                        <div class="flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" width="30px" height="30px" viewBox="0 0 48 48" enable-background="new 0 0 48 48" id="Layer_1" version="1.1" xml:space="preserve">
                                    <path d="M39.092,20.218c-1.368-0.565-2.83-0.8-4.038-0.889c-0.096-0.165-0.192-0.329-0.29-0.492  c-0.258-0.433-0.503-0.842-0.703-1.26c-1.98-4.134-4.973-5.889-9.139-5.354c-0.563,0.071-1.224-0.076-1.925-0.232  c-0.472-0.105-0.959-0.214-1.466-0.268c-3.204-0.34-5.437,0.635-6.837,2.978c-0.658,1.102-1.383,2.201-2.084,3.264  c-0.32,0.485-0.641,0.971-0.956,1.458c-0.005,0.008-0.005,0.019-0.011,0.027c-1.388,0.265-2.779,0.932-3.692,1.818  C6.486,22.69,5.845,24.361,6.096,26.1c0.322,2.235,2.1,4.313,5.002,5.866c0,0.001,0.001,0.003,0.002,0.005  c1.04,1.824,2.323,4.078,5.271,4.078c0.121,0,0.244-0.004,0.37-0.012c2.168-0.132,3.636-1.367,4.388-3.645l6.263-0.241  c0.03,0.063,0.061,0.12,0.091,0.184c0.264,0.562,0.562,1.198,1.076,1.714c1.037,1.043,2.214,1.586,3.423,1.586  c0.119,0,0.239-0.005,0.358-0.016c1.711-0.151,3.36-1.343,4.903-3.53c2.172-0.258,4.573-1.068,5.026-4.447  C42.769,23.91,41.641,21.273,39.092,20.218z M16.411,15.727c0.999-1.671,2.466-2.271,4.908-2.015  c0.394,0.042,0.806,0.134,1.243,0.231c0.838,0.188,1.708,0.381,2.614,0.264c3.289-0.42,5.477,0.886,7.081,4.236  c0.138,0.286,0.288,0.559,0.441,0.826c-5.654-0.065-12.104-0.101-18.57,0.026c0.05-0.076,0.1-0.153,0.15-0.229  C14.992,17.985,15.73,16.867,16.411,15.727z M16.619,34.041c-1.738,0.111-2.541-0.925-3.575-2.703  c1.203-2.837,2.312-2.756,3.622-2.342c1.47,0.462,2.29,1.252,2.646,2.553C18.831,33.207,18.02,33.955,16.619,34.041z M32.164,33.627  c-0.74,0.066-1.471-0.268-2.188-0.988c-0.269-0.27-0.479-0.719-0.682-1.152c-0.037-0.079-0.074-0.158-0.111-0.235  c0.866-1.669,2.208-2.405,4.464-2.458l1.728,2.474C34.279,32.724,33.175,33.537,32.164,33.627z M40.287,27.376  c-0.234,1.751-1.088,2.459-3.289,2.723l-2.01-2.88c-0.184-0.262-0.481-0.42-0.802-0.427c-3.23-0.052-5.365,1.021-6.662,3.354  l-6.492,0.25c-0.629-1.623-1.868-2.71-3.767-3.308c-3.15-0.99-4.761,0.759-5.762,2.808c-1.979-1.181-3.222-2.642-3.429-4.081  c-0.158-1.094,0.27-2.141,1.269-3.112c0.795-0.772,2.247-1.353,3.453-1.381c7.388-0.173,14.852-0.116,21.18-0.038  c1.656,0.021,3.161,0.291,4.352,0.782C40.418,22.932,40.547,25.432,40.287,27.376z"/>--}}
                                    </svg>
                                            <h3 class="text-lg font-medium text-gray-900 flex items-center gap-2">
                                                {{ $ride->origincity->name }}
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-green-900" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M5 12h14M12 5l7 7-7 7"/>
                                                </svg>
                                                {{ $ride->destinationcity->name }}
                                            </h3>
                                        </div>
                                        <p class="flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="mb-1 ml-1" width="20px" height="20px" viewBox="0 0 24 24" fill="none">
                                                <rect x="3" y="6" width="18" height="15" rx="2" stroke="#33363F" stroke-width="2"/>
                                                <path d="M3 10C3 8.11438 3 7.17157 3.58579 6.58579C4.17157 6 5.11438 6 7 6H17C18.8856 6 19.8284 6 20.4142 6.58579C21 7.17157 21 8.11438 21 10H3Z" fill="#33363F"/>
                                                <path d="M7 3L7 6" stroke="#33363F" stroke-width="2" stroke-linecap="round"/>
                                                <path d="M17 3L17 6" stroke="#33363F" stroke-width="2" stroke-linecap="round"/>
                                                <rect x="7" y="12" width="4" height="2" rx="0.5" fill="#33363F"/>
                                                <rect x="7" y="16" width="4" height="2" rx="0.5" fill="#33363F"/>
                                                <rect x="13" y="12" width="4" height="2" rx="0.5" fill="#33363F"/>
                                                <rect x="13" y="16" width="4" height="2" rx="0.5" fill="#33363F"/>
                                            </svg>
                                            &nbsp;&nbsp;{{ $ride->departure_time->format('d/m') }}
                                        </p>
                                    </div>
                                    <svg class="w-5 h-5 text-gray-500 transform transition-transform" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M12 15l-6-6h12l-6 6z"/>
                                    </svg>
                                </div>
                                <div class="details hidden px-4 py-2">
                                    <p class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="mb-0.5 ml-1" width="20px" height="20px" viewBox="0 0 24 24" fill="none">
                                            <path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M12 6V12" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M16.24 16.24L12 12" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        {{ $ride->departure_time->format('H:i') }}
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-green-900" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14M12 5l7 7-7 7"/>
                                        </svg>
                                        {{ $ride->arrival_time->format('H:i') }}
                                    </p>
                                    <p class="flex items-center gap-2 ml-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24" fill="none">
                                            <path d="M16 8.94444C15.1834 7.76165 13.9037 7 12.4653 7C9.99917 7 8 9.23858 8 12C8 14.7614 9.99917 17 12.4653 17C13.9037 17 15.1834 16.2384 16 15.0556M7 10.5H11M7 13.5H11M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg><span>Price:</span> {{ $ride->price }} €</p>
                                    <p class="flex items-center gap-2 ml-1">
                                        <svg fill="#000000" height="20px" width="20px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0">
                                    </g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                            </g><g id="SVGRepo_iconCarrier"> <g> <g>
                                                        <path d="M256.001,215.765c-22.186,0-40.235,18.049-40.235,40.235s18.049,40.235,40.235,40.235 c22.186,0,40.235-18.049,40.235-40.235S278.187,215.765,256.001,215.765z M256.001,278.849c-12.599,0-22.849-10.25-22.849-22.849 s10.25-22.849,22.849-22.849S278.85,243.401,278.85,256S268.6,278.849,256.001,278.849z"></path> </g> </g> <g> <g> <path d="M362.318,479.584c-1.909-4.404-7.027-6.431-11.433-4.519c-29.929,12.971-61.853,19.549-94.885,19.549 c-63.735,0-123.658-24.82-168.725-69.888C42.208,379.659,17.387,319.735,17.387,256c0-59.338,21.868-116.157,61.576-159.99 c3.223-3.558,2.951-9.056-0.606-12.279c-3.558-3.223-9.056-2.952-12.279,0.606C23.467,131.375,0.001,192.339,0.001,256 c0,68.38,26.629,132.667,74.981,181.019C123.334,485.371,187.621,512,256.001,512c35.425,0,69.675-7.06,101.798-20.983 C362.205,489.108,364.227,483.99,362.318,479.584z"></path> </g> </g> <g> <g>
                                                        <path d="M437.02,74.981C388.668,26.629,324.38,0,256.001,0C195.523,0,136.904,21.421,90.942,60.315 c-3.665,3.102-4.122,8.586-1.02,12.251c3.101,3.666,8.586,4.123,12.251,1.02c42.827-36.241,97.456-56.2,153.827-56.2 c63.737,0,123.658,24.821,168.725,69.888c45.068,45.068,69.889,104.989,69.889,168.725s-24.82,123.657-69.889,168.725 c-12.956,12.956-27.35,24.407-42.783,34.034c-4.073,2.541-5.316,7.904-2.775,11.977c1.648,2.643,4.483,4.093,7.385,4.093 c1.571,0,3.162-0.427,4.592-1.319c16.552-10.326,31.986-22.603,45.874-36.491c48.352-48.352,74.981-112.639,74.981-181.019 S485.372,123.333,437.02,74.981z"></path> </g> </g> <g> <g>
                                                        <path d="M460.023,213.289c-0.067-0.525-0.178-1.041-0.338-1.543c-7.51-34.479-23.721-66.737-47.463-93.611 c-3.179-3.598-8.672-3.937-12.27-0.759c-3.598,3.179-3.937,8.672-0.759,12.27c18.228,20.632,31.616,44.724,39.53,70.573 c-47.57-16.571-112.901-25.936-182.722-25.936c-69.84,0-135.189,9.37-182.761,25.951 c23.919-78.237,96.796-135.305,182.761-135.305c43.719,0,84.899,14.443,119.086,41.771c3.75,2.997,9.22,2.388,12.218-1.363 c2.997-3.75,2.388-9.22-1.363-12.218c-36.768-29.39-82.916-45.576-129.941-45.576c-100.035,0-183.826,70.834-203.882,164.976 c-0.019,0.085-0.039,0.169-0.056,0.254c-2.953,13.951-4.519,28.409-4.519,43.227c0,3.299,0.086,6.579,0.239,9.841 c0.002,0.107,0.006,0.212,0.012,0.318c2.676,55.499,27.158,105.37,65.043,141.218c0.048,0.046,0.089,0.096,0.138,0.141 c0.044,0.041,0.092,0.074,0.136,0.114c13.669,12.889,29.076,23.949,45.825,32.8c0.449,0.297,0.931,0.549,1.437,0.759 c28.658,14.859,61.178,23.266,95.627,23.266c34.681,0,67.404-8.524,96.202-23.57c0.049-0.024,0.095-0.05,0.144-0.075 c17.028-8.913,32.679-20.108,46.544-33.18c0.045-0.039,0.093-0.073,
                                    0.137-0.115c0.049-0.045,0.09-0.095,0.138-0.14 c37.882-35.847,62.363-85.713,65.042-141.207c0.007-0.112,0.01-0.225,0.013-0.338c0.152-3.259,0.239-6.535,0.239-9.83 C464.459,241.546,462.951,227.241,460.023,213.289z M112.954,206.801c40.936-9.768,90.596-15.129,143.047-15.129 s102.11,5.362,143.047,15.129c2.858,9.087,8.934,33.052,5.651,64.415c-14.247,11.526-25.978,28.839-32.308,49.81 c-3.242,10.742-4.771,21.647-4.7,32.156c-11.759,2.115-33.173,9.334-58.212,33.31c-17.153,3.933-35.126,5.947-53.476,5.947 c-18.351,0-36.323-2.016-53.476-5.948c-25.04-23.977-46.454-31.195-58.212-33.311c0.071-10.508-1.458-21.413-4.7-32.154 c-6.33-20.971-18.06-38.284-32.307-49.809C104.02,239.852,110.096,215.888,112.954,206.801z M68.223,220.643 c7.827-3.124,16.291-6.018,25.295-8.676c-2.624,11.244-5.212,27.945-4.423,48.308c-7.835-3.23-16.003-4.821-24.161-4.516 C64.948,243.765,66.083,232.029,68.223,220.643z M117.954,387.97c-29.123-30.451-48.29-70.492-52.248-114.843 c23.129-0.714,47.738,21.375,57.26,52.922C129.83,348.791,127.762,372.018,117.954,387.97z
                                    M159.024,420.568 c-10.056-5.948-19.527-12.784-28.294-20.411c5.831-8.458,9.852-18.59,11.933-29.621c2.439,0.504,5.452,1.309,8.966,2.608 c7.61,2.815,18.857,8.476,32.047,19.722C170.053,402.067,162.8,412.74,159.024,420.568z M256.001,447.071 c-29.2,0-56.885-6.593-81.661-18.354c2.956-6.429,9.802-16.832,25.059-25.083c18.193,4.109,37.218,6.191,56.601,6.191 c19.384,0,38.408-2.082,56.602-6.191c15.255,8.248,22.104,18.652,25.059,25.081C312.886,440.477,285.2,447.071,256.001,447.071z M352.977,420.568c-3.776-7.828-11.03-18.5-24.652-27.703c13.19-11.245,24.437-16.906,32.047-19.722 c3.513-1.299,6.527-2.104,8.965-2.608c2.079,11.032,6.101,21.165,11.933,29.623C372.504,407.785,363.033,414.62,352.977,420.568z M394.047,387.969c-9.808-15.952-11.876-39.179-5.012-61.92c9.521-31.546,34.127-53.64,57.26-52.922 C442.335,317.478,423.17,357.518,394.047,387.969z M422.907,260.277c0.788-20.364-1.799-37.065-4.423-48.308 c8.993,2.654,17.449,5.544,25.27,8.665c2.173,11.51,3.299,23.263,3.314,35.127C438.911,255.456,430.743,257.047,422.907,260.277z"></path> </g> </g> </g>
                                </svg>
                                        <span>Role:</span> Driver
                                    </p>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function tabs(){
            return{
                currentTab: 'driver'
            }
        }
        function toggleDetails(element) {
            const details = element.nextElementSibling;
            details.style.display = details.style.display === 'block' ? 'none' : 'block';
        }
    </script>
</x-app-layout>

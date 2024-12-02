<x-app-layout>
    <div class="absolute top-0 left-0 bg-gradient-to-b from-green-900 to-blue-800 bottom-0 leading-5 h-full w-full overflow-hidden"></div>
    <div class="relative min-h-screen sm:flex inline sm:flex-row justify-center bg-transparent rounded-3xl shadow-xl">
        <div class="flex-col flex self-center lg:px-14 sm:max-w-4xl xl:max-w-md z-10">
            <div class="self-start hidden lg:flex flex-col text-gray-300">
                <h1 class="my-3 font-semibold font-sans text-4xl">Welcome back</h1>
                <p class="pr-3 text-sm opacity-75">Let's go together for a trip using TripMate!</p>
            </div>
        </div>
        <div class="flex justify-center self-center pl-4 pr-4 z-10">
                <form method="POST" action="{{ route('login') }}" class="p-6 sm:p-8 md:p-10 lg:p-12 bg-white mx-auto border-4 border-transparent rounded-3xl mt-8 w-full sm:w-96 md:w-96 shadow-md transition duration-300 hover:shadow-lg">
                @csrf
                <div class="mb-7 font-sans">
                    <h3 class="text-2xl text-gray-800">Sign In</h3>
                    <p class="text-gray-400">Don't have an account? <a href="{{route('register')}}"
                            class="text-sm text-blue-900 hover:text-blue-900">Sign Up</a></p>
                </div>
                <div class="space-y-6 font-sans">
                    <div> 
                        {{-- inputi i email --}}
                        <input class="w-full text-sm px-4 py-3 bg-gray-200 focus:bg-gray-100 border border-gray-200 rounded-lg focus:outline-none" 
                               type="email" placeholder="Email" name="email" required>
                               @error('email')
                            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                        @enderror
                    </div>
                    <div class="relative" x-data="{ show: true }">
                                {{-- inputi i password --}}
                                <input placeholder="Password" :type="show ? 'password' : 'text'" 
                                class="text-sm text-gray-800 px-4 py-3 rounded-lg w-full bg-gray-200 focus:bg-gray-100 border border-gray-200 focus:outline-none"
                                name="password" required>
                                <div class="flex items-center absolute inset-y-0 right-0 mr-3  text-sm leading-5">
                                    <svg @click="show = !show" :class="{'hidden': !show, 'block':show }"
                                        class="h-4 text-blue-900" fill="none" xmlns="http://www.w3.org/2000/svg"
                                        viewbox="0 0 576 512">
                                        <path fill="currentColor"
                                            d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                        </path>
                                    </svg>
        
                                    <svg @click="show = !show" :class="{'block': !show, 'hidden':show }"
                                        class="h-4 text-blue-900" fill="none" xmlns="http://www.w3.org/2000/svg"
                                        viewbox="0 0 640 512">
                                        <path fill="currentColor"
                                            d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                    </div>
                    <div class="flex items-center justify-between mb-6">
                        <div class="text-sm ml-auto">
                            <a href="{{ route('password.request') }}" class="text-blue-900 hover:text-blue-900">Forgot your password?</a>
                        </div>
                    </div>
                    @if ($errors->has('email') && $errors->has('password'))
                    <x-input-error :messages="['Your login credentials are incorrect. Please try again.']" class="mt-4"/>
                @endif
                   <!-- Main Login Button -->
                        <button type="submit" class="mx-auto px-14 flex items-center justify-center border  bg-blue-500 hover:border-blue-900 hover:bg-blue-800 text-white text-base py-2.5 rounded-full tracking-wide font-medium cursor-pointer transition ease-in duration-500">
                        {{ __('Log in') }}
                    </button>
                    <div class="flex items-center justify-center space-x-1 my-2">
                        <span class="h-px w-16 bg-gray-100"></span>
                        <span class="text-gray-300 font-normal">or</span>
                        <span class="h-px w-16 bg-gray-100"></span>
                    </div>
                    <!-- Google Login Button -->
                                <a href="{{ route('login.google') }}" class="mx-auto  bg-white border border-transparent rounded-full mt-1 hover:border-blue-300 shadow transition duration-300 hover:shadow-lg w-40 flex items-center justify-center mb-1 md:mb-0 text-center text-xs">
                            <svg xmlns="http://www.w3.org/2000/svg" width="179" height="46" viewBox="0 0 179 46" fill="none">                      
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M32.64 22.2045C32.64 21.5664 32.5827 20.9527 32.4764 20.3636H24V23.845H28.8436C28.635 24.97 28.0009 25.9232 27.0477 26.5614V28.8195H29.9564C31.6582 27.2527 32.64 24.9454 32.64 22.2045Z" fill="#4285F4"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M24 31C26.43 31 28.4673 30.1941 29.9564 28.8195L27.0477 26.5614C26.2418 27.1014 25.2109 27.4205 24 27.4205C21.6559 27.4205 19.6718 25.8373 18.9641 23.71H15.9573V26.0418C17.4382 28.9832 20.4818 31 24 31Z" fill="#34A853"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M18.9641 23.71C18.7841 23.17 18.6818 22.5932 18.6818 22C18.6818 21.4068 18.7841 20.83 18.9641 20.29V17.9582H15.9573C15.3477 19.1732 15 20.5477 15 22C15 23.4523 15.3477 24.8268 15.9573 26.0418L18.9641 23.71Z" fill="#FBBC05"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M24 16.5795C25.3214 16.5795 26.5077 17.0336 27.4405 17.9255L30.0218 15.3441C28.4632 13.8918 26.4259 13 24 13C20.4818 13 17.4382 15.0168 15.9573 17.9582L18.9641 20.29C19.6718 18.1627 21.6559 16.5795 24 16.5795Z" fill="#EA4335"/>
                                <path d="M49.248 23.4365C49.248 23.2314 49.2161 23.0492 49.1523 22.8896C49.0931 22.7301 48.986 22.5843 48.8311 22.4521C48.6761 22.32 48.4574 22.1924 48.1748 22.0693C47.8968 21.9417 47.5413 21.8118 47.1084 21.6797C46.6344 21.5339 46.1969 21.3721 45.7959 21.1943C45.3994 21.012 45.0531 20.8024 44.7568 20.5654C44.4606 20.3239 44.2305 20.0482 44.0664 19.7383C43.9023 19.4238 43.8203 19.0615 43.8203 18.6514C43.8203 18.2458 43.9046 17.8766 44.0732 17.5439C44.2464 17.2113 44.4902 16.9242 44.8047 16.6826C45.1237 16.4365 45.4997 16.2474 45.9326 16.1152C46.3656 15.9785 46.8441 15.9102 47.3682 15.9102C48.1064 15.9102 48.7422 16.0469 49.2754 16.3203C49.8132 16.5938 50.2256 16.9606 50.5127 17.4209C50.8044 17.8812 50.9502 18.3893 50.9502 18.9453H49.248C49.248 18.6172 49.1774 18.3278 49.0361 18.0771C48.8994 17.8219 48.6898 17.6214 48.4072 17.4756C48.1292 17.3298 47.776 17.2568 47.3477 17.2568C46.9421 17.2568 46.6048 17.3184 46.3359 17.4414C46.0671 17.5645 45.8665 17.7308 45.7344 17.9404C45.6022 18.1501 45.5361 18.387 45.5361 18.6514C45.5361 18.8382 45.5794 19.0091 45.666 19.1641C45.7526 19.3145 45.8848 19.4557 46.0625 19.5879C46.2402 19.7155 46.4635 19.8363 46.7324 19.9502C47.0013 20.0641 47.318 20.1735 47.6826 20.2783C48.234 20.4424 48.7148 20.6247 49.125 20.8252C49.5352 21.0212 49.877 21.2445 50.1504 21.4951C50.4238 21.7458 50.6289 22.0306 50.7656 22.3496C50.9023 22.6641 50.9707 23.0218 50.9707 23.4229C50.9707 23.8421 50.8864 24.2204 50.7178 24.5576C50.5492 24.8903 50.3076 25.1751 49.9932 25.4121C49.6833 25.6445 49.3096 25.8245 48.8721 25.9521C48.4391 26.0752 47.9561 26.1367 47.4229 26.1367C46.9443 26.1367 46.4727 26.0729 46.0078 25.9453C45.5475 25.8177 45.1283 25.624 44.75 25.3643C44.3717 25.0999 44.071 24.7718 43.8477 24.3799C43.6243 23.9834 43.5127 23.5208 43.5127 22.9922H45.2285C45.2285 23.3158 45.2832 23.5915 45.3926 23.8193C45.5065 24.0472 45.6637 24.234 45.8643 24.3799C46.0648 24.5212 46.2972 24.626 46.5615 24.6943C46.8304 24.7627 47.1175 24.7969 47.4229 24.7969C47.8239 24.7969 48.1589 24.7399 48.4277 24.626C48.7012 24.512 48.9062 24.3525 49.043 24.1475C49.1797 23.9424 49.248 23.7054 49.248 23.4365ZM54.0879 18.6035V26H52.4336V18.6035H54.0879ZM52.3242 16.6621C52.3242 16.4115 52.4062 16.2041 52.5703 16.04C52.7389 15.8714 52.9714 15.7871 53.2676 15.7871C53.5592 15.7871 53.7894 15.8714 53.958 16.04C54.1266 16.2041 54.2109 16.4115 54.2109 16.6621C54.2109 16.9082 54.1266 17.1133 53.958 17.2773C53.7894 17.4414 53.5592 17.5234 53.2676 17.5234C52.9714 17.5234 52.7389 17.4414 52.5703 17.2773C52.4062 17.1133 52.3242 16.9082 52.3242 16.6621ZM60.6299 18.6035H62.127V25.7949C62.127 26.4603 61.9857 27.0254 61.7031 27.4902C61.4206 27.9551 61.0264 28.3083 60.5205 28.5498C60.0146 28.7959 59.429 28.9189 58.7637 28.9189C58.4811 28.9189 58.1667 28.8779 57.8203 28.7959C57.4785 28.7139 57.1458 28.5817 56.8223 28.3994C56.5033 28.2217 56.2367 27.987 56.0225 27.6953L56.7949 26.7246C57.0592 27.0391 57.3509 27.2692 57.6699 27.415C57.9889 27.5609 58.3239 27.6338 58.6748 27.6338C59.0531 27.6338 59.3743 27.5632 59.6387 27.4219C59.9076 27.2852 60.1149 27.0824 60.2607 26.8135C60.4066 26.5446 60.4795 26.2165 60.4795 25.8291V20.2783L60.6299 18.6035ZM55.6055 22.3838V22.2402C55.6055 21.6797 55.6738 21.1693 55.8105 20.709C55.9473 20.2441 56.1432 19.8454 56.3984 19.5127C56.6536 19.1755 56.9635 18.918 57.3281 18.7402C57.6927 18.5579 58.1051 18.4668 58.5654 18.4668C59.0439 18.4668 59.4518 18.5534 59.7891 18.7266C60.1309 18.8997 60.4157 19.1481 60.6436 19.4717C60.8714 19.7907 61.0492 20.1735 61.1768 20.6201C61.3089 21.0622 61.4069 21.5544 61.4707 22.0967V22.5547C61.4115 23.0833 61.3112 23.5664 61.1699 24.0039C61.0286 24.4414 60.8418 24.8197 60.6094 25.1387C60.377 25.4577 60.0898 25.7038 59.748 25.877C59.4108 26.0501 59.012 26.1367 58.5518 26.1367C58.1006 26.1367 57.6927 26.0433 57.3281 25.8564C56.9681 25.6696 56.6582 25.4076 56.3984 25.0703C56.1432 24.7331 55.9473 24.3366 55.8105 23.8809C55.6738 23.4206 55.6055 22.9215 55.6055 22.3838ZM57.2529 22.2402V22.3838C57.2529 22.721 57.2848 23.0355 57.3486 23.3271C57.417 23.6188 57.5195 23.8763 57.6562 24.0996C57.7975 24.3184 57.9753 24.4915 58.1895 24.6191C58.4082 24.7422 58.6657 24.8037 58.9619 24.8037C59.3493 24.8037 59.666 24.7217 59.9121 24.5576C60.1628 24.3936 60.3542 24.1725 60.4863 23.8945C60.623 23.612 60.7188 23.2975 60.7734 22.9512V21.7139C60.7461 21.445 60.6891 21.1943 60.6025 20.9619C60.5205 20.7295 60.4089 20.5267 60.2676 20.3535C60.1263 20.1758 59.9486 20.0391 59.7344 19.9434C59.5202 19.8431 59.2673 19.793 58.9756 19.793C58.6794 19.793 58.4219 19.8568 58.2031 19.9844C57.9844 20.112 57.8044 20.2874 57.6631 20.5107C57.5264 20.734 57.4238 20.9938 57.3555 21.29C57.2871 21.5863 57.2529 21.903 57.2529 22.2402ZM65.4697 20.1826V26H63.8223V18.6035H65.374L65.4697 20.1826ZM65.1758 22.0283L64.6426 22.0215C64.6471 21.4974 64.7201 21.0166 64.8613 20.5791C65.0072 20.1416 65.2077 19.7656 65.4629 19.4512C65.7227 19.1367 66.0326 18.8952 66.3926 18.7266C66.7526 18.5534 67.1536 18.4668 67.5957 18.4668C67.9512 18.4668 68.2725 18.5169 68.5596 18.6172C68.8512 18.7129 69.0996 18.8701 69.3047 19.0889C69.5143 19.3076 69.6738 19.5924 69.7832 19.9434C69.8926 20.2897 69.9473 20.7158 69.9473 21.2217V26H68.293V21.2148C68.293 20.8594 68.2406 20.5791 68.1357 20.374C68.0355 20.1644 67.8874 20.0163 67.6914 19.9297C67.5 19.8385 67.2607 19.793 66.9736 19.793C66.6911 19.793 66.4382 19.8522 66.2148 19.9707C65.9915 20.0892 65.8024 20.251 65.6475 20.4561C65.4971 20.6611 65.3809 20.8981 65.2988 21.167C65.2168 21.4359 65.1758 21.723 65.1758 22.0283ZM76.8789 18.6035V26H75.2246V18.6035H76.8789ZM75.1152 16.6621C75.1152 16.4115 75.1973 16.2041 75.3613 16.04C75.5299 15.8714 75.7624 15.7871 76.0586 15.7871C76.3503 15.7871 76.5804 15.8714 76.749 16.04C76.9176 16.2041 77.002 16.4115 77.002 16.6621C77.002 16.9082 76.9176 17.1133 76.749 17.2773C76.5804 17.4414 76.3503 17.5234 76.0586 17.5234C75.7624 17.5234 75.5299 17.4414 75.3613 17.2773C75.1973 17.1133 75.1152 16.9082 75.1152 16.6621ZM80.3174 20.1826V26H78.6699V18.6035H80.2217L80.3174 20.1826ZM80.0234 22.0283L79.4902 22.0215C79.4948 21.4974 79.5677 21.0166 79.709 20.5791C79.8548 20.1416 80.0553 19.7656 80.3105 19.4512C80.5703 19.1367 80.8802 18.8952 81.2402 18.7266C81.6003 18.5534 82.0013 18.4668 82.4434 18.4668C82.7988 18.4668 83.1201 18.5169 83.4072 18.6172C83.6989 18.7129 83.9473 18.8701 84.1523 19.0889C84.362 19.3076 84.5215 19.5924 84.6309 19.9434C84.7402 20.2897 84.7949 20.7158 84.7949 21.2217V26H83.1406V21.2148C83.1406 20.8594 83.0882 20.5791 82.9834 20.374C82.8831 20.1644 82.735 20.0163 82.5391 19.9297C82.3477 19.8385 82.1084 19.793 81.8213 19.793C81.5387 19.793 81.2858 19.8522 81.0625 19.9707C80.8392 20.0892 80.6501 20.251 80.4951 20.4561C80.3447 20.6611 80.2285 20.8981 80.1465 21.167C80.0645 21.4359 80.0234 21.723 80.0234 22.0283ZM91.9727 24.3594L93.6816 18.6035H94.7344L94.4473 20.3262L92.7246 26H91.7812L91.9727 24.3594ZM90.9678 18.6035L92.3008 24.3867L92.4102 26H91.3574L89.3545 18.6035H90.9678ZM96.334 24.3184L97.626 18.6035H99.2324L97.2363 26H96.1836L96.334 24.3184ZM94.9121 18.6035L96.6006 24.291L96.8125 26H95.8691L94.126 20.3193L93.8389 18.6035H94.9121ZM102.117 18.6035V26H100.463V18.6035H102.117ZM100.354 16.6621C100.354 16.4115 100.436 16.2041 100.6 16.04C100.768 15.8714 101.001 15.7871 101.297 15.7871C101.589 15.7871 101.819 15.8714 101.987 16.04C102.156 16.2041 102.24 16.4115 102.24 16.6621C102.24 16.9082 102.156 17.1133 101.987 17.2773C101.819 17.4414 101.589 17.5234 101.297 17.5234C101.001 17.5234 100.768 17.4414 100.6 17.2773C100.436 17.1133 100.354 16.9082 100.354 16.6621ZM107.312 18.6035V19.8066H103.143V18.6035H107.312ZM104.346 16.792H105.993V23.9561C105.993 24.1839 106.025 24.3594 106.089 24.4824C106.157 24.6009 106.251 24.6807 106.369 24.7217C106.488 24.7627 106.627 24.7832 106.786 24.7832C106.9 24.7832 107.009 24.7764 107.114 24.7627C107.219 24.749 107.303 24.7354 107.367 24.7217L107.374 25.9795C107.237 26.0205 107.078 26.057 106.896 26.0889C106.718 26.1208 106.513 26.1367 106.28 26.1367C105.902 26.1367 105.567 26.0706 105.275 25.9385C104.984 25.8018 104.756 25.5807 104.592 25.2754C104.428 24.9701 104.346 24.5645 104.346 24.0586V16.792ZM110.211 15.5V26H108.57V15.5H110.211ZM109.924 22.0283L109.391 22.0215C109.395 21.5111 109.466 21.0394 109.603 20.6064C109.744 20.1735 109.94 19.7975 110.19 19.4785C110.446 19.1549 110.751 18.9066 111.106 18.7334C111.462 18.5557 111.856 18.4668 112.289 18.4668C112.654 18.4668 112.982 18.5169 113.273 18.6172C113.57 18.7174 113.825 18.8792 114.039 19.1025C114.253 19.3213 114.415 19.6084 114.524 19.9639C114.638 20.3148 114.695 20.7432 114.695 21.249V26H113.041V21.2354C113.041 20.8799 112.989 20.5973 112.884 20.3877C112.784 20.1781 112.635 20.0277 112.439 19.9365C112.243 19.8408 112.004 19.793 111.722 19.793C111.425 19.793 111.163 19.8522 110.936 19.9707C110.712 20.0892 110.525 20.251 110.375 20.4561C110.225 20.6611 110.111 20.8981 110.033 21.167C109.96 21.4359 109.924 21.723 109.924 22.0283ZM127.656 20.9141V24.7148C127.515 24.9017 127.294 25.1068 126.993 25.3301C126.697 25.5488 126.303 25.738 125.811 25.8975C125.318 26.057 124.705 26.1367 123.972 26.1367C123.347 26.1367 122.775 26.0319 122.256 25.8223C121.736 25.6081 121.287 25.2959 120.909 24.8857C120.535 24.4756 120.246 23.9766 120.041 23.3887C119.836 22.7962 119.733 22.1217 119.733 21.3652V20.6748C119.733 19.9229 119.827 19.2529 120.014 18.665C120.205 18.0726 120.479 17.5713 120.834 17.1611C121.189 16.751 121.618 16.4411 122.119 16.2314C122.625 16.0173 123.197 15.9102 123.835 15.9102C124.651 15.9102 125.325 16.0469 125.858 16.3203C126.396 16.5892 126.811 16.9629 127.103 17.4414C127.394 17.9199 127.579 18.4668 127.656 19.082H125.975C125.92 18.7357 125.813 18.4258 125.653 18.1523C125.498 17.8789 125.275 17.6647 124.983 17.5098C124.696 17.3503 124.323 17.2705 123.862 17.2705C123.466 17.2705 123.117 17.3457 122.816 17.4961C122.516 17.6465 122.265 17.8675 122.064 18.1592C121.868 18.4508 121.72 18.8063 121.62 19.2256C121.52 19.6449 121.47 20.1234 121.47 20.6611V21.3652C121.47 21.9121 121.527 22.3975 121.641 22.8213C121.759 23.2451 121.928 23.6029 122.146 23.8945C122.37 24.1862 122.641 24.4072 122.96 24.5576C123.279 24.7035 123.639 24.7764 124.04 24.7764C124.432 24.7764 124.753 24.7445 125.004 24.6807C125.255 24.6123 125.453 24.5326 125.599 24.4414C125.749 24.3457 125.865 24.2546 125.947 24.168V22.1924H123.876V20.9141H127.656ZM129.078 22.3838V22.2266C129.078 21.6934 129.156 21.1989 129.311 20.7432C129.465 20.2829 129.689 19.8841 129.98 19.5469C130.277 19.2051 130.637 18.9408 131.061 18.7539C131.489 18.5625 131.972 18.4668 132.51 18.4668C133.052 18.4668 133.535 18.5625 133.959 18.7539C134.387 18.9408 134.75 19.2051 135.046 19.5469C135.342 19.8841 135.568 20.2829 135.723 20.7432C135.878 21.1989 135.955 21.6934 135.955 22.2266V22.3838C135.955 22.917 135.878 23.4115 135.723 23.8672C135.568 24.3229 135.342 24.7217 135.046 25.0635C134.75 25.4007 134.39 25.665 133.966 25.8564C133.542 26.0433 133.061 26.1367 132.523 26.1367C131.981 26.1367 131.496 26.0433 131.067 25.8564C130.644 25.665 130.284 25.4007 129.987 25.0635C129.691 24.7217 129.465 24.3229 129.311 23.8672C129.156 23.4115 129.078 22.917 129.078 22.3838ZM130.726 22.2266V22.3838C130.726 22.7165 130.76 23.0309 130.828 23.3271C130.896 23.6234 131.004 23.8831 131.149 24.1064C131.295 24.3298 131.482 24.5052 131.71 24.6328C131.938 24.7604 132.209 24.8242 132.523 24.8242C132.829 24.8242 133.093 24.7604 133.316 24.6328C133.544 24.5052 133.731 24.3298 133.877 24.1064C134.023 23.8831 134.13 23.6234 134.198 23.3271C134.271 23.0309 134.308 22.7165 134.308 22.3838V22.2266C134.308 21.8984 134.271 21.5885 134.198 21.2969C134.13 21.0007 134.021 20.7386 133.87 20.5107C133.724 20.2829 133.537 20.1051 133.31 19.9775C133.086 19.8454 132.82 19.7793 132.51 19.7793C132.2 19.7793 131.931 19.8454 131.703 19.9775C131.48 20.1051 131.295 20.2829 131.149 20.5107C131.004 20.7386 130.896 21.0007 130.828 21.2969C130.76 21.5885 130.726 21.8984 130.726 22.2266ZM137.021 22.3838V22.2266C137.021 21.6934 137.099 21.1989 137.254 20.7432C137.409 20.2829 137.632 19.8841 137.924 19.5469C138.22 19.2051 138.58 18.9408 139.004 18.7539C139.432 18.5625 139.915 18.4668 140.453 18.4668C140.995 18.4668 141.479 18.5625 141.902 18.7539C142.331 18.9408 142.693 19.2051 142.989 19.5469C143.285 19.8841 143.511 20.2829 143.666 20.7432C143.821 21.1989 143.898 21.6934 143.898 22.2266V22.3838C143.898 22.917 143.821 23.4115 143.666 23.8672C143.511 24.3229 143.285 24.7217 142.989 25.0635C142.693 25.4007 142.333 25.665 141.909 25.8564C141.485 26.0433 141.005 26.1367 140.467 26.1367C139.924 26.1367 139.439 26.0433 139.011 25.8564C138.587 25.665 138.227 25.4007 137.931 25.0635C137.634 24.7217 137.409 24.3229 137.254 23.8672C137.099 23.4115 137.021 22.917 137.021 22.3838ZM138.669 22.2266V22.3838C138.669 22.7165 138.703 23.0309 138.771 23.3271C138.84 23.6234 138.947 23.8831 139.093 24.1064C139.239 24.3298 139.425 24.5052 139.653 24.6328C139.881 24.7604 140.152 24.8242 140.467 24.8242C140.772 24.8242 141.036 24.7604 141.26 24.6328C141.488 24.5052 141.674 24.3298 141.82 24.1064C141.966 23.8831 142.073 23.6234 142.142 23.3271C142.215 23.0309 142.251 22.7165 142.251 22.3838V22.2266C142.251 21.8984 142.215 21.5885 142.142 21.2969C142.073 21.0007 141.964 20.7386 141.813 20.5107C141.668 20.2829 141.481 20.1051 141.253 19.9775C141.03 19.8454 140.763 19.7793 140.453 19.7793C140.143 19.7793 139.874 19.8454 139.646 19.9775C139.423 20.1051 139.239 20.2829 139.093 20.5107C138.947 20.7386 138.84 21.0007 138.771 21.2969C138.703 21.5885 138.669 21.8984 138.669 22.2266ZM150.017 18.6035H151.514V25.7949C151.514 26.4603 151.372 27.0254 151.09 27.4902C150.807 27.9551 150.413 28.3083 149.907 28.5498C149.401 28.7959 148.816 28.9189 148.15 28.9189C147.868 28.9189 147.553 28.8779 147.207 28.7959C146.865 28.7139 146.533 28.5817 146.209 28.3994C145.89 28.2217 145.623 27.987 145.409 27.6953L146.182 26.7246C146.446 27.0391 146.738 27.2692 147.057 27.415C147.376 27.5609 147.711 27.6338 148.062 27.6338C148.44 27.6338 148.761 27.5632 149.025 27.4219C149.294 27.2852 149.502 27.0824 149.647 26.8135C149.793 26.5446 149.866 26.2165 149.866 25.8291V20.2783L150.017 18.6035ZM144.992 22.3838V22.2402C144.992 21.6797 145.061 21.1693 145.197 20.709C145.334 20.2441 145.53 19.8454 145.785 19.5127C146.04 19.1755 146.35 18.918 146.715 18.7402C147.079 18.5579 147.492 18.4668 147.952 18.4668C148.431 18.4668 148.839 18.5534 149.176 18.7266C149.518 18.8997 149.802 19.1481 150.03 19.4717C150.258 19.7907 150.436 20.1735 150.563 20.6201C150.696 21.0622 150.794 21.5544 150.857 22.0967V22.5547C150.798 23.0833 150.698 23.5664 150.557 24.0039C150.415 24.4414 150.229 24.8197 149.996 25.1387C149.764 25.4577 149.477 25.7038 149.135 25.877C148.798 26.0501 148.399 26.1367 147.938 26.1367C147.487 26.1367 147.079 26.0433 146.715 25.8564C146.355 25.6696 146.045 25.4076 145.785 25.0703C145.53 24.7331 145.334 24.3366 145.197 23.8809C145.061 23.4206 144.992 22.9215 144.992 22.3838ZM146.64 22.2402V22.3838C146.64 22.721 146.672 23.0355 146.735 23.3271C146.804 23.6188 146.906 23.8763 147.043 24.0996C147.184 24.3184 147.362 24.4915 147.576 24.6191C147.795 24.7422 148.052 24.8037 148.349 24.8037C148.736 24.8037 149.053 24.7217 149.299 24.5576C149.549 24.3936 149.741 24.1725 149.873 23.8945C150.01 23.612 150.105 23.2975 150.16 22.9512V21.7139C150.133 21.445 150.076 21.1943 149.989 20.9619C149.907 20.7295 149.796 20.5267 149.654 20.3535C149.513 20.1758 149.335 20.0391 149.121 19.9434C148.907 19.8431 148.654 19.793 148.362 19.793C148.066 19.793 147.809 19.8568 147.59 19.9844C147.371 20.112 147.191 20.2874 147.05 20.5107C146.913 20.734 146.811 20.9938 146.742 21.29C146.674 21.5863 146.64 21.903 146.64 22.2402ZM154.986 15.5V26H153.332V15.5H154.986ZM160.052 26.1367C159.505 26.1367 159.01 26.0479 158.568 25.8701C158.131 25.6878 157.757 25.4349 157.447 25.1113C157.142 24.7878 156.907 24.4072 156.743 23.9697C156.579 23.5322 156.497 23.0605 156.497 22.5547V22.2812C156.497 21.7025 156.581 21.1784 156.75 20.709C156.919 20.2396 157.153 19.8385 157.454 19.5059C157.755 19.1686 158.11 18.9111 158.521 18.7334C158.931 18.5557 159.375 18.4668 159.854 18.4668C160.382 18.4668 160.845 18.5557 161.241 18.7334C161.638 18.9111 161.966 19.1618 162.226 19.4854C162.49 19.8044 162.686 20.1849 162.813 20.627C162.946 21.069 163.012 21.5566 163.012 22.0898V22.7939H157.297V21.6113H161.385V21.4814C161.376 21.1852 161.316 20.9072 161.207 20.6475C161.102 20.3877 160.94 20.1781 160.722 20.0186C160.503 19.859 160.211 19.7793 159.847 19.7793C159.573 19.7793 159.329 19.8385 159.115 19.957C158.906 20.071 158.73 20.2373 158.589 20.4561C158.448 20.6748 158.338 20.9391 158.261 21.249C158.188 21.5544 158.151 21.8984 158.151 22.2812V22.5547C158.151 22.8783 158.195 23.179 158.281 23.457C158.372 23.7305 158.505 23.9697 158.678 24.1748C158.851 24.3799 159.061 24.5417 159.307 24.6602C159.553 24.7741 159.833 24.8311 160.147 24.8311C160.544 24.8311 160.897 24.7513 161.207 24.5918C161.517 24.4323 161.786 24.2067 162.014 23.915L162.882 24.7559C162.722 24.9883 162.515 25.2116 162.26 25.4258C162.005 25.6354 161.692 25.8063 161.323 25.9385C160.959 26.0706 160.535 26.1367 160.052 26.1367Z" fill="#1F1F1F"/>
                                </svg>
                    </a>
                </div>
            </form>
        </div>
        <svg class="absolute bottom-0 left-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#fff" fill-opacity="1" d="M0,0L40,42.7C80,85,160,171,240,197.3C320,224,400,192,480,154.7C560,117,640,75,720,74.7C800,75,880,117,960,154.7C1040,192,1120,224,1200,213.3C1280,203,1360,149,1400,122.7L1440,96L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path>
        </svg>
    </div>
</x-app-layout>

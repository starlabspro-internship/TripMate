<x-app-layout>
    <div class="min-h-screen bg-gradient-to-tr from-sky-500 to-orange-400">
    <div class="flex justify-center  ">
        <div class="bg-white/10 backdrop-blur-md border border-white/50 rounded-xl shadow-lg overflow-hidden w-full mt-28 mb-14"  id="container">

            <!-- Header Section -->
            <div class="relative flex justify-center pt-8 ">

                <img class=" border-2 border-[#76A8B2] -bottom-10 left-8 w-40 h-40 rounded-full "
                @if(auth()->user()->image)
                    <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="User Image">
                @else
                    <img src="{{ asset('https://eu.ui-avatars.com/api/' . auth()->user()->name  . '+' . auth()->user()->lastname . 'size=250') }}" alt="Default Image">
                @endif
            </div>

            <!-- Profile Info -->
           
            <div class="p-6 pt-3">
                <div class="flex justify-center text-center text-[#E0FFFF]">
                    <div>
                        <h2 class="text-2xl font-bold flex items-center justify-center">
                            @if($user->verification_status === 'verified')
                                <span class="mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-4 h-4 text-orange" viewBox="0 0 24 24">
                                        <path d="M12 0a12 12 0 1 0 12 12A12 12 0 0 0 12 0zm-1.7 18.3l-4.6-4.6 1.4-1.4 3.2 3.2 7.2-7.2 1.4 1.4z"/>
                                    </svg>
                                </span>
                            @endif
                            {{ auth()->user()->name }} {{ auth()->user()->lastname }}
                        </h2>
                        <p>{{ auth()->user()->city }}</p>
                    </div>
                </div>
                
                
                <div class="flex justify-between py-4 mx-10 text-[#E0FFFF]">
                    <div class="w-1/3 text-center">
                        <h2 class="text-2xl font-bold">12</h2>
                        <h1>Rides</h1>
                    </div>
                    <div class="w-1/3 text-center">
                        <h2 class="text-2xl font-bold">10</h2>
                        <h1>Reviews</h1>
                    </div>
                    <div class="w-1/3 text-center">
                        <h2 class="text-2xl font-bold">7</h2>
                        <h1>Friends</h1>
                    </div>
                </div>
            </div>


            <div class="p-6 bg-white/40 backdrop-blur-md flex flex-col sm:flex-row justify-evenly items-center " id="card-place">
                <!-- Verify Profile Card -->
                <div id="openUploadButton" class="w-full sm:w-1/2 bg-gray/20 backdrop-blur-md border-2 border-[#A2D5F2] rounded-lg p-4 my-2 sm:my-0 mb-4 sm:mb-0 mx-2 flex items-center justify-between shadow-sm hover:shadow-xl cursor-pointer hover:scale-105 transition duration-300 hover:border-sky-500">
                    <div>
                        <h4 class="font-medium">Verify Profile</h4>
                        <p class="text-sm text-gray-500">You should verify profile for safety reasons.</p>
                    </div>
                    <span class="text-gray-500 text-lg">&#8594;</span>
                </div>
            
                <!-- Ride History Card -->
                <div class="w-full sm:w-1/2 bg-gray/20 backdrop-blur-md border-2 border-[#A2D5F2] rounded-lg p-4 my-2 sm:my-0 mb-4 sm:mb-0 mx-2 flex items-center justify-between shadow-sm hover:shadow-xl cursor-pointer hover:scale-105 transition duration-300 hover:border-sky-500">
                    <div>
                        <h4 class="font-medium">Ride History</h4>
                        <p class="text-sm text-gray-500">See your last rides and details.</p>
                    </div>
                    <span class="text-gray-500 text-lg">&#8594;</span>
                </div>
            </div>
            
            
            <div id="uploadModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75 hidden">
                <form id="uploadForm" action="{{ route('profile.upload-id-document') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-2xl max-w-md w-full" style="margin: auto; max-height: 90%; overflow-y: auto;">
                    @csrf
                    <!-- Close Button -->
                    <button type="button" onclick="closeUploadModal()" class="absolute top-2 right-2 text-blue-200 hover:text-blue-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <div class="flex items-center justify-center mb-4 space-x-4">
                        <!-- SVG Icon -->
                        <svg class="w-16 h-16 text-blue-500 shrink-0" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" style="fill: currentColor;">
                            <path d="M371.64357008 315.14947033c6.49709819 44.52423193 21.40220498 69.74825947 31.72112731 81.97809222h207.52495798c10.12782902-12.42092287 25.797301-37.07167852 31.72112729-81.97809222 19.30020283 5.35055124 26.17948435-21.40220498 27.32602968-38.02713377 1.14654691-16.05165376 11.84764942-67.07298383-12.42092286-62.67788785 4.7772778-34.39640288 8.59910032-64.77988999 6.87928152-81.02263542-5.9238247-57.32733659-48.72823625-116.94776702-156.5036295-121.15177291-91.72373949 4.20400432-151.15307823 64.39770821-157.07690294 121.15177291-1.5287287 16.05165376 1.5287287 47.19950756 6.49709817 81.02263542-24.07748219-4.7772778-13.37637813 46.62623408-12.22983275 62.67788785 0.19109168 16.6249272 6.68818983 42.80441155 26.5616661 38.02713377z m0 0M160.87006143 545.79645526h328.10345902v31.72112726H160.87006143v-31.72112726z m0 150.0065313h328.10345902v31.72112729H160.87006143v-31.72112729z m0 149.62434953h709.33024877v31.72112731H160.87006143v-31.72112731z m423.64901951-49.3015097h257.39974276c8.02582687 0 14.52292505-5.9238247 14.52292501-13.37637813 0 0 0-48.15496281-38.60040722-65.92643849-24.07748219-11.27437596-9.17237379-2.67527563-38.60040563-13.94965157-30.0013069-11.27437596-33.82312944-15.0961985-33.82312945-15.09619851l-0.57327345-26.17948435s11.27437596-8.02582687 14.52292502-32.10330748c6.87927995 1.5287287 9.17237379-7.45255342 9.74564726-13.37637968 0.57327345-5.9238247 4.20400432-23.50420873-4.20400433-21.97547846 1.5287287-11.84764942 3.24854908-23.12202537 2.67527562-28.85475997-2.10200217-20.44674974-17.19820066-41.27568286-55.79860787-42.80441154-32.67658252 1.5287287-53.69660572 22.54875191-55.7986079 42.80441154-0.57327345 5.9238247 0.57327345 16.6249272 2.10200218 28.85475997-8.59910032-1.5287287-4.7772778 16.6249272-4.20400434 21.97547846 0.57327345 5.9238247 2.67527563 15.47838028 9.55455559 13.37637968 3.24854908 24.65075407 14.52292505 32.67658252 14.52292659 32.67658095l-0.57327344 26.37057604s-1.14654691 3.82182254-30.57458036 15.47838027c-30.0013069 11.27437596-14.52292505 2.10200217-38.60040724 13.37637813-38.60040722 17.77147413-38.60040722 65.92643692-38.60040565 65.92643848 0.38218179 6.87927995 6.68818983 12.80310465 14.90510685 12.80310466z m0 0"></path>
                    <path d="M1001.47991057 755.80560036c0-43.377685-23.50420873-78.72954316-53.69660416-82.5513657V448.14889108c0-27.89930315-23.12202537-51.02133009-51.02133008-51.02132853H124.75383973c-27.89930315 0-51.02133009 23.12202537-51.02133009 51.02132853v225.10534358c-30.0013069 3.82182254-53.69660572 39.17368068-53.69660571 82.5513657 0 43.377685 23.50420873 78.72954316 53.69660571 82.55136411v105.10011759c0 27.89930315 23.12202537 51.02133009 51.02133009 51.02133011h772.0081366c27.89930315 0 51.02133009-23.12202537 51.02133008-51.02133011v-105.10011759c30.19239699-3.63073087 53.69660572-39.55586247 53.69660416-82.55136411zM896.95306642 983.77730969h-772.00813503c-21.97547846 0-40.12913593-18.1536559-40.1291359-40.12913594v-105.10011759c30.0013069-3.82182254 53.69660572-39.17368068 53.69660414-82.5513657 0-43.377685-23.50420873-78.72954316-53.69660414-82.55136411V448.14889108c0-21.97547846 18.1536559-40.12913593 40.1291359-40.12913436h772.00813503c21.97547846 0 40.12913593 18.1536559 40.12913593 40.12913436v225.10534358c-30.0013069 3.82182254-53.69660572 39.17368068-53.69660571 82.5513657 0 43.377685 23.50420873 78.72954316 53.69660571 82.55136411v105.10011759c0.19109168 22.54875191-18.1536559 40.32022761-40.12913593 40.32022763z m0 0"></path>
                        </svg>
                        
                        <!-- Text -->
                        <div>
                            <h2 class="text-blue-500 font-semibold text-2xl mb-2">Upload Your Document</h2>
                            <p class="text-gray-600 text-sm">
                                Please upload a clear photo of yourself holding the ID or passport. Ensure that all details on the document are visible and readable.
                            </p>
                        </div>
                    </div>
                    
                    <div class="min-h-[50vh] flex justify-center items-center border bg-gray-100">

                        <!-- Capture and Upload Section -->
                        <div class="text-center">
                            <div id="camera" class="mb-4 border rounded-lg shadow-md mx-auto"></div>
                            <div id="captured-image-container" class="hidden text-center">
                                <img id="captured-image" class="mx-auto rounded-lg border mb-2" alt="Captured Image" />
                                <button type="button" id="retake" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                    Retake Image
                                </button>
                            </div>
                            <button type="button" id="capture" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                            
                                Take a Picture
                               
                                </button>
                            <input type="hidden" name="image_data" id="image_data">
                        </div>
                    </div>
                    
            
                    <!-- Submit Button -->
                    <div class="flex justify-center mt-4">
                        <button type="submit" class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                            <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                            Upload Image
                            </span>
                            </button>
                    </div>
                    

                </form>
            </div>
            
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>
    
   
     
    
    

</x-app-layout>

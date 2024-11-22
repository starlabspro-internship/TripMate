<x-app-layout>
    <div class="bg-gradient-to-r from-blue-500 via-white to-blue-400 min-h-screen flex items-center justify-center">
     <form id="uploadForm" 
            action="{{ route('profile.upload-id-document') }}" 
            method="POST" 
            enctype="multipart/form-data"
            class="bg-white p-4 sm:p-6 rounded-lg shadow-2xl w-[70vw] h-auto max-h-[80vh] overflow-y-auto mt-12">
            @csrf
                <div class="flex flex-col sm:flex-row items-center justify-center mb-4 sm:space-x-4 text-center sm:text-left">
                   
                    <svg class="w-25 h-25 sm:w-24 sm:h-24 text-blue-500 shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024" style="fill: currentColor;">
                     
                        <path d="M371.64357008 315.14947033c6.49709819 44.52423193 21.40220498 69.74825947 31.72112731 81.97809222h207.52495798c10.12782902-12.42092287 25.797301-37.07167852 31.72112729-81.97809222 19.30020283 5.35055124 26.17948435-21.40220498 27.32602968-38.02713377 1.14654691-16.05165376 11.84764942-67.07298383-12.42092286-62.67788785 4.7772778-34.39640288 8.59910032-64.77988999 6.87928152-81.02263542-5.9238247-57.32733659-48.72823625-116.94776702-156.5036295-121.15177291-91.72373949 4.20400432-151.15307823 64.39770821-157.07690294 121.15177291-1.5287287 16.05165376 1.5287287 47.19950756 6.49709817 81.02263542-24.07748219-4.7772778-13.37637813 46.62623408-12.22983275 62.67788785 0.19109168 16.6249272 6.68818983 42.80441155 26.5616661 38.02713377z m0 0M160.87006143 545.79645526h328.10345902v31.72112726H160.87006143v-31.72112726z m0 150.0065313h328.10345902v31.72112729H160.87006143v-31.72112729z m0 149.62434953h709.33024877v31.72112731H160.87006143v-31.72112731z m423.64901951-49.3015097h257.39974276c8.02582687 0 14.52292505-5.9238247 14.52292501-13.37637813 0 0 0-48.15496281-38.60040722-65.92643849-24.07748219-11.27437596-9.17237379-2.67527563-38.60040563-13.94965157-30.0013069-11.27437596-33.82312944-15.0961985-33.82312945-15.09619851l-0.57327345-26.17948435s11.27437596-8.02582687 14.52292502-32.10330748c6.87927995 1.5287287 9.17237379-7.45255342 9.74564726-13.37637968 0.57327345-5.9238247 4.20400432-23.50420873-4.20400433-21.97547846 1.5287287-11.84764942 3.24854908-23.12202537 2.67527562-28.85475997-2.10200217-20.44674974-17.19820066-41.27568286-55.79860787-42.80441154-32.67658252 1.5287287-53.69660572 22.54875191-55.7986079 42.80441154-0.57327345 5.9238247 0.57327345 16.6249272 2.10200218 28.85475997-8.59910032-1.5287287-4.7772778 16.6249272-4.20400434 21.97547846 0.57327345 5.9238247 2.67527563 15.47838028 9.55455559 13.37637968 3.24854908 24.65075407 14.52292505 32.67658252 14.52292659 32.67658095l-0.57327344 26.37057604s-1.14654691 3.82182254-30.57458036 15.47838027c-30.0013069 11.27437596-14.52292505 2.10200217-38.60040724 13.37637813-38.60040722 17.77147413-38.60040722 65.92643692-38.60040565 65.92643848 0.38218179 6.87927995 6.68818983 12.80310465 14.90510685 12.80310466z m0 0"></path>
                <path d="M1001.47991057 755.80560036c0-43.377685-23.50420873-78.72954316-53.69660416-82.5513657V448.14889108c0-27.89930315-23.12202537-51.02133009-51.02133008-51.02132853H124.75383973c-27.89930315 0-51.02133009 23.12202537-51.02133009 51.02132853v225.10534358c-30.0013069 3.82182254-53.69660572 39.17368068-53.69660571 82.5513657 0 43.377685 23.50420873 78.72954316 53.69660571 82.55136411v105.10011759c0 27.89930315 23.12202537 51.02133009 51.02133009 51.02133011h772.0081366c27.89930315 0 51.02133009-23.12202537 51.02133008-51.02133011v-105.10011759c30.19239699-3.63073087 53.69660572-39.55586247 53.69660416-82.55136411zM896.95306642 983.77730969h-772.00813503c-21.97547846 0-40.12913593-18.1536559-40.1291359-40.12913594v-105.10011759c30.0013069-3.82182254 53.69660572-39.17368068 53.69660414-82.5513657 0-43.377685-23.50420873-78.72954316-53.69660414-82.55136411V448.14889108c0-21.97547846 18.1536559-40.12913593 40.1291359-40.12913436h772.00813503c21.97547846 0 40.12913593 18.1536559 40.12913593 40.12913436v225.10534358c-30.0013069 3.82182254-53.69660572 39.17368068-53.69660571 82.5513657 0 43.377685 23.50420873 78.72954316 53.69660571 82.55136411v105.10011759c0.19109168 22.54875191-18.1536559 40.32022761-40.12913593 40.32022763z m0 0"></path>
                    
                    </svg>
                    <div>
                        <h2 class="text-blue-500 font-semibold text-lg sm:text-3xl text-center mb-6 relative">
                            <span class="relative z-10">Upload Your Document</span>
                            <span class="absolute bottom-0 left-0 w-full border-b-2 border-blue-300 opacity-50"></span>
                        </h2>
                        
                       
                        <p class="text-gray-600 text-sm sm:text-base hover:text-gray-900 mt-4 mb-4">
                            Please upload a clear photo of yourself holding the ID or passport. Ensure all details on the document are visible and readable. Your photo is confidential and accessible only to our team.
                        </p>
                    </div>
                </div>
                

                <!-- Camera Section -->
                <div class="min-h-[10vh] sm:min-h-[20vh] flex justify-center items-center border bg-gray-100 ">
                    <div class="text-center">
                        <div id="camera" class="mb-4 mt-4 border rounded-lg shadow-md mx-auto"></div>
                        <div id="captured-image-container" class="hidden">
                            <img id="captured-image" class="mx-auto rounded-lg border mb-2" alt="Captured Image" />
                            <button type="button" id="retake" 
                                    class="text-white bg-gradient-to-r from-red-400 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 mb-2">
                                Retake Image
                            </button>
                        </div>
                        <button type="button" id="capture" 
                                class="text-white bg-gradient-to-r from-teal-400 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 mb-4">
                            Take a Picture
                        </button>
                        <input type="hidden" id="image_data" name="image_data">
                    </div>
                </div>

              <!-- Submit Button -->
              <div class="flex justify-center mt-4">
                <button type="submit" class="relative inline-flex items-center justify-center p-0.5 mb-2 mt-4 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 hover:text-white focus:ring-4 focus:outline-none mt-2">
                    <span class="relative px-5 py-2.5 bg-white rounded-md group-hover:bg-opacity-0">
                        Upload Image
                    </span>
                </button>
            </div>
            </form>
        </div>
    </div>

  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>
</x-app-layout>

<div class="search-user-container relative mx-auto max-w-md md:max-w-lg lg:max-w-xl">
    <div class="relative">
        <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
            </svg>
        </span>
        <input 
            type="text" 
            id="searchUserInputM" 
            class="search-input p-2 pl-10 border border-customgreen-400 rounded-md w-full text-sm focus:outline-none focus:ring-2 focus:ring-customgreen-400"
            placeholder="{{ __('messages.Search users') }}" 
            onkeyup="searchUsersM()" 
        />
    </div>
    <div id="searchUserResultsM" class="search-results absolute w-full mt-2 bg-customgreen-100 border border-white rounded-md text-sm z-10 px-2"></div>
</div>

<div id="userDetailsM" class="user-modal fixed inset-0 bg-black bg-opacity-50 hidden flex justify-center items-center z-50 p-4">
    <div class="modal-content bg-white p-4 sm:p-6 rounded-lg w-full max-w-sm md:max-w-md lg:max-w-lg">
        <button 
            class="close absolute text-xl font-bold text-gray-500 hover:text-gray-700"
            onclick="closeModalM()">
            &times;
        </button>
        <div class="text-center mb-4">
            <img 
                id="modalUserPhotoM" 
                src="" 
                alt="User Photo" 
                class="w-24 h-24 md:w-32 md:h-32 rounded-full object-cover mx-auto border border-gray-300"
            />
        </div>
        <h2 id="modalUserNameM" class="text-lg md:text-2xl font-semibold mb-4"></h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-left">
            <div>
                <p class="text-sm md:text-base"><strong>{{ __('messages.Email:') }}</strong> <span id="modalEmailM" class="text-gray-700"></span></p>
                <p class="text-sm md:text-base"><strong>{{ __('messages.City:') }}</strong> <span id="modalCityM" class="text-gray-700"></span></p>
            </div>
            <div>
                <p class="text-sm md:text-base"><strong>{{ __('messages.Age') }}:</strong> <span id="modalAgeM" class="text-gray-700"></span></p>
                <p class="text-sm md:text-base"><strong>{{ __('messages.Rating') }}:</strong> 
                    <span id="modalRatingM" class="text-gray-700"></span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-5 h-5 text-yellow-500 -mt-1" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                    </svg>
                </p>
            </div>
        </div>
    </div>
</div>







<script>
  (function() {
    window.searchUsersM = function() {
        const query = document.getElementById("searchUserInputM").value;

        if (query.trim() === "") {
            document.getElementById("searchUserResultsM").innerHTML = "";
            return;
        }

        fetch(`/search-users?q=${encodeURIComponent(query)}`)
            .then(response => response.json())
            .then(data => {
                displayResultsM(data);
            })
            .catch(error => {
                console.error("Error fetching search results:", error);
            });
    };

    function displayResultsM(users) {
    const resultsContainer = document.getElementById("searchUserResultsM");
    resultsContainer.innerHTML = '';

    if (users.length > 0) {
        users.forEach(user => {
            const userDiv = document.createElement("div");
            userDiv.classList.add("user-result", "p-1.5", "cursor-pointer", "hover:bg-customgreen-200");

            
            const lastname = user.lastname ? user.lastname : '';

            userDiv.innerHTML = `
                <p class="text-sm">${user.name} ${lastname}</p>
            `;

            userDiv.onclick = function() {
                openModalM(user);
            };

            resultsContainer.appendChild(userDiv);
        });
    } else {
        resultsContainer.innerHTML = "<p class='p-1.5 text-gray-900 text-sm'>{{ __('messages.No users found') }}</p>";
    }
}


    function openModalM(user) {
        
        document.getElementById("modalUserNameM").textContent = `${user.name} ${user.lastname ? user.lastname : ''}`;
      
        document.getElementById("modalCityM").textContent = user.city || "N/A";
        document.getElementById("modalRatingM").textContent = user.average_rating || "N/A";
        document.getElementById("modalEmailM").textContent = user.email || "N/A";
        document.getElementById("modalAgeM").textContent = (user.age ? `${user.age} {{ __('messages.years') }}` : "N/A");


        const userPhoto = document.getElementById("modalUserPhotoM");

        if (user.image) {
            userPhoto.src = `/storage/${user.image}`; 
            userPhoto.alt = `${user.name} ${user.lastname}`;
        } else {
            const avatarUrl = `https://eu.ui-avatars.com/api/?name=${encodeURIComponent(user.name + ' ' + user.lastname)}&size=128`;
            userPhoto.src = avatarUrl;
            userPhoto.alt = `${user.name} ${user.lastname ? user.lastname : ''}`;
        }

       
        let verificationIcon = '';
        if (user.verification_status === 'verified') {
            verificationIcon = `
                <svg xmlns="http://www.w3.org/2000/svg" fill="orange"
                    class="w-5 h-5  text-orange inline ml-1" viewBox="0 0 24 24">
                    <path
                        d="M12 0a12 12 0 1 0 12 12A12 12 0 0 0 12 0zm-1.7 18.3l-4.6-4.6 1.4-1.4 3.2 3.2 7.2-7.2 1.4 1.4z"/>
                </svg>
               
            `;
        }

        let verificationBackgroundIcon = '';
        if (user.background_status === 'verified') {
            verificationBackgroundIcon = `
              <svg class="w-7 h-7 mb-2.5 text-orange inline ml-1"
                                 viewBox="-9.63 0 337.39 337.39" xmlns="http://www.w3.org/2000/svg"
                                 fill="#000000">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <defs>
                                        <style>.cls-1 {
                                                fill: #e7e7e7;
                                            }

                                            .cls-2 {
                                                fill: #ced0d0;
                                            }

                                            .cls-3 {
                                                fill: #000000;
                                            }

                                            .cls-4, .cls-8 {
                                                fill: #ffffff;
                                            }

                                            .cls-5 {
                                                fill: none;
                                                stroke: #ffffff;
                                                stroke-miterlimit: 10;
                                                stroke-width: 2px;
                                            }

                                            .cls-6 {
                                                fill: orange;
                                            }

                                            .cls-7 {
                                                fill: orange;
                                            }

                                            .cls-8 {
                                                font-size: 155.97px;
                                                font-family: Dosis-ExtraBold, Dosis;
                                                font-weight: 700;
                                            }</style>
                                    </defs>
                                    <title></title>
                                    <g data-name="Layer 2" id="Layer_2">
                                        <g data-name="Layer 1" id="Layer_1-2">
                                            <path class="cls-1"
                                                  d="M295.38,133.12s-14.83-10-39.7-15.78a62.18,62.18,0,1,0-68.88,0c-12,2.87-21,6.22-27.74,9.57-3.35-31.57-29.66-56.44-62.18-56.44A62.11,62.11,0,0,0,62.44,184.3c-24.87,5.74-39.7,15.78-39.7,15.78C13.65,205.34,6,217.78,6,228.3v62.18a19.19,19.19,0,0,0,19.13,19.13h143.5a19.19,19.19,0,0,0,19.13-19.13V242.65H293a19.19,19.19,0,0,0,19.13-19.13V161.34C312.13,150.81,305,137.9,295.38,133.12Z"></path>
                                            <path class="cls-2"
                                                  d="M309.62,161.34v62.18a19.19,19.19,0,0,1-19.13,19.13H185.26v47.84a19.2,19.2,0,0,1-19.15,19.13H22.62A19.18,19.18,0,0,1,3.49,290.49V264.34c8,3.11,16.67,4.74,25.19,6.29,32.42,5.83,70.1,9.46,94.27-12.91,11.37-10.51,18.3-25.81,31.62-33.69s29.66-6.59,44.92-8.51c37.25-4.67,69.84-29.66,90.44-61a178.23,178.23,0,0,0,9.59-16.45C305.58,144.2,309.62,153.43,309.62,161.34Z"></path>
                                            <path class="cls-3"
                                                  d="M168.63,318.13H25.13A25.16,25.16,0,0,1,0,293V230.81C0,218.54,8.58,204,19.56,197.5c1.6-1.06,12.31-7.87,29.91-13.38A68.16,68.16,0,0,1,96.88,67a68.55,68.55,0,0,1,66.83,53.79q4.73-1.9,10.15-3.59a68.18,68.18,0,1,1,94.79,0c17.11,5.36,27.71,12,29.76,13.28,11.08,5.75,19.72,20.34,19.72,33.41V226A25.16,25.16,0,0,1,293,251.16H193.76V293A25.16,25.16,0,0,1,168.63,318.13ZM96.88,79A56.25,56.25,0,0,0,40.7,135.15a55.6,55.6,0,0,0,25,46.64l11.73,7.71-13.67,3.16C40.45,198,26.24,207.47,26.1,207.56l-.35.22C18.3,212.1,12,222.64,12,230.81V293a13.15,13.15,0,0,0,13.13,13.13h143.5A13.15,13.15,0,0,0,181.76,293V239.16H293A13.15,13.15,0,0,0,306.13,226V163.85c0-8.6-6.27-19.28-13.42-22.85l-.35-.18-.32-.22c-.22-.14-14.41-9.54-37.69-14.91l-13.67-3.16,11.73-7.71a55.59,55.59,0,0,0,25-46.64,56.18,56.18,0,1,0-112.36,0,55.59,55.59,0,0,0,25,46.64l11.59,7.61-13.48,3.24a125.57,125.57,0,0,0-26.46,9.1L154,138.64l-.91-8.6A56.67,56.67,0,0,0,96.88,79Z"></path>
                                            <path class="cls-4"
                                                  d="M86.85,96.87a42.57,42.57,0,0,1,17-2.25c3.85.28,3.84-5.72,0-6a47,47,0,0,0-18.59,2.46c-3.64,1.23-2.08,7,1.6,5.79Z"></path>
                                            <path class="cls-4"
                                                  d="M76.75,168.75a42.23,42.23,0,0,1-17.17-30.13c-1.28-13.05,3.87-25,13.49-33.67,2.87-2.6-1.39-6.83-4.24-4.24-22.26,20.17-19.35,55.92,4.89,73.22,3.15,2.25,6.15-3,3-5.18Z"></path>
                                            <path class="cls-5" d="M73.75,100.17"></path>
                                            <path class="cls-6"
                                                  d="M168.33,336.34s86.83-43.41,86.83-108.54V141l-86.83-21.71L81.51,141v86.83C81.51,292.93,168.33,336.34,168.33,336.34Z"></path>
                                            <path class="cls-7"
                                                  d="M255.16,186.56v36.29c0,65.13-86.83,108.54-86.83,108.54S81.51,288,81.51,222.86V186.56c0,65.13,86.82,108.54,86.82,108.54S255.16,251.69,255.16,186.56Z"></path>
                                            <path class="cls-3"
                                                  d="M168.33,337.39,165.65,336A234.93,234.93,0,0,1,121,305.35c-29.74-26-45.46-54.8-45.46-83.21V130.63l92.83-23.21,92.83,23.21v91.51c0,28.41-15.72,57.18-45.46,83.21A234.93,234.93,0,0,1,171,336ZM87.51,140v82.14c0,54.45,66.51,93.89,80.83,101.74,14.3-7.86,80.83-47.37,80.83-101.74V140l-80.83-20.21Z"></path>
                                            <text class="cls-8" transform="translate(150.15 274.66)"></text>
                                        </g>
                                    </g>
                                </g>
                            </svg>
               
            `;
        }

    
        document.getElementById("modalUserNameM").innerHTML += ` ${verificationIcon}`;
        document.getElementById("modalUserNameM").innerHTML += ` ${verificationBackgroundIcon}`;





        
       
        document.getElementById("userDetailsM").classList.remove("hidden");
    }

    document.querySelector("#userDetailsM .close").addEventListener("click", function() {
        document.getElementById("userDetailsM").classList.add("hidden");
    });
})();


    </script>
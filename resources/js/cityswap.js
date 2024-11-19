        document.addEventListener('DOMContentLoaded', function() { 
            // Swap Cities Functionality
            document.getElementById('swap-cities').addEventListener('click', function() {
                const originCity = document.getElementById('origin-city');
                const destinationCity = document.getElementById('destination-city');
    
                const originValue = originCity.value;
                const destinationValue = destinationCity.value;
    
                // Swap values
                originCity.value = destinationValue;
                destinationCity.value = originValue;
    
                // Trigger change events on page load to apply initial selection restrictions
                originCity.dispatchEvent(new Event('change'));
                destinationCity.dispatchEvent(new Event('change'));
            });
    
            // Prevent selecting the same city in the origin city dropdown
            document.getElementById('origin-city').addEventListener('change', function() {
                const selectedOrigin = this.value;
                const destinationCity = document.getElementById('destination-city');
                if (selectedOrigin) {
                    // Disable the selected origin city in the destination dropdown
                    [...destinationCity.options].forEach(option => {
                        option.disabled = option.value === selectedOrigin;
                    });
                } else {
                    // Enable all options if no origin is selected
                    [...destinationCity.options].forEach(option => {
                        option.disabled = false;
                    });
                }
            });
    
            // Prevent selecting the same city in the destination city dropdown
            document.getElementById('destination-city').addEventListener('change', function() {
                const selectedDestination = this.value;
                const originCity = document.getElementById('origin-city');
                if (selectedDestination) {
                    // Disable the selected destination city in the origin dropdown
                    [...originCity.options].forEach(option => {
                        option.disabled = option.value === selectedDestination;
                    });
                } else {
                    // Enable all options if no destination is selected
                    [...originCity.options].forEach(option => {
                        option.disabled = false;
                    });
                }
            });
    
            // Handle form submission to filter rides
            document.querySelector('form').addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent default form submission
                const selectedDate = document.getElementById('filter-date').value;
                const rides = document.querySelectorAll('.ride-card');
    
                let hasAvailableRides = false;
                rides.forEach(ride => {
                    if (ride.dataset.departure === selectedDate) {
                        ride.style.display = 'block'; // Show ride
                        hasAvailableRides = true; // Set flag
                    } else {
                        ride.style.display = 'none'; // Hide ride
                    }
                });
    
                // Show or hide no rides message
                document.getElementById('no-rides').style.display = hasAvailableRides ? 'none' : 'block';
            });
        });
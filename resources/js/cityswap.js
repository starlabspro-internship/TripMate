document.addEventListener('DOMContentLoaded', function() { 
    if(document.getElementById('swap-cities')){
        document.getElementById('swap-cities').addEventListener('click', function() {
            const originCity = document.getElementById('origin-city');
            const destinationCity = document.getElementById('destination-city');

            const originValue = originCity.value;
            const destinationValue = destinationCity.value;

            originCity.value = destinationValue;
            destinationCity.value = originValue;

            originCity.dispatchEvent(new Event('change'));
            destinationCity.dispatchEvent(new Event('change'));
        });
    }

    if(document.getElementById('origin-city')){
        document.getElementById('origin-city').addEventListener('change', function() {
            const selectedOrigin = this.value;
            const destinationCity = document.getElementById('destination-city');
            if (selectedOrigin) {
                [...destinationCity.options].forEach(option => {
                    option.disabled = option.value === selectedOrigin;
                });
            } else {
                [...destinationCity.options].forEach(option => {
                    option.disabled = false;
                });
            }
        });
    }

    if(document.getElementById('origin-city')){
        document.getElementById('destination-city').addEventListener('change', function() {
            const selectedDestination = this.value;
            const originCity = document.getElementById('origin-city');
            if (selectedDestination) {
                [...originCity.options].forEach(option => {
                    option.disabled = option.value === selectedDestination;
                });
            } else {
                [...originCity.options].forEach(option => {
                    option.disabled = false;
                });
            }
        });
    }

    document.querySelector('form').addEventListener('submit', function(event) {
        // event.preventDefault();
        if(document.getElementById('filter-date')){
            const selectedDate = document.getElementById('filter-date').value;
        }
        const rides = document.querySelectorAll('.ride-card');

        let hasAvailableRides = false;
        rides.forEach(ride => {
            if (ride.dataset.departure === selectedDate) {
                ride.style.display = 'block';
                hasAvailableRides = true;
            } else {
                ride.style.display = 'none';
            }
        });

        if(document.getElementById('no-rides')){
            document.getElementById('no-rides').style.display = hasAvailableRides ? 'none' : 'block';
        }
    });
});
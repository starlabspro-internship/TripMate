import './bootstrap';
import './dashboard';
import './swiper';
import './flatpickr';
import './cityswap'; 
import Alpine from 'alpinejs';
import Intersect from '@alpinejs/intersect';
import flatpickr from "flatpickr";
import "flatpickr/dist/flatpickr.min.css";

//kodi per load spinner te butoni submit ne contact form
const form = document.getElementById('myForm');
    const button = document.getElementById('submitButton');

    if (form && button) {
        form.addEventListener('submit', function(event) {
            event.preventDefault();


            const buttonText = button.querySelector('.button-text');
            const spinner = button.querySelector('svg');


            if (buttonText && spinner) {
                buttonText.classList.add('hidden');
                spinner.classList.remove('hidden');
            }


            button.disabled = true;


            form.submit();
        });
    }

window.Alpine = Alpine;

Alpine.start();
Alpine.plugin(Intersect);

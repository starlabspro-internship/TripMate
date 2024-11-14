import './bootstrap';
import './dashboard';
import './swiper';
import Alpine from 'alpinejs';
import Intersect from '@alpinejs/intersect';
import 'font-awesome/css/font-awesome.css';
import L from 'leaflet';
import 'leaflet/dist/leaflet.css';

import flatpickr from "flatpickr";
import "flatpickr/dist/flatpickr.min.css";

document.addEventListener('DOMContentLoaded', function () {
    flatpickr("#date-picker", {
        dateFormat: "Y-m-d",
    });
});
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

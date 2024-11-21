import './bootstrap';
import './dashboard';
import './swiper';
import './flatpickr';
import './cityswap'; 
import './documentModal';
import './successErrorMessage';
import './camera'; 
import './loadSpinner'; 
import L from 'leaflet';
import 'leaflet/dist/leaflet.css';



import Alpine from 'alpinejs';
import Intersect from '@alpinejs/intersect';

import flatpickr from "flatpickr";
import "flatpickr/dist/flatpickr.min.css";






document.addEventListener('DOMContentLoaded', function () {
    flatpickr("#date-picker", {
        dateFormat: "Y-m-d",
        time_24hr: true,
        minDate: "today"
    });
});



    
    
window.Alpine = Alpine;

Alpine.start();
Alpine.plugin(Intersect);

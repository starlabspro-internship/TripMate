import './bootstrap';
import './dashboard';
import Alpine from 'alpinejs';
import Intersect from '@alpinejs/intersect';
import 'font-awesome/css/font-awesome.css';

import flatpickr from "flatpickr";
import "flatpickr/dist/flatpickr.min.css"; 

document.addEventListener('DOMContentLoaded', function () {
    flatpickr("#date-picker", {
        dateFormat: "Y-m-d",
    });
});


window.Alpine = Alpine;

Alpine.start();
Alpine.plugin(Intersect);

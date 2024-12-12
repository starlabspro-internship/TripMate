import './bootstrap';
import './echo.js'
import './dashboard';
import './swiper';
import './flatpickr';
import './cityswap';
import './documentModal';
import './successErrorMessage';
import './camera';
import './loadSpinner';
import Chart from 'chart.js/auto';
import L from 'leaflet';
import 'leaflet/dist/leaflet.css';
import './qr-code';

import Alpine from 'alpinejs';
import Intersect from '@alpinejs/intersect';

import flatpickr from "flatpickr";
import "flatpickr/dist/flatpickr.min.css";

window.Alpine = Alpine;
window.Chart = Chart;

Alpine.start();
Alpine.plugin(Intersect);

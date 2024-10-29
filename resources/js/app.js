import './bootstrap';
import './dashboard';
import Alpine from 'alpinejs';
import Intersect from '@alpinejs/intersect';
import 'font-awesome/css/font-awesome.css';


window.Alpine = Alpine;

Alpine.start();
Alpine.plugin(Intersect);

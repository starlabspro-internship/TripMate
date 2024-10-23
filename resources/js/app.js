
import './bootstrap';

import Alpine from 'alpinejs';
import Intersect from '@alpinejs/intersect';

window.Alpine = Alpine;

Alpine.start();
Alpine.plugin(Intersect);

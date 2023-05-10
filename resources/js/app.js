import './bootstrap';

import Alpine from 'alpinejs';

import 'boxicons';

import AOS from 'aos';
import 'aos/dist/aos.css'; 
AOS.init({
    offset: 150,
    duration: 1400
});

window.Alpine = Alpine;

Alpine.start();

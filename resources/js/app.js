import './bootstrap';
// import axios from 'axios';
import Alpine from 'alpinejs';
import 'boxicons';
import AOS from 'aos';
import 'aos/dist/aos.css';
import 'flowbite';

AOS.init({
    offset: 150,
    duration: 1400
});

window.Alpine = Alpine;

Alpine.start();


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

Alpine.data("starRating", () => ({
    rating: 1.0,
    hoverRating: 0,
    ratings: [
        { amount: 1, label: "Terrible" },
        { amount: 2, label: "Bad" },
        { amount: 3, label: "Okay" },
        { amount: 4, label: "Good" },
        { amount: 5, label: "Great" },
    ],
    rate(amount) {
        console.log(amount);
        if (this.rating == amount) {
            this.rating = 0;
        } else this.rating = amount;
    },
    currentLabel() {
        let r = this.rating;
        if (this.hoverRating != this.rating) r = this.hoverRating;
        let i = this.ratings.findIndex((e) => e.amount == r);
        if (i >= 0) {
            return this.ratings[i].label;
        } else {
            return "";
        }
    },
}));

window.Alpine = Alpine;

Alpine.start();


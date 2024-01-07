const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'sbblack': '#27251F',
                'sbgreen': '#00704A',
                'greey': '#edf6f9',
                'sblight': '#3D8B5F',
                'sbdlight': '#A0D9BE',
            },
            backgroundImage: {
                'blob': "url('/images/blob.png')",
            }
        },
    },

    plugins: [require("@tailwindcss/forms"), require("daisyui")],
};

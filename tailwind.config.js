import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',

    ],

    theme: {
        extend: {
            backgroundImage: {
                'showImage': "url('/storage/landing/trips2.jpg')",
            },
            colors: {
                aquamarine: '#38B2AC',
            },
            fontFamily: {
                planer: ['Planer', 'sans-serif'],
            },
            backgroundSize: {
                '200%': '200%',
            },
            animation: {
                'gradient-background': 'backgroundShift 10s ease infinite',
            },
            keyframes: {
                backgroundShift: {
                    '0%': { backgroundPosition: '0% 50%' },
                    '50%': { backgroundPosition: '100% 50%' },
                    '100%': { backgroundPosition: '0% 50%' },
                },
            },
        },
    },
    plugins: [forms],
};

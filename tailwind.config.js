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
                customgreen: {
                    50: '#e6f2f2',
                    100: '#cce5e5',
                    200: '#99cbcb',
                    300: '#66b1b1',
                    400: '#339797',
                    500: '#28666e', // bg color
                    600: '#205454',
                    700: '#183f3f',
                    800: '#102b2b',
                    900: '#081616',
                  },
            },
            fontFamily: {
                roboto: ['Roboto', 'sans-serif'],
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

    plugins: [
        require('@tailwindcss/forms'),
        require('tailwind-scrollbar')({ nocompatible: true }) // Add nocompatible mode
    ],

    variants: {
        scrollbar: ['rounded'] // Add variants for scrollbar
    }
};

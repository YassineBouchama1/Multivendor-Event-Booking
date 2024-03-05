import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/views/*',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                mainColorDashboard: '#4880FF',
                mainColorhome: 'green',

                backgroundHome: '#F7F7F7',
                hoverColorDashboard: '#d9e3f8',
                textColorDashboard: "#181c22"
            }
        },
    },

    plugins: [forms],
};

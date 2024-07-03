import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                'title': ['EncodeSans', 'serif'],
                'subtitle': ['CascadiaMonoPL', 'monospace'],
                'paragraph': ['Inter', 'Arial', 'Helvetica', 'sans-serif'],
            },
            colors: {
                'primary-mint': '#5FBB97',
                'primary-gray': '#4A6D7C',
                'primary-text': '#FBFBFB',
                'secondary-text': '#5FBB97',
                'primary-bg': '#000000',
                'secondary-bg': '#2E2532',
                'accent': '#5FBB97',
            }
        },
    }, // added colors here because dynamic factory on categories
    safelist: [
        {
            pattern: /(text|border)-(yellow-300|cyan-400|indigo-500|rose-600|sky-600)/,
        }
    ],

    plugins: [forms, typography],
};

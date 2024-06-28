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
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    }, // added colors here because dynamic factory on categories
    safelist: [
        'red-100', 'red-200', 'red-300',
        'orange-100', 'orange-200', 'orange-300',
        'amber-100', 'amber-200', 'amber-300',
        'yellow-100', 'yellow-200', 'yellow-300',
        'lime-100', 'lime-200', 'lime-300',
        'green-100', 'green-200', 'green-300',
        'emerald-100', 'emerald-200', 'emerald-300',
        'teal-100', 'teal-200', 'teal-300',
        'cyan-100', 'cyan-200', 'cyan-300',
        'blue-100', 'blue-200', 'blue-300',
        'indigo-100', 'indigo-200', 'indigo-300',
        'violet-100', 'violet-200', 'violet-300',
        'purple-100', 'purple-200', 'purple-300',
        'fuchsia-100', 'fuchsia-200', 'fuchsia-300',
        'pink-100', 'pink-200', 'pink-300',
        'rose-100', 'rose-200', 'rose-300'
    ],

    plugins: [forms, typography],
};

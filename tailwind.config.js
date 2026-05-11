import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                'light-pink': '#FBE4E6',
                'dark-pink': '#C75B6E',
                'accent-pink': '#C75B6E',
                'pastel-pink': '#FBE4E6',
                'mulberry': '#C75B6E',
                'brand-gold': '#C75B6E',
                'soft-gold': '#FBE4E6',
                'header-surface': '#FBE4E6',
                'top-bar': '#C75B6E',
                'top-bar-text': '#FFFFFF',
                'top-bar-dark': '#C75B6E',
                'header-bg': '#C75B6E',
                'icon-dark': '#C75B6E',
                'nav-bg': '#C75B6E',
                'jw-primary': '#C75B6E',
                'jw-tertiary': '#FBE4E6',
                'jw-surface': '#FBE4E6',
                'jw-card': '#FFFFFF',
                'jw-border': '#C75B6E',
                'jw-muted': '#FBE4E6',
                'jw-container': '#FBE4E6',
            },
            fontFamily: {
                sans: ['"Playfair Display"', 'serif'],
                heading: ['"Playfair Display"', 'serif'],
                body: ['"Playfair Display"', 'serif'],
                logo: ['"Playfair Display"', 'serif'],
            },
        },
    },

    plugins: [forms],
};

import defaultTheme from 'tailwindcss/defaultTheme';
import colors from 'tailwindcss/colors';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
    ],
    
    daisyui: {
        themes: [
            'light', 'dark', 'cupcake',
        ]
    },
    plugins: [
        require('@tailwindcss/typography'),
        require('daisyui'),
    ],
};

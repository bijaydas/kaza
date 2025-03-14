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
            {
                kaza: {
                    "primary": "#000957",
                    "secondary": "#344CB7",
                    "accent": "#577BC1",
                    "neutral": "#3d4451",
                    "base-100": "#ffffff",
                }
            },
            'light', 'dark', 'cupcake',
        ]
    },
    plugins: [
        require('@tailwindcss/typography'),
        require('daisyui'),
    ],
};

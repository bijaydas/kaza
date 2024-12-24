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
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    daisyui: {
        themes: [
            {
                kaza: {
                    'primary': colors.blue['600'],
                    'secondary': "#f6d860",
                    'accent': "#37cdbe",
                    'neutral': "#3d4451",
                    'base-100': "#ffffff",
                    'error': colors.red['600'],
                }
            }
        ]
    },
    plugins: [
        require('@tailwindcss/typography'),
        require('daisyui'),
    ],
};

const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'gray': {
                    DEFAULT: '#eff3f4',
                    '50': '#f7f9f9',
                    '100': '#b9cad3',
                },
                'blue': {
                    DEFAULT: '#1da1f2'
                },
            },
            width: {
                'container': '600px',
                'container-child': '598px'
            }
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
};

const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            inset: {
                '-1': '-0.25rem',
                '-2': '-0.5rem',
                '-3': '-0.75rem',
                '-4': '-1rem',
                '-5': '-1.25rem',
                '-6': '-1.5rem',
                '-8': '-2rem',
                '-10': '-2.5rem',
                '-12': '-3rem',
                '-16': '-4rem',
                '-20': '-5rem',
                '-24': '-6rem',
                '-32': '-8rem',
                '-40': '-10rem',
                '-48': '-12rem',
                '-56': '-14rem',
                '-64': '-16rem',
            },
            maxHeight: {
                '192': '48rem',
            },
            minWidth: {
                'xs': '20rem',
            },
        },
    },

    variants: {
        opacity: ['responsive', 'hover', 'focus', 'disabled'],
    },

    plugins: [
        require('@tailwindcss/ui'),
    ],
};

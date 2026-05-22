import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
                display: ['"Space Grotesk"', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                charcoal: {
                    deep: '#141414',
                    DEFAULT: '#1A1A1A',
                    card: '#222222',
                    elevated: '#2A2A2A',
                    border: '#333333',
                },
                offwhite: {
                    DEFAULT: '#F0EEE8',
                    muted: '#D8D6D0',
                },
                powder: {
                    DEFAULT: '#A8C5D9',
                    light: '#C2D8E8',
                    dark: '#7E9FB8',
                },
            },
            boxShadow: {
                'focus-powder': '0 0 0 2px rgba(168, 197, 217, 0.4), 0 0 20px rgba(168, 197, 217, 0.12)',
            },
            animation: {
                float: 'float 6s ease-in-out infinite',
            },
            keyframes: {
                float: {
                    '0%, 100%': { transform: 'translateY(0)' },
                    '50%': { transform: 'translateY(-6px)' },
                },
            },
        },
    },

    plugins: [forms],
};

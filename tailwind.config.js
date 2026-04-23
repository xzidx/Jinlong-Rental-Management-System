import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },

            colors: {
                /* PRIMARY */
                'primary-bg': '#ffffff',
                'primary-blue-light': '#3B82F6',
                'primary-blue-dark': '#1E3A8A',
                'primary-blue-hover': '#1D4ED8',
                'primary-black': '#000000',


                /* BASIC */
                white: '#FFFFFF',
                'white-off': '#F9FAFB',
                black: '#1F2937',
                'black-light': '#374151',

                gray: '#9CA3AF',
                'gray-light': '#E5E7EB',
                'gray-lighter': '#F3F4F6',

                /* STATE */
                success: '#10B981',
                warning: '#F59E0B',
                error: '#EF4444',
                info: '#3B82F6',

                /* BACKGROUNDS */
                'bg-white': '#FFFFFF',
                'bg-light': '#F9FAFB',
                'bg-sidebar': '#1E3A8A',
                'bg-header': '#FFFFFF',

                /* TEXT */
                'text-primary': '#1F2937',
                'text-secondary': '#6B7280',
                'text-white': '#FFFFFF',
                'text-blue': '#2563EB',

                /* BORDER */
                'border-color': '#E5E7EB',
            },

            borderRadius: {
                sm: '4px',
                DEFAULT: '8px',
                lg: '12px',
            },

            boxShadow: {
                sm: '0 1px 2px 0 rgb(0 0 0 / 0.05)',
                DEFAULT: '0 1px 3px 0 rgb(0 0 0 / 0.1)',
                md: '0 4px 6px -1px rgb(0 0 0 / 0.1)',
                lg: '0 10px 15px -3px rgb(0 0 0 / 0.1)',
            },
        },
    },

    plugins: [],
};
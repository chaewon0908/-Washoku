/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                'warm-cream': '#f5f1e8',
                'warm-beige': '#e8ddd4',
                'primary': {
                    DEFAULT: '#dc2626',
                    'dark': '#991b1b',
                    'light': '#fee2e2',
                },
            },
            fontFamily: {
                'sans': ['Noto Sans JP', 'sans-serif'],
                'serif': ['Noto Serif JP', 'serif'],
            },
        },
    },
    plugins: [],
}

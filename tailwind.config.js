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
                'sans': ['Playfair Display', 'Georgia', 'serif'], // Main font for everything
                'serif': ['Playfair Display', 'Georgia', 'serif'],
                'display': ['Playfair Display', 'serif'], // Elegant headings
                'japanese': ['Sawarabi Mincho', 'Noto Serif JP', 'serif'], // For Japanese characters only
                'english': ['Playfair Display', 'Georgia', 'serif'], // English text
            },
        },
    },
    plugins: [],
}

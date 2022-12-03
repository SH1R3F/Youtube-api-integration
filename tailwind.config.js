const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
                kenya: "Kenia, cursive",
                roboto: "Roboto Mono, monospace",
                cairo: "Cairo, sans-serif",
            },
            colors: {
                king: {
                    50: "#f0f2f5",
                    100: "#3A8891",
                    200: "#0E5E6F",
                    300: "#F2DEBA",
                    400: "#FFEFD6",
                },
            },
        },
        container: {
            center: true,
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
};

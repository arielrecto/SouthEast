import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    daisyui: {
        themes: [
            {
                mytheme: {
                    primary: "#E3FEF7",

                    secondary: "#77B0AA",

                    accent: "#135D66",

                    neutral: "#003C43",

                    "base-100": "#f5f5f4",

                    info: "#67e8f9",

                    success: "#bef264",

                    warning: "#fcd34d",

                    error: "#f87171",
                },
            },
        ],
    },

    plugins: [forms, require("daisyui")],
};

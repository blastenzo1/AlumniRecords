/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./node_modules/flowbite/**/*.js",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: {
        extend: {
            screens: {
                ssm: "275px",
            },
        },
    },
    plugins: [require("flowbite/plugin")],
};

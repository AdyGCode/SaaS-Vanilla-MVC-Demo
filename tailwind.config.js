/*
 * Filename: tailwind.config.js
 * Location: /
 */

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./src/**/*.{html,js,php}",
        "./App/**/*.{html,js,php}",
        "./public/**/*.{html,js,php}",
        "./*.php",
    ],
    theme: {
        extend: {},
    },
    plugins: [],
}
/** @type {import('tailwindcss').Config} */
export default {
  darkMode: 'false',
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "<path-to-vendor>/solution-forest/filament-tree/resources/**/*.blade.php",
    "./resources/views/landing/*.blade.php",
    "./resources/views/layouts/*.blade.php",
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}


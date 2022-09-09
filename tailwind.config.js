/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [    
    "./index.html",
    "./src/**/*.{vue,js,ts,jsx,tsx}",
            "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/**/*.vue"
  ],
  theme: {
    extend: {},
  },
  plugins: [require("tailwindcss")],
}

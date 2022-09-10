/** @type {import('tailwindcss').Config} */

const defaultTheme = require("tailwindcss/defaultTheme");
module.exports = {
  content: [    
        "./index.html",
        "./src/**/*.{vue,js,ts,jsx,tsx}",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/**/*.vue",
        "./resources/**/**/*.vue"

  ],

  theme: {
    extend: {
        colors: {
            primcolor: "#529B9B",
            "title-primcolor": "#396969",
            "text-primcolor": "#488787",
            "lighter-primcolor": "rgba(82, 155, 155, 0.3)",
            secondcolor: "#2B3238",
            orangeColor: "#D35738",
            yellowColor: "#C6BF10",
            greyColor:"#F4F4F4",
            blueColor: "rgba(82, 155, 155, 0.6)",
            pinkColor: "rgba(232, 185, 185, 0.2)",
            redColor: "#CE1415",
            yellow: "rgba(194, 187, 0, 1)",
            lighterYellow: "rgba(194, 187, 0, 0.1)",
            greenColor: "#3E7373",
            lighterGreenColor: "rgba(62, 115, 115, 0.2)",
        },
        fontFamily: {
            sans: ["Poppins", ...defaultTheme.fontFamily.sans],
        },
    },
},

  plugins: [
    require("tailwindcss"),
   /* require("@tailwindcss/forms"),
    require("@tailwindcss/typography"),*/
],
}

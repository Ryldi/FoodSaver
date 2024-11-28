/** @type {import('tailwindcss').Config} */
export default {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      "./node_modules/flowbite/**/*.js"
    ],
    theme: {
      container: {
        center: true,
        padding: "15px",
      },
      screens: {
        sm: "640px",
        md: "768px",
        lg: "960px",
        xl: "1280px",
      },
      fontFamily: {
        pattaya: ["Pattaya", "sans-serif"],
      },
      extend: {
        colors: {
          primary: "#2F4F4F",
          secondary: "#606060",
          tertiary:"#4A90E2",
          neutral: {
            DEFAULT: "#E3F2FD",
            light: "#E8F5E9",
          },
          accent: {
            DEFAULT: "#4A90E2",
            hover: "#E6AE1D",
          },
          dark: {
            DEFAULT: "#152238",
            hover: "#23395d",
          },
          light: {
            DEFAULT: "#1c1c22",
            hover: "#1c1c22",
          },
        },
      },
    },
    plugins: [
      require('flowbite/plugin')
    ],
  }
  
  
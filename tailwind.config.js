// tailwind.config.js
module.exports = {
  content: [
    "./public/**/*.{html,php}",
    "./app/Views/**/*.{php}"
  ],
  theme: {
    extend: {
      fontFamily: {
        brand: ['"Playfair Display"', 'serif'],
      },
      colors: {
        primary: "#1E40AF",
        secondary: "#F59E0B", // ✨ custom color
      },
    keyframes: {
        fadeInDown: {
          "0%": { opacity: 0, transform: "translateY(-50px)" },
          "100%": { opacity: 1, transform: "translateY(0)" },
        },
        fadeInUp: {
          "0%": { opacity: 0, transform: "translateY(50px)" },
          "100%": { opacity: 1, transform: "translateY(0)" },
        },
        zoomIn: {
          "0%": { opacity: 0, transform: "scale(0.8)" },
          "100%": { opacity: 1, transform: "scale(1)" },
        },
      },
      animation: {
        fadeInDown: "fadeInDown 1.5s ease-out forwards",
        fadeInUp: "fadeInUp 1.5s ease-out forwards",
        zoomIn: "zoomIn 1.2s ease-out forwards",
      },
    },
  },
  plugins: [],
}
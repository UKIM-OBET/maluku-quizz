/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./public/**/*.html",
  ],
  theme: {
    extend: {
      colors: {
        'maluku-primary': '#0B6B63',
        'maluku-light': '#EBF5F0',
        'maluku-lighter': '#D4E8E3',
        'maluku-lightest': '#B8D8CF',
      },
      fontFamily: {
        sans: ['Segoe UI', 'Tahoma', 'Geneva', 'Verdana', 'sans-serif'],
      },
      backgroundImage: {
        'maluku-pattern': `url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" width="200" height="200"><defs><pattern id="m" x="0" y="0" width="200" height="200" patternUnits="userSpaceOnUse"><rect width="200" height="200" fill="transparent"/><g opacity="0.08" stroke="%230B6B63" stroke-width="1" fill="none"><polygon points="50,20 100,80 0,80"/><polygon points="150,20 200,80 100,80"/><polygon points="50,120 100,180 0,180"/><polygon points="150,120 200,180 100,180"/></g><g opacity="0.07" fill="none" stroke="%230B6B63" stroke-width="0.8"><circle cx="30" cy="30" r="15"/><circle cx="30" cy="30" r="10"/><circle cx="30" cy="30" r="5"/><circle cx="170" cy="30" r="15"/><circle cx="170" cy="30" r="10"/><circle cx="170" cy="30" r="5"/><circle cx="30" cy="170" r="15"/><circle cx="30" cy="170" r="10"/><circle cx="30" cy="170" r="5"/><circle cx="170" cy="170" r="15"/><circle cx="170" cy="170" r="10"/><circle cx="170" cy="170" r="5"/><circle cx="100" cy="100" r="20"/><circle cx="100" cy="100" r="13"/><circle cx="100" cy="100" r="6"/></g><g opacity="0.06" fill="%230B6B63"><polygon points="100,40 110,65 136,65 115,80 125,105 100,90 75,105 85,80 64,65 90,65"/></g><g opacity="0.05" stroke="%230B6B63" stroke-width="0.5"><line x1="0" y1="50" x2="200" y2="50"/><line x1="0" y1="100" x2="200" y2="100"/><line x1="0" y1="150" x2="200" y2="150"/></line><line x1="50" y1="0" x2="50" y2="200"/><line x1="100" y1="0" x2="100" y2="200"/><line x1="150" y1="0" x2="150" y2="200"/></g></pattern></defs><rect width="200" height="200" fill="url(%23m)"/></svg>')`,
      },
    },
  },
  plugins: [],
}

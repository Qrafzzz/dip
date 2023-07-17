/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
  ],
  theme: {
    extend: {

        screens:{

        },
        colors:{
            ecece: '#ECECEC',
            bgfil: '#6E66DA',
            bgblu: '#669E9F',
        },
        backgroundColor:{

        },
    },
  },
  plugins: [],
}


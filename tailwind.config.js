/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
      './resources/views/**/*.blade.php',
      './resources/js/**/*.js',
      './resources/js/**/*.vue',
    ],
    theme: {
      extend: {
        colors: {
          ijotua: '#1d4ed8',
          ijomuda: '#f59e0b',
          accent: '#10b981',
          background: '#f3f4f6',
          text: '#111827',
        },
      },
    },
    plugins: [],
  }
  
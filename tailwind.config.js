/** @type {import('tailwindcss').Config} */

function withOpacity(colorNane) {
  return ({ opacityValue }) => {
    if (opacityValue !== undefined) {
      return `rgba(var(${colorNane}), ${opacityValue})`
    }
    return `rgb(var(${colorNane}))`
  }
}

export default {
  content: [
    "./index.html",
    "./src/**/*.{vue,js,ts,jsx,tsx}",
  ],
  theme: {
    extend: {
      
      colors: {
        brand: {
          light: 'var(--cl-brand-light)',
          DEFAULT: withOpacity('--cl-brand'),
        },
        headline: {
          DEFAULT: withOpacity('--cl-headline'),
          dark: 'var(--cl-headline-dark)',
        },
        primary: {
          light: 'var(--cl-base-light)',
          DEFAULT: 'var(--cl-base)',
        },
        wt: {
          DEFAULT: withOpacity('--cl-brand-white'),
        }
      },

      fontFamily: {
        primary: "Poppins, sans-serif",
        oxygen: "Oxygen, sans-serif",
        icon: "icon"
      },

      container: {
        center: true,
        padding: {
          DEFAULT: '1rem',
          'lg': '1.5rem',
          '2xl': '3rem'
        }
      },

      keyframes: {
        contact: {
          '0%': { opacity: 0, transform: 'scale(0.9)' },
          '100%': { opacity: 1, transform: 'scale(1)' },
        }
      },
      keyframes: {
        header: {
          '0%': { opacity: 0, padding: '32px' },
          '100%': { opacity: 1, padding: '16px' },
        },
        headerOut: {
          '0%': { opacity: 1, padding: '16px' },
          '100%': { opacity: 0, padding: '32px' },
        }
      },
      transitionProperty: {
        'height': 'height',
        'spacing': 'padding',
      }
    },
  },


  plugins: [],
}


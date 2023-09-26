const theme = require("./theme.json");
const tailpress = require("@jeffreyvr/tailwindcss-tailpress");
const defaultTheme = require("tailwindcss/defaultTheme");
const typography = require("@tailwindcss/typography");

/** @type {import('tailwindcss').Config} */
module.exports = {
	content: [
		"./*.php",
		"./**/*.php",
		"./resources/css/*.css",
		"./resources/js/*.js",
		"./safelist.txt",
	],
	safelist: ["col-span-4", "lg:col-span-2"],
	theme: {
		container: {
			padding: {
				DEFAULT: "1rem",
				sm: "2rem",
				lg: "0rem",
			},
		},
		extend: {
			fontFamily: {
				sans: ["Poppins", ...defaultTheme.fontFamily.sans],
				display: ["Quicksand", ...defaultTheme.fontFamily.sans],
			},
			colors: tailpress.colorMapper(
				tailpress.theme("settings.color.palette", theme)
			),
			fontSize: tailpress.fontSizeMapper(
				tailpress.theme("settings.typography.fontSizes", theme)
			),
		},
		colors: {
			transparent: "transparent",
			current: "currentColor",
			white: {
				DEFAULT: "#FFFFFF",
			},
			black: {
				DEFAULT: "#000000",
			},
			dblue: {
				DEFAULT: "#244480",
			},
			lblue: {
				DEFAULT: "#466289",
			},
			midblue: {
				DEFAULT: "#3a557c",
			},
			buttonblue: {
				DEFAULT: "#253957",
			},
			orange: {
				DEFAULT: "#da7126",
			},
			lgrey: {
				DEFAULT: "#83969f",
			}
		},
	},
	plugins: [tailpress.tailwind, typography],
};

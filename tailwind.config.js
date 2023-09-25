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
		screens: {
			xs: "480px",
			sm: "600px",
			md: "782px",
			lg: tailpress.theme("settings.layout.contentSize", theme),
			xl: tailpress.theme("settings.layout.wideSize", theme),
			"2xl": "1440px",
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
			accent: {
				DEFAULT: "#F7CA2E",
			},
			accentdark: {
				DEFAULT: "#E5BB29",
			},
			dblue: {
				DEFAULT: "#2C3539",
			},
			light: {
				DEFAULT: "#F8F8F8",
			},
			lightalt: {
				DEFAULT: "#F0F0F0",
			},
		},
	},
	plugins: [tailpress.tailwind, typography],
};

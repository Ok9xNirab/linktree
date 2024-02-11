/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./app/Livewire/Components/AppearanceForm.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./vendor/masmerise/livewire-toaster/resources/views/*.blade.php",
    ],
    theme: {
        extend: {},
    },
    plugins: [],
};

import preset from '../../../../vendor/filament/filament/tailwind.config.preset'

export default {
    presets: [preset],
    darkMode: 'class', // ⬅️ Ini penting untuk manual toggle 🌙/☀
    content: [
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
        './resources/**/*.blade.php', // untuk bagian umum (opsional)
        './resources/js/**/*.js', // jika pakai script toggle manual
    ],
    theme: {
        extend: {
            colors: {
                primary: {
                    DEFAULT: '#2e7d32', // Hijau teknik utama
                    light: '#60ad5e',
                    dark: '#005005',
                },
                teknik: {
                    background: '#f9fafb',
                    darkbg: '#121212',
                    textlight: '#e5e5e5',
                    textdark: '#1f2937',
                },
            },
            fontFamily: {
                sans: ['Inter', 'ui-sans-serif', 'system-ui'],
            },
        },
    },
    plugins: [],
}

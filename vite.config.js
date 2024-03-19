import { defineConfig } from 'vite';
import path from 'path';
import fs from 'fs';
import compressionPlugin from 'vite-plugin-compression';
import viteImagemin from 'vite-plugin-imagemin';

// Base entry points
const entryPoints = {
    app: path.resolve(__dirname, './src/app.js'), // Main JavaScript entry point
    global_style: path.resolve(__dirname, './src/app.scss'), // Main CSS entry point
};

// Directory containing block scripts
const blocksDir = path.resolve(__dirname, 'src', 'blocks-assets', 'scripts');

// Dynamically add block assets to entry points
fs.readdirSync(blocksDir).forEach(file => {
    const filePath = path.join(blocksDir, file);
    const fileInfo = path.parse(filePath);
    if (fileInfo.ext === '.js') {
        entryPoints[fileInfo.name] = filePath;
    }
});

export default defineConfig({
    base: '/wp-content/themes/wp-starter-blocks/dist/',
    plugins: [
        compressionPlugin({
            ext: '.gz', // GZIP
        }),
        compressionPlugin({
            algorithm: 'brotliCompress',
            ext: '.br',
        }),

        viteImagemin({
            gifsicle: {
                optimizationLevel: 7,
                interlaced: false,
            },
            optipng: {
                optimizationLevel: 7,
            },
            mozjpeg: {
                quality: 80,
            },
            pngquant: {
                quality: [0.8, 0.9],
                speed: 4,
            },
            svgo: {
                plugins: [
                    {
                        name: 'removeViewBox',
                    },
                    {
                        name: 'removeEmptyAttrs',
                        active: false,
                    },
                ],
            },
        }),
    ],
    build: {
        manifest: true,
        outDir: 'dist',
        rollupOptions: {
            input: entryPoints,
        },
    },
    resolve: {
        alias: {
            '@': path.resolve(__dirname, './src'),
        },
    },
});

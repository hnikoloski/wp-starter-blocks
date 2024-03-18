const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const TerserJSPlugin = require('terser-webpack-plugin');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const CompressionPlugin = require('compression-webpack-plugin');
const fs = require('fs');


// Directory containing block scripts
const blocksDir = path.join(__dirname, 'src', 'blocks-assets', 'scripts');

// Dynamically generate entries
const generateEntries = () => {
    const entries = {
        app: './src/app.js', // Main app entry
        global_style: './src/app.scss', // Global styles entry
    };

    // Read files in blocks directory
    fs.readdirSync(blocksDir).forEach(file => {
        // Assuming the file naming convention matches the entry name
        const name = path.parse(file).name;
        const ext = path.parse(file).ext;
        // Include only JavaScript files
        if (ext === '.js') {
            entries[name] = path.join(blocksDir, file);
        }
    });

    return entries;
};
module.exports = {
    entry: generateEntries(),
    output: {
        filename: '[name].js',
        path: path.resolve(__dirname, 'dist'),
        clean: true,
    },
    optimization: {
        moduleIds: 'deterministic',
        runtimeChunk: 'single',
        splitChunks: {
            chunks: 'all',
            maxInitialRequests: Infinity,
            minSize: 20000,
            cacheGroups: {
                vendor: {
                    test: /[\\/]node_modules[\\/]/,
                    name(module) {
                        const packageName = module.context.match(/[\\/]node_modules[\\/](.*?)([\\/]|$)/)[1];
                        return `npm.${packageName.replace('@', '')}`;
                    },
                },
            },
        },
        minimize: true,
        minimizer: [new TerserJSPlugin({}), new CssMinimizerPlugin()],
    },
    plugins: [
        new CleanWebpackPlugin(),
        new MiniCssExtractPlugin({
            filename: '[name].css',
        }),
        new CompressionPlugin({
            algorithm: 'gzip',
            test: /\.(js|css|html|svg)$/,
            threshold: 10240,
            minRatio: 0.8,
        }),
        // Brotli compression plugin setup can be added similarly if needed
    ],
    module: {
        rules: [
            {
                test: /\.scss$/,
                use: [
                    MiniCssExtractPlugin.loader,
                    'css-loader',
                    'sass-loader',
                ],
            },
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['@babel/preset-env'],
                    },
                },
            },
            // Add loaders for other file types as needed
        ],
    },
    devtool: 'source-map',
    devServer: {
        contentBase: path.join(__dirname, 'dist'),
        compress: true,
        port: 9000,
        hot: true,
        inline: true,
        open: true,
    },
};

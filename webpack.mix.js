let mix = require('laravel-mix');
const path = require('path');
const cleanWebpackPlugin = require('clean-webpack-plugin');

mix.webpackConfig({
    output: {
        publicPath: "/",
        chunkFilename: 'js/[name].[hash].chunk.js'
    },
    plugins: [
        new cleanWebpackPlugin(['js/*'], {
            root: path.resolve(__dirname, './public/'),
            dry: false,
            verbose: true,
        }),
    ]
});

// 停用通知
mix.disableNotifications();

mix.js('resources/assets/js/app.js', 'public/js')
   // .sass('resources/assets/sass/app.scss', 'public/css')
    .version();

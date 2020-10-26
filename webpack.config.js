const webpack = require('webpack');
const path = require(`path`);
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
// const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');

module.exports = {
    entry: `./src/js/index.js`,
    output: {
        path: path.resolve(__dirname, `dist`),
        filename: `bundle.js`
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /(node_modules)/,
                use: {
                    loader: `babel-loader`,
                    options: {
                        presets: [`@babel/preset-env`]
                    }
                }
            },
            {
                test: /\.scss$/,
                use: [
                    {
                        loader: MiniCssExtractPlugin.loader
                    },
                    {
                        loader: `css-loader`,
                    },
                    {
                        loader: `postcss-loader`
                    },
                    {
                        loader: `sass-loader`,
                        options: {
                            implementation: require(`sass`)
                        }
                    }
                ]
            },
            {
                test: /\.css$/,
                use: [
                    {
                        loader: MiniCssExtractPlugin.loader
                    },
                    {
                        loader: `css-loader`,
                    },
                    {
                        loader: `postcss-loader`
                    }
                ]
            },
            {
                test: /\.(png|jpe?g|gif|svg)$/,
                use: [
                    {
                        loader: "file-loader",
                        options: {
                            name: '[name].[ext]',
                            outputPath: 'images/',
                        }
                    }
                ]
            },
            {
                test: /\.(woff(2)?|ttf|eot)(\?v=\d+\.\d+\.\d+)?$/,
                use: [
                  {
                    loader: 'file-loader',
                    options: {
                      name: '[name].[ext]',
                      outputPath: 'fonts/'
                    }
                  }
                ]
              }
        ]
    },
    plugins: [
        new CleanWebpackPlugin({
            cleanStaleWebpackAssets: false,
        }),
        new MiniCssExtractPlugin({
            filename: "bundle.css"
        }),
        // new BrowserSyncPlugin({
        //     proxy: 'http://host.local/', // replace with your local address
        //     files: './**/*.php'
        // }),
        new webpack.ProvidePlugin({
            $: 'jquery',
            jQuery: 'jquery',
            'window.jQuery': 'jquery'
        })
    ],
    mode: `development`
};
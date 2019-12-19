const path = require('path');
const UglifyJsPlugin = require("uglifyjs-webpack-plugin");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const OptimizeCSSAssetsPlugin = require("optimize-css-assets-webpack-plugin");

const commonConfig = {
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: [/node_modules/],
        use: [
          {
            loader: 'babel-loader',
            options: { presets: ['latest'] }
          }
        ]
      },
      {
        test: /\.less$/,
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
          'less-loader'
        ]
      },
      {
        test: /\.s[ac]ss$/i,
        use: [
          MiniCssExtractPlugin.loader,
          // Creates `style` nodes from JS strings
          //'style-loader',
          // Translates CSS into CommonJS
          'css-loader',
          // Compiles Sass to CSS
          'sass-loader',
        ],
      },
    ]
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: "[name].css",
      allChunks: true
    })
  ],
  optimization: {
    minimizer: [
      new UglifyJsPlugin({
        cache: true,
        parallel: true,
        sourceMap: true
      }),
      new OptimizeCSSAssetsPlugin({})
    ]
  },
  devtool: 'source-map'
}

module.exports = [
  {
    ...commonConfig,
    entry: {
      app: path.resolve(__dirname, './frontend/web/js/app.js'),
      style: path.resolve(__dirname, './frontend/web/css/style.scss'),
    },
    output: {
      filename: '[name].js',
      path: path.resolve(__dirname, './frontend/web/bundle'),
    },
  },
  {
    ...commonConfig,
    entry: {
      app: path.resolve(__dirname, './backend/web/js/app.js'),
      style: path.resolve(__dirname, './backend/web/css/style.scss'),
    },
    output: {
      filename: '[name].js',
      path: path.resolve(__dirname, './backend/web/bundle'),
    },
  },
]

const path = require('path')
const glob = require('glob')
const nodeModulesPath = path.resolve(__dirname, './node_modules')
const sassIncludePaths = glob.sync(nodeModulesPath)
const webpack = require('webpack')
const MiniCssExtractPlugin = require("mini-css-extract-plugin")
const ManifestPlugin = require('webpack-manifest-plugin')
const _compact = require('lodash/compact')

const cloud9Domain = '.amazonaws.com'
const ddeeDomain = '.demar.ee'
const ddotmeDomain = '.demaree.me'
const bnlDomain = '.bitsandletters.club'
let allowedHosts = ['localhost', '0.0.0.0', cloud9Domain, ddeeDomain, ddotmeDomain, bnlDomain]

const context = path.resolve(__dirname, './.')
const entry = {
  'main': [
    './assets/index.js',
    './assets/style.scss',
  ]
}

const staticFileMatch = /\.(png|jpe?g|gif|eot|ttf|woff2?)$/

module.exports = (env, argv) => {

  // Will return true if -d or --mode=development are passed
  const dev = (argv.mode === 'development')
  
  // Look for both the hot and dev flags
  const hot = (dev && argv.hot)

  const mode = (dev ? "development" : "production")
  const publicPath = (hot ? '/build/' : '')

  let plugins = []

  const extractPlugin = new MiniCssExtractPlugin({
    filename: "[name].[hash:8].css",
    chunkFilename: "[id].css"
  })

  if(hot) {
    // Add HMR plugin only in hot dev mode
    plugins.push( new webpack.HotModuleReplacementPlugin() )
  } else {
    // Extract CSS and build manifest for static filesystem use
    plugins.push( extractPlugin )
    plugins.push( new ManifestPlugin() )
  }

  return {
    mode,
    context,
    entry,
    plugins,

    output: {
      path: path.resolve(__dirname, 'dist'),
      publicPath,
      filename: (hot ? '[name].js' : '[name].[hash:8].js')
    },


    module: {
      rules: [{
        oneOf: [
          // Files smaller than 10KB should be embedded inline as data URIs
          {
            test: staticFileMatch,
            loader: 'url-loader',
            options: {
              limit: 10000,
              name: 'static/media/[name].[hash:8].[ext]',
            },
          },

          // Files larger than 10KB should be referenced as files
          {
            test: staticFileMatch,
            use: [
              {
                loader: 'file-loader',
                options: {
                  useRelativePath: true
                }
              }
            ]
          },

          {
            test: /\.s?css$/i,
            use: _compact([
              (!hot && MiniCssExtractPlugin.loader),
              (hot && {
                loader: 'style-loader',
                options: { hmr: true }
              }),
              { 
                loader: 'css-loader',
                options: { modules: false }
              },
              'resolve-url-loader',
              { 
                loader: 'sass-loader', 
                options: { 
                  sourceMap: true,
                  // includePaths: sassIncludePaths,
                  implementation: require('sass')
                }
              }
            ])
          }
        ]
      }]
    },

    watchOptions: {
      aggregateTimeout: 300,
      poll: 1000
    },

    devtool: 'inline-source-map',

    devServer: {
      allowedHosts,
      port: 8080,
      contentBase: './dist',
      publicPath: '/build/',
      hot: true,
      proxy: {
        '/': {
          target: "http://web",
          secure: false,
          headers: {
            'X-ProxiedBy-Webpack': true,
          },
        },
      },
    }
  }
}
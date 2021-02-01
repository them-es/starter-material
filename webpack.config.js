const path = require( 'path' ),
	// Modify "dev_url" to actual localhost url
	dev_url = 'http://localhost/starter-material';

// https://github.com/material-components/material-components-web/blob/master/docs/getting-started.md

module.exports = [ {
	context: path.resolve( __dirname, 'assets' ),
	entry: [ './main.scss', './main.js' ],
	output: {
		path: path.resolve( __dirname, 'assets/dist' ),
		filename: './main.bundle.js',
	},
	devtool: 'inline-source-map',
	watch: true,
	devServer: {
		proxy: {
			'*': {
				target: dev_url,
				changeOrigin: true,
			}
		}
	},
	module: {
		rules: [
			{
				test: /\.scss$/,
				use: [
					{
						loader: 'file-loader',
						options: {
							name: 'main.css',
						},
					},
					{ loader: 'extract-loader' },
					{ loader: 'css-loader' },
					{
						loader: 'postcss-loader',
						options: {
							postcssOptions: {
								plugins: [
									require( 'autoprefixer' )
								]
							},
						}
					},
					{
						loader: 'sass-loader',
						options: {
							implementation: require( 'dart-sass' ), // Prefer Dart Sass
							webpackImporter: false, // See https://github.com/webpack-contrib/sass-loader/issues/804
							sassOptions: {
								includePaths: [ './node_modules' ],
							},
						},
					}
				]
			},
			{
				test: /\.js$/,
				loader: 'babel-loader',
				options: {
					presets: [ '@babel/preset-env' ],
				},
			}
		]
	},
} ];

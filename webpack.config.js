const path = require( 'path' );
const autoprefixer = require( 'autoprefixer' );

// https://github.com/material-components/material-components-web/blob/master/docs/getting-started.md

module.exports = [{
	context: path.resolve( __dirname, 'assets' ),
	entry: [ './main.scss', './main.js' ],
	output: {
		filename: './main.bundle.js',
		path: path.resolve( __dirname, 'assets/dist' )
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
							plugins: () => [ autoprefixer() ]
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
				query: {
					presets: [ '@babel/preset-env' ],
				},
			}
		]
	},
	watch: true,
} ];

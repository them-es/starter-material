const path = require( 'path' ),
	// webpack = require( 'webpack' ), // Uncomment if jQuery support is needed
	localHost = 'http://localhost/starter-material'; // Localhost URL (webpack-dev-server)

// https://github.com/material-components/material-components-web/blob/master/docs/getting-started.md

module.exports = [ {
	mode: 'production',
	context: path.resolve( __dirname, 'assets' ),
	entry: [
		'./main.scss',
		'./main.js',
	],
	output: {
		path: path.resolve( __dirname, 'assets/dist' ),
		filename: '[name].bundle.js',
	},
	watch: true,
	module: {
		rules: [
			{
				test: /\.scss$/,
				use: [
					{
						loader: 'file-loader',
						options: {
							name: '[name].css',
						},
					},
					{
						loader: 'extract-loader',
					},
					{
						loader: 'css-loader',
						options: {
							url: false,
						},
					},
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
							sassOptions: {
								includePaths: [ 'node_modules', 'node_modules/@material/*' ],
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
			},
			{
				test: /\.(png|svg|jpg|jpeg|gif)$/i,
				type: 'asset/resource',
			},
			{
				test: /\.(woff2?|eot|ttf|otf)$/i,
				type: 'asset/resource',
			},
		]
	},
	// Uncomment if jQuery support is needed
	/*externals: {
		jquery: 'jQuery'
	},
	plugins: [
		new webpack.ProvidePlugin( {
			$: 'jquery',
			jQuery: 'jquery',
			'window.jQuery': 'jquery',
		} ),
	],*/
} ];

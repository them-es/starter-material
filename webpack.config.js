const path = require( 'path' );
const webpack = require( 'webpack' );

module.exports = {
	context: path.resolve( __dirname, 'assets' ),
	entry: {
		main: [ './main.js' ],
	},
	output: {
		path: path.resolve( __dirname, 'assets/js' ),
		filename: '[name].bundle.js',
	},
	devtool: 'source-map',
	watch: true,
};
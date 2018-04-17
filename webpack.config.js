var webpack = require('webpack');
var WebpackOnBuildPlugin = require('on-build-webpack');
var exec = require('child_process').exec;

module.exports = {
    plugins: [
      new webpack.ProvidePlugin({
        jquery: "jquery",
        jQuery: "jquery",
        $: "jquery"
      }),

    ],

    resolve : {
        extensions: ['.ts', '.js', '.css'],

        alias: {
            "jquery": __dirname + "/js/lib/jquery-3.0.0.min.js",
            "$": __dirname + "/js/lib/jquery-3.0.0.min.js",
            "$.bbq": __dirname + "/js/lib/jquery.ba-bbq.js",
        }
    },

    entry: {
        'visualize': "./js/visualize.ts",
        'opt-live': "./js/opt-live.ts",
        'iframe-embed': "./js/iframe-embed.ts",
        'index': "./js/index.ts",
        'composingprograms': "./js/composingprograms.ts",
        'csc108h': "./js/csc108h.ts",
        'pytutor-embed': "./js/pytutor-embed.ts",
    },

    output: {
        path: __dirname + "/build/",
        filename: "[name].bundle.js",
        sourceMapFilename: "[file].map",
    },

    module: {
        loaders: [
            { test: /\.css$/, loader: "style-loader!css-loader" }, // CSS
            { test: /\.(png|jpg)$/, loader: 'url-loader' }, // images
            { test: /\.ts$/, loader: 'ts-loader' } // TypeScript
        ]
    },

};

const projectConfig = require("../../config");
const path = require("path");
const webpack = require("webpack");
const CopyWebpackPlugin = require("copy-webpack-plugin");

const srcDir = path.join(__dirname, "src");
const buildDir = path.join(projectConfig.root, "wp-content/themes/scc-child");

const config = {
  context: srcDir,

  entry: {
    main: ["./index.js"]
  },

  output: {
    path: path.join(buildDir, "./bundles"),
    publicPath: "",
    filename: "bundle.js"
  },

  module: {},

  plugins: [
    new CopyWebpackPlugin([
      { from: path.join(srcDir, "style.css"), to: buildDir },
      { from: path.join(srcDir, "screenshot.png"), to: buildDir },
      { from: path.join(srcDir, "**/*.php"), to: buildDir }
    ])
  ],

  devtool: "source-map"
};

module.exports = config;

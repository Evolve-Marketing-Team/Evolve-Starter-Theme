# Evolve Starter Theme

The Evolve Starter theme is designed to quickly start custom themes. This theme has some prebuilt ACF blocks that you can modify and adjust admin fields. This theme uses Foundation Framework, Hamburgers, and Slick. 

## Install
Clone this repo into your new client project. Once the repo is cloned, CD into the theme within the project and remove Git in order to prep the project into a new Git repo for the client project. 

`rm -rf .git`

To install all the dependencies, run npm in theme directory. 

`npm start`


## Theme Options

There are a few optional settings available in the `Appearance > Theme Options` panel added to WP-Admin. Each setting maps to a [theme support](https://developer.wordpress.org/block-editor/developers/themes/theme-support/) option offered by Gutenberg: 

- [**Wide alignment**](https://developer.wordpress.org/block-editor/developers/themes/theme-support/#wide-alignment). By default, wide and full alignments are active in the theme. This setting provides you the option to turn them off. 
- [**Color palette**](https://developer.wordpress.org/block-editor/developers/themes/theme-support/#block-color-palettes). The theme provides a limited custom color palette by default. This can be toggled off if you'd like to test the default Gutenberg colors. 
- [**Dark background**](https://developer.wordpress.org/block-editor/developers/themes/theme-support/#dark-backgrounds). Gutenberg provides some alternate UI colors, optimized for themes that use a dark background color. Turning this on will allow you to test those by enabling a dark mode of the theme. 
- [**Editor Styles**](https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/#editor-styles). The block editor supports the theme’s editor styles, however it works a little differently than in the classic editor. This also allows the block editor to leverage your editor style in block variation previews.
- [**Block Styles**](https://developer.wordpress.org/block-editor/developers/themes/theme-support/#default-block-styles). This option allows you to opt-in or out of having Gutenberg provide some structural CSS for certain blocks on the front end.
- [**Responsive embedded content**](https://developer.wordpress.org/block-editor/developers/themes/theme-support/#responsive-embedded-content). When this is active, embed blocks will automatically reflect the aspect ratio of content that is embedded in an iFrame.

## Special Notes
While working with Local and pushing/pulling updates to dev environment, please ensure you set .wpe-push-ignore and .wpe-pull-ignore to ignore the themes /node_modules folder. 

## ACF Blocks
File Location: */inc/acf-custom-blocks.php*
This starter theme is ready to build ACF Blocks and process SCSS and JS files using Gulp. Follow the current folder structure for each block with their PHP and SCSS files. Gulp is ready to process any SCSS and JS files within a custom blocks folder. 
- **Custom Block Setup:** Block setup for ACF backend.
- **Enqueue CSS and JS Assets:** Ensure you follow the current setup to enqueue assets so the CSS and JS will load on front and back-end. 

## ACF Functions
File location: */inc/acf-functions.php*
This file has some functions to dynamically load Gutenberg color palette and the base setup to add an Options admin area for Global theme options. 

## MCE Functions
File location: */inc/mce-functions.php*
This file includes base setup to add custom style formats within the MCE editor/Classic Editor. You will also need to add the color palette from Theme Options within here as well for consitency. 

## Template Functions
This theme has frequently used functions that are typically used for every project. When adding more functions required for the theme, please add them within */inc/template-functions.php* instead of the *functions.php* file. 

## Template Tags
File location: */inc/template-tags.php*
The template tags has some functions that will generate markup and meta that's mainly used for Posts. 

## Block Styles
File location: */src/js/editor/editor.js*
Custom block styles should be registered within *editor.js*. Examples of usage are custom style lists, button style variations, or heading variations. Please read [**Block Styles in Gutenberg**](https://www.billerickson.net/block-styles-in-gutenberg/) for more information, especially pertaining to adding Default Style option. 

## Custom Login
File locations: */inc/wp-custom-login.php*, */scss/wplogin.scss*
This theme has support for adding a custom login screen for WP Admin. The SCSS file doesn't run with default `npm start` default task. You'll have to manually run `gulp wplogin-style` to build CSS file. 
## Font Loader
There is a custom function within *functions.php* that will preload and load web fonts from Adobe and Google starting on line 106. 

## Contributing
This will be an on-going development project where features will conintually be added. Please feel free to make pull requests or create your own feature branch. 

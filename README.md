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

## Contributing
This will be an on-going development project where features will conintually be added. Please feel free to make pull requests or create your own feature branch. 

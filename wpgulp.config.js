/**
 * WPGulp Configuration File
 *
 * 1. Edit the variables as per your project requirements.
 * 2. In paths you can add <<glob or array of globs>>.
 *
 * @package WPGulp
 */

// Project options.

// Local project URL of your already running WordPress site.
// > Could be something like "wpgulp.local" or "localhost"
// > depending upon your local WordPress setup.
const projectURL = 'https://evolve-starter.local';

// Theme/Plugin URL. Leave it like it is; since our gulpfile.js lives in the root folder.
const productURL = './';
const browserAutoOpen = false;
const injectChanges = true;

// >>>>> Style options.
// Path to main .scss file.
const styleSRC = './src/scss/main.scss';

// Path to Blocks Scss
const styleBlocksSRC = './template-parts/blocks/**/*.scss'

// Path to place the compiled CSS file. Default set to root folder.
const styleDestination = './assets/css';

// Path to place the compiled ACF Blocks CSS file. Default set to root folder.
const styleBlocksDest = './template-parts/blocks/';

// Available options → 'compact' or 'compressed' or 'nested' or 'expanded'
const outputStyle = 'compressed';
const errLogToConsole = true;
const precision = 10;

// JS Vendor options.

// Path to JS vendor folder.
const jsVendorSRC = './src/js/vendor/*.js';

// Path to place the compiled JS vendors file.
const jsVendorDestination = './assets/js/';

// Compiled JS vendors file name. Default set to vendors i.e. vendors.js.
const jsVendorFile = 'vendor';

// JS Custom options.

// Path to JS custom scripts folder.
const jsCustomSRC = './src/js/custom/*.js';

// Path to place the compiled JS custom scripts file.
const jsCustomDestination = './assets/js/';

// Compiled JS custom file name. Default set to custom i.e. custom.js.
const jsCustomFile = 'custom';

// JS Editor options.

// Path to JS editor scripts folder.
const jsEditorSRC = './src/js/editor/*.js';

// Path to place the compiled JS custom scripts file.
const jsEditorDestination = './assets/js/';

// Compiled JS custom file name. Default set to custom i.e. custom.js.
const jsEditorFile = 'editor';

// JS Blocks options.

// Path to JS custom scripts folder.
const jsBlocksSRC = './template-parts/blocks/**/*.js';

const jsBlocksSRCignore = '!./template-parts/blocks/**/*.min.js';

// Path to place the compiled JS custom scripts file.
const jsBlocksDestination = './template-parts/blocks/';

// Compiled JS custom file name. Default set to custom i.e. custom.js.
const jsBlocksFile = 'block';

// Images options.

// Source folder of images which should be optimized and watched.
// > You can also specify types e.g. raw/**.{png,jpg,gif} in the glob.
const imgSRC = './src/img/**/*';

// Destination folder of optimized images.
// > Must be different from the imagesSRC folder.
const imgDST = './assets/img/';

// >>>>> Watch files paths.
// Path to all *.scss files inside css folder and inside them.
const watchStyles = './src/scss/**/*.scss';

const watchBlockStyles = './template-parts/blocks/**/*.scss';

// Path to all vendor JS files.
const watchJsVendor = './src/js/vendor/*.js';

// Path to all custom JS files.
const watchJsCustom = './src/js/custom/*.js';

// Path to all editor JS files.
const watchJsEditor = './src/js/editor/*.js';

// Path to Block JS files
const watchJsBlocks = './template-parts/blocks/**/*.js';

// Path to Block JS files to ignore
const watchJsBlocksIgnore = '!./template-parts/blocks/**/*.min.js';


// Path to all PHP files.
const watchPhp = './**/*.php';

// >>>>> Zip file config.
// Must have.zip at the end.
const zipName = 'file.zip';

// Must be a folder outside of the zip folder.
const zipDestination = './../'; // Default: Parent folder.
const zipIncludeGlob = ['./**/*']; // Default: Include all files/folders in current directory.

// Default ignored files and folders for the zip file.
const zipIgnoreGlob = [
	'!./{node_modules,node_modules/**/*}',
	'!./.git',
	'!./.svn',
	'!./gulpfile.babel.js',
	'!./wpgulp.config.js',
	'!./.eslintrc.js',
	'!./.eslintignore',
	'!./.editorconfig',
	'!./phpcs.xml.dist',
	'!./vscode',
	'!./package.json',
	'!./package-lock.json',
	'!./assets/css/**/*',
	'!./assets/css',
	'!./assets/img/raw/**/*',
	'!./assets/img/raw',
	`!${imgSRC}`,
	`!${styleSRC}`,
	`!${jsCustomSRC}`,
	`!${jsVendorSRC}`
];

// >>>>> Translation options.
// Your text domain here.
const textDomain = 'evolve_starter';

// Name of the translation file.
const translationFile = 'evolve_starter.pot';

// Where to save the translation files.
const translationDestination = './languages';

// Package name.
const packageName = 'evolve_starter';

// Where can users report bugs.
const bugReport = 'https://www.evolvemarketingteam.com/contact-us/';

// Last translator Email ID.
const lastTranslator = 'Alex Franco - Evolve Marketing <alexf@evolvemarketingteam.com>';

// Team's Email ID.
const team = 'Alex Franco - Evolve Marketing <alexf@evolvemarketingteam.com>';

// Browsers you care about for auto-prefixing. Browserlist https://github.com/ai/browserslist
// The following list is set as per WordPress requirements. Though; Feel free to change.
const BROWSERS_LIST = ['> 1%', 'last 2 version', 'not ie', 'not ie_mob'];

// Export.
module.exports = {
	projectURL,
	productURL,
	browserAutoOpen,
	injectChanges,
	styleSRC,
	styleBlocksSRC,
	styleDestination,
	styleBlocksDest,
	outputStyle,
	errLogToConsole,
	precision,
	jsVendorSRC,
	jsVendorDestination,
	jsVendorFile,
	jsCustomSRC,
	jsCustomDestination,
	jsCustomFile,
	jsEditorSRC,
	jsEditorDestination,
	jsEditorFile,
	jsBlocksSRC,
	jsBlocksSRCignore,
	jsBlocksDestination,
	jsBlocksFile,
	imgSRC,
	imgDST,
	watchStyles,
	watchBlockStyles,
	watchJsVendor,
	watchJsCustom,
	watchJsEditor,
	watchJsBlocks,
	watchJsBlocksIgnore,
	watchPhp,
	zipName,
	zipDestination,
	zipIncludeGlob,
	zipIgnoreGlob,
	textDomain,
	translationFile,
	translationDestination,
	packageName,
	bugReport,
	lastTranslator,
	team,
	BROWSERS_LIST
};

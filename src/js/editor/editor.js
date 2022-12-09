wp.domReady( () => {

	wp.blocks.registerBlockStyle( 'core/list', [
		{
			name: 'default',
			label: 'Default',
			isDefault: true,
		},

		{
			name: 'list-style-none',
			label: 'List Style None',
		},

		{
			name: 'two-column',
			label: 'Two Column List',
		}
	]);

	// Disable core button defaults in favor of our button color scheme
	wp.blocks.unregisterBlockStyle( 'core/button', 'default' );
	wp.blocks.unregisterBlockStyle( 'core/button', 'fill' );
	wp.blocks.unregisterBlockStyle( 'core/button', 'outline' );
	wp.blocks.unregisterBlockStyle( 'core/button', 'squared' );

	// Setup your theme button color schemes. 
	wp.blocks.registerBlockStyle( 'core/button', [
		{
			name: 'black-btn',
			label: 'Black Button',
			isDefault: true,
		},

		{
			name: 'white-btn',
			label: 'White Button',
		},
	]);
	
	wp.blocks.registerBlockStyle( 'core/group', [
		{
			name: 'default',
			label: 'Default',
			isDefault: true,
		},

		{
			name: 'full-width-content',
			label: 'Full Width',
		},
	]);
});
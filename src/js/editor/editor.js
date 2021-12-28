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
		}
	]);
});
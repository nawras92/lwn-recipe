import { __ } from '@wordpress/i18n';
import { RichText } from '@wordpress/block-editor';
import { useBlockProps } from '@wordpress/block-editor';

import './editor.scss';

export default function Edit({ attributes, setAttributes }) {
	const blockProps = useBlockProps();
	return (
		<div {...blockProps}>
			<RichText
				tagName="p"
				value={attributes.noteText}
				onChange={(content) => setAttributes({ noteText: content })}
				placeholder={__('Recipe Note Text...', 'lwn-recipe')}
			/>
		</div>
	);
}

/**
 * WordPress dependencies
 */
const {__, _x} = wp.i18n;
const {Button, Placeholder, ExternalLink} = wp.components;
const {BlockIcon} = wp.editor;

const EmbedPlaceholder = (props) => {
	const {icon, label, value, onSubmit, onChange, cannotEmbed, docLink, DocTitle} = props;
	return (
		<Placeholder icon={<BlockIcon icon={icon} showColors/>} label={label} className="wp-block-embed">
			<form onSubmit={onSubmit}>
				<input
					type="url"
					value={value || ''}
					className="components-placeholder__input"
					aria-label={label}
					placeholder={__('Enter URL to embed here…')}
					onChange={onChange}/>
				<Button
					isSmall
					type="submit">
					{_x('Embed', 'button label')}
				</Button>
				{cannotEmbed &&
				<p className="components-placeholder__error">
					{__('Sorry, we could not embed that content.')}<br/>
				</p>
				}
			</form>
			{docLink &&
			<div className="components-placeholder__learn-more">
				<ExternalLink href={docLink}>{DocTitle}</ExternalLink>
			</div>
			}
		</Placeholder>
	);
};

export default EmbedPlaceholder;

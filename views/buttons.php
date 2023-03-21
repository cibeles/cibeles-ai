<?php
if (!defined('ABSPATH')) exit;
?>
<!-- TITLEDIV -->
<div id="div_group_button_titlediv" style="display:none">
	
		<div id="div_button_titular" class="cibelesAi_button">
			<a href="#TB_inline?&height=300&width=400&inlineId=titular" class="thickbox" title="<?php esc_html_e('Generación titular','cibeles-ai'); ?>">
				<?php  esc_html_e('Titular','cibeles-ai'); ?>
				<i class="fa fa-superpowers"></i>
			</a>
		</div>
		
		<div id="div_button_titularcorto" class="cibelesAi_button">
			<a href="#TB_inline?&width=200&height=550&inlineId=titularcorto" class="thickbox" title="<?php esc_html_e('Generación titular corto','cibeles-ai'); ?>">
				<?php  esc_html_e('Titular corto','cibeles-ai'); ?>
				<i class="fa fa-superpowers"></i>
			</a>
		</div>
		
		<div id="div_button_clickbait" class="cibelesAi_button">
			<a href="#TB_inline?&width=200&height=550&inlineId=clickbait" class="thickbox"  title="<?php esc_html_e('Generación clickbait','cibeles-ai'); ?>">
				<?php  esc_html_e('Clickbait','cibeles-ai'); ?>
				<i class="fa fa-superpowers"></i>
			</a>
		</div>
	
</div>

<!-- TAGSDIV -->
<div id="div_group_button_tagsdiv" style="display:none">
	
		<div id="div_button_tags" class="cibelesAi_button">
			<a href="#TB_inline?&height=300&width=400&inlineId=tags" class="thickbox" title="<?php esc_html_e('Generación tags','cibeles-ai'); ?>">
				<?php  esc_html_e('Tags','cibeles-ai'); ?>
				<i class="fa fa-superpowers"></i>
			</a>
		</div>
		
		<div id="div_button_autotags" class="cibelesAi_button">
			<a href="#TB_inline?&height=300&width=400&inlineId=autotags" title="<?php esc_html_e('Generación tags automática','cibeles-ai'); ?>">
				<?php  esc_html_e('Autotags','cibeles-ai'); ?>
				<i class="fa fa-superpowers"></i>
			</a>
		</div>
	
</div>

<!-- POSTDIVRICH  -->
<div id="div_group_button_postdiv" style="display:none">
		<div id="div_button_resumen" class="cibelesAi_button">
			<a href="#TB_inline?&height=300&width=400&inlineId=resumen" class="thickbox" title="<?php esc_html_e('Generación resumen','cibeles-ai'); ?>">
				<?php  esc_html_e('Resumen','cibeles-ai'); ?>
				<i class="fa fa-superpowers"></i>
			</a>
		</div>
		<div id="div_button_autoexcerpt" class="cibelesAi_button">
			<a href="#TB_inline?&height=300&width=400&inlineId=autoexcerpt"  title="<?php esc_html_e('Generación excerpt automática','cibeles-ai'); ?>">
				<?php  esc_html_e('Autoexcerpt','cibeles-ai'); ?>
				<i class="fa fa-superpowers"></i>
			</a>
		</div>
</div>

<script>
let cibelesAiPlugin = {
		api_url : 	'<?php echo esc_js($cibelesAiPlugin['api_url']); ?>',
		url : 		'<?php echo esc_js($cibelesAiPlugin['url']); ?>',
		namespace : '<?php echo esc_js($cibelesAiPlugin['namespace']); ?>',
		nick : 		'<?php echo esc_js($cibelesAiPlugin['nick']); ?>',
};
</script>

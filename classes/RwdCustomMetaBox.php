<?php

class RwdCustomMetaBox {
	public $id;
	public $title;
	public $fields;
	public $page;

	public function __construct( $id, $title, $fields, $page ) {
		$this->id = $id;
		$this->title = $title;
		$this->fields = $fields;
		$this->page = $page;

		if( ! is_admin() )
			return;

		add_action( 'admin_menu', array( &$this, 'add_meta_box' ) );
		add_action( 'save_post', array( &$this, 'save_fields' ) );
	}

	public function add_meta_box() {
		add_meta_box( $this->id, $this->title, array( &$this, 'display_meta_box' ), $this->page, 'normal', 'high' );
	}

	public function display_meta_box() {
		global $post;

		echo '<input type="hidden" name="' . $this->id . '_nonce" id="' . $this->id . '_nonce" value="' . wp_create_nonce( plugin_basename( __FILE__ ) ) . '" />';

		echo '<table class="form-table">';

		foreach ( $this->fields as $field ) {
			$meta = get_post_meta( $post->ID, $field['id'], true );

            if(!$meta && isset($field['default'])) {
                $meta = $field['default'];
            }

			echo '<tr>';
				echo '<th><label for="' . $field['id'] . '">' . $field['label'] . '</label></th>';
				echo '<td>';
					switch ( $field['type'] ) {
						case 'text':
							echo '<input type="text" name="' . $field['id'] . '" id="' . $field['id'] . '" value="' . $meta . '" size="30" />';
							echo '<br /><span class="description">' . $field['desc'] . '</span>';
							break;
						case 'textarea':
							echo '<textarea name="' . $field['id'] . '" id="' . $field['id'] . '" cols="60" rows="4">' . $meta . '</textarea>';
							echo '<br /><span class="description">' . $field['desc'] . '</span>';
							break;
						case 'select':
							echo '<select name="' . $field['id'] . '" id="' . $field['id'] . '">';
							foreach ( $field['options'] as $option ) {
								echo '<option', $meta == $option['value'] ? ' selected="selected"' : '', ' value="' . $option['value'] . '">' . $option['label'] . '</option>';
							}
							echo '</select>';
							echo '<br /><span class="description">' . $field['desc'] . '</span>';
							break;
						case 'checkbox':
							echo '<input type="checkbox" name="' . $field['id'] . '" id="' . $field['id'] . '" ', $meta ? ' checked="checked"' : '', ' />';
							echo '<label for="' . $field['id'] . '">' . $field['desc'] . '</label>';
							break;
						case 'image':
							echo '<input type="text" name="' . $field['id'] . '" id="' . $field['id'] . '" value="' . $meta . '" size="30" />';
							echo '<input type="button" class="button-secondary" value="Upload Image" id="' . $field['id'] . '_button" />';
							echo '<br /><span class="description">' . $field['desc'] . '</span>';

							echo '
								<script type="text/javascript">
									jQuery(document).ready(function($) {

										function getImageSrcAttrVal(html) {
										  const regex = /src="(.*?)"/;
										  const match = regex.exec(html);
										  return match[1];
										}

										$("#' . $field['id'] . '_button").click(function() {
											tb_show("", "media-upload.php?post_id=' . $post->ID . '&type=image&TB_iframe=true");
											window.send_to_editor = function(html) {
												// var imgurl = $("img",html).attr("src");
												var imgurl = getImageSrcAttrVal(html);
												console.log("FEILDID ", ' . $field['id'] . ');
												console.log(imgurl);

												$("#' . $field['id'] . '").val(imgurl);
												tb_remove();
											}
											return false;
										});
									});
								</script>
							';
							break;
					}
				echo '</td>';
			echo '</tr>';
		}

		echo '</table>';
	}

	public function save_fields( $post_id ) {
		if ( ! isset( $_POST[$this->id . '_nonce'] ) )
			return;

		if ( ! wp_verify_nonce( $_POST[$this->id . '_nonce'], plugin_basename( __FILE__ ) ) )
			return;

		if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
			return;

		if ( ! current_user_can( 'edit_post', $post_id ) )
			return;

		foreach ( $this->fields as $field ) {
			$old = get_post_meta( $post_id, $field['id'], true );
			$new = $_POST[$field['id']];

			if ( $new && $new != $old ) {
				update_post_meta( $post_id, $field['id'], $new );
			} elseif ( '' == $new && $old ) {
				delete_post_meta( $post_id, $field['id'], $old );
			}
		}
	}
}
?>

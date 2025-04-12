<?php

// creates a field

class RockettField
{
    private $field_id;
    private $field_label;
    private $field_type;
    private $post_type;
    private $default_value;

    public function __construct($field_id, $field_label, $field_type = 'text', $post_type = 'post', $default_value = '')
    {
        $this->field_id = $field_id;
        $this->field_label = $field_label;
        $this->field_type = $field_type;
        $this->post_type = $post_type;
        $this->default_value = $default_value;

        // Hook to add meta box in the WordPress editor
        add_action('add_meta_boxes', [$this, 'addMetaBox']);

        // Hook to save custom field data
        add_action('save_post', [$this, 'saveFieldData']);
    }

    // Add a meta box for this field
    public function addMetaBox()
    {
        add_meta_box(
            $this->field_id . '_meta_box',
            $this->field_label,
            [$this, 'renderField'],
            $this->post_type,
            'normal',
            'high'
        );
    }

    // Render the custom field input in the WordPress editor
    public function renderField($post)
    {
        // Use nonce for verification
        wp_nonce_field('save_' . $this->field_id, $this->field_id . '_nonce');

        // Retrieve existing value or use default
        $value = get_post_meta($post->ID, $this->field_id, true) ?: $this->default_value;

        // Display different types of input fields
        echo '<p>';
        echo '<label for="' . esc_attr($this->field_id) . '">' . esc_html($this->field_label) . ':</label><br/>';

        switch ($this->field_type) {
            case 'text':
                echo '<input type="text" id="' . esc_attr($this->field_id) . '" name="' . esc_attr($this->field_id) . '" value="' . esc_attr($value) . '" class="widefat"/>';
                break;

            case 'textarea':
                echo '<textarea id="' . esc_attr($this->field_id) . '" name="' . esc_attr($this->field_id) . '" class="widefat">' . esc_textarea($value) . '</textarea>';
                break;

            case 'checkbox':
                echo '<input type="checkbox" id="' . esc_attr($this->field_id) . '" name="' . esc_attr($this->field_id) . '" value="1" ' . checked($value, '1', false) . ' />';
                break;

            // Add other field types as needed
        }

        echo '</p>';
    }

    // Save the custom field data when the post is saved
    public function saveFieldData($post_id)
    {
        // Check if nonce is set and valid
        if (!isset($_POST[$this->field_id . '_nonce']) || !wp_verify_nonce($_POST[$this->field_id . '_nonce'], 'save_' . $this->field_id)) {
            return $post_id;
        }

        // Check for autosave or user permissions
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return $post_id;
        }

        if (!current_user_can('edit_post', $post_id)) {
            return $post_id;
        }

        // Save or delete field value based on the field type
        if (isset($_POST[$this->field_id])) {
            $value = $_POST[$this->field_id];

            if ($this->field_type == 'checkbox') {
                $value = ($value === '1') ? '1' : '0'; // Convert checkbox value to 1 or 0
            } else {
                $value = sanitize_text_field($value); // Sanitize other types
            }

            update_post_meta($post_id, $this->field_id, $value);
        } else {
            delete_post_meta($post_id, $this->field_id);
        }
    }

    // Retrieve the custom field value
    public function getValue($post_id)
    {
        return get_post_meta($post_id, $this->field_id, true) ?: $this->default_value;
    }
}

class RockettFieldGroup
{
    public function __construct($rules)
    {
        // creates a group
    }
}

?>

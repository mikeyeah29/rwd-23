<?php

include('RwdGuava.php');

class RwdAdminMenu
{
    private $title;
    private $menu_title;
    private $permissions = 'manage_options';
    private $slug = 'rwd-settings';
    private $callback;

    public function admin_menu_view()
    {
        $message = '';
        $error = false;

        $sites = [
            ['name' => 'Stephan Nobel', 'slug' => 'bournemouth-property'],
            ['name' => 'Maria Hampton', 'slug' => 'maria-hampton']
        ];

        // dd($data);

        if (isset($_POST['rwd_options'])) {

        }

        $page = (isset($_GET['page']) ? $_GET['page'] : '');

        include_once( get_template_directory() . '/admin/views/settings.php' );
    }

    public function submenu_email_template_view()
    {
        $message = '';
        $error = false;

        if (isset($_POST['rwd_footer_about'])) {

        }

        $page = (isset($_GET['page']) ? $_GET['page'] : '');
        include_once( get_template_directory() . '/admin/views/email-template.php' );
    }

    public function admin_menu()
    {
        add_menu_page(
            'General', // title
            'RWD', // menu title
            $this->permissions, // permissions
            $this->slug, // slug
            array($this, 'admin_menu_view'), // callback
            'dashicons-book-alt', // dash icon
            4 // position
        );
        add_submenu_page(
            $this->slug, // parent slug
            'Pricing Tables', // title
            'Pricing Tables', // menu title
            $this->permissions,
            'rwd-email-template', // slug
            array($this, 'submenu_email_template_view')
        );
        add_submenu_page(
            $this->slug, // parent slug
            'Email Template', // title
            'Email Template', // menu title
            $this->permissions,
            'rwd-email-template', // slug
            array($this, 'submenu_email_template_view')
        );
    }

    public function __construct()
    {
        add_action('admin_menu', array($this, 'admin_menu'));
    }
}

?>

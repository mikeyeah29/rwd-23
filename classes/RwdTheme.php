<?php

class RwdTheme
{
    private function load_dependencies()
    {
        $files = [];

        // general helper functions
        $files[] = 'RwdCPT.php';
        $files[] = 'RwdPriceTable.php';
        $files[] = 'RwdAdminMenu.php';
        $files[] = 'RwdColors.php';
        $files[] = 'RwdGoogleCaptchaV3.php';
        $files[] = 'RwdMail.php';

        foreach ($files as $file) {
            require_once get_template_directory() . '/classes/' . $file;
        }
    }

    public function __construct()
    {
        $this->load_dependencies();

        $rwdCPT = new RwdCPT();
        $rwdShortCode = new RwdPriceTable();
        $bloggyBlogAdminMenu = new RwdAdminMenu();
        // $bloggyBlogScripts = new BloggyBlogScripts();
    }
}

?>

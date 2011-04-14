<?php
//App::import('Vendor', 'minify', array('file' => 'minify'.DS.'min'.DS.'lib'.DS.'Minify'.DS.'HTML.php'));
App::import('Vendor', 'Minify', array('file' => 'html.php'));
class MinifyHtmlHelper extends AppHelper {

    public $view;

    public function __construct() {

        parent::__construct();
        $this->view = ClassRegistry::getObject('view');
    }

    public function afterLayout() {

        $this->view->output = $this->minify_html($this->view->output);
    }

    protected function minify_html($html) {

        $options = array(
            'cssMinifier' => false,
            'jsMinifier' => false,
            'xhtml' => false
        );

        return Minify_HTML::minify($html, $options);
    }
}

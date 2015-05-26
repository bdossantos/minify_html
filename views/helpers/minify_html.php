<?php
App::import('Vendor', 'MinifyHtml.Minify_HTML', array('file' => 'html.php'));

class MinifyHtmlHelper extends AppHelper {

    public $view;

    public function __construct($view, $settings = array()) {

        parent::__construct($view, $settings);
        $this->view = $view;
    }

    public function afterLayout($layoutFile) {

        $this->view->output = $this->minify_html($this->view->output);
    }

    protected function minify_html($html) {

        $options = array(
            'cssMinifier' => false,
            'jsMinifier' => false,
            'xhtml' => true
        );

        return Minify_HTML::minify($html, $options);
    }
}

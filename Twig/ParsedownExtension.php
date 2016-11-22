<?php

namespace Jeremyjumeau\ParsedownBundle\Twig;

class ParsedownExtension extends \Twig_Extension {

    protected $parser;
    protected $extraParser;

    public function __construct(\Parsedown $parser, \ParsedownExtra $extraParser) {
        $this->parser = $parser;
        $this->extraParser = $extraParser;
    }

    public function getFilters() {
        return array(
            'md' => new \Twig_SimpleFilter('parsedown', array($this, 'parsedown'), array('is_safe' => array('html'))),
            'mde' => new \Twig_SimpleFilter('parsedownExtra', array($this, 'parsedownExtra'), array('is_safe' => array('html'))),
        );
    }

    public function parsedown($str) {
        return $this->parser->text($str);
    }

    public function parsedownExtra($str) {
        return $this->extraParser->text($str);
    }

    public function getName() {
        return 'parsedown';
    }

}

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
            new \Twig_SimpleFilter('parsedown', array($this, 'parsedownFilter'), array('is_safe' => array('html'))),
            new \Twig_SimpleFilter('parsedownExtra', array($this, 'parsedownExtraFilter'), array('is_safe' => array('html'))),
        );
    }

    public function parsedownFilter($str) {
        return $this->parser->text($str);
    }

    public function parsedownExtraFilter($str) {
        return $this->extraParser->text($str);
    }

    public function getName() {
        return 'parsedown_extension';
    }

}

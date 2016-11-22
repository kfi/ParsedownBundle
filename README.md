# Colibo Parsedown Bundle

Add support for [parsedown](https://github.com/erusev/parsedown) and [parsedown-extra](https://github.com/erusev/parsedown-extra) in Symfony 3.

Provides :

* Two services: 
    * **parsedown** : parsedown parser. 
    * **parsedown_extra** : parsedown-extra parser (support for [Markdown Extra](http://en.wikipedia.org/wiki/Markdown_Extra)).
* Two twig filter:
    * **md** : parse markdown with parsedown. 
    * **mde** : parse markdown with parsedown-extra. 

## Install

Add the bundle in your *composer.json* :

    "require": {
        "jeremyjumeau/parsedown-bundle": "dev-master"
    }

Update your vendors, then enable bundle in *AppKernel.php* :

    new Colibo\ParsedownBundle\ColiboParsedownBundle(),

## Usage

In twig templates:

    {# Parse markdown using parsedown standard parser #}
    {{ var|md }}
    
    {# Parse markdown using parsedown-extra parser #}
    {{ var|mde }}
    
In PHP :

    // Parse markdown using parsedown standard parser.
    echo $container->get('parsedown')->text($var);
    
    // Parse markdown using parsedown-extra parser.
    echo $container->get('parsedown_extra')->text($var);

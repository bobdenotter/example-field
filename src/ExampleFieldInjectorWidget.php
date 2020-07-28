<?php

namespace Bolt\Redactor;

use Bolt\Widget\BaseWidget;
use Bolt\Widget\Injector\RequestZone;
use Bolt\Widget\Injector\Target;
use Bolt\Widget\TwigAwareInterface;
use Webmozart\PathUtil\Path;

class ExampleFieldInjectorWidget extends BaseWidget implements TwigAwareInterface
{
    protected $name = 'Example Field Injector Widget';
    protected $target = Target::AFTER_JS;
    protected $zone = RequestZone::BACKEND;
    protected $template = '@example-field/injector.html.twig';
    protected $priority = 200;

    public function __construct()
    {
    }

    protected function run(array $params = []): ?string
    {
        $config = $this->getExtension()->getConfig();

        return parent::run(['example_field_config' => $config]);
    }
}
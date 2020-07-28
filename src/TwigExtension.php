<?php


namespace Bobdenotter\ExampleField;

use Bobdenotter\ExampleField\Extension;
use Bolt\Common\Json;
use Bolt\Extension\ExtensionRegistry;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class TwigExtension extends AbstractExtension
{
    /** @var ExtensionRegistry */
    private $registry;

    public function __construct(ExtensionRegistry $registry)
    {
        $this->registry = $registry;
    }

    public function getFunctions(): array
    {
        $safe = [
            'is_safe' => ['html'],
        ];

        return [
            new TwigFunction('example_field_json', [$this, 'exampleFieldJson'], $safe),
        ];
    }

    public function exampleFieldJson(): string
    {
        $extension = $this->registry->getExtension(Extension::class);
        $config = $extension->getConfig();

        return Json::json_encode($config, JSON_HEX_QUOT|JSON_HEX_APOS);
    }
}
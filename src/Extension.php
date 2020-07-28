<?php

declare(strict_types=1);

namespace Bobdenotter\ExampleField;

use Bolt\Extension\BaseExtension;
use Symfony\Component\Filesystem\Filesystem;

class Extension extends BaseExtension
{
    public function getName(): string
    {
        return 'Extension to add the \'Example Field\' FieldType';
    }

    public function initialize(): void
    {
        $this->addTwigNamespace('example-field');
        $this->addWidget(new ExampleFieldInjectorWidget());
    }

    public function install(): void
    {
        $projectDir = $this->getContainer()->getParameter('kernel.project_dir');
        $public = $this->getContainer()->getParameter('bolt.public_folder');

        $source = dirname(__DIR__) . '/assets/';
        $destination = $projectDir . '/' . $public . '/assets/';

        $filesystem = new Filesystem();
        $filesystem->mirror($source, $destination);
    }
}

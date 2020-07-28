<?php


namespace Bobdenotter\ExampleField;

use Bolt\Entity\Field;
use Bolt\Entity\Field\Excerptable;
use Bolt\Entity\FieldInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class ExampleField extends Field implements Excerptable, FieldInterface
{
    public const TYPE = 'example-field';
}


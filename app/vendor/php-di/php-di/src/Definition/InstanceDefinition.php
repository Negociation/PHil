<?php

declare(strict_types=1);

namespace DI\Definition;

/**
 * Defines injections on an existing class instance.
 *
 * @since  5.0
 * @author Matthieu Napoli <matthieu@mnapoli.fr>
 */
class InstanceDefinition implements Definition
{
    /**
     * Instance on which to inject dependencies.
     */
    private object $instance;

    private ObjectDefinition $objectDefinition;

    public function __construct(object $instance, ObjectDefinition $objectDefinition)
    {
        $this->instance = $instance;
        $this->objectDefinition = $objectDefinition;
    }

    public function getName() : string
    {
        // Name are superfluous for instance definitions
        return '';
    }

    public function setName(string $name) : void
    {
        // Name are superfluous for instance definitions
    }

    public function getInstance() : object
    {
        return $this->instance;
    }

    public function getObjectDefinition() : ObjectDefinition
    {
        return $this->objectDefinition;
    }

    public function replaceNestedDefinitions(callable $replacer) : void
    {
        $this->objectDefinition->replaceNestedDefinitions($replacer);
    }

    public function __toString()
    {
        return 'Instance';
    }
}
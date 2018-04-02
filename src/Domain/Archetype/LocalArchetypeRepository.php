<?php

namespace EricKeyte\Archetyper\Domain\Archetype;

use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;

/**
 * Class LocalArchetypeRepository
 */
class LocalArchetypeRepository implements ArchetypeRepository
{
    /**
     * @var string
     */
    protected $basePath;

    /**
     * Constructs LocalArchetypeRepository
     *
     * @param string $basePath
     */
    public function __construct($basePath)
    {
        $this->basePath = $basePath;
    }

    /**
     * {@inheritdoc}
     */
    public function getArchetype($archetype)
    {
        $adapter = new Local($this->basePath);
        $filesystem = new Filesystem($adapter);
        $filename = $archetype . '/archetype.json';

        $archetypeFile = $filesystem->read($filename);
        dump($archetypeFile);exit;
    }
}

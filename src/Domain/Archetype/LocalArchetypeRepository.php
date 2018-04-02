<?php

namespace EricKeyte\Archetyper\Domain\Archetype;

use Exception;
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
    public function getArchetype($name)
    {
        $adapter = new Local($this->basePath);
        $filesystem = new Filesystem($adapter);
        $filename = $name . '/archetype.json';
        $archetypeFile = $filesystem->read($filename);

        if (empty($archetypeFile)) {
            throw new Exception('Archetype file contains no data');
        }

        $decoded = json_decode($archetypeFile, true);

        $archetype = new Archetype(
            $decoded['name'],
            $decoded['author'],
            $archetypeFile,
            $decoded['version']
        );

        return $archetype;
    }
}

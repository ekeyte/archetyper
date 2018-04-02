<?php

namespace EricKeyte\Archetyper;

use EricKeyte\Archetyper\Domain\Archetype\ArchetypeRepository;
use Exception;

/**
 * Class Manager
 */
class Manager
{
    /**
     * @var ArchetypeRepository
     */
    protected $archetypeRepository;

    /**
     * @var PathWriter
     */
    protected $pathWriter;

    /**
     * Constructs Manager
     *
     * @param ArchetypeRepository $archetypeRepository
     * @param PathWriter          $pathWriter
     */
    public function __construct(ArchetypeRepository $archetypeRepository, PathWriter $pathWriter)
    {
        $this->pathWriter = $pathWriter;
        $this->archetypeRepository = $archetypeRepository;
    }

    /**
     * @param $archetype
     *
     * @throws Exception
     */
    public function createProjectFromArchetype($archetype)
    {
        $archetypeObject = $this->archetypeRepository->getArchetype($archetype);
        $decoded = json_decode($archetypeObject->getRaw(), true);
        if (!isset($decoded['tree']) || empty($decoded['tree'])) {
            throw new Exception('Archetype file\'s "tree" key has no nodes.');
        }

        $tree = $decoded['tree'];
        $this->pathWriter->createDirectoriesAndFiles($tree);
    }
}

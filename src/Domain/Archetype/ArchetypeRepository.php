<?php

namespace EricKeyte\Archetyper\Domain\Archetype;

/**
 * Interface ArchetypeRepository
 */
interface ArchetypeRepository
{
    /**
     * @param $name
     *
     * @return Archetype
     */
    public function getArchetype($name);
}

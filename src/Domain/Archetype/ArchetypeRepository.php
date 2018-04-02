<?php

namespace EricKeyte\Archetyper\Domain\Archetype;

/**
 * Interface ArchetypeRepository
 */
interface ArchetypeRepository
{
    /**
     * @param $archetype
     *
     * @return Archetype
     */
    public function getArchetype($archetype);
}

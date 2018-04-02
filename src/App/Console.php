<?php

namespace EricKeyte\Archetyper\App;

use EricKeyte\Archetyper\Manager;
use EricKeyte\Archetyper\PathWriter;

/**
 * Class Console
 */
class Console
{
    /**
     * @var Manager
     */
    protected $manager;

    /**
     * Constructs Console
     *
     * @param Manager $manager
     */
    public function __construct(Manager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * @param string $archetype
     *
     * @return int
     */
    public function run($archetype)
    {
        try {
            $this->manager->createProjectFromArchetype($archetype);
        } catch (\Exception $e) {
            echo $e;

            return 1;
        }

        return 0;
    }
}

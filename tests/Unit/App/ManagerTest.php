<?php

namespace EricKeyte\Archetyper\Test\Unit\App;

use EricKeyte\Archetyper\Domain\Archetype\ArchetypeRepository;
use EricKeyte\Archetyper\Manager;
use EricKeyte\Archetyper\PathWriter;
use EricKeyte\Archetyper\Test\Unit\TestCase;
use Mockery\MockInterface;

/**
 * Class ManagerTest
 */
class ManagerTest extends TestCase
{
    /**
     * @var Manager
     */
    protected $manager;

    /**
     * @var ArchetypeRepository|MockInterface
     */
    protected $repository;

    /**
     * @var PathWriter|MockInterface
     */
    protected $pathWriter;


    public function setUp()
    {
        $this->repository = $this->mock('\\EricKeyte\\Archetyper\\Domain\\ArchetypeRepository');
        $this->pathWriter = $this->mock('\\EricKeyte\\Archetyper\\PathWriter');
        $this->manager = new Manager($this->repository, $this->pathWriter);
    }

    public function testCreateProjectFromArchetypeDoesNotThrowException()
    {
        $this->manager->createProjectFromArchetype('standard-php');
    }
}

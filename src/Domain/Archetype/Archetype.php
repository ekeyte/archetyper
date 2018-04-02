<?php

namespace EricKeyte\Archetyper\Domain\Archetype;

use DomainException;

/**
 * Class Archetype
 */
class Archetype
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $author;

    /**
     * @var string
     */
    protected $raw = '';

    /**
     * @var string
     */
    protected $version;

    /**
     * @param array $array
     *
     * @return static
     */
    public static function fromArray($array)
    {
        if (!is_array($array)) {
            throw new DomainException(
                sprintf('Archetype::fromArray parameter 1 is type %s, expected array.', gettype($array)
            ));
        }

        return new static(
            $array['name'],
            $array['author'],
            $array['raw'],
            $array['version']
        );
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @return string
     */
    public function getRaw()
    {
        return $this->raw;
    }

    /**
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Constructs Archetype
     *
     * @param        $name
     * @param        $author
     * @param string $raw
     * @param        $version
     */
    protected function __construct($name, $author, $raw, $version)
    {
        $this->name = $name;
        $this->author = $author;
        $this->raw = $raw;
        $this->version = $version;
    }
}

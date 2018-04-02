<?php declare(strict_types=1);

namespace EricKeyte\Archetyper;

use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;

/**
 * Class PathWriter
 */
class PathWriter
{
    /**
     * @param        $tree
     * @param string $path
     */
    public function createDirectoriesAndFiles(array $tree, $path = '')
    {
        $localAdapter = new Local(__DIR__ . '/../var/output/target');
        $filesystem = new Filesystem($localAdapter);

        foreach ($tree as $k => $v) {
            $currentPath = $path . $v['name'];

            if ($v['type'] == 'directory') {
                $filesystem->createDir($currentPath);
            }

            if ($v['type'] == 'file') {
                $filesystem->put($currentPath, '');
            }

            if (is_array($v['children']) && !empty($v['children'])) {
                $nextPath = $path . '/' . $v['name'] . '/';
                $this->createDirectoriesAndFiles($v['children'], $nextPath);
            }
        }
    }
}

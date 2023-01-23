<?php declare(strict_types = 1);

namespace Wame\Utils\Helpers;


class File
{
    /**
     * Create file
     *
     * @param string $path
     *
     * @return void
     */
    public static function create($path)
    {
        if (!is_file($path)) fopen($path, 'w');
    }


    /**
     * Copy file from to
     *
     * @param string $from
     * @param string $to
     *
     * @return bool
     */
    public static function copy(string $from, string $to): bool
    {
        Dir::createDir(dirname($to));

        return copy($from, $to);
    }


    /**
     * Move file from to
     *
     * @param string $from
     * @param string $to
     *
     * @return bool
     */
    public static function move(string $from, string $to): bool
    {
        Dir::createDir(dirname($to));

        return rename($from, $to);
    }


    /**
     * Remove file
     *
     * @param string $file
     *
     * @return bool
     */
    public static function remove(string $file): bool
    {
        if (file_exists($file)) return unlink($file);

        return false;
    }


    /**
     * Get file info
     *
     * @param string $file
     *
     * @return \SplFileInfo
     */
    public static function getInfo(string $file): \SplFileInfo
    {
        return new \SplFileInfo($file);
    }


    /**
     * Get file name
     *
     * @param string $file
     *
     * @return string
     */
    public static function getName($file): string
    {
        $fileInfo = self::getInfo($file);

        return $fileInfo->getBasename('.' . $fileInfo->getExtension());
    }


    /**
     * Get file extension
     *
     * @param string $file
     *
     * @return string
     */
    public static function getExtension($file): string
    {
        $fileInfo = self::getInfo($file);

        return $fileInfo->getExtension();
    }


    /**
     * Get file Mime type
     *
     * @param string $file
     *
     * @return string
     */
    public static function getMimeType($file): string
    {
        return mime_content_type($file);
    }

}

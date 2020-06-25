<?php

namespace Ypa\Jigsaw;

use Symfony\Component\Yaml\Yaml;

class MarkdownGenerator
{
    public static function start($pTemplate, $pSection = null)
    {
        $section = $pSection === null ? "content" : $pSection;

        $str = "---\n";
        $str .= "extends: " . strval($pTemplate) . "\n";
        $str .= "section: " . $section . "\n";

        return $str;
    }

    public static function stop()
    {
        $str = "\n---\n\n";

        return $str;
    }

    public static function field($pKey, $pValue)
    {
        return $pKey . ': \'' . str_replace("\n", "", $pValue) . '\'' . "\n";
    }

    public static function yaml(array $pData)
    {
        unset($pData['template']);
        return Yaml::dump($pData);
    }

    public static function generate($pTemplate, array $pFields)
    {
        $str = [];
        $str[] = self::start($pTemplate);
        foreach ($pFields as $field) {
            $str[] = $field;
        }
        $str[] = self::stop();
        return implode('', $str);
    }
}

<?php

namespace Ypa\Jigsaw;

class WordpressGenerator extends MarkdownGenerator
{
    public static function date($pPost)
    {
        return self::field('date', $pPost['date']);
    }

    public static function slug($pPost)
    {
        return self::field('slug', $pPost['slug']);
    }

    public static function title($pPost)
    {
        return self::field('title', $pPost['title']['rendered']);
    }

    public static function category($pPost)
    {
        return self::field('category', $pPost['category']['name']);
    }

    public static function order($pPost)
    {
        return self::field('order', $pPost['menu_order']);
    }

    /**
     * @deprecated
     */
    public static function categorytitle($pPost)
    {
        return self::categoryTitle($pPost);
    }

    public static function categoryTitle($pPost)
    {
        return self::field('title', $pPost['name']);
    }

    public static function description($pPost)
    {
        return self::field('description', $pPost['description']);
    }

    public static function content($pPost)
    {
        return self::field('content', $pPost['content']['rendered']);
    }

    public static function yoast($pData, $pEncodeJsonLd = true)
    {
        $yoast = [];
        $yoast['title'] = $pData['yoast_title'];
        $yoast['meta'] = $pData['yoast_meta'];
        if ($pEncodeJsonLd !== true) {
            $yoast['json_ld'] = $pData['yoast_json_ld'];
        } else {
            $yoast['json_ld'] = json_encode($pData['yoast_json_ld']);
        }

        $str = [];
        $str[] = self::yaml(['yoast' => $yoast]);
        return implode('', $str);
    }

    /**
     * @deprecated Use yaml
     */
    public static function mainmenu($pMenu)
    {
        return self::yaml(['mainmenu' => $pMenu]);
    }

    /**
     * @deprecated Use yaml
     */
    public static function footermenu($pMenu)
    {
        return self::yaml(['footermenu' => $pMenu]);
    }

    /**
     * @deprecated Use yaml
     */
    public static function disclaimermenu($pMenu)
    {
        return self::yaml(['disclaimer' => $pMenu]);
    }

}

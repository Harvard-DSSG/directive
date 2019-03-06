<?php
/**
 * Modify a hex color by the given number of steps (out of 255).
 *
 * Adapted from a solution by Torkil Johnsen.
 *
 * @param string $color
 * @param int $steps
 * @link http://stackoverflow.com/questions/3512311/how-to-generate-lighter-darker-color-with-php
 */
function thanksroy_brighten($color, $steps) {
    $steps = max(-255, min(255, $steps));
    $hex = str_replace('#', '', $color);
    $r = hexdec(substr($hex,0,2));
    $g = hexdec(substr($hex,2,2));
    $b = hexdec(substr($hex,4,2));

    $r = max(0,min(255,$r + $steps));
    $g = max(0,min(255,$g + $steps));
    $b = max(0,min(255,$b + $steps));

    $r_hex = str_pad(dechex($r), 2, '0', STR_PAD_LEFT);
    $g_hex = str_pad(dechex($g), 2, '0', STR_PAD_LEFT);
    $b_hex = str_pad(dechex($b), 2, '0', STR_PAD_LEFT);

     return '#'.$r_hex.$g_hex.$b_hex;
}

/**
 * Get HTML for random featured items, modified from application/libraries/globals.php
 *
 * @package Omeka\Function\View\Item
 * @uses get_random_featured_items()
 * @param int $count Maximum number of items to show.
 * @param bool $hasImage Whether or not the featured items must have
 * images associated. If null, as default, all featured items can appear,
 * whether or not they have files. If true, only items with files will appear,
 * and if false, only items without files will appear.
 * @return string
 */
function directive_random_featured_items($count = 5, $hasImage = null)
{
    $items = get_random_featured_items($count, $hasImage);
    if ($items) {
        $html = '';
        $alignment = 'left';
        foreach ($items as $item) {
            $html .= get_view()->partial(
              'items/single.php',
              array('item' => $item, 'alignment' => $alignment)
            );
            release_object($item);
            if ($alignment == 'left') {
              $alignment = 'right';
            } else {
              $alignment = 'left';
            }
        }
    } else {
        $html = '<p>' . __('No featured items are available.') . '</p>';
    }
    return $html;
}
/**
 * Get HTML for recent items.
 *
 * @since 2.2
 * @package Omeka\Function\View\Item
 * @uses get_random_featured_items()
 * @param int $count Maximum number of recent items to show.
 * @return string
 */
function directive_recent_items($count = 10)
{
    $items = get_recent_items($count);
    if ($items) {
        $html = '';
        $alignment = 'left';
        foreach ($items as $item) {
            $html .= get_view()->partial('items/single.php', array('item' => $item, 'alignment' => $alignment));
            release_object($item);
            if ($alignment == 'left') {
              $alignment = 'right';
            } else {
              $alignment = 'left';
            }
        }
    } else {
        $html = '<p>' . __('No recent items available.') . '</p>';
    }
    return $html;
}

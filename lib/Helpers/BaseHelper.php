<?php
namespace Itscript\TasksElapsedTime\Helpers;

use Bitrix\Main\Result;

class BaseHelper
{
    public static function extractErrorMessage(Result $result): string
    {
        return implode('; ', $result->getErrorMessages());
    }

    public static function secToArray(int $secs): array
    {
        $res = array();

        $res['day'] = floor($secs / 86400);
        $secs = $secs % 86400;

        $hour = floor($secs / 3600);
        $res['hour'] = $hour < 10 ? '0' . $hour : $hour;
        $secs = $secs % 3600;

        $min = floor($secs / 60);
        $res['min'] = $min<10 ? '0' . $min : $min;
        $res['sec'] = $secs % 60;

        return $res;
    }
}
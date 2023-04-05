<?php

namespace App\Common\Utilities;

class DateFormatter
{
    private const DATE_FORMAT = "M/D/Y";
    public static function parseStrToDate(string $dateStr): \DateTime
    {
        $timestamp = strtotime($dateStr);
        $date = getdate($timestamp);
        $dateTime = new \DateTime();

        return $dateTime->setDate($date['year'], $date['mon'], $date['mday']);
    }

    public static function parseDateToStr(\DateTime $dateTime): string
    {
        return $dateTime->format(self::DATE_FORMAT);
    }
}
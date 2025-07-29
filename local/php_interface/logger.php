<?php
/*
 * Copyright (c) 2021. DEV-BX.RU
 * barmaley2005@gmail.com
 */

require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/lib/diag/helper.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/tools.php');


class DevBxLogger {
    protected static function formatTrace(array $trace = null)
    {
        if ($trace)
        {
            $traceLines = array();
            foreach ($trace as $traceNum => $traceInfo)
            {
                $traceLine = '';

                if (array_key_exists('class', $traceInfo))
                    $traceLine .= $traceInfo['class'].$traceInfo['type'];

                if (array_key_exists('function', $traceInfo))
                    $traceLine .= $traceInfo['function'].'()';

                if (array_key_exists('file', $traceInfo))
                {
                    $traceLine .= ' '.$traceInfo['file'];
                    if (array_key_exists('line', $traceInfo))
                        $traceLine .= ':'.$traceInfo['line'];
                }

                if ($traceLine)
                    $traceLines[] = ' from '.$traceLine;
            }

            return implode("\n", $traceLines);
        }
        else
        {
            return "";
        }
    }

    public static function getFileNameForLog($trace)
    {
        $arRegTpl = array(
            'component.$1-%Y-%m-%d.log' => '#.*\/components\/.+\/(.+)\/.*$#U',
            'module.$1-%Y-%m-%d.log' => '#.*\/modules\/(.+)\/.*$#U',
            'admin.$1-%Y-%m-%d.log' => '#\/bitrix\/admin\/(.+)\..*$#',
            '$1-%Y-%m-%d.log' => '#.*\/(.+\.php)$#',
        );

        $fileName = 'debug-%Y-%m-%d.log';

        foreach ($trace as $traceNum => $traceInfo)
        {
            if (array_key_exists('file', $traceInfo))
            {
                foreach ($arRegTpl as $replace=>$pattern)
                {
                    if (preg_match($pattern, $traceInfo['file']))
                    {
                        $fileName = preg_replace($pattern,$replace, $traceInfo['file']);
                        break 2;
                    }
                }

            }
        }

        return static::formatFileName($fileName);
    }

    private static function formatFileName($fileName)
    {
        $d = new \DateTime();

        $arMacro = array(
            '%Y' => $d->format('Y'),
            '%y' => $d->format('y'),
            '%m' => $d->format('m'),
            '%d' => $d->format('d'),
            '%H' => $d->format('H'),
            '%h' => $d->format('h'),
            '%i' => $d->format('i'),
            '%s' => $d->format('s'),
        );

        $fileName = str_replace(array_keys($arMacro),array_values($arMacro), $fileName);

        return $fileName;
    }

    public static function log($var, $varName = '', $fileName = false)
    {
        $arTrace = \Bitrix\Main\Diag\Helper::getBackTrace(20, null, 1);

        if ($fileName === false)
        {
            $fileName = $_SERVER['DOCUMENT_ROOT'].'/logs/'.static::getFileNameForLog($arTrace);
        } else
        {
            $fileName = $_SERVER['DOCUMENT_ROOT'].'/logs/'.static::formatFileName($fileName);
        }

        $header = '';

        if ($_SERVER["REQUEST_URI"])
            $header .= "REQUEST URI: ".$_SERVER["REQUEST_URI"]."\n";

        $trace = static::formatTrace($arTrace);

        $body = '';
        if ($varName)
            $body = $varName.":\n";

        if (is_object($var) || is_array($var))
	{
	    ob_start();
	    var_dump($var);
            $body .= ob_get_clean();
	}
        else
            $body .= $var;

        $footer = str_repeat("-", 30);

        $message =
            "\n" . $header .
            "\nDate: ".date("Y-m-d H:i:s") .
            "\n" . $body .
            "\n\n" . $trace .
            "\n" . $footer .
            "\n";

        CheckDirPath($fileName);

        //\Bitrix\Main\IO\File::putFileContents($fileName, $message, \Bitrix\Main\IO\File::APPEND);
        file_put_contents($fileName, $message, FILE_APPEND);

    }

}
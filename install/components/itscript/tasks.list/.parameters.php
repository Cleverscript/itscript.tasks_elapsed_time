<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use Bitrix\Main\Config\Option;
use Bitrix\Main\Localization\Loc;
use Bitrix\Iblock\TypeTable;
use Bitrix\Iblock\IblockTable;
use Otus\Clinic\Helpers\IblockHelper;

if (!Loader::includeModule('iblock')) {
    return;
}

if (!Loader::includeModule('otus.clinic')) {
    return;
}
$iblockId = Option::get('otus.clinic', 'OTUS_CLINIC_IBLOCK_DOCTORS');

$pops = IblockHelper::getIblockProps($iblockId);
$arPropertys = $pops->getData();

$arComponentParameters = [
    'GROUPS' => [
        'LIST_SETTINGS' => [
            'NAME' => Loc::getMessage('CMP_TASKS_LIST_LIST_SETTINGS'),
        ],
        'DETAIL_SETTINGS' => [
            'NAME' => Loc::getMessage('CMP_TASKS_DETAIL_SETTINGS'),
        ],
    ],
    'PARAMETERS' => [
        'CACHE_TIME' => ['DEFAULT' => 86400],
    ],
];
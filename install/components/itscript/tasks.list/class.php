<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use Bitrix\Main\Result;
use Bitrix\Main\Error;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Engine\CurrentUser;
use Itscript\TasksElapsedTime\Services\UserTasksService;
use Itscript\TasksElapsedTime\Helpers\BaseHelper;

class TasksList extends CBitrixComponent
{
    const GRID_ID = 'itscript.tasks_elapsed_time';

    public function onPrepareComponentParams($arParams)
    {
        $result = [
            "CACHE_TYPE" => $arParams["CACHE_TYPE"],
            "CACHE_TIME" => isset($arParams["CACHE_TIME"])? $arParams["CACHE_TIME"]: 36000000,
        ];

        return array_merge($result, $arParams);
    }

    public function executeComponent(): void
    {
        if (!Loader::includeModule('itscript.tasks_elapsed_time')) {
            ShowError(Loc::getMessage('ERROR_MODEULE_NOT_INSTALL'));
            return;
        }

        $gridFilterFields = $gridHeaders = [
            [
                'id' => 'ID',
                'name' => Loc::getMessage('GRID_HEADER_COL_ID_NAME'),
                'sort' => 'ID',
                'first_order' => 'desc',
                'default' => true,
            ],
            [
                'id' => 'NAME',
                'name' => Loc::getMessage('GRID_HEADER_COL_NAME_NAME'),
                'sort' => 'NAME',
                'first_order' => 'desc',
                'default' => true,
            ],
            [
                'id' => 'TIME',
                'name' => Loc::getMessage('GRID_HEADER_COL_TIME_NAME'),
                'sort' => 'TIME',
                'first_order' => 'desc',
                'default' => true,
            ],
            [
                'id' => 'USER',
                'name' => Loc::getMessage('GRID_HEADER_COL_USER_NAME'),
                'sort' => 'USER',
                'first_order' => 'desc',
                'default' => true,
            ]
        ];

        $rows = $this->getRows();

        if (!$rows->isSuccess()) {
            ShowError(BaseHelper::extractErrorMessage($rows));
            return;
        }

        // Get grid
        $grid = new Bitrix\Main\Grid\Options(self::GRID_ID);

        // Prepare result
        $this->arResult = [
            'GRID_ID' => self::GRID_ID,
            'HEADERS' => $gridHeaders,
            'ROWS' => $rows->getData(),
            'SORT' => $grid->getSorting(),
            'FILTER' => $gridFilterFields,
            'ENABLE_LIVE_SEARCH' => false,
            'DISABLE_SEARCH' => true,
        ];

        $this->IncludeComponentTemplate();
    }

    private function getRows(): Result
    {
        $result = new Result;
        $data = [];

        // get data
        $uid = CurrentUser::get()->getId();

        $rows = (new UserTasksService())->getByUser($uid);

        if (!$rows->isSuccess()) {
            foreach ($rows->getErrorMessages() as $message) {
                $result->addError($message);
            }

            return $result;
        }

        foreach ($rows->getData() as $key => $row) {
            $data[] = [
                'id' => $row['ID'],
                'data' => $row,
            ];

            foreach ($row as $k => $column) {
                switch ($k) {
                    case 'NAME': {
                        $value = '<a href="' . htmlspecialcharsEx(
                                "/company/personal/user/{$row['USER']}/tasks/task/view/{$row['ID']}/"
                            ) . '" target="_self">' . $row['NAME'] . '</a>';

                        break;
                    }
                    case 'USER': {
                        $value = '<a href="' . htmlspecialcharsEx(
                                "/company/personal/user/{$row['USER']}/"
                            ) . '" target="_self">' . $row['USER_FIO'] . '</a>';

                        break;
                    }
                    default: {
                        $value = $column;
                    }
                }

                $data[$key]['columns'][$k] = $value;
            }
        }

        //dump($data);

        return $result->setData($data);
    }
}
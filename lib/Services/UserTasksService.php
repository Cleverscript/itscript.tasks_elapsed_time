<?php
namespace Itscript\TasksElapsedTime\Services;

use Bitrix\Main\Result;
use Bitrix\Main\Error;
use Itscript\TasksElapsedTime\Helpers\BaseHelper;
use Itscript\TasksElapsedTime\Models\ElapsedTimeTable;

IncludeModuleLangFile(__FILE__);

class UserTasksService
{
    public function getByUser(int $id, int $limit = null, int $offset = null): Result
    {
        $result = new Result;
        $data = [];

        if (!intval($id)) {
            return $result->addError(new Error('EXCEPTION_USER_ID_NULL'));
        }

        $query = ElapsedTimeTable::query()
            ->where('USER_ID', $id)
            ->setSelect([
                'USER_ID',
                'TASK_ID',
                'SECONDS_SUMM',
                'TASK_NAME',
                'USER_LAST_NAME' => 'USER.LAST_NAME',
                'USER_NAME' => 'USER.NAME',
                'USER_SECOND_NAME' => 'USER.SECOND_NAME',
            ])
            ->setGroup('TASK_ID');

        if ($limit) {
            $query->setLimit($limit);
        }

        if ($offset) {
            $query->setOffset($offset);
        }

        $rows = $query->exec();

        foreach ($rows as $row) {

            //dump($row);

            $time = BaseHelper::secToArray($row['SECONDS_SUMM']);

            $userFio = implode(' ', array_filter([
                $row['USER_LAST_NAME'],
                $row['USER_NAME'],
                $row['USER_SECOND_NAME']
            ]));

            $data[] = [
                'ID' => $row['TASK_ID'],
                'NAME' => $row['TASK_NAME'],
                'TIME' => implode(':', [$time['hour'], $time['min'], $time['sec']]),
                'USER' => $row['USER_ID'],
                'USER_FIO' => $userFio,
            ];
        }

        return $result->setData($data);
    }
}
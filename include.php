<?php
use Bitrix\Main;
use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Config\Option;

$module_id = "itscript.tasks_elapsed_time";

$defaultOptions = Option::getDefaults($module_id);

Loader::registerAutoLoadClasses(null, [
    'Itscript\TasksElapsedTime\Models\UserTable' => "/local/modules/{$module_id}/lib/Models/UserTable.php",
    'Itscript\TasksElapsedTime\Models\ElapsedTimeTable' => "/local/modules/{$module_id}/lib/Models/ElapsedTimeTable.php",
    'Itscript\TasksElapsedTime\Services\UserTasksService' => "/local/modules/{$module_id}/lib/Services/UserTasksService.php",
    'Itscript\TasksElapsedTime\Helpers\BaseHelper' => "/local/modules/{$module_id}/lib/Helpers/BaseHelper.php",
]);
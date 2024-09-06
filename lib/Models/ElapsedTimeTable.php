<?php

namespace Itscript\TasksElapsedTime\Models;

use Bitrix\Main\ORM\Data\DataManager;
use Bitrix\Main\ORM\Fields\DatetimeField;
use Bitrix\Main\ORM\Fields\IntegerField;
use Bitrix\Main\ORM\Fields\TextField;
use Bitrix\Main\ORM\Fields\ExpressionField;
use Bitrix\Main\ORM\Fields\Relations\Reference;
use Bitrix\Main\ORM\Query\Join;
use Bitrix\Main\Type\DateTime;

class ElapsedTimeTable extends DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'b_tasks_elapsed_time';
    }

    /**
     * Returns entity map definition.
     *
     * @return array
     */
    public static function getMap()
    {
        return [
            (new IntegerField('ID',
                []
            ))->configurePrimary(true)
                ->configureAutocomplete(true),

            (new DatetimeField('CREATED_DATE',
                []
            ))->configureDefaultValue(function()
            {
                return new DateTime();
            }),

            (new DatetimeField('DATE_START',
                []
            )),

            (new DatetimeField('DATE_STOP',
                []
            )),

            (new IntegerField('USER_ID',
                []
            ))->configureRequired(true),

            (new IntegerField('TASK_ID',
                []
            ))->configureRequired(true),

            (new IntegerField('MINUTES',
                []
            ))->configureRequired(true),

            (new IntegerField('SECONDS',
                []
            ))->configureDefaultValue(0),

            (new IntegerField('SOURCE',
                []
            ))->configureDefaultValue(1),

            (new TextField('COMMENT_TEXT',
                []
            )),

            (new Reference('USER',
                UserTable::class,
                Join::on('this.USER_ID', 'ref.ID')
            )),

            (new ExpressionField(
                'TASK_NAME',
                sprintf('(SELECT `TITLE` FROM `b_tasks` WHERE `ID` = %s)',
                    '%s',
                ),
                ['TASK_ID'],
                []
            )),

            (new ExpressionField(
                'SECONDS_SUMM',
                sprintf('(SELECT  SUM(`SECONDS`) AS `SUMSEC` FROM %s WHERE `USER_ID` = %s AND `TASK_ID`=%s)',
                    self::getTableName(),
                    '%s',
                    '%s',
                ),
                ['USER_ID', 'TASK_ID'],
                []
            ))
        ];
    }
}
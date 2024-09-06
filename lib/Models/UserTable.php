<?php

namespace Itscript\TasksElapsedTime\Models;

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ORM\Data\DataManager;
use Bitrix\Main\ORM\Fields\BooleanField;
use Bitrix\Main\ORM\Fields\DateField;
use Bitrix\Main\ORM\Fields\DatetimeField;
use Bitrix\Main\ORM\Fields\IntegerField;
use Bitrix\Main\ORM\Fields\StringField;
use Bitrix\Main\ORM\Fields\TextField;
use Bitrix\Main\ORM\Fields\Validators\LengthValidator;

class UserTable extends DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'b_user';
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
            ))->configureTitle(Loc::getMessage('USER_ENTITY_ID_FIELD'))
                ->configurePrimary(true)
                ->configureAutocomplete(true)
            ,
            (new DatetimeField('TIMESTAMP_X',
                []
            ))->configureTitle(Loc::getMessage('USER_ENTITY_TIMESTAMP_X_FIELD'))
            ,
            (new StringField('LOGIN',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 50),
                        ];
                    },
                ]
            ))->configureTitle(Loc::getMessage('USER_ENTITY_LOGIN_FIELD'))
                ->configureRequired(true)
            ,
            (new StringField('PASSWORD',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 255),
                        ];
                    },
                ]
            ))->configureTitle(Loc::getMessage('USER_ENTITY_PASSWORD_FIELD'))
                ->configureRequired(true)
            ,
            (new StringField('CHECKWORD',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 255),
                        ];
                    },
                ]
            ))->configureTitle(Loc::getMessage('USER_ENTITY_CHECKWORD_FIELD'))
            ,
            (new BooleanField('ACTIVE',
                []
            ))->configureTitle(Loc::getMessage('USER_ENTITY_ACTIVE_FIELD'))
                ->configureValues('N', 'Y')
                ->configureDefaultValue('Y')
            ,
            (new StringField('NAME',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 50),
                        ];
                    },
                ]
            ))->configureTitle(Loc::getMessage('USER_ENTITY_NAME_FIELD'))
            ,
            (new StringField('LAST_NAME',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 50),
                        ];
                    },
                ]
            ))->configureTitle(Loc::getMessage('USER_ENTITY_LAST_NAME_FIELD'))
            ,
            (new StringField('EMAIL',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 255),
                        ];
                    },
                ]
            ))->configureTitle(Loc::getMessage('USER_ENTITY_EMAIL_FIELD'))
            ,
            (new DatetimeField('LAST_LOGIN',
                []
            ))->configureTitle(Loc::getMessage('USER_ENTITY_LAST_LOGIN_FIELD'))
            ,
            (new DatetimeField('DATE_REGISTER',
                []
            ))->configureTitle(Loc::getMessage('USER_ENTITY_DATE_REGISTER_FIELD'))
                ->configureRequired(true)
            ,
            (new StringField('LID',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 2),
                        ];
                    },
                ]
            ))->configureTitle(Loc::getMessage('USER_ENTITY_LID_FIELD'))
            ,
            (new StringField('PERSONAL_PROFESSION',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 255),
                        ];
                    },
                ]
            ))->configureTitle(Loc::getMessage('USER_ENTITY_PERSONAL_PROFESSION_FIELD'))
            ,
            (new StringField('PERSONAL_WWW',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 255),
                        ];
                    },
                ]
            ))->configureTitle(Loc::getMessage('USER_ENTITY_PERSONAL_WWW_FIELD'))
            ,
            (new StringField('PERSONAL_ICQ',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 255),
                        ];
                    },
                ]
            ))->configureTitle(Loc::getMessage('USER_ENTITY_PERSONAL_ICQ_FIELD'))
            ,
            (new StringField('PERSONAL_GENDER',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 1),
                        ];
                    },
                ]
            ))->configureTitle(Loc::getMessage('USER_ENTITY_PERSONAL_GENDER_FIELD'))
            ,
            (new StringField('PERSONAL_BIRTHDATE',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 50),
                        ];
                    },
                ]
            ))->configureTitle(Loc::getMessage('USER_ENTITY_PERSONAL_BIRTHDATE_FIELD'))
            ,
            (new IntegerField('PERSONAL_PHOTO',
                []
            ))->configureTitle(Loc::getMessage('USER_ENTITY_PERSONAL_PHOTO_FIELD'))
            ,
            (new StringField('PERSONAL_PHONE',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 255),
                        ];
                    },
                ]
            ))->configureTitle(Loc::getMessage('USER_ENTITY_PERSONAL_PHONE_FIELD'))
            ,
            (new StringField('PERSONAL_FAX',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 255),
                        ];
                    },
                ]
            ))->configureTitle(Loc::getMessage('USER_ENTITY_PERSONAL_FAX_FIELD'))
            ,
            (new StringField('PERSONAL_MOBILE',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 255),
                        ];
                    },
                ]
            ))->configureTitle(Loc::getMessage('USER_ENTITY_PERSONAL_MOBILE_FIELD'))
            ,
            (new StringField('PERSONAL_PAGER',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 255),
                        ];
                    },
                ]
            ))->configureTitle(Loc::getMessage('USER_ENTITY_PERSONAL_PAGER_FIELD'))
            ,
            (new TextField('PERSONAL_STREET',
                []
            ))->configureTitle(Loc::getMessage('USER_ENTITY_PERSONAL_STREET_FIELD'))
            ,
            (new StringField('PERSONAL_MAILBOX',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 255),
                        ];
                    },
                ]
            ))->configureTitle(Loc::getMessage('USER_ENTITY_PERSONAL_MAILBOX_FIELD'))
            ,
            (new StringField('PERSONAL_CITY',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 255),
                        ];
                    },
                ]
            ))->configureTitle(Loc::getMessage('USER_ENTITY_PERSONAL_CITY_FIELD'))
            ,
            (new StringField('PERSONAL_STATE',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 255),
                        ];
                    },
                ]
            ))->configureTitle(Loc::getMessage('USER_ENTITY_PERSONAL_STATE_FIELD'))
            ,
            (new StringField('PERSONAL_ZIP',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 255),
                        ];
                    },
                ]
            ))->configureTitle(Loc::getMessage('USER_ENTITY_PERSONAL_ZIP_FIELD'))
            ,
            (new StringField('PERSONAL_COUNTRY',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 255),
                        ];
                    },
                ]
            ))->configureTitle(Loc::getMessage('USER_ENTITY_PERSONAL_COUNTRY_FIELD'))
            ,
            (new TextField('PERSONAL_NOTES',
                []
            ))->configureTitle(Loc::getMessage('USER_ENTITY_PERSONAL_NOTES_FIELD'))
            ,
            (new StringField('WORK_COMPANY',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 255),
                        ];
                    },
                ]
            ))->configureTitle(Loc::getMessage('USER_ENTITY_WORK_COMPANY_FIELD'))
            ,
            (new StringField('WORK_DEPARTMENT',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 255),
                        ];
                    },
                ]
            ))->configureTitle(Loc::getMessage('USER_ENTITY_WORK_DEPARTMENT_FIELD'))
            ,
            (new StringField('WORK_POSITION',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 255),
                        ];
                    },
                ]
            ))->configureTitle(Loc::getMessage('USER_ENTITY_WORK_POSITION_FIELD'))
            ,
            (new StringField('WORK_WWW',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 255),
                        ];
                    },
                ]
            ))->configureTitle(Loc::getMessage('USER_ENTITY_WORK_WWW_FIELD'))
            ,
            (new StringField('WORK_PHONE',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 255),
                        ];
                    },
                ]
            ))->configureTitle(Loc::getMessage('USER_ENTITY_WORK_PHONE_FIELD'))
            ,
            (new StringField('WORK_FAX',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 255),
                        ];
                    },
                ]
            ))->configureTitle(Loc::getMessage('USER_ENTITY_WORK_FAX_FIELD'))
            ,
            (new StringField('WORK_PAGER',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 255),
                        ];
                    },
                ]
            ))->configureTitle(Loc::getMessage('USER_ENTITY_WORK_PAGER_FIELD'))
            ,
            (new TextField('WORK_STREET',
                []
            ))->configureTitle(Loc::getMessage('USER_ENTITY_WORK_STREET_FIELD'))
            ,
            (new StringField('WORK_MAILBOX',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 255),
                        ];
                    },
                ]
            ))->configureTitle(Loc::getMessage('USER_ENTITY_WORK_MAILBOX_FIELD'))
            ,
            (new StringField('WORK_CITY',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 255),
                        ];
                    },
                ]
            ))->configureTitle(Loc::getMessage('USER_ENTITY_WORK_CITY_FIELD'))
            ,
            (new StringField('WORK_STATE',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 255),
                        ];
                    },
                ]
            ))->configureTitle(Loc::getMessage('USER_ENTITY_WORK_STATE_FIELD'))
            ,
            (new StringField('WORK_ZIP',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 255),
                        ];
                    },
                ]
            ))->configureTitle(Loc::getMessage('USER_ENTITY_WORK_ZIP_FIELD'))
            ,
            (new StringField('WORK_COUNTRY',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 255),
                        ];
                    },
                ]
            ))->configureTitle(Loc::getMessage('USER_ENTITY_WORK_COUNTRY_FIELD'))
            ,
            (new TextField('WORK_PROFILE',
                []
            ))->configureTitle(Loc::getMessage('USER_ENTITY_WORK_PROFILE_FIELD'))
            ,
            (new IntegerField('WORK_LOGO',
                []
            ))->configureTitle(Loc::getMessage('USER_ENTITY_WORK_LOGO_FIELD'))
            ,
            (new TextField('WORK_NOTES',
                []
            ))->configureTitle(Loc::getMessage('USER_ENTITY_WORK_NOTES_FIELD'))
            ,
            (new TextField('ADMIN_NOTES',
                []
            ))->configureTitle(Loc::getMessage('USER_ENTITY_ADMIN_NOTES_FIELD'))
            ,
            (new StringField('STORED_HASH',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 32),
                        ];
                    },
                ]
            ))->configureTitle(Loc::getMessage('USER_ENTITY_STORED_HASH_FIELD'))
            ,
            (new StringField('XML_ID',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 255),
                        ];
                    },
                ]
            ))->configureTitle(Loc::getMessage('USER_ENTITY_XML_ID_FIELD'))
            ,
            (new DateField('PERSONAL_BIRTHDAY',
                []
            ))->configureTitle(Loc::getMessage('USER_ENTITY_PERSONAL_BIRTHDAY_FIELD'))
            ,
            (new StringField('EXTERNAL_AUTH_ID',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 255),
                        ];
                    },
                ]
            ))->configureTitle(Loc::getMessage('USER_ENTITY_EXTERNAL_AUTH_ID_FIELD'))
            ,
            (new DatetimeField('CHECKWORD_TIME',
                []
            ))->configureTitle(Loc::getMessage('USER_ENTITY_CHECKWORD_TIME_FIELD'))
            ,
            (new StringField('SECOND_NAME',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 50),
                        ];
                    },
                ]
            ))->configureTitle(Loc::getMessage('USER_ENTITY_SECOND_NAME_FIELD'))
            ,
            (new StringField('CONFIRM_CODE',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 8),
                        ];
                    },
                ]
            ))->configureTitle(Loc::getMessage('USER_ENTITY_CONFIRM_CODE_FIELD'))
            ,
            (new IntegerField('LOGIN_ATTEMPTS',
                []
            ))->configureTitle(Loc::getMessage('USER_ENTITY_LOGIN_ATTEMPTS_FIELD'))
            ,
            (new DatetimeField('LAST_ACTIVITY_DATE',
                []
            ))->configureTitle(Loc::getMessage('USER_ENTITY_LAST_ACTIVITY_DATE_FIELD'))
            ,
            (new StringField('AUTO_TIME_ZONE',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 1),
                        ];
                    },
                ]
            ))->configureTitle(Loc::getMessage('USER_ENTITY_AUTO_TIME_ZONE_FIELD'))
            ,
            (new StringField('TIME_ZONE',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 50),
                        ];
                    },
                ]
            ))->configureTitle(Loc::getMessage('USER_ENTITY_TIME_ZONE_FIELD'))
            ,
            (new IntegerField('TIME_ZONE_OFFSET',
                []
            ))->configureTitle(Loc::getMessage('USER_ENTITY_TIME_ZONE_OFFSET_FIELD'))
            ,
            (new StringField('TITLE',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 255),
                        ];
                    },
                ]
            ))->configureTitle(Loc::getMessage('USER_ENTITY_TITLE_FIELD'))
            ,
            (new StringField('BX_USER_ID',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 32),
                        ];
                    },
                ]
            ))->configureTitle(Loc::getMessage('USER_ENTITY_BX_USER_ID_FIELD'))
            ,
            (new StringField('LANGUAGE_ID',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 2),
                        ];
                    },
                ]
            ))->configureTitle(Loc::getMessage('USER_ENTITY_LANGUAGE_ID_FIELD'))
            ,
            (new BooleanField('BLOCKED',
                []
            ))->configureTitle(Loc::getMessage('USER_ENTITY_BLOCKED_FIELD'))
                ->configureValues('N', 'Y')
                ->configureDefaultValue('N')
            ,
            (new BooleanField('PASSWORD_EXPIRED',
                []
            ))->configureTitle(Loc::getMessage('USER_ENTITY_PASSWORD_EXPIRED_FIELD'))
                ->configureValues('N', 'Y')
                ->configureDefaultValue('N')
            ,
        ];
    }
}
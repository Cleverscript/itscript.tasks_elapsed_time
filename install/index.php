<?php
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ModuleManager;
use Bitrix\Main\EventManager;
use Bitrix\Main\Loader;
use Bitrix\Main\IO\Directory;

Loc::loadMessages(__FILE__);

/**
 * Class itscript_tasks_elapsed_time
 */

if (class_exists("itscript_tasks_elapsed_time")) return;

class itscript_tasks_elapsed_time extends CModule
{
    public $MODULE_ID = "itscript.tasks_elapsed_time";
    public $SOLUTION_NAME = "tasks_elapsed_time";
    public $MODULE_VERSION;
    public $MODULE_VERSION_DATE;
    public $MODULE_NAME;
    public $MODULE_DESCRIPTION;
    public $PARTNER_NAME;
    public $PARTNER_URI;
    public $MODULE_SORT;
    public $SHOW_SUPER_ADMIN_GROUP_RIGHTS;
    public $MODULE_GROUP_RIGHTS;
    public $exclusionAdminFiles;
    public $eventManager;

    function __construct()
    {
        $arModuleVersion = array();
        include(__DIR__ . "/version.php");

        $this->exclusionAdminFiles = array(
            '..',
            '.'
        );

        $this->MODULE_VERSION = $arModuleVersion["VERSION"];
        $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
        $this->MODULE_NAME = Loc::getMessage("ITSCRIPT_TASKS_ELAPSED_TIME_MODULE_NAME");
        $this->MODULE_DESCRIPTION = Loc::getMessage("ITSCRIPT_TASKS_ELAPSED_TIME_MODULE_DESC");

        $this->PARTNER_NAME = Loc::getMessage("ITSCRIPT_TASKS_ELAPSED_TIME_PARTNER_NAME");
        $this->PARTNER_URI = Loc::getMessage("ITSCRIPT_TASKS_ELAPSED_TIME_PARTNER_URI");

        $this->MODULE_SORT = 1;
        $this->SHOW_SUPER_ADMIN_GROUP_RIGHTS = 'Y';
        $this->MODULE_GROUP_RIGHTS = "Y";

        $this->eventManager = EventManager::getInstance();

    }

    public function isVersionD7()
    {

        return CheckVersion(ModuleManager::getVersion("main"), "14.00.00");

    }

    public function GetPath($notDocumentRoot = false)
    {
        if ($notDocumentRoot) {

            return str_ireplace(Application::getDocumentRoot(), '', dirname(__DIR__));

        } else {

            return dirname(__DIR__);

        }
    }

    public static function getModuleId(): string
    {
        return basename(dirname(__DIR__));
    }

    public function getVendor(): string
    {
        $expl = explode('.', $this->MODULE_ID);
        return $expl[0];
    }

    function InstallFiles()
    {

        if (!CopyDirFiles(
                $this->GetPath() . '/install/admin', 
                $_SERVER["DOCUMENT_ROOT"] . '/bitrix/admin/', true)
            ) {

            return false;
        }
        if (!CopyDirFiles(
                $this->GetPath() . '/install/bitrix', 
                $_SERVER["DOCUMENT_ROOT"] . '/bitrix/', true)
            ) {

            return false;
        }

        if (!CopyDirFiles(
                $this->GetPath() . '/install/components', 
                $_SERVER["DOCUMENT_ROOT"] . '/local/components/', true, true)
            ) {

            return false;
        }

        return true;
    }

    function UnInstallFiles()
    {
        Directory::deleteDirectory($_SERVER["DOCUMENT_ROOT"] . '/local/components/' . str_replace('.', '/', $this->MODULE_ID));
    }

    /**
     * Function register events solution
     */
    function InstallEvents()
    {
        $eventManager = EventManager::getInstance();
    }

    /**
     * Function unregister events solution
     */
    function UnInstallEvents()
    {
        $eventManager = EventManager::getInstance();
    }

	/**
	 * Checking if dependent modules are installed
	 * @param $module_id
	 * @return bool
	 */
    function checkIssetExtModules($module_id)
    {
    	if (!Loader::includeModule($module_id)) {
			\CAdminMessage::ShowMessage(
                [
					"MESSAGE" => GetMessage("ITSCRIPT_TASKS_ELAPSED_TIME_CHECK_ISS_MODULE_EXT_ERROR",
						["#MODULE_ID#" => $module_id]
					),
					"DETAILS" => GetMessage("ITSCRIPT_TASKS_ELAPSED_TIME_CHECK_ISS_MODULE_EXT_ERROR_ALT",
						["#MODULE_ID#" => $module_id]
					),
					"HTML" => true,
					"TYPE" => "ERROR"
                ]
			);
			return false;
		}

		return true;
	}

    function DoInstall()
    {
        ModuleManager::registerModule($this->MODULE_ID);

        if (!$this->InstallFiles()) {
            return false;
        }

        $this->InstallEvents();

        return true;
    }

    function DoUninstall()
    {
        ModuleManager::unRegisterModule($this->MODULE_ID);
        $this->UnInstallEvents();
        $this->UnInstallFiles();

        return true;
    }

    function GetModuleRightList()
    {
        return [
            "reference_id" => array("D", "K", "S", "W"),
            "reference" => [
                "[D] " . Loc::getMessage("ITSCRIPT_TASKS_ELAPSED_TIME_DENIED"),
                "[K] " . Loc::getMessage("ITSCRIPT_TASKS_ELAPSED_TIME_READ_COMPONENT"),
                "[S] " . Loc::getMessage("ITSCRIPT_TASKS_ELAPSED_TIME_WRITE_SETTINGS"),
                "[W] " . Loc::getMessage("ITSCRIPT_TASKS_ELAPSED_TIME_FULL")
            ]
        ];
    }
}
<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = [
    "NAME" => GetMessage("CMP_TASKS_LIST_NAME"),
    "DESCRIPTION" => GetMessage("CMP_TASKS_LIST_NAME_DESC"),
    "ICON" => "/images/news_list.gif",
    "SORT" => 1,
    "CACHE_PATH" => "Y",
    "PATH" => [
        "ID" => "Itscript",
        "CHILD" => [
            "ID" => "tasks_list",
            "NAME" => GetMessage("CMP_TASKS_LIST_NAME"),
            "SORT" => 10,
            "CHILD" => [
                "ID" => "tasks_list_cmpx",
            ],
        ],
    ],
];
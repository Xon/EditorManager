<?php

/*!
 * KL/EditorManager/Admin/Controller/Fonts.php
 * License https://creativecommons.org/licenses/by-nc-nd/4.0/legalcode
 * Copyright 2017 Lukas Wieditz
 */

namespace KL\EditorManager\XF\Admin\Controller;

use XF\Mvc\ParameterBag;

/**
 * Class BbCode
 * @package KL\EditorManager\XF\Admin\Controller
 */
class BbCode extends XFCP_BbCode
{
    /**
     * @param $action
     * @param ParameterBag $params
     */
    protected function preDispatchController($action, ParameterBag $params)
    {
        $this->setSectionContext('kl_em_customBBC');
        parent::preDispatchController($action, $params);
    }
}
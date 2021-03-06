<?php

/*!
 * KL/EditorManager/Admin/Controller/Fonts.php
 * License https://creativecommons.org/licenses/by-nc-nd/4.0/legalcode
 * Copyright 2017 Lukas Wieditz
 */

namespace KL\EditorManager\Admin\View\Log\AudioProxy;

use XF\Mvc\View;

/**
 * Class Audio
 * @package KL\EditorManager\Admin\View\Log\AudioProxy
 */
class Audio extends View
{
    /**
     * @return \XF\Http\ResponseFile|\XF\Http\ResponseStream
     * @throws \League\Flysystem\FileNotFoundException
     */
    public function renderRaw()
    {
        /** @var \KL\EditorManager\Entity\AudioProxy $audio */
        $audio = $this->params['audio'];

        /** @var \KL\EditorManager\XF\Proxy\Controller $proxyController */
        $proxyController = \XF::app()->proxy()->controller();
        $proxyController->applyKLEMAudioResponseHeaders($this->response, $audio, null);

        if ($audio->isPlaceholder()) {
            return $this->response->responseFile($audio->getPlaceholderPath());
        } else {
            $resource = \XF::fs()->readStream($audio->getAbstractedAudioPath());
            return $this->response->responseStream($resource, $audio->file_size);
        }
    }
}
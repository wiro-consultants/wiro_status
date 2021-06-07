<?php

namespace WIRO\WiroStatus\Controller;

use WIRO\WiroStatus\Service\ApiCallService;
use TYPO3\CMS\Core\Utility\GeneralUtility;


/*
* This file is part of the "wiro_status" Extension for TYPO3 CMS.
*
* It is free software; you can redistribute it and/or modify it under
* the terms of the GNU General Public License, either version 2
* of the License, or any later version.
*
* For the full copyright and license information, please read the
* LICENSE.txt file that was distributed with this source code.
*
* The TYPO3 project - inspiring people to share!
*/

class StatusController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    public function showAction()
    {

        $url = $this->settings['apiUrl'];   //URL für den API Call muss im TS noch gesetzt werden

        if ($url == NULL) {
            $this->view->assign('message', \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('message', 'wiro_status'));
        }
        else{
            /** @var \TYPO3\CMS\Extbase\Object\ObjectManager $ob */
            $ob = GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Object\ObjectManager::class);
            $api = $ob->get(ApiCallService::class);
            $response = $api->apiCall($url);
        }

        if (empty($response['incidents'])) {
            $incidentsCount = 0;
        } else {
            $incidentsCount = count($response['incidents']);

            for ($i = 0; $i < sizeof($response['incidents']); $i++) {

                $date = strtotime($response['incidents'][$i]['starts_at']);
                $date = date("d.m.Y H:i", $date);
                $date = new \DateTime($date, new \DateTimeZone('UTC'));
                $date->setTimezone(new \DateTimeZone('Europe/Berlin'));

                $response['incidents'][$i]['date'] = $date->format('d.m.Y');
                $response['incidents'][$i]['time'] = $date->format('H:i');

                switch ($response['incidents'][$i]['current_status']['activity_type_id']) {
                    case 1:
                        $response['incidents'][$i]['current_status']['activity_type_id'] = \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('activity_type_id_1', 'wiro_status');
                        break;
                    case 2:
                        $response['incidents'][$i]['current_status']['activity_type_id'] = \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('activity_type_id_2', 'wiro_status');
                        break;
                    case 3:
                        $response['incidents'][$i]['current_status']['activity_type_id'] = \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('activity_type_id_3', 'wiro_status');
                        break;
                    case 5:
                        $response['incidents'][$i]['current_status']['activity_type_id'] = \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('activity_type_id_5', 'wiro_status');
                        break;
                    case 6:
                        $response['incidents'][$i]['current_status']['activity_type_id'] = \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('activity_type_id_6', 'wiro_status');
                        break;
                    case 7:
                        $response['incidents'][$i]['current_status']['activity_type_id'] = \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('activity_type_id_7', 'wiro_status');
                        break;
                    case 8:
                        $response['incidents'][$i]['current_status']['activity_type_id'] = \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('activity_type_id_8', 'wiro_status');
                        break;
                    case 9:
                        $response['incidents'][$i]['current_status']['activity_type_id'] = \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('activity_type_id_9', 'wiro_status');
                        break;
                }

            }
        }

        $statusLink = $this->settings['statusLink'];

        $this->view->assign('response', $response);
        $this->view->assign('incidentsCount', $incidentsCount);
        $this->view->assign('statusLink', $statusLink);
    }

}
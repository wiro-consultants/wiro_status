<?php

namespace WIRO\WiroStatus\Service;

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

class ApiCallService
{
    public function apiCall($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);

        return json_decode($response_json, true);
    }
}
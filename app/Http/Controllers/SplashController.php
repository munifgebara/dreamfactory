<?php
/**
 * This file is part of the DreamFactory Rave(tm)
 *
 * DreamFactory Rave(tm) <http://github.com/dreamfactorysoftware/rave>
 * Copyright 2012-2014 DreamFactory Software, Inc. <support@dreamfactory.com>
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace App\Http\Controllers;

use adLDAP\adLDAP;
use Socialize;
use Response;
use Symfony\Component\HttpFoundation\RedirectResponse;

class SplashController extends Controller
{
    /**
     * Create new splash screen controller.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application splash screen to the user.
     *
     * @return Response
     */
    public function index()
    {
        return view('splash');
    }

    public function redirectToProvider()
    {
        /** @var RedirectResponse $response */
        $response = Socialize::with('facebook')->redirect();

        $url = $response->getTargetUrl();

        echo $url;

        //return $response;
    }

    public function handleFacebookCallback()
    {
        $user = Socialize::with('facebook')->user();

        echo "<pre>";
        print_r($user->user);
        echo "</pre>";
    }

//    public function getLdapAuth()
//    {
////        $r = ldap_connect('192.168.1.81');
////        ldap_set_option($r, LDAP_OPT_PROTOCOL_VERSION, 3);
////        $s = ldap_bind($r, 'cn=admin,dc=example,dc=com', 'amiarifans');
////
////        $ldap = new adLDAP(
////            [
////                'domain_controllers' => ['192.168.1.81'],
////                'base_dn' => 'cn=admin,dc=example,dc=com',
////                'account_suffix' => '@example.com',
////                'ad_port' => '389',
////                'admin_username' => 'admin',
////                'admin_password' => 'amiarifan'
////            ]);
////        $a = $ldap->authenticate('admin', 'amiarifan');
//
//    }
}
<?php

/*
 * Copyright (C) 2018 Fabian Franz
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 * 1. Redistributions of source code must retain the above copyright notice,
 *    this list of conditions and the following disclaimer.
 *
 * 2. Redistributions in binary form must reproduce the above copyright
 *    notice, this list of conditions and the following disclaimer in the
 *    documentation and/or other materials provided with the distribution.
 *
 * THIS SOFTWARE IS PROVIDED ``AS IS'' AND ANY EXPRESS OR IMPLIED WARRANTIES,
 * INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
 * AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * AUTHOR BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY,
 * OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 */

namespace OPNsense\Nginx\Api;

use OPNsense\Base\ApiMutableModelControllerBase;
use OPNsense\Core\Backend;

class SettingsController extends ApiMutableModelControllerBase
{
    static protected $internalModelClass = '\OPNsense\Nginx\Nginx';
    static protected $internalModelName = 'nginx';

    // download rules
    public function downloadrulesAction()
    {
        if (!$this->request->isPost()) {
            return array('error' => 'Must be called via POST');
        }
        $backend = new Backend();
        return array('result' => trim($backend->configdRun('nginx naxsidownloadrules')));
    }

    // User List

    public function searchuserlistAction()
    {
        return $this->searchBase('userlist', array('name', 'users'));
    }

    public function getuserlistAction($uuid = null)
    {
        $this->sessionClose();
        return $this->getBase('userlist', 'userlist', $uuid);
    }

    public function adduserlistAction()
    {
        return $this->addBase('userlist', 'userlist');
    }

    public function deluserlistAction($uuid)
    {
        return $this->delBase('userlist', $uuid);
    }

    public function setuserlistAction($uuid)
    {
        return $this->setBase('userlist', 'userlist', $uuid);
    }

    // Credential
    public function searchcredentialAction()
    {
        return $this->searchBase('credential', array('username'));
    }

    public function getcredentialAction($uuid = null)
    {
        $this->sessionClose();
        return $this->getBase('credential', 'credential', $uuid);
    }

    public function addcredentialAction()
    {
        return $this->addBase('credential', 'credential');
    }

    public function delcredentialAction($uuid)
    {
        return $this->delBase('credential', $uuid);
    }

    public function setcredentialAction($uuid)
    {
        return $this->setBase('credential', 'credential', $uuid);
    }

    // Upstream
    public function searchupstreamAction()
    {
        return $this->searchBase('upstream', array('description', 'serverentries'));
    }

    public function getupstreamAction($uuid = null)
    {
        $this->sessionClose();
        return $this->getBase('upstream', 'upstream', $uuid);
    }

    public function addupstreamAction()
    {
        return $this->addBase('upstream', 'upstream');
    }

    public function delupstreamAction($uuid)
    {
        return $this->delBase('upstream', $uuid);
    }

    public function setupstreamAction($uuid)
    {
        return $this->setBase('upstream', 'upstream', $uuid);
    }

    // Upstream Server
    public function searchupstreamserverAction()
    {
        return $this->searchBase('upstream_server', array('description', 'server', 'port', 'priority'));
    }

    public function getupstreamserverAction($uuid = null)
    {
        $this->sessionClose();
        return $this->getBase('upstream_server', 'upstream_server', $uuid);
    }

    public function addupstreamserverAction()
    {
        return $this->addBase('upstream_server', 'upstream_server');
    }

    public function delupstreamserverAction($uuid)
    {
        return $this->delBase('upstream_server', $uuid);
    }

    public function setupstreamserverAction($uuid)
    {
        return $this->setBase('upstream_server', 'upstream_server', $uuid);
    }

    // Location
    public function searchlocationAction()
    {
        return $this->searchBase('location', array('description','urlpattern', 'path_prefix', 'matchtype', 'enable_secrules', 'force_https'));
    }

    public function getlocationAction($uuid = null)
    {
        $this->sessionClose();
        return $this->getBase('location', 'location', $uuid);
    }

    public function addlocationAction()
    {
        return $this->addBase('location', 'location');
    }

    public function dellocationAction($uuid)
    {
        return $this->delBase('location', $uuid);
    }

    public function setlocationAction($uuid)
    {
        return $this->setBase('location', 'location', $uuid);
    }

    // Custom Policy
    public function searchcustompolicyAction()
    {
        return $this->searchBase('custom_policy', array('name', 'operator', 'value', 'action'));
    }

    public function getcustompolicyAction($uuid = null)
    {
        $this->sessionClose();
        return $this->getBase('custompolicy', 'custom_policy', $uuid);
    }

    public function addcustompolicyAction()
    {
        return $this->addBase('custompolicy', 'custom_policy');
    }

    public function delcustompolicyAction($uuid)
    {
        return $this->delBase('custom_policy', $uuid);
    }

    public function setcustompolicyAction($uuid)
    {
        return $this->setBase('custompolicy', 'custom_policy', $uuid);
    }

    // http server
    public function searchhttpserverAction()
    {
        return $this->searchBase('http_server', array('servername', 'https_only', 'certificate', 'listen_http_port', 'listen_https_port'));
    }

    public function gethttpserverAction($uuid = null)
    {
        $this->sessionClose();
        return $this->getBase('httpserver', 'http_server', $uuid);
    }

    public function addhttpserverAction()
    {
        return $this->addBase('httpserver', 'http_server');
    }

    public function delhttpserverAction($uuid)
    {
        return $this->delBase('http_server', $uuid);
    }

    public function sethttpserverAction($uuid)
    {
        return $this->setBase('httpserver', 'http_server', $uuid);
    }

    // stream server
    public function searchstreamserverAction()
    {
        return $this->searchBase('stream_server', array('description', 'certificate', 'udp', 'listen_port'));
    }

    public function getstreamserverAction($uuid = null)
    {
        $this->sessionClose();
        return $this->getBase('streamserver', 'stream_server', $uuid);
    }

    public function addstreamserverAction()
    {
        return $this->addBase('streamserver', 'stream_server');
    }

    public function delstreamserverAction($uuid)
    {
        return $this->delBase('stream_server', $uuid);
    }

    public function setstreamserverAction($uuid)
    {
        return $this->setBase('streamserver', 'stream_server', $uuid);
    }

    // naxsi rules
    public function searchnaxsiruleAction()
    {
        return $this->searchBase('naxsi_rule', array('description', 'ruletype', 'message'));
    }

    public function getnaxsiruleAction($uuid = null)
    {
        $this->sessionClose();
        return $this->getBase('naxsi_rule', 'naxsi_rule', $uuid);
    }

    public function addnaxsiruleAction()
    {
        return $this->addBase('naxsi_rule', 'naxsi_rule');
    }

    public function delnaxsiruleAction($uuid)
    {
        return $this->delBase('naxsi_rule', $uuid);
    }

    public function setnaxsiruleAction($uuid)
    {
        return $this->setBase('naxsi_rule', 'naxsi_rule', $uuid);
    }

    // http url rewriting
    public function searchhttprewriteAction()
    {
        return $this->searchBase('http_rewrite', array('description', 'source', 'destination', 'flag'));
    }

    public function gethttprewriteAction($uuid = null)
    {
        $this->sessionClose();
        return $this->getBase('httprewrite', 'http_rewrite', $uuid);
    }

    public function addhttprewriteAction()
    {
        return $this->addBase('httprewrite', 'http_rewrite');
    }

    public function delhttprewriteAction($uuid)
    {
        return $this->delBase('http_rewrite', $uuid);
    }

    public function sethttprewriteAction($uuid)
    {
        return $this->setBase('httprewrite', 'http_rewrite', $uuid);
    }

    // http security headers
    public function searchsecurity_headerAction()
    {
        return $this->searchBase('security_header', array('description'));
    }

    public function getsecurity_headerAction($uuid = null)
    {
        $this->sessionClose();
        return $this->getBase('security_header', 'security_header', $uuid);
    }

    public function addsecurity_headerAction()
    {
        return $this->addBase('security_header', 'security_header');
    }

    public function delsecurity_headerAction($uuid)
    {
        return $this->delBase('security_header', $uuid);
    }

    public function setsecurity_headerAction($uuid)
    {
        return $this->setBase('security_header', 'security_header', $uuid);
    }

    // access limit zone headers
    public function searchlimit_zoneAction()
    {
        return $this->searchBase(
            'limit_zone',
            array('description', 'key', 'size', 'rate', 'rate_unit')
        );
    }

    public function getlimit_zoneAction($uuid = null)
    {
        $this->sessionClose();
        return $this->getBase('limit_zone', 'limit_zone', $uuid);
    }

    public function addlimit_zoneAction()
    {
        return $this->addBase('limit_zone', 'limit_zone');
    }

    public function dellimit_zoneAction($uuid)
    {
        return $this->delBase('limit_zone', $uuid);
    }

    public function setlimit_zoneAction($uuid)
    {
        return $this->setBase('limit_zone', 'limit_zone', $uuid);
    }

    // limit_request_connection
    public function searchlimit_request_connectionAction()
    {
        return $this->searchBase(
            'limit_request_connection',
            array('description', 'limit_zone', 'nodelay', 'burst', 'connection_count')
        );
    }

    public function getlimit_request_connectionAction($uuid = null)
    {
        $this->sessionClose();
        return $this->getBase('limit_request_connection', 'limit_request_connection', $uuid);
    }

    public function addlimit_request_connectionAction()
    {
        return $this->addBase('limit_request_connection', 'limit_request_connection');
    }

    public function dellimit_request_connectionAction($uuid)
    {
        return $this->delBase('limit_request_connection', $uuid);
    }

    public function setlimit_request_connectionAction($uuid)
    {
        return $this->setBase('limit_request_connection', 'limit_request_connection', $uuid);
    }
    // cache path
    public function searchcache_pathAction()
    {
        return $this->searchBase(
            'cache_path',
            array('path', 'inactive', 'size', 'max_size')
        );
    }

    public function getcache_pathAction($uuid = null)
    {
        $this->sessionClose();
        return $this->getBase('cache_path', 'cache_path', $uuid);
    }

    public function addcache_pathAction()
    {
        return $this->addBase('cache_path', 'cache_path');
    }

    public function delcache_pathAction($uuid)
    {
        return $this->delBase('cache_path', $uuid);
    }

    public function setcache_pathAction($uuid)
    {
        return $this->setBase('cache_path', 'cache_path', $uuid);
    }

    // SNI Forward
    public function searchsnifwdAction()
    {
        return $this->searchBase('sni_hostname_upstream_map', array('description'));
    }

    public function getsnifwdAction($uuid = null)
    {
        $this->sessionClose();
        $base = $this->getBase('snihostname', 'sni_hostname_upstream_map', $uuid);
        return $this->convert_sni_fwd_for_client($base);
    }

    public function addsnifwdAction()
    {
        if ($this->request->isPost()) {
            $this->regenerate_hostname_map(null);
            return $this->addBase('snihostname', 'sni_hostname_upstream_map');
        }
        //return [];
    }

    public function delsnifwdAction($uuid)
    {
        return $this->delBase('sni_hostname_upstream_map', $uuid);
    }

    public function setsnifwdAction($uuid)
    {
        if ($this->request->isPost()) {
            $this->regenerate_hostname_map($uuid);
            return $this->setBase('snihostname', 'sni_hostname_upstream_map', $uuid);
        }
        return [];
    }

    private function convert_sni_fwd_for_client($response_data)
    {
        if (!isset($response_data['snihostname']['data'])) {
            return $response_data;
        }
        $nginx = $this->getModel();
        $uuids_map = explode(',', $response_data['snihostname']['data']);
        $response_data['snihostname']['data'] = [];
        foreach ($uuids_map as $uuid_line) {
            $rowdata = $nginx->getNodeByReference('sni_hostname_upstream_map_item.' . $uuid_line);
            if ($rowdata != null) {
                $response_data['snihostname']['data'][] =
                    array('hostname' => (string)$rowdata->hostname,
                        'upstream' => (string)$rowdata->upstream);
            }
        }
        return $response_data;

        //array("snihostname" => array("description" => "", "data" =>[
        //    array("hostname" => 'fabian-franz.org', "upstream" => "7d33fd32-1c76-41d9-8113-2702314dfef6")
        //]));
    }

    /**
     * @param null $uuid the uuid which should get cleared before
     * @throws \ReflectionException if the model was not found
     * @throws \Phalcon\Validation\Exception on validation errors
     */
    private function regenerate_hostname_map($uuid = null)
    {
        $nginx = $this->getModel();
        if ($this->request->hasPost('snihostname') && is_array($_POST['snihostname']['data'])) {
            if ($uuid != null) {
                // for an update, we have to clear it.
                $tmp = (string)$nginx->getNodeByReference('sni_hostname_upstream_map.' . $uuid)->data;
                //$this->delBase('sni_hostname_upstream_map', $uuid);
            }
            $ids = [];
            $postdata = $_POST['snihostname']['data'];
            foreach ($postdata as $post_item) {
                $item = $nginx->sni_hostname_upstream_map_item->Add();
                $ids[] = $item->getAttributes()['uuid'];
                $item->hostname = $post_item['hostname'];
                $item->upstream = $post_item['upstream'];
            }
            //$nginx->sni_hostname_upstream_map->eventPostLoading();
            $nginx->serializeToConfig();
            $_POST['snihostname']['data'] = implode(',', $ids);
        }
    }
}

<?php


namespace ZabbixApi;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use InvalidArgumentException;
use ZabbixApi\Exceptions\ZabbixAPIException;

/**
 * @property \ZabbixApi\IdeHelper\Action action
 * @property \ZabbixApi\IdeHelper\Alert alert
 * @property \ZabbixApi\IdeHelper\ApiInfo apiInfo
 * @property \ZabbixApi\IdeHelper\Application application
 * @property \ZabbixApi\IdeHelper\Configuration configuration
 * @property \ZabbixApi\IdeHelper\Correlation correlation
 * @property \ZabbixApi\IdeHelper\Dashboard dashboard.
 * @property \ZabbixApi\IdeHelper\DHost dHost
 * @property \ZabbixApi\IdeHelper\DService dService
 * @property \ZabbixApi\IdeHelper\DCheck dCheck
 * @property \ZabbixApi\IdeHelper\DRule dRule
 * @property \ZabbixApi\IdeHelper\Event event
 * @property \ZabbixApi\IdeHelper\Graph graph
 * @property \ZabbixApi\IdeHelper\GraphItem graphItem
 * @property \ZabbixApi\IdeHelper\GraphPrototype graphPrototype
 * @property \ZabbixApi\IdeHelper\History history
 * @property \ZabbixApi\IdeHelper\Host host
 * @property \ZabbixApi\IdeHelper\HostGroup hostGroup
 * @property \ZabbixApi\IdeHelper\HostInterface hostInterface
 * @property \ZabbixApi\IdeHelper\HostPrototype hostPrototype
 * @property \ZabbixApi\IdeHelper\IconMap iconMap
 * @property \ZabbixApi\IdeHelper\Image image
 * @property \ZabbixApi\IdeHelper\Item item
 * @property \ZabbixApi\IdeHelper\ItemPrototype itemPrototype
 * @property \ZabbixApi\IdeHelper\Service service
 * @property \ZabbixApi\IdeHelper\DiscoveryRule discoveryRule
 * @property \ZabbixApi\IdeHelper\Maintenance maintenance
 * @property \ZabbixApi\IdeHelper\Map map
 * @property \ZabbixApi\IdeHelper\MediaType mediaType
 * @property \ZabbixApi\IdeHelper\Problem problem
 * @property \ZabbixApi\IdeHelper\Proxy proxy
 * @property \ZabbixApi\IdeHelper\Screen screen
 * @property \ZabbixApi\IdeHelper\ScreenItem screenItem
 * @property \ZabbixApi\IdeHelper\Script script
 * @property \ZabbixApi\IdeHelper\Template template
 * @property \ZabbixApi\IdeHelper\TemplateScreen templateScreen
 * @property \ZabbixApi\IdeHelper\TemplateScreenItem templateScreenItem
 * @property \ZabbixApi\IdeHelper\Trend trend
 * @property \ZabbixApi\IdeHelper\Trigger trigger
 * @property \ZabbixApi\IdeHelper\TriggerPrototype triggerPrototype
 * @property \ZabbixApi\IdeHelper\User user
 * @property \ZabbixApi\IdeHelper\UserGroup userGroup
 * @property \ZabbixApi\IdeHelper\UserMacro userMacro
 * @property \ZabbixApi\IdeHelper\ValueMap valueMap
 * @property \ZabbixApi\IdeHelper\HttpTest httpTest
 */
class ZabbixApi
{

    /**
     * @var Client
     */
    protected $client;

    /**
     * @var null
     */
    protected $auth;

    /**
     * @var string
     */
    protected $url;

    /**
     * ZabbixApi constructor.
     * @param null $url
     * @param array|false|null $credentials array of credentials ['user' => 'Username', 'password' => 'Password], null if credentials from environment or default should be used, false to skip login
     * @param array $config
     * @throws ZabbixAPIException
     */
    public function __construct($url = null, $credentials = null, array $config = [])
    {
        $url = $url ?? $this->getenv('ZABBIX_URL', 'https://localhost/zabbix');

        $credentials = $credentials !== null ? $credentials : [
            'user' => $this->getenv('ZABBIX_USER', 'Admin'),
            'password' => $this->getenv('ZABBIX_PASSWORD', 'zabbix')
        ];

        $this->client = new Client($config);

        $this->auth = null;
        $this->url = $url . '/api_jsonrpc.php';

        if ($credentials !== false) {
            $this->login($credentials);
        }
    }

    public function __get($group)
    {
        return new class($group, $this)
        {
            protected $group;
            protected $api;

            public function __construct($group, ZabbixApi $api)
            {
                $this->group = strtolower($group);
                $this->api = $api;
            }

            public function __call($name, $params)
            {
                $name = strtolower($name);
                return $this->api->do_request(
                    "{$this->group}.{$name}",
                    $params[0] ?? null
                )['result'];
            }
        };
    }

    /**
     * @param $credentials
     * @throws ZabbixAPIException
     */
    public function login($credentials)
    {
        $this->auth = $this->user->login($credentials);
    }

    public function logout()
    {
        if ($this->auth) {
            try {
                if ($this->user->logout()) {
                    $this->auth = null;
                }
            } catch (ZabbixAPIException $e) {
            }
        }
    }

    public function __destruct()
    {
        $this->logout();
    }

    /**
     * @return string
     */
    public function api_version()
    {
        return $this->apiInfo->version();
    }

    /**
     * Make request to Zabbix API.
     *
     * @param string $method ZabbixAPI method, like: `apiinfo.version`.
     * @param array|null $params ZabbixAPI method arguments.
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function do_request($method, array $params = null)
    {
        $data = [
            'jsonrpc' => '2.0',
            'method' => $method,
            'params' => $params ?? [],
            'id' => 1,
        ];

        if ($this->auth && !in_array($method, ['apiinfo.version', 'user.login'])) {
            $data['auth'] = $this->auth;
        }

        $req = new Request('POST', $this->url, [
            'Content-Type' => 'application/json-rpc'
        ]);

        try {
            $res = $this->client->send($req, [
                'body' => \GuzzleHttp\json_encode($data),
            ]);
            $res_json = \GuzzleHttp\json_decode($res->getBody()->getContents(), true);
        } catch (InvalidArgumentException $e) {
            throw new ZabbixAPIException("Unable to parse json: {$e->getMessage()}");
        } catch (GuzzleException $e) {
            throw new ZabbixAPIException("Unable to send request: {$e->getMessage()}");
        }

        if (isset($res_json['error'])) {
            $err = $res_json['error'];
            $err['json'] = $data;
            throw new ZabbixAPIException(json_encode($err));
        }

        return $res_json;
    }

    /**
     * Return id or ids of zabbix objects.
     *
     * @param string $item_type
     * @param null $item Type of zabbix object. (eg host, item etc.)
     * @param bool $with_id Returned values will be in zabbix json `id` format.
     * @param null $hostid Filter objects by specific hostid.
     * @param array $args additional options
     * @return array|mixed|null
     * @throws ZabbixAPIException
     */
    public function get_id($item_type, $item = null, $with_id = false, $hostid = null, $args = [])
    {
        $result = null;
        $name = $args['name'] ?? false;

        $type = "{$item_type}.get";

        $item_filter_name = [
            'mediatype' => 'description',
            'trigger' => 'description',
            'triggerprototype' => 'description',
            'user' => 'alias',
            'usermacro' => 'macro',
        ];

        $item_id_name = [
            'discoveryrule' => 'item',
            'graphprototype' => 'graph',
            'hostgroup' => 'group',
            'itemprototype' => 'item',
            'map' => 'selement',
            'triggerprototype' => 'trigger',
            'usergroup' => 'usrgrp',
            'usermacro' => 'hostmacro',
        ];

        $filter = [
            'filter' => [
                $item_filter_name[$item_type] ?? 'name' => $item,
            ],
            'output' => 'extend'
        ];

        if ($hostid) {
            $filter['filter']['hostid'] = $hostid;
        }

        if (isset($args['templateids'])) {
            if ($item_type == 'usermacro') {
                $filter['hostids'] = $args['templateids'];
            } else {
                $filter['templateids'] = $args['templateids'];
            }
        }

        if (isset($args['app_name'])) {
            $filter['application'] = $args['app_name'];
        }

        $response = $this->do_request($type, $filter)['result'] ?? null;

        if ($response) {
            $item_id_str = $item_id_name[$item_type] ?? $item_type;
            $item_id = "{$item_id_str}id";
            $result = [];
            foreach ($response as $obj) {
                if (isset($args['templateids'])) {
                    if ($obj['templateid'] == "0" || $obj['templateid'] == null || (is_array($obj['templateid']) && count($obj['templateid']) === 0)) {
                        continue;
                    }
                }

                if ($name) {
                    $result[] = $obj[$item_filter_name[$item_type ?? 'name']];
                } elseif ($with_id) {
                    $result[$item_id] = (int)$obj[$item_id];
                } else {
                    $result[] = (int)$obj[$item_id];
                }
            }

            if ($item !== null && !is_array($item)) {
                $result = $result[0];
            }
        }

        return $result;
    }

    private function getenv(string $key, $default = null)
    {
        $value = getenv($key);

        return $value !== false ? $value : $default;
    }
}
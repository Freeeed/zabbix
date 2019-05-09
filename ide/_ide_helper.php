<?php

namespace ZabbixApi\IdeHelper;

use ZabbixApi\Exceptions\ZabbixAPIException;

interface Action {

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function create(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function delete(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function get(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function update(array $params = []);
}

interface Alert
{
    /**
     * @return string
     * @throws ZabbixAPIException
     */
    public function get(): string;
}

interface ApiInfo
{
    /**
     * @return string
     */
    public function version();
}

interface Application
{
    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function create(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function delete(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function get(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function massadd(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function update(array $params = []);
}

interface Configuration
{
    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function export(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function import(array $params = []);
}

interface Correlation
{
    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function create(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function delete(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function get(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function update(array $params = []);
}

interface Dashboard
{
    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function create(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function delete(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function get(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function update(array $params = []);
}

interface DHost
{
    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function get(array $params = []);
}

interface DService
{

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function get(array $params = []);
}

interface DCheck
{

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function get(array $params = []);
}

interface DRule
{
    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function create(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function delete(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function get(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function update(array $params = []);
}

interface Event
{
    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function acknowledge(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function get(array $params = []);
}

interface Graph
{
    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function create(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function delete(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function get(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function update(array $params = []);
}

interface GraphItem
{
    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function get(array $params = []);
}

interface GraphPrototype
{
    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function create(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function delete(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function get(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function update(array $params = []);
}

interface History
{
    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function get(array $params = []);
}

interface Host
{
    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function create(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function delete(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function get(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function massAdd(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function massRemove(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function massUpdate(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function update(array $params = []);
}

interface HostGroup
{
    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function create(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function delete(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function get(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function massAdd(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function massRemove(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function massUpdate(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function update(array $params = []);
}

interface HostInterface
{
    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function create(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function delete(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function get(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function massAdd(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function massRemove(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function replaceHostInterfaces(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function update(array $params = []);
}

interface HostPrototype
{
    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function create(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function delete(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function get(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function update(array $params = []);
}

interface IconMap
{
    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function create(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function delete(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function get(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function update(array $params = []);
}

interface Image
{
    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function create(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function delete(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function get(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function update(array $params = []);
}

interface Item
{
    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function create(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function delete(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function get(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function update(array $params = []);
}

interface ItemPrototype
{
    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function create(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function delete(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function get(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function update(array $params = []);
}

interface Service
{
    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function addDependencies(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function addTimes(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function create(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function delete(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function deleteDependencies(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function deleteTimes(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function get(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function getSLA(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function update(array $params = []);
}

interface DiscoveryRule
{
    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function copy(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function create(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function delete(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function get(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function update(array $params = []);
}

interface Maintenance
{
    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function create(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function delete(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function get(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function update(array $params = []);
}

interface Map
{
    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function create(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function delete(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function get(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function update(array $params = []);
}

interface MediaType
{
    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function create(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function delete(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function get(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function update(array $params = []);
}

interface Problem
{
    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function get(array $params = []);
}

interface Proxy
{
    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function create(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function delete(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function get(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function update(array $params = []);
}

interface Screen
{
    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function create(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function delete(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function get(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function update(array $params = []);
}

interface ScreenItem
{
    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function create(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function delete(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function get(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function update(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function updateByPosition(array $params = []);
}

interface Script
{
    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function create(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function delete(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function get(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function getScriptsByHosts(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function update(array $params = []);
}

interface Template
{
    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function create(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function delete(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function get(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function massAdd(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function massRemove(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function massUpdate(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function update(array $params = []);
}

interface TemplateScreen
{
    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function copy(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function create(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function delete(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function get(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function update(array $params = []);
}

interface TemplateScreenItem
{
    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function get(array $params = []);
}

interface Trend
{
    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function get(array $params = []);
}

interface Trigger
{
    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function addDependencies(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function deleteDependencies(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function create(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function delete(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function get(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function update(array $params = []);
}

interface TriggerPrototype
{
    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function create(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function delete(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function get(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function update(array $params = []);
}

interface User
{
    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function create(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function delete(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function get(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function login(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function logout(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function update(array $params = []);
}

interface UserGroup
{
    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function create(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function delete(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function get(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function update(array $params = []);
}

interface UserMacro
{
    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function create(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function createGlobal(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function delete(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function deleteGlobal(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function get(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function update(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function updateGlobal(array $params = []);
}

interface ValueMap
{
    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function create(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function delete(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function get(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function update(array $params = []);
}

interface HttpTest
{
    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function create(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function delete(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function get(array $params = []);

    /**
     * @param array $params
     * @return mixed
     * @throws ZabbixAPIException
     */
    public function update(array $params = []);
}

<?php
// auto-generated by sfRoutingConfigHandler
// date: 2015/05/29 11:26:22
return array(
'homepage' => new sfRoute('/', array (
  'module' => 'accueil',
  'action' => 'index',
), array (
), array (
)),
'default_index' => new sfRoute('/:module', array (
  'action' => 'index',
), array (
), array (
)),
'default' => new sfRoute('/:module/:action/*', array (
), array (
), array (
)),
);

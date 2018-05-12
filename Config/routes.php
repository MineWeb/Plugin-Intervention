<?php
/**
 * Kenshimdev : Développeur web et administrateur système (https://kenshimdev.fr/)
 * @author        Kenshimdev - https://kenshimdev.fr
 * @copyright     Kenshimdev - All rights reserved
 * @link          http://mineweb.org/market
 * @since         10.03.17
 */

Router::connect('/admin/Intervention', ['controller' => 'Intervention', 'action' => 'index', 'plugin' => 'Intervention', 'admin' => true]);
Router::connect('/admin/Intervention/delete/:id', ['controller' => 'Intervention', 'action' => 'delete', 'plugin' => 'Intervention', 'admin' => true], ['pass' => ['id']], ['id' => '[0-9]+']);
Router::connect('/Intervention', ['controller' => 'Intervention', 'action' => 'index', 'plugin' => 'Intervention']);

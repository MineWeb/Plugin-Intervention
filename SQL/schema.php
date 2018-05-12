<?php
/**
 * Kenshimdev : Développeur web et administrateur système (https://kenshimdev.fr/)
 * @author        Kenshimdev - https://kenshimdev.fr
 * @copyright     Kenshimdev - All rights reserved
 * @link          http://mineweb.org/market
 * @since         28.02.2017
 */
 
class InterventionAppSchema extends CakeSchema {

	public function before($event = []) {
		return true;
	}

	public function after($event = []) {}

	public $intervention__list = [
		'id' => [
			'type' => 'integer',
			'null' => false,
			'default' => null,
			'length' => 11,
			'unsigned' => false,
			'autoIncrement' => true,
			'key' => 'primary'],
			
		'author' => [
			'type' => 'string',
			'null' => false,
			'default' => null,
			'length' => 50],

		'description' => [
			'type' => 'text',
			'null' => false,
			'default' => null,
			'length' => 255],
		
		'level' => [
			'type' => 'integer', 
			'null' => false, 
			'default' => '0', 
			'unsigned' => false],

		'created' => [
			'type' => 'datetime',
			'null' => false,
			'default' => null],

		'tableParameters' => [
			'charset' => 'utf8', 
			'collate' => 'utf8_general_ci', 
			'engine' => 'InnoDB']
	];
}
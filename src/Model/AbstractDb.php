<?php
/**
 * Herms (http://theicon.co.nz/)
 *
 * Manager
 *
 * PHP version 7
 *
 * @category Module
 * @package  HermsCore
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://theicon.co.nz
 * @link     http://theicon.co.nz
 */
 namespace HermsCore\Model;
 
class AbstractDb
{
	public function prepareColumnName($fildname)
	{
		$tmp = str_replace("_", " ", $fildname);
		return str_replace(" ","", ucfirst($tmp));
	}
}
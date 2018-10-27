<?php
	class Manager
	{
	    protected function dbConnect()
	    {
	        $db = new PDO('mysql:host=yunnantohcblog.mysql.db;dbname=yunnantohcblog;charset=utf8', 'yunnantohcblog', '29111991Kgb');
	        return $db;
	    }
	}
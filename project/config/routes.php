<?php
	use \Core\Route;
	
	return [
        //pages part
        new Route('/',   'page', 'index'),
        //users part
        //new Route('/users/',   'users', 'index'),
        new Route('/login',   'users', 'login'),
        new Route('/users/logout',   'users', 'logout'),
        new Route('/users/edit',   'users', 'edit'),
        new Route('/users/edit/:id',   'users', 'editUsr'),
        new Route('/users/all-users',   'users', 'allUsers'),
        new Route('/users/reg',   'users', 'reg'),
        //error part
        new Route('/error/404',   'error', 'error'),
        //vacation part
        new Route('/users/', 'vacation', 'index'),
        new Route('/vacation/add/:url', 'vacation', 'add'),
        new Route('/vacation/checkbox', 'vacation', 'checkbox'),
	];

<?php

    namespace AppBundle\Controller;

	use JavierEguiluz\Bundle\EasyAdminBundle\Controller\AdminController as BaseAdminController;

	class AdminController extends BaseAdminController
	{
	    public function createNewPersonaEntity()
	    {
	        return $this->get('fos_user.user_manager')->createUser();
	    }

	    public function prePersistPersonaEntity($user)
	    {
	        $this->get('fos_user.user_manager')->updateUser($user, false);
	    }
	    
	    public function preUpdatePersonaEntity($user)
        {
        $this->get('fos_user.user_manager')->updateUser($user, false);
        }
	}
	
	

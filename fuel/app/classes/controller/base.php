<?php


class Controller_Base extends Controller {

    public function before()
    {
        parent::before();
            
        // load the theme template
        $this->theme = \Theme::instance();

        // set the page template
        $this->theme->set_template('layouts/homepage');

        // set the page title (can be chained to set_template() too)
        $this->theme->get_template()->set('title', 'My homepage');  


        $this->current_user = "Guest";
		// Assign current_user to the instance so controllers can use it
		if(\Warden::check())
        {
            $user = \Warden::current_user();
            $this->current_user = $user->username;
        }
     
		// Set a global variable so views can use it
		View::set_global('current_user', $this->current_user);
        
    }

    public function after($response)
    {
        // If no response object was returned by the action,
        if (empty($response) or  ! $response instanceof Response)
        {
            // render the defined template
            $response = \Response::forge(\Theme::instance()->render());
        }

        return parent::after($response);
    }
   


}
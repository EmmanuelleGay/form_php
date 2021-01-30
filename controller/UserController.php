<?php
require_once dirname( __FILE__ ) . '/../util/FormatUtil.php';
require_once dirname( __FILE__ ) . '/../model/User.php';

/**
 * UserController
 * User-related action dispatcher
 */
class UserController{
    private $user;
    
    /**
     * __construct
     * conestructor sanitizes request, initializes a user, and calls an action 
     * @return void
     */
    public function __construct(){
         // Sanitize request parameters
        FormatUtil::sanitize($_GET);
        FormatUtil::sanitize($_POST); // need recursive sanitizing for multidimensional array

        $this->initializeUser();

        if (method_exists($this, @$_GET['action'])){ // if an action is specified in URL, and a corresponding method exists
            $this->{$_GET['action']}(); // call action method
        } else {
            $this->default(); // else call default action
        }
    }
    
    /**
     * initializeUser
     * Sets user class parameter to a user from data source if specified in url, otherwise a new user
     * @return void
     */
    private function initializeUser(){
        if (!empty($_GET['id'])) { // If a user ID is specified in the URL
            $this->user = UserDao::findById($_GET['id']); // find corresponding user in data source
        }
        
        if (!$this->user){ // If no ID specified, or wrong ID specified
            $this->user = new User;
        }
    }
    
    /**
     * edit
     * edit an existing user, or a newly-created one
     * @return void
     */
    private function edit(){
        $template = 'edit'; 

        if (!empty($_POST['user'])) { // if we arrived here by way of the submit button in the edit view
            $this->user->setParametersFromArray($_POST['user']);
            if ($this->user->isValid()) {
                UserDao::saveOrUpdate($this->user);
                $template = null; // null template will redirect to default action
            }
        }
        
        // template remains "edit" if no POST user parameters, or if user parameters in POST are invalid
        $this->render($template);
    }
    
    /**
     * delete
     * shows a delete confirmation form, which if submitted deletes user
     * @return void
     */
    private function delete(){
        $template = 'delete'; 

        if (!empty($_POST)) { // if we arrived here by way of the submit button in the delete view
            UserDao::delete($this->user);
            $template = null; // null template will redirect to default action
        }

        $this->render($template);
    }
    
    /**
     * render
     * renders a template
     * @param  mixed $templateName template name , or null to redirect to default action
     * @return void
     */
    private function render ($templateName){
        if ($templateName == null){
            $this->default(); // redirect to default action if no template specified;
        } else {
            $user = $this->user; // Make $user variable available in templates
            require_once "view/$templateName.php";
        }
    }

            
    /**
     * read
     * view user parameters
     * @return void
     */
    private function read(){
        $this->render('read');
    }
    
    /**
     * default
     * default action (called if no action specified, wrong action specified, or null template specified)
     * @return void
     */
    private function default(){
        $this->render("list");
    }
}
?>
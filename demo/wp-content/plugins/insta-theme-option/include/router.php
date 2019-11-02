<?php
class Router
{
    /**
    * Router setup routine.
    *
    * Construct takes a $route array which needs to have a controller name,
    * method (action) name
    * and possible arguments and tries to find the respective classes and
    * methods.
    *
    * If it can't find the controller, it returns the default controller and
    * default method - both defined
    *
    * If it finds the controller, it looks for the defined method, if not it
    * looks for the default method ( which also needs to be defined) and
    * supplies it with arguments if they exist.
    *
    *
    * @param array $route ( (str) controller, (str) method, (mixed) args )
    * @param string $default_controller - the fallback class
    * @param string $default_method to use in all cases - the action
    * @return void
    */
    public function __construct( $route, $default_controller, $default_method )
    {
        /*try the route specified in $route, if not fallback to the
          $default_method*/
        $try = $this->route_it( $route, $default_method );
        
        /*if that didn't work out, then revert to the default controller*/
        if( $try === false )
        {
            return
                $this
                 ->default_route_it( $default_controller, $default_method, $route[2] );
        }
    }
 
    /**
    * The first step. Try the route specified in $route array
    *
    *
    * @param array $route( $controller, $method, $args)
    * @param string $default_method to use in all cases - the action
    * @return void
    */
 
    public function route_it( $route, $default_method )
    {
        
        $controller = $route[0]; // the array's first element
        $method = $route[1]; // the array's second element
 
        /*the extracted arguments. Probably other $_GET variables.
          we check if it is set and use it if it is*/
        $parameters = ( isset( $route[2] ) ? $route[2] : NULL );
 
        /*Checking if an instance of the controller supplied already exists*/
        if( is_object( $controller ) and ( $controller instanceof $controller ) )
        {
            /*we'll use the existing instance*/
            $obj = $controller;
        }
        /*if not instanced, we have to check if it is a valid class*/
        elseif( class_exists( $controller ) )
        {
            /*and try to initialise it*/
            $obj = new $controller();
        }
        else
        {
            /*Nope! Class doesn't exist. Did we include the file? */
            return false;
        }

        /*Now, for the method! Checking to see if it exists in the class*/
        if( method_exists( $obj, $method ) )
        {
            /*if it does, we return that method together with the arguments*/
            return $obj->$method( $parameters );
        }
        /*if not, we check if the default method exists*/
        elseif( method_exists( $obj, $default_method ) )
        {
            /*if it does, we return that method together with the arguments*/
            return $obj->$default_method( $parameters );
        }
        else
        {
            /*No luck! The supplied route didn't work*/
            return false;
        }
    }
 
    /**
    * The second possibilty. Try the default controller. Functionality is
    * almost identical to the former.
    * Didn't combine it for readibility
    *
    *
    * @param string default controller name - the fallback class
    * @param string default method to use in all cases - the action
    * @param mixed arguments
    * @return void
    */
 
    public function default_route_it( $controller, $method, $parameters = NULL )
    {
        //echo "Falling back to defaults";
 
        /*same thing, checking for existing instance*/
        if( is_object( $controller ) and ( $controller instanceof $controller ) )
        {
            // using existing instance
            $obj = $controller;
        }
        elseif( class_exists( $controller ) )
        {
            /*using new instance*/
            $obj = new $controller();
        }
        else
        {
            return false;
        }
 
        /*since this is the default method, it really should exist!
          No sense in doing more checks...*/
          
        if( method_exists( $obj, $method ) )
        {
            // same thing again, returning the method with optional params
            return $obj->$method( $parameters );
        }
        else
        {
            return false;
        }
    }
}?>
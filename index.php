<?php
/**
 * Main Template File.
 * 
 * @package wpadvancedtheme
 * 
 */

//AUTOLOADER
spl_autoload_register( function( $class ) {
    include 'includes/' . $class . '.php';
} );

//TRAIT
trait say_world {
   public function say_hello() {
        echo 'Say Hello' . '</br>';
    }
}

class Teacher {
    public function say_name() {
        echo 'Teacher' . '</br>';
    }
}

class Base extends Teacher {
    //using the "trait"
    use say_world;

    public function __construct() {
        //
    }
}
$base = new Base();


get_header();
 ?>

    <?php
        // echo $base->say_hello();
        // echo $base->say_name();
    ?>

<?php get_footer(); ?>
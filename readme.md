# changes
## Folder Structure of the added files
````
--> wp-content
    --> themes
        --> twentyseventeen (theme folder)
            --> assets
                --> css 
                    -- bootstrap.min.css
                    -- style.css
                --> js
                    -- bootstrap.min.js
                    -- jquery.validate.min.js
                    -- additional-methods.min.js
                    -- validate.js
            --> includes ( create a new directory )
                -- config.php
                -- contact_validation.php
            --> vendor ( create a new directory )
                --> phpmailer (Download link: https://github.com/PHPMailer/PHPMailer)
            -- functions.php few changes are there which will be covered below)   
            -- contact.php
            -- footer-contact.php
````
***

> wordpress folder loaction **wp-content/themes**

> i've used twentyseventeen theme and my wordpress version is 4.8 (doen't matter anyway)

***
> update the config(Location: <theme-folder>/includes/config.php) file with valid setups values
***
### __<theme-folder>/functions.php__ 
1. enable PHP Sessions
    ````
    function startSession() {
    	if(!session_id()) {
    		session_start();
    	}
    }
    function endSession() {
    	session_destroy();
    }
    add_action('init', 'startSession', 1);
    add_action('wp_logout', 'endSession');
    add_action('wp_login', 'endSession');
    ````
    2.added bootstrap theme 
    ````
    wp_enqueue_style('twitter-bootstrap',get_theme_file_uri('/assets/css/bootstrap.min.css'),array(),'3.3.7');
	wp_enqueue_style('custom-styles',get_theme_file_uri('/assets/css/style.css'),array(),'1.0');
    ````
    3.added bootstrap js ( dependent on jquery )
    4.added jquery Validation (assets/js/jquery.validate.min.js, additional-methods.min.js) 
    ````
    // load bootstrap plugin
	wp_enqueue_script( 'bootstrap-js', get_theme_file_uri( '/assets/js/bootstrap.min.js' ), array( 'jquery' ), '3.3.7', true );
	// load jquery validation
	wp_enqueue_script( 'validation-js', get_theme_file_uri( '/assets/js/jquery.validate.min.js' ), array( 'jquery' ), '1.16.0', true );
	wp_enqueue_script( 'validation-additional-js', get_theme_file_uri( '/assets/js/additional-methods.min.js' ), array( 'validation-js' ), '1.16.0', true );
    ````
    5.added validate.js ( assets/js/validate.js) for contact form validation
    
***

## <theme-folder>/contact.php 
1. created contact form contact.php (contact.php)
2. created new footer-contact.php to include the validate.js (as it is page specific)
3. created includes/contact_validation.php 
4. phpmailer under vendor directory (downloaded)
5. config.php ( returns an array containing information for SMTP setup and defaults for Mail settings)
6. added capthca validation

***
> Download Link for jquery Validator [jquery Validator](https://github.com/jquery-validation/jquery-validation/releases/tag/1.16.0)

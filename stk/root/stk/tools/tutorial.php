<?php
/**
*
* @package Support Tool Kit - Tutorial
* @version $Id$
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/*
* This will be a tutorial page for how to build a new tool to be used with the Support Tool Kit.
*
* Before you ask why this tool does not show in the Tools list in the Support Tool Kit, that is because the Support Tool Kit is setup to ignore the file named tutorial.php.
*
* You do not need to add any language files.
* If you name your language file the same as the name of this file and put it in the stk/language/en/tools/ directory it will be loaded automatically
*/

/*
* Make sure you have this check for security reasons.
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

/*
* The class name MUST be the same as the filename (minus .$phpEx)
*/
class tutorial
{
	/*
	* Auto Include
	*
	* This array holds all files that should be included when the class is loaded. (the system will asume that they are located
	* within includes/[tool_name]). If the file is located in a sub directory, you should include that directory as well (see example)
	* Only add the file extention if it is not a .php file
	* The array should be formatted as followed: the key contains the file name and the array value is a boolean with which you can set
	* whether the file should be included (true), or just checked whether it exists in the system (false, probably only used for non php
	* files that are used to get data from, like .sql schemas)
	*/
	var $auto_include = array(
		'tutorial_functions' => true,
		'some_dir/some_file.sql' => false
	);

	/*
	* Version specific tool
	*
	* In order to make a tool phpBB version specific (for example the clean database tool), set the following variable
	* so that it holds the supported version number. If the phpBB version isn't correct the tool won't be displayed on
	* the stk index page.
	*/
	var $phpbb_version = '3.0.2';

	/*
	* Tool Info
	*
	* This function is required and returns the tool info to the Support Tool Kit
	*/
	function info()
	{
		global $user;

		return array(
			// The name of this tool that will be shown to the user (required)
			'NAME'			=> $user->lang['TUTORIAL'],

			// This is an explaination shown to the user about this tool (not required)
			'NAME_EXPLAIN'	=> $user->lang['TUTORIAL_EXPLAIN'],

			// The category this tool should be shown in, by default ADMIN_TOOLS, DEV_TOOLS, and USER_GROUP_TOOLS are the categories, but you may add any extras you would like (required)
			'CATEGORY'		=> $user->lang['ADMIN_TOOLS'],
		);
	}

	/*
	* Display Options
	*
	* This function sets up the display page which will show the options we want to show for this tool
	*
	* There are a few things that can be done with this function.
	* 	1. Return a string.
	*		Returning a string makes the system show a confirm page using confirm_box
	*		Send the string like 'TUTORIAL', like the normal confirm box it will use $user->lang['TUTORIAL'] and $user->lang['TUTORIAL_CONFIRM']
	*	2. Return an array
	*		Returning an array makes the system show a page similar to the acp_board. (More on this later)
	*	3. Return false
	*		Returning false makes the system do nothing with the initial display.
	*		This may be used to display your own page.  You can do anything you'd like.
	*		Just be sure that your page sets 'submit' in $_POST or you will have to check that yourself and run the $this->run_tool function if required
	*/
	function display_options()
	{
		/*
		* Method 1
		*/
		return 'TUTORIAL';

		/*
		* Method 2
		*/
		return array(
			'title'	=> 'TUTORIAL',
			'vars'	=> array(
				'legend1'			=> 'TUTORIAL',
				'tutorial'			=> array('lang' => 'TUTORIAL', 'type' => 'text:40:255', 'explain' => true),
			)
		);

		/*
		* Method 3
		*/
		// Do anything here

		return false;
	}

	/*
	* Run Tool
	*
	* This function should do what this tool was designed to do.
	*
	* If you did NOT return a string in display_options() you will recieve an array to put in any errors.
	*	Using &$error allows you to put any error in the array and then return.  If this is done the system will call display_options again and output any error
	*	If you used Method 2 for display_options the errors will be outputted automatically
	*/
	function run_tool(&$error)
	{
		/*
		* If Method 2 was used you must check the form key to verify that it is sent and correct for security reasons.
		*
		* For the string to send for the check, use the name of this file.  The form key has already been added by the core automatically so you do not need to set it up.
		*/
        if (!check_form_key('tutorial'))
		{
			$error[] = 'FORM_INVALID';
			return;
		}

		/*
		* Do anything here
		*
		* For examples you may check other tools in stk/tools/
		*/
	}
}
?>
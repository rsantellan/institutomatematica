<?php

class mdBasicFunction {
	
	/**
	* Function to turn a mysql datetime (YYYY-MM-DD HH:MM:SS) into a unix timestamp
	* @param str
	* The string to be formatted
	* @author Rodrigo Santellan
	*/
	
	public static function convert_datetime($str) {
		
		list ( $date, $time ) = explode ( ' ', $str );
		list ( $year, $month, $day ) = explode ( '-', $date );
		list ( $hour, $minute, $second ) = explode ( ':', $time );
		
		$timestamp = mktime ( $hour, $minute, $second, $month, $day, $year );
		
		return $timestamp;
	}

         /**
         * Checks if a partial exists
         *
         * @param string $templateName		the partial's name, with or without the module ('module/partial')
         *
         * @return bool
         */
        public static function partialExists($templateName)
        {
                $context = sfContext::getInstance();

                // is the partial in another module?
                if (false !== $sep = strpos($templateName, '/'))
                {
                        $moduleName   = substr($templateName, 0, $sep);
                        $templateName = substr($templateName, $sep + 1);
                }
                else
                {
                        $moduleName = $context->getActionStack()->getLastEntry()->getModuleName();
                }

                //We need to fetch the module's configuration to know which View class to use,
                // then we'll have access to information such as the extension
                $config = sfConfig::get('mod_'.strtolower($moduleName).'_partial_view_class');
                if( empty($config) )
                {
                        require($context->getConfigCache()->checkConfig('modules/'.$moduleName.'/config/module.yml', true));
                        $config = sfConfig::get('mod_'.strtolower($moduleName).'_partial_view_class','sf');
                }
                $class =  $config.'PartialView';
                $view = new $class($context, $moduleName, $templateName, '');

                $templateName = '_'.$templateName.$view->getExtension();

                //We now check if the file exists and is readable
                $directory = $context->getConfiguration()->getTemplateDir($moduleName, $templateName);

                if($directory)
                {
                        return true;
                }

                return false;
        }


	/**
	 * The letter l (lowercase L) and the number 1
	 * have been removed, as they can be mistaken
	 * for each other.
	 * @author Rodrigo Santellan
	 */
	public static function createRandomPassword() {
		$chars = "abcdefghijkmnopqrstuvwxyz023456789";
		srand ( ( double ) microtime () * 1000000 );
		$i = 0;
		$pass = '';
		while ( $i <= 7 ) {
			$num = rand () % 33;
			$tmp = substr ( $chars, $num, 1 );
			$pass = $pass . $tmp;
			$i ++;
		}
		return $pass;
	}
	
	/**
	 *		Validate an email address.
	 *		Provide email address (raw input)
	 *	 Returns true if the email address has the email 
	 *	 address format and the domain exists.
	 *	 Para el siguiente caso se saco la comprobacion del dominio.
	 *   @author: http://www.linuxjournal.com/article/9585?page=0,3
	 */
	public static function validEmail($email) {
		$isValid = true;
		$atIndex = strrpos ( $email, "@" );
		if (is_bool ( $atIndex ) && ! $atIndex) {
			$isValid = false;
		} else {
			$domain = substr ( $email, $atIndex + 1 );
			$local = substr ( $email, 0, $atIndex );
			$localLen = strlen ( $local );
			$domainLen = strlen ( $domain );
			if ($localLen < 1 || $localLen > 64) {
				// local part length exceeded
				$isValid = false;
			} else if ($domainLen < 1 || $domainLen > 255) {
				// domain part length exceeded
				$isValid = false;
			} else if ($local [0] == '.' || $local [$localLen - 1] == '.') {
				// local part starts or ends with '.'
				$isValid = false;
			} else if (preg_match ( '/\\.\\./', $local )) {
				// local part has two consecutive dots
				$isValid = false;
			} else if (! preg_match ( '/^[A-Za-z0-9\\-\\.]+$/', $domain )) {
				// character not valid in domain part
				$isValid = false;
			} else if (preg_match ( '/\\.\\./', $domain )) {
				// domain part has two consecutive dots
				$isValid = false;
			} else if (! preg_match ( '/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/', str_replace ( "\\\\", "", $local ) )) {
				// character not valid in local part unless 
				// local part is quoted
				if (! preg_match ( '/^"(\\\\"|[^"])+"$/', str_replace ( "\\\\", "", $local ) )) {
					$isValid = false;
				}
			}
			/*if ($isValid && ! (checkdnsrr ( $domain, "MX" ) || checkdnsrr ( $domain, "A" ))) {
				// domain not found in DNS
				$isValid = false;
			}*/
		}
		return $isValid;
	}
	


        static public function str_hex($string){
            $hex='';
            for ($i=0; $i < strlen($string); $i++){
                $hex .= dechex(ord($string[$i]));
            }
            return $hex;
        }


        static public function hex_str($hex){
            $string='';
            for ($i=0; $i < strlen($hex)-1; $i+=2){
                $string .= chr(hexdec($hex[$i].$hex[$i+1]));
            }
            return $string;
        }

        static public function i18n_value_replace($value, $culture = 'en'){
            if(is_numeric($value)){
                switch ($culture){
                    case 'es': $format = number_format($value, 2, ',', ''); break;
                    default: $format = number_format($value, 2, '.', ''); break;
                }
            } else {
                $format = $value;
            }

            return $format;
        }


  /**
   * 
   * @author Rodrigo Santellan
   **/        
  static public function slugify($text)
  {
    // replace all non letters or digits by -
    $text = preg_replace('/\W+/', '-', $text);
 
    // trim and lowercase
    $text = strtolower(trim($text, '-'));
 
    return $text;
  }

  /**
   * 
   * @author Rodrigo Santellan
   **/
  static function get_file_extension($file_name) 
  { 
    return substr(strrchr($file_name,'.'),1);
  }

  /**
   * 
   * @author Rodrigo Santellan
   **/ 
  static function get_file_name($file_name) 
  { 
    return substr($file_name, 0, strrpos($file_name, '.'));
    //return substr(strrchr($file_name,'.'),0);
  }

}

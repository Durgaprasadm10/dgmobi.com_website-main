<?php
/********************************************************************
 * Ideabytes Software India Pvt Ltd.                                *
 * 50 Jayabheri Enclave, Gachibowli, HYD                            *
 * Created Date : 2017-11-23                                        *
 * Created By : Poorna Teja Konatham                                *
 * Project : DGMobi Landstar Payment                                *
 * Description : Handles functions related to validation            *
 *******************************************************************/

class Validator
{
    /**
     * Stores errors.
     * @var array Array of errors.
     */
    private $errors = array();


    
    /**
     * Validates data.
     * @param array $data Data to be validated.
     * @param array $rules Rules for each data item.
     * @return boolean TRUE/FALSE.
     */
    public function validate(Array $data, Array $rules)
    {
        $valid = TRUE;

        foreach ($rules as $item => $ruleset) {
            // ruleset will be like 'required|email|min:8'
            $ruleset = explode('|', $ruleset);

            foreach ($ruleset as $rule) {
                $pos = strpos($rule, ':');
                
                // Get parameter if available.
                if ($pos !== FALSE) {
                    $parameter = substr($rule, $pos+1);
                    $rule = substr($rule, 0, $pos);
                } else {
                    $parameter = '';
                }

                $methodName = 'validate' . ucfirst($rule);
                $value = isset($data[$item]) ? $data[$item] : NULL;
                
                // Call methods dynamically if exists.
                if (method_exists($this, $methodName)) {
                    $this->$methodName($item, $value, $parameter) OR $valid = FALSE;
                }
            }
        }

        return $valid;
    }


    
    /**
     * Returns errors.
     * @return array Array or errors.
     */
    public function getErrors()
    {
        return $this->errors;
    }


    
    /**
     * Checks if empty.
     * @param string $item Key.
     * @param string $value Data.
     * @param int $parameter Parameter.
     * @return boolean TRUE/FALSE.
     */
    private function validateRequired($item, $value, $parameter)
    {
        if ($value === '' || $value === NULL) {
            $this->errors[$item][] = 'The ' . $item . ' field is required';
            return FALSE;
        }

        return TRUE;
    }


    
    /**
     * Validates email.
     * @param string $item Key.
     * @param string $value Data.
     * @param int $parameter Parameter.
     * @return boolean TRUE/FALSE.
     */
    private function validateEmail($item, $value, $parameter)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->errors[$item][] = 'The ' . $item . ' field should be valid';
            return FALSE;
        }

        return TRUE;
    }


    
    /**
     * Checks is data has minimum length.
     * @param string $item Key.
     * @param string $value Data.
     * @param int $parameter Parameter.
     * @return boolean TRUE/FALSE.
     */
    private function validateMin($item, $value, $parameter)
    {
        if (strlen($value) >= $parameter == FALSE) {
            $this->errors[$item][] = 'The ' . $item . ' field should have a minimum length of ' . $parameter;
            return FALSE;
        }

        return TRUE;
    }
}
<?php
include_once 'Crypto.php';
class CCAvenue {
    private $_merchantKey = '117679';
    private $_workingKey = '52E2F5639BC33F534DF287CC78FB3FD6';
    private $_accessCode = 'AVZP68DL23AS77PZSA';
    private $_sandobxUrl = 'https://test.ccavenue.com/transaction/transaction.do?command=initiateTransaction';
    private $_productionUrl = '	https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction';
    
    /*
     *  Encrypt the form data
     */
    public function encrypt($formData){
	return $encrypted_data = encrypt($formData,$this->_workingKey);
    }
    
    /*
     * Decrypt the form data
     */
    public function decrypt($formData){
	return $decrypted_data = decrypt($formData,$this->_workingKey);
    }
    
    /*
     *  Call CCAVenue with  requested encrypted data
     */
    public function request($formData=array()){
        $merchant_data=$this->_merchantKey;
        $access_code= $this->_accessCode; 
        $formData['merchant_id'] = $this->_merchantKey;
        $formData['currency'] = CURRENCY_TYPE;
        $formData['language'] = LANGUAGE;
        foreach ($formData as $key => $value){
            $merchant_data.=trim($key).'='.urlencode(trim($value)).'&';
        }
//        echo $merchant_data;exit;
        $encrypted_data= $this->encrypt($merchant_data);
        
       echo '<form method="post" name="redirect" action="'.$this->_productionUrl.'"> '
            .'<input type=hidden name=encRequest value='. $encrypted_data .'>'
            .'<input type=hidden name=access_code value='. $access_code. '>'
            .'</form>'
            .'<script language="javascript">document.redirect.submit();</script>';

    }
    
    /*
     *  Parse CCAvenue response data
     * 
     */
    public function response($encResponse=''){
        $response= $this->decrypt($encResponse);
        $responseArr = array();
        parse_str($response,$responseArr);
        return $responseArr;
    }
}
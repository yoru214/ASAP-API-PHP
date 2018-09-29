<?PHP

class ASAPAPI
{
    public $AccessToken     = "";
    public $Username        = "";
    public $Password        = "";
    public $OrganizationID  = "";
    public $APIKEY          = "";

    public $IsLive          = false;

    private $staginguri     = "https://stagingapi.asapconnected.com/api/";
    private $liveuri        = "https://api.asapconnected.com/api/";

    private $Response;
    private $Content;

    public function Authenticate()
    {
        
        $this->AccessToken = "";
        $uri =  $this->IsLive ? $this->liveuri : $this->staginguri;
        $ch = curl_init($uri . 'login');
        curl_setopt_array($ch, array(
            CURLOPT_HTTPHEADER  => array('Authorization:user=' . $this->Username .  '&organizationId=' . $this->OrganizationID . '&password=' . $this->Password . '&apiKey=' . $this->APIKEY,'Accept:application/json','Content-Length: 0'),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => true,
        ));
        $response = curl_exec($ch);


        // Check the return value of curl_exec(), too
        if ($response === false) {
            throw new Exception(curl_error($ch), curl_errno($ch));
        }



        // Return headers seperatly from the Response Body
        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $headers = substr($response, 0, $header_size);
        $body = substr($response, $header_size);


        curl_close($ch);

        $perline = explode("\n", $response);
        foreach($perline as $line)
        {
            
            $tmp = explode(":",$line);
            if($tmp[0] == "asap_accesstoken")
            {
                $this->AccessToken=trim($tmp[1]);
            }
        }


        return $this->AccessToken;

    }

    public function GetClasses()
    {
        $this->Authenticate();
        $this->Request("/Courses/Classes");
         return $this->Content;
    }

    function Request($path = "")
    {
        $uri =  $this->IsLive ? $this->liveuri : $this->staginguri;
        $ch = curl_init($uri . $path);

        curl_setopt_array($ch, array(
            CURLOPT_HTTPHEADER  => array('asap_accesstoken:' .  $this->AccessToken,'Accept:application/json','Content-Length: 0'),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => true,
        ));

        $this->Response = curl_exec($ch);


        // Check the return value of curl_exec(), too
        if ( $this->Response === false) {
            throw new Exception(curl_error($ch), curl_errno($ch));
        }



        // Return headers seperatly from the Response Body
        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $headers = substr($this->Response, 0, $header_size);
        $this->Content = substr( $this->Response, $header_size);

        curl_close($ch);
    }
    
}





?>
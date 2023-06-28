<?php
ini_set('display_errors', TRUE);
error_reporting(E_ALL);
require_once './TrackerDatabase.php';

class Trackerfile {

    private $obj;

    public function __construct() {
        $this->obj = new Database();
    }

    public function __destruct() {
        unset($obj);
    }

    public function navigate() {

        $logs = LOG_PATH;
        if (!is_dir($logs)) {
            mkdir($logs);
        }

        $date = date('Y-m-d');
        $file = $logs . "/" . $date . ".txt";

        $request = serialize($_SERVER) . "\n\n";

        $fh = fopen($file, "a") or die("could not open file");
        fwrite($fh, $request);
        fclose($fh);

//        $path = explode("/", $_SERVER['PATH_INFO']);
//        $trace = $path[1];
//        $trace = end($path);

//        if ($trace == "track") {
            $this->track();
//            header("location:" . REDIRECTION_HOST);
//        } else if ($trace == "mail") {
//            $this->mailsending();
//        } 
    }    
    
    private function track() {
//        echo "hi";exit;
        $rs = $this->getLocationInfoByIp();
        $country = $rs['country'];
        $city = $rs['city'];

//        $path = explode("/", $_SERVER['PATH_INFO']);
//        $id = $path[2];
        $id = $_GET['adp'];

        $query = "select * from website_master where website_trackerid = $id";
        $result = $this->obj->executeQuery($query);
        $row = $this->obj->getResult($result);

        $logging = $this->logTrace($row, $city, $country);

        return true;
    }
    
    public function logTrace($row, $city, $country) {
//        date_default_timezone_set('UTC');
        $date = date("Y-m-d H:i:s");
        $query = "insert into website_tracker (tracker_id, ipaddress, country, current_website, created_on)";
        $query .= " values($row->website_trackerid, '" . $_SERVER['REMOTE_ADDR'] . "', '$country', '".WEBSITE_HOST."', '$date')";
        $result = $this->obj->executeQuery($query);
    }
    
    private function getLocationInfoByIp() {
        $client = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote = @$_SERVER['REMOTE_ADDR'];
        $result = array('country' => '', 'city' => '');
        if (filter_var($client, FILTER_VALIDATE_IP)) {
            $ip = $client;
        } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
            $ip = $forward;
        } else {
            $ip = $remote;
        }
        $ip = "117.254.83.185";
        $ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
        if ($ip_data && $ip_data->geoplugin_countryName != null) {
            $result['country'] = $ip_data->geoplugin_countryName;
            $result['city'] = $ip_data->geoplugin_city;
        }
        return $result;
    }
    
    private function sendemail($to, $subject, $message) {
        require_once './class-phpmailer.php';
        require_once './class-smtp.php';
        $mail = new PHPMailer();

        $mail->IsSMTP(); // send via SMTP
        $mail->Host = "smtp.office365.com"; // SMTP servers
        $mail->Port = 587; // SMTP servers
        $mail->SMTPAuth = true; // turn on SMTP authentication
        $mail->SMTPDebug = 0;
        $mail->Username = USER_EMAIL; // SMTP username
        $mail->Password = USER_PASSWORD; // SMTP password
        $mail->SMTPSecure = 'tls';
        $mail->From = USER_EMAIL;
        $mail->FromName = "DG Check";
        foreach ($to as $key => $val)
            $mail->AddAddress($val);
        $mail->IsHTML(true); // send as HTML
        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->AltBody = "This is the plain text version of the email content";

        if (!$mail->send()) {
            return false;
        } else {
            return true;
        }
    }

}

$api = new Trackerfile;
$api->navigate();
//exit;

?>

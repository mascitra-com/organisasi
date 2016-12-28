<?php /**
 *
 * Users Online class *
 * Manages active users *
 * @package CodeIgniter
 * @subpackage Libraries
 * @category Add-Ons
 * @author Leonardo Monteiro Bersan de Araujo
 * @link hhttp://codeigniter.com/wiki/Library: Online_Users
 */
class Online_users
{
    public $file = "usersonline.tmp";
    public $data;
    public $ip;

    function __construct()
    {
        $this->ip = $_SERVER['REMOTE_ADDR'];
        $this->data = @unserialize(file_get_contents($this->file));
        $aryData = $this->data['useronline'];
        $timeout = time() - 120;

        //Removes expired data
        if (!empty($aryData)) {
            foreach ($aryData as $key => $value) {
                if ($value['time'] <= $timeout) {
                    if ($value['identity']) {
                        $this->data['memonline']--;
                    } else $this->data['guestonline']--;
                    unset($aryData[$key]);
                }
            }
        }
        //If it’s the first hit, add the information to database
        if (!isset($aryData[$this->ip])) {
            $CI =& get_instance();
            $aryData[$this->ip]['time'] = time();
            $aryData[$this->ip]['uri'] = $_SERVER['REQUEST_URI'];

            $identity = $CI->session->userdata('identity');
            $aryData[$this->ip]['identity'] = $identity;

            if ($identity) {
                $this->data['memonline']++;
            } else {
                $this->data['guestonline']++;
            }

            $this->data['totalvisit']++;

            //Loads the USER_AGENT class if it’s not loaded yet
            if (!isset($CI->agent)) {
                $CI->load->library('user_agent');
                $class_loaded = true;
            }
            if ($CI->agent->is_robot()) $aryData[$this->ip]['bot'] = $CI->agent->robot(); else $aryData[$this->ip]['bot'] = false;

            //Destroys the USER_AGENT class so it can be loaded again on the controller
            if ($class_loaded) unset($class_loaded, $CI->agent);
        } else {
            $aryData[$this->ip]['time'] = time();
            $aryData[$this->ip]['uri'] = $_SERVER['REQUEST_URI'];
        }

        $this->data['useronline'] = $aryData;
        $this->_save();
    }

    //this function return the total number of online users
    function _save()
    {
        $fp = fopen($this->file, 'w');
        flock($fp, LOCK_EX);
        $write = fwrite($fp, serialize($this->data));
        fclose($fp);
        return $write;
    }

    //this function return the total number of online members
    function total_users()
    {
        return count($this->data['useronline']);
    }

    //this function return the total number of online guest
    function total_mems()
    {
        return @$this->data['memonline'];
    }

    //this function return the total number of total visit
    function total_guests()
    {
        return @$this->data['guestonline'];
    }

    //this function return the total number of online robots
    function total_visit()
    {
        return @$this->data['totalvisit'];
    }

    //Used to set custom data
    function total_robots()
    {
        $i = 0;
        foreach ($this->data as $value) {
            if ($value['is_robot']) $i++;
        }
        return $i;
    }

    function set_data($data = false, $force_update = false)
    {
        if (!is_array($data)) {
            return false;
        }

        $tmp = false; //Used to control if there are changes

        foreach ($data as $key => $value) {
            if (!isset($aryData[$this->ip]['useronline'][$key]) || $force_update) {
                $aryData[$this->ip]['useronline'][$key] = $value;
                $tmp = true;
            }
        }

        //Check if the user’s already have this setting and skips the wiriting file process (saves CPU)
        if (!$tmp) return false;
        $this->data['useronline'] = $aryData;
        return $this->_save();
    }

    //Save current data into file
    function get_info()
    {
        if (@$this->data) {
            return @$this->data;
        }
    }

    //Return uri visitor now visit
    function page_visit()
    {
        $this->online_users->get_info()['useronline']["$_SERVER[REMOTE_ADDR]"]['uri'];
    }


}
<?php include 'user.php'; ?>
<?php 
class Vendor extends User {
    protected $bussinessName;
    protected $bussinessAddress;

    function __construct($username, $password, $profilePicture, $bussinessName, $bussinessAddress) {
        $this->username = $username;
        $this->password = $password;
        $this->profilePicture = $profilePicture;
        $this->businessName = $bussinessName;
        $this->businessAddress = $bussinessAddress;
        $this->registeredTime = date('Y-m-d H:i');
        $this->role = VENDOR_ROLE;
        $this->stored_users = json_decode(file_get_contents($this->storage), true);

        $this->new_user = [
            "username" => $this->username,
            "password" => $this->password,
            "profilePicture" => $this->profilePicture,
            "businessName" => $this->businessName,
            "businessAddress" => $this->businessAddress,
            "registeredTime" => $this->registeredTime,
            "role" => $this->role
        ];
        
        if ($this->checkFieldValues() == TRUE && $this->checkFieldValuesOfVendor() == TRUE) {
            $this->insertUser();
        }
    }

    private function checkFieldValuesOfVendor() {
        if (empty($this->businessName) && empty($this->businessAddress)) {
            $this->error = "Please input you business name and address";
            return false;
        } else if (empty($this->businessName)) {
            $this->error = "Please input your business name";
            return false;
        } else if (empty($this->businessAddress)) {
            $this->error = "Please input your business address";
            return false;
        } else {
            return true;
        }
    }

    protected function businessNameExists() {
        // Check if the business name is unique in the database
        foreach((array)$this->stored_users as $user) {
            if ($this->businessName == $user['businessName']) {
                $this->error = "Your Bussiness Name is not unique among vendors, please choose another one";
                return true;
            }
        }
        return false;
    }

    protected function businessAddressExists() {
        foreach((array)$this->stored_users as $user) {
            if ($this->businessAddress == $user['businessAddress']) {
                $this->error = "Your Bussiness Address is not unique among vendors, please choose another one";
                return true;
            }
        }
        return false;
    }

    protected function insertUser() {
        if($this->usernameExists() == FALSE && $this->businessNameExists() == FALSE && $this->businessAddressExists() == FALSE) {
            array_push($this->stored_users, $this->new_user);
            // Write data to file
            if (file_put_contents($this->storage, json_encode($this->stored_users, JSON_PRETTY_PRINT))) {
                return $this->success = "Successfully registered";
            } else {
                $this->error = "Unsuccessfully registered, please try again";
            }
        }
    }
}
?>
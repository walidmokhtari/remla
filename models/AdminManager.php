<?php
class AdminManager extends Model {
    public function getAdmins() {
        return $this->getAll("admin","Admin");
    }

    public function getAdmin(array $data) {
        return $this->getLigneByEmailPwd("admin","Admin",$data);
    }
}

?>
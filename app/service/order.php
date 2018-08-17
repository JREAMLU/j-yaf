<?php

class Order {

    public function getNumber() {
        $user = new UserModel();
        return $user->focus();
    }
}
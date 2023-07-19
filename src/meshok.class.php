<?php

class MeshokAPI {
    private $baseUrl = 'https://api.meshok.net/sAPIv1/';
    private $token;
    
    public function __construct($token) {
        $this->token = $token;
    }
    
    private function sendRequest($method, $params = []) {
        $url = $this->baseUrl . $method;
        $headers = [
            'Authorization: Bearer ' . $this->token
        ];
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $response = curl_exec($ch);
        curl_close($ch);
        
        return json_decode($response, true);
    }
    
    public function getItemList() {
        return $this->sendRequest('getItemList');
    }
    
    public function getFinishedItemList() {
        return $this->sendRequest('getFinishedItemList');
    }
    
    public function getUnsoldFinishedItemList() {
        return $this->sendRequest('getUnsoldFinishedItemList');
    }
    
    public function getSoldFinishedItemList() {
        return $this->sendRequest('getSoldFinishedItemList');
    }
    
    public function getItemInfo($id) {
        return $this->sendRequest('getItemInfo', ['id' => $id]);
    }
    
    public function getAccountInfo() {
        return $this->sendRequest('getAccountInfo');
    }
    
    public function getCommonDescriptionList() {
        return $this->sendRequest('getCommonDescriptionList');
    }
    
    public function getSubCategory($id) {
        return $this->sendRequest('getSubCategory', ['id' => $id]);
    }
    
    public function getCategoryInfo($id) {
        return $this->sendRequest('getCategoryInfo', ['id' => $id]);
    }
    
    public function getCurencyList() {
        return $this->sendRequest('getCurencyList');
    }
    
    public function getCountryList() {
        return $this->sendRequest('getCountryList');
    }
    
    public function getCitiesList($id) {
        return $this->sendRequest('getCitiesList', ['id' => $id]);
    }
    
    public function stopSale($id) {
        return $this->sendRequest('stopSale', ['id' => $id]);
    }
    
    public function relistItem($id) {
        return $this->sendRequest('relistItem', ['id' => $id]);
    }
    
    public function deleteItem($id) {
        return $this->sendRequest('deleteItem', ['id' => $id]);
    }
    
    public function listItem($params) {
        return $this->sendRequest('listItem', $params);
    }
    
    public function updateItem($params) {
        return $this->sendRequest('updateItem', $params);
    }
}

?>

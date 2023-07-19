# sAPI-php
PHP библиотека для использования API для продавцов аукциона Мешок


To use the library, you can create an instance of the `MeshokAPI` class with your API token, and then call the desired methods. For example:

```php

$api = new MeshokAPI('your_api_token');

$itemList = $api->getItemList();
$finishedItemList = $api->getFinishedItemList();
$itemInfo = $api->getItemInfo(12345);

// Use the data returned by the API methods
var_dump($itemList);
var_dump($finishedItemList);
var_dump($itemInfo);

```

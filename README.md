# php-pagination

#### simple library to create easily pagination for rest apis json response

```php

use Libraries\Pagination\Pagination;

// create Pagination instance
// argument 1 has number of total records and accept integer value
// argument 2 is current page number by default its 1 integer value
// argument 3 is number of how many showing result per page and by default its 10 integer value
$records = 52; 
$currentPage = 6; 
$showPerPage = 3;
$paging = new Pagination($records, $currentPage, $showPerPage);
```

### ::paginate

return pagination `object`

```php
$paginate = $paging->paginate();
$total = $paginate->total;
$current_page = $paginate->current_page;
$all_pages = $paginate->all_pages;
$per_page = $paginate->per_page;
$has_pagination = $paginate->has_pagination;
```

### ::toJson

show pagination final result and using `exit()` to stop php process and `json_encode()` to encode data to json .

```php
$paging->toJson();
```

### ::toArray

return `array` of pagination object

```php
$pageArr = $paging->toArray();
$total = $pageArr["total"];
$current_page = $pageArr["current_page"];
$all_pages = $pageArr["all_pages"];
$per_page = $pageArr["per_page"];
$has_pagination = $pageArr["has_pagination"];
```

### ::getOffset

return calculated offset for pagination

```php
$offset = $paging->getOffset(); // return int value
```
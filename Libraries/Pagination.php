<?php
/**
 * im using this library for calculate better my pagination and you use
 * for paginate database records or any data need the pagination its usable
 * to send a pagination data into your user interface
 *
 * Developed on 11 October 2021 by @smhnaqvi
 **/

namespace Libraries\Pagination;

class Pagination
{
    private int $total = 0;
    private int $current_page = 0;
    private int $all_pages = 0;
    private int $per_page = 0;
    private int $offset = 0;
    private bool $has_pagination = false;


    /**
     * Pagination constructor.
     * @param int $total
     * @param int $currentPage
     * @param int $perPage
     */
    function __construct(int $total, int $currentPage = 1, int $perPage = 5)
    {
        $this->total = $total; //total records count
        $this->current_page = $currentPage; // current page number
        $this->per_page = $perPage; // limit how many showing items per page


        if ($this->current_page != 0) {
            //calculate offset
            $this->offset = abs(((($this->current_page - 1) * $this->per_page) + 1 - 1));
        } else  $this->current_page = 1;


        $this->all_pages = ceil($this->total / $this->per_page); // calculate count of all pages
        $this->has_pagination = ($this->current_page <= $this->all_pages); // its for check already has pagination or not
    }

    public function toJson()
    {
        exit(json_encode(self::paginate()));
    }

    /**
     * convert pagination object to array for using as array
     * @return array
     */
    public function toArray(): array
    {
        return (array)self::paginate();
    }


    /**
     * you need to get
     * @return Pagination
     */
    public function paginate(): object
    {
        return (object)array(
            "total" => $this->total,
            "current_page" => $this->current_page,
            "all_pages" => $this->all_pages,
            "per_page" => $this->per_page,
            "has_pagination" => $this->has_pagination,
        );
    }

    public function getOffset()
    {
        return $this->offset;
    }

}
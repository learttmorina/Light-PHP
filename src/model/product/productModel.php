<?php

namespace Model;

use Library\Database;

/**
 * Just a sample...
 */

class ProductModel
{

    /**
     * Sample function to show how a model's function it's done
     *
     * @return Array
     */
    public function getAllProducts()
    {
        $prods = Database::query("SELECT * FROM `product`");
        return $prods;
    }

    /**
     * Another sample
     *
     * @param int $prod_id product id for searching
     *
     * @return Array
     */
    public function getProductById($prod_id)
    {
        $prod = Database::query("SELECT * FROM `product` WHERE id = :prod_id", array(":prod_id" => $prod_id));
        return $prod;
    }
}

<?php

/**
 * Subclass for performing query and update operations on the 'product' table.
 *
 *
 *
 * @package lib.model
 */
class ProductPeer extends BaseProductPeer
{
    public function getCybers()
    {
        $c = new Criteria();
        $c->add(ProductPeer::PRIZE_CATEGORY,0);
        $cybers = ProductPeer::doSelect($c);
        return $cybers;
    }






}

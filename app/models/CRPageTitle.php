<?php

class CRPageTitle extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    public $id;

    /**
     *
     * @var string
     * @Column(type="string", length=64, nullable=false)
     */
    public $content;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $province_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $city_id;

    /**
     *
     * @var string
     * @Column(type="string", length=64, nullable=true)
     */
    public $ssid;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $hp_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $add_user;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $insert_time;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $last_update_time;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'c_r_page_title';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CRPageTitle[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CRPageTitle
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

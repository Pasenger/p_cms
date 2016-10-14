<?php

class OCuMeEnterprise extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    public $me_id;

    /**
     *
     * @var string
     * @Column(type="string", length=200, nullable=false)
     */
    public $name;

    /**
     *
     * @var string
     * @Column(type="string", length=64, nullable=true)
     */
    public $en_name;

    /**
     *
     * @var string
     * @Column(type="string", length=200, nullable=true)
     */
    public $label;

    /**
     *
     * @var string
     * @Column(type="string", length=200, nullable=true)
     */
    public $en_label;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $me_type;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $insert_time;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $update_time;

    /**
     *
     * @var string
     * @Column(type="string", length=32, nullable=true)
     */
    public $scene_type;

    /**
     *
     * @var string
     * @Column(type="string", length=32, nullable=true)
     */
    public $scene_lv1;

    /**
     *
     * @var string
     * @Column(type="string", length=200, nullable=true)
     */
    public $address;

    /**
     *
     * @var string
     * @Column(type="string", length=30, nullable=true)
     */
    public $tel;

    /**
     *
     * @var string
     * @Column(type="string", length=200, nullable=true)
     */
    public $open_time;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $level;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $data_src_type;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $province_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $city_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $district_id;

    /**
     *
     * @var string
     * @Column(type="string", length=64, nullable=true)
     */
    public $item_num;

    /**
     *
     * @var string
     * @Column(type="string", length=64, nullable=true)
     */
    public $item_support_person;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=true)
     */
    public $related_ac;

    /**
     *
     * @var string
     * @Column(type="string", length=32, nullable=true)
     */
    public $location_ip_port;

    /**
     *
     * @var string
     * @Column(type="string", length=64, nullable=true)
     */
    public $network_code;

    /**
     *
     * @var string
     * @Column(type="string", length=12, nullable=true)
     */
    public $cover_area;

    /**
     *
     * @var integer
     * @Column(type="integer", length=2, nullable=true)
     */
    public $is_passenger_flow;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=true)
     */
    public $is_visiable;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("bigdata");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'o_cu_me_enterprise';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return OCuMeEnterprise[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return OCuMeEnterprise
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

<?php

class OReMeAp extends \Phalcon\Mvc\Model
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
     * @Column(type="string", length=32, nullable=false)
     */
    public $me_id;

    /**
     *
     * @var string
     * @Column(type="string", length=200, nullable=true)
     */
    public $name;

    /**
     *
     * @var string
     * @Column(type="string", length=200, nullable=true)
     */
    public $label;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $me_type;

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
    public $update_time;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $floor_id;

    /**
     *
     * @var string
     * @Column(type="string", length=64, nullable=true)
     */
    public $ac_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $enterprise_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $funcarea_id;

    /**
     *
     * @var string
     * @Column(type="string", length=6, nullable=true)
     */
    public $ap_id;

    /**
     *
     * @var string
     * @Column(type="string", length=512, nullable=true)
     */
    public $ap_name;

    /**
     *
     * @var string
     * @Column(type="string", length=16, nullable=true)
     */
    public $ap_mac;

    /**
     *
     * @var string
     * @Column(type="string", length=16, nullable=true)
     */
    public $device_model;

    /**
     *
     * @var string
     * @Column(type="string", length=32, nullable=true)
     */
    public $device_num;

    /**
     *
     * @var string
     * @Column(type="string", length=32, nullable=true)
     */
    public $ap_ip;

    /**
     *
     * @var string
     * @Column(type="string", length=16, nullable=true)
     */
    public $factory_name;

    /**
     *
     * @var string
     * @Column(type="string", length=32, nullable=true)
     */
    public $factory_version;

    /**
     *
     * @var string
     * @Column(type="string", length=32, nullable=true)
     */
    public $belong_switch_name;

    /**
     *
     * @var string
     * @Column(type="string", length=15, nullable=true)
     */
    public $belong_switch_ip;

    /**
     *
     * @var string
     * @Column(type="string", length=16, nullable=true)
     */
    public $belong_port;

    /**
     *
     * @var string
     * @Column(type="string", length=32, nullable=true)
     */
    public $belong_ac_name;

    /**
     *
     * @var string
     * @Column(type="string", length=32, nullable=true)
     */
    public $belong_building;

    /**
     *
     * @var string
     * @Column(type="string", length=128, nullable=true)
     */
    public $belong_floor;

    /**
     *
     * @var string
     * @Column(type="string", length=128, nullable=true)
     */
    public $install_address;

    /**
     *
     * @var string
     * @Column(type="string", length=256, nullable=true)
     */
    public $device_status;

    /**
     *
     * @var double
     * @Column(type="double", length=11, nullable=true)
     */
    public $grid_num;

    /**
     *
     * @var double
     * @Column(type="double", length=11, nullable=true)
     */
    public $grid_x_coord;

    /**
     *
     * @var double
     * @Column(type="double", length=11, nullable=true)
     */
    public $grid_y_coord;

    /**
     *
     * @var string
     * @Column(type="string", length=10, nullable=true)
     */
    public $maintain_person;

    /**
     *
     * @var string
     * @Column(type="string", length=16, nullable=true)
     */
    public $maintain_per_phone;

    /**
     *
     * @var string
     * @Column(type="string", length=64, nullable=true)
     */
    public $warrenty;

    /**
     *
     * @var string
     * @Column(type="string", length=32, nullable=true)
     */
    public $asset_num;

    /**
     *
     * @var string
     * @Column(type="string", length=1024, nullable=true)
     */
    public $remark;

    /**
     *
     * @var integer
     * @Column(type="integer", length=2, nullable=true)
     */
    public $type;

    /**
     *
     * @var string
     * @Column(type="string", length=64, nullable=true)
     */
    public $sn;

    /**
     *
     * @var string
     * @Column(type="string", length=128, nullable=true)
     */
    public $group_ap;

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
     * @var integer
     * @Column(type="integer", length=2, nullable=true)
     */
    public $is_disabled;

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
        return 'o_re_me_ap';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return OReMeAp[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return OReMeAp
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

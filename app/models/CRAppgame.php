<?php

class CRAppgame extends \Phalcon\Mvc\Model
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
    public $name;

    /**
     *
     * @var string
     * @Column(type="string", length=256, nullable=false)
     */
    public $introduction;

    /**
     *
     * @var string
     * @Column(type="string", length=2048, nullable=false)
     */
    public $logo_url;

    /**
     *
     * @var string
     * @Column(type="string", length=2048, nullable=false)
     */
    public $ios_href;

    /**
     *
     * @var string
     * @Column(type="string", length=2048, nullable=false)
     */
    public $android_href;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $type;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $add_user;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $insert_time;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'c_r_appgame';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CRAppgame[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CRAppgame
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

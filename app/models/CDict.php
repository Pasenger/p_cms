<?php

class CDict extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
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
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $type_id;

    /**
     *
     * @var string
     * @Column(type="string", length=64, nullable=false)
     */
    public $type_name;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $idx_num;

    /**
     *
     * @var string
     * @Column(type="string", length=64, nullable=true)
     */
    public $remark;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $inserttime;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'c_dict';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CDict[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CDict
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

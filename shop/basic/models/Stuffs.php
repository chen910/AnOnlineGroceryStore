<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stuffs".
 *
 * @property integer $StuffId
 * @property string $UserName
 * @property string $Passort
 * @property string $FirstName
 * @property string $MiddleName
 * @property string $LastName
 * @property string $State
 * @property string $City
 * @property string $Street
 * @property string $Zipcode
 * @property integer $Salary
 * @property string $JobTitle
 */
class Stuffs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stuffs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['UserName', 'Passort'], 'required'],
            [['Salary'], 'integer'],
            [['UserName', 'Passort', 'JobTitle'], 'string', 'max' => 20],
            [['FirstName', 'MiddleName', 'LastName'], 'string', 'max' => 10],
            [['State'], 'string', 'max' => 2],
            [['City'], 'string', 'max' => 15],
            [['Street'], 'string', 'max' => 50],
            [['Zipcode'], 'string', 'max' => 12],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'StuffId' => 'Stuff ID',
            'UserName' => 'User Name',
            'Passort' => 'Passort',
            'FirstName' => 'First Name',
            'MiddleName' => 'Middle Name',
            'LastName' => 'Last Name',
            'State' => 'State',
            'City' => 'City',
            'Street' => 'Street',
            'Zipcode' => 'Zipcode',
            'Salary' => 'Salary',
            'JobTitle' => 'Job Title',
        ];
    }
}

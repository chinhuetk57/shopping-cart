<?php

namespace common\models\store;
use common\models\User;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "product_category".
 *
 * @property integer $id
 * @property string $name
 * @property integer $status
 * @property integer $create_at
 * @property integer $update_at
 * @property integer $create_by
 */
class ProductCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_category';
    }
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'create_at',
                'updatedAtAttribute' => 'update_at',


            ],
            [
                'class' => BlameableBehavior::className(),

                'createdByAttribute' => 'create_by',
                'updatedByAttribute' => 'update_by',
            ]

        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['name','required'],
            [['status', 'create_at', 'update_at', 'create_by','update_by'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'status' => 'Status',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
            'create_by' => 'Create By',
        ];
    }

    public function getCreate()
    {
        return $this->hasOne(User::className(),['id'=>'create_by']);
    }
}

<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "products".
 *
 * @property integer $id
 * @property string $name
 * @property integer $qautity
 * @property string $date
 * @property string $pricesale
 * @property string $image
 * @property integer $category_id
 * @property integer $user_id
 * @property integer $status
 *
 * @property \app\models\Barcode[] $barcodes
 * @property \app\models\Category $category
 * @property \app\models\User $user
 * @property \app\models\PurchaseItem[] $purchaseItems
 * @property \app\models\Sale[] $sales
 * @property string $aliasModel
 */
abstract class Products extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'qautity', 'pricesale', 'category_id', 'user_id'], 'required'],
            [['qautity', 'category_id', 'user_id', 'status'], 'integer'],
            [['date'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['pricesale'], 'string', 'max' => 40],
            [['image'], 'string', 'max' => 45],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\User::className(), 'targetAttribute' => ['user_id' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('models', 'ID'),
            'name' => Yii::t('models', 'Name'),
            'qautity' => Yii::t('models', 'Qautity'),
            'date' => Yii::t('models', 'Date'),
            'pricesale' => Yii::t('models', 'Pricesale'),
            'image' => Yii::t('models', 'Image'),
            'category_id' => Yii::t('models', 'Category ID'),
            'user_id' => Yii::t('models', 'User ID'),
            'status' => Yii::t('models', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBarcodes()
    {
        return $this->hasMany(\app\models\Barcode::className(), ['products_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(\app\models\Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\app\models\User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseItems()
    {
        return $this->hasMany(\app\models\PurchaseItem::className(), ['products_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSales()
    {
        return $this->hasMany(\app\models\Sale::className(), ['products_id' => 'id']);
    }




}

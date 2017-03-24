<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "discount".
 *
 * @property integer $id
 * @property integer $discount
 * @property integer $invoice_id
 *
 * @property \app\models\Invoice $invoice
 * @property string $aliasModel
 */
abstract class Discount extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'discount';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['discount', 'invoice_id'], 'required'],
            [['discount', 'invoice_id'], 'integer'],
            [['invoice_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\Invoice::className(), 'targetAttribute' => ['invoice_id' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'discount' => 'Discount',
            'invoice_id' => 'Invoice ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvoice()
    {
        return $this->hasOne(\app\models\Invoice::className(), ['id' => 'invoice_id']);
    }




}

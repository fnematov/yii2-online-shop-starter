<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Exception;

/**
 * This is the model class for table "brands".
 *
 * @property int $id
 * @property string $name
 * @property int $status
 *
 * @property BrandsCategories[] $brandsCategories
 * @property Categories[] $categories
 * @property Products[] $products
 */
class Brands extends ActiveRecord
{
    public $categories;
    public $schedule;
    
    /**
     * @inheritdoc
     */
    public static function tableName ()
    {
        return 'brands';
    }
    
    /**
     * @param bool $insert
     * @param array $changedAttributes
     */
    public function afterSave ( $insert, $changedAttributes )
    {
        if ($this->categories) {
            $categories = array_unique($this->categories);
            foreach ($categories as $category) {
                try {
                    Yii::$app->db->createCommand()->insert('brands_categories', [
                        'brands_id' => $this->id,
                        'categories_id' => $category,
                    ])->execute();
                } catch ( Exception $e ) {
                }
            }
        }
    }
    
    /**
     * Load categories after find
     */
    public function afterFind ()
    {
        $links = BrandsCategories::findAll(['brands_id' => $this->id]);
        foreach ($links as $link) {
            $this->schedule[] = $link->categories_id;
        }
    }
    
    /**
     * @inheritdoc
     */
    public function rules ()
    {
        return [
            [ [ 'name' ], 'required' ],
            [ [ 'status' ], 'integer' ],
            [ [ 'name' ], 'string', 'max' => 255 ],
            [ 'categories', 'safe' ]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels ()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'status' => 'Status',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrandsCategories ()
    {
        return $this->hasMany(BrandsCategories::className(), [ 'brands_id' => 'id' ]);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories ()
    {
        return $this->hasMany(Categories::className(), [ 'id' => 'categories_id' ])->viaTable('brands_categories', [ 'brands_id' => 'id' ]);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts ()
    {
        return $this->hasMany(Products::className(), [ 'brand_id' => 'id' ]);
    }
}

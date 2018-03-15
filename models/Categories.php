<?php

namespace app\models;

use app\components\FileUploadBehaviour;
use Yii;
use yii\db\Exception;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property string $name
 * @property int $status
 * @property int $related_product_id
 * @property string $img
 * @property int $is_main_page
 * @property string $meta_keywords
 * @property string $meta_description
 *
 * @property BrandsCategories[] $brandsCategories
 * @property Brands[] $brands
 * @property Products[] $products
 */
class Categories extends \yii\db\ActiveRecord
{
    public $brands;
    public $schedule;
    
    /**
     * @inheritdoc
     */
    public static function tableName ()
    {
        return 'categories';
    }
    
    public function behaviors ()
    {
        return [
            FileUploadBehaviour::className(),
        ];
    }
    
    /**
     * @param bool $insert
     * @param array $changedAttributes
     */
    public function afterSave ( $insert, $changedAttributes )
    {
        if ($this->brands) {
            $brands = array_unique($this->brands);
            foreach ($brands as $brand) {
                try {
                    Yii::$app->db->createCommand()->insert('brands_categories', [
                        'brands_id' => $brand,
                        'categories_id' => $this->id,
                    ])->execute();
                } catch ( Exception $e ) {
                }
            }
        }
    }
    
    /**
     * Load brands after find
     */
    public function afterFind ()
    {
        $links = BrandsCategories::findAll([ 'categories_id' => $this->id ]);
        foreach ( $links as $link ) {
            $this->schedule[] = $link->brands_id;
        }
    }
    
    /**
     * @inheritdoc
     */
    public function rules ()
    {
        return [
            [ [ 'name' ], 'required' ],
            [ [ 'status', 'related_product_id', 'is_main_page' ], 'integer' ],
            [ [ 'name', 'meta_keywords', 'meta_description' ], 'string', 'max' => 255 ],
            [ [ 'img' ], 'file' ],
            [ 'brands', 'safe' ],
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
            'related_product_id' => 'Related Product ID',
            'img' => 'Img',
            'is_main_page' => 'Is main item of page?',
            'meta_keywords' => 'Meta Keywords',
            'meta_description' => 'Meta Description',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrandsCategories ()
    {
        return $this->hasMany(BrandsCategories::className(), [ 'categories_id' => 'id' ]);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrands ()
    {
        return $this->hasMany(Brands::className(), [ 'id' => 'brands_id' ])->viaTable('brands_categories', [ 'categories_id' => 'id' ]);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts ()
    {
        return $this->hasMany(Products::className(), [ 'category_id' => 'id' ]);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelatedProduct ()
    {
        return $this->hasOne(Products::className(), [ 'id' => 'related_product_id' ]);
    }
}

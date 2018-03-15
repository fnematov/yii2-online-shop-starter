<?php

namespace app\models;

use trntv\filekit\behaviors\UploadBehavior;
use trntv\filekit\widget\Upload;
use Yii;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Exception;
use yii\helpers\Json;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $name
 * @property string $img
 * @property int $price
 * @property double $discount
 * @property string $content
 * @property int $category_id
 * @property double $rating
 * @property int $brand_id
 * @property string $short_desc
 * @property string $main_params_json
 * @property int $created_at
 * @property int $updated_at
 * @property int $status
 * @property string $meta_keywords
 * @property string $meta_description
 *
 * @property Cart[] $carts
 * @property OrdersProducts[] $ordersProducts
 * @property Orders[] $orders
 * @property ProductImages[] $productImages
 * @property Brands $brand
 * @property Categories $category
 * @property ProductsAddFilter[] $productsAddFilters
 * @property AddFilter[] $addFilters
 * @property ProductsMainFilter[] $productsMainFilters
 * @property MainFilter[] $mainFilters
 * @property ProductsProductParams[] $productsProductParams
 * @property ProductParams[] $productParams
 * @property ProductsRelations[] $productsRelations
 * @property ProductsRelations[] $productsRelations0
 * @property Products[] $relatedProducts
 * @property Products[] $products
 */
class Products extends ActiveRecord
{
    public $schedule;
    public $self_params;
    public $attachments;
    public $file;
    public $related_products;
    public $product_main_filter;
    public $product_add_filter;
    public $product_params;
    public $product_params_value;
    public $product_main_param;
    public $product_self_param;
    public $product_self_param_value;
    
    /**
     * @inheritdoc
     */
    public static function tableName ()
    {
        return 'products';
    }
    
    /**
     * @return array
     */
    public function behaviors ()
    {
        return [
            TimestampBehavior::className(),
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'name',
                'immutable' => true
            ],
            [
                'class' => UploadBehavior::className(),
                'attribute' => 'attachments',
                'multiple' => true,
                'uploadRelation' => 'productImages',
                'pathAttribute' => 'img',
                'baseUrlAttribute' => false,
            ],
            [
                'class' => UploadBehavior::className(),
                'attribute' => 'file',
                'pathAttribute' => 'img',
                'baseUrlAttribute' => false
            ]
        ];
    }
    
    /**
     * @param bool $insert
     * @return bool
     */
    public function beforeSave ( $insert )
    {
        $json_data = [];
        if ( is_array($this->schedule) ) {
            foreach ( $this->schedule as $schedule ) {
                if ( $schedule['product_main_param'] ) {
                    $param = ProductParams::findOne($schedule['product_params']);
                    $json_data[] = [
                        $param->name => $schedule['product_params_value'],
                    ];
                }
            }
        }
        $this->main_params_json = Json::encode($json_data);
        
        return true;
    }
    
    /**
     * @param bool $insert
     * @param array $changedAttributes
     */
    public function afterSave ( $insert, $changedAttributes )
    {
        if ( is_array($this->schedule) ) {
            foreach ( $this->schedule as $schedule ) {
                if ( $schedule['product_params'] && $schedule['product_params_value'] ) {
                    try {
                        Yii::$app->db->createCommand()->insert('products_product_params', [
                            'products_id' => $this->id,
                            'product_params_id' => $schedule['product_params'],
                            'value' => $schedule['product_params_value'],
                        ])->execute();
                    } catch ( Exception $e ) {
                        echo $e->getMessage();
                    }
                }
            }
        }
        
        if ( is_array($this->self_params) ) {
            foreach ( $this->self_params as $param ) {
                try {
                    Yii::$app->db->createCommand()->insert('product_self_params', [
                        'product_id' => $this->id,
                        'name' => $param['product_self_param'],
                        'value' => $param['product_self_param_value'],
                    ])->execute();
                } catch ( Exception $e ) {
                    echo $e->getMessage();
                }
            }
        }
        
        if ( is_array($this->related_products) ) {
            foreach ( $this->related_products as $relation ) {
                try {
                    Yii::$app->db->createCommand()->insert('products_relations', [
                        'product_id' => $this->id,
                        'related_product_id' => $relation,
                    ])->execute();
                } catch ( Exception $e ) {
                    echo $e->getMessage();
                }
            }
        }
        
        if ( is_array($this->product_main_filter) ) {
            foreach ( $this->product_main_filter as $main_filter ) {
                try {
                    Yii::$app->db->createCommand()->insert('products_main_filter', [
                        'products_id' => $this->id,
                        'main_filter_id' => $main_filter,
                    ])->execute();
                } catch ( Exception $e ) {
                    echo $e->getMessage();
                }
            }
        }
        
        if ( is_array($this->product_add_filter) ) {
            foreach ( $this->product_add_filter as $add_filter ) {
                try {
                    Yii::$app->db->createCommand()->insert('products_add_filter', [
                        'products_id' => $this->id,
                        'add_filter_id' => $add_filter,
                    ])->execute();
                } catch ( Exception $e ) {
                    echo $e->getMessage();
                }
            }
        }
        
        parent::afterSave($insert, $changedAttributes);
    }
    
    /**
     * @inheritdoc
     */
    public function rules ()
    {
        return [
            [ [ 'name', 'price', 'category_id', 'brand_id' ], 'required' ],
            [ [ 'price', 'category_id', 'brand_id', 'created_at', 'updated_at', 'status' ], 'integer' ],
            [ [ 'discount', 'rating' ], 'number' ],
            [ [ 'content', 'short_desc', 'main_params_json' ], 'string' ],
            [ [ 'name', 'meta_keywords', 'meta_description', 'img', 'slug' ], 'string', 'max' => 255 ],
            [ [ 'brand_id' ], 'exist', 'skipOnError' => true, 'targetClass' => Brands::className(), 'targetAttribute' => [ 'brand_id' => 'id' ] ],
            [ [ 'category_id' ], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => [ 'category_id' => 'id' ] ],
            [ [ 'attachments', 'file', 'related_products', 'product_main_filter', 'product_add_filter', 'schedule', 'self_params' ], 'safe' ],
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
            'img' => 'Img',
            'price' => 'Price',
            'discount' => 'Discount',
            'content' => 'Content',
            'category_id' => 'Category ID',
            'rating' => 'Rating',
            'brand_id' => 'Brand ID',
            'short_desc' => 'Short Desc',
            'main_params_json' => 'Main Params Json',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
            'meta_keywords' => 'Meta Keywords',
            'meta_description' => 'Meta Description',
            'product_main_filter' => 'Выберите филтеры',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarts ()
    {
        return $this->hasMany(Cart::className(), [ 'product_id' => 'id' ]);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdersProducts ()
    {
        return $this->hasMany(OrdersProducts::className(), [ 'products_id' => 'id' ]);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders ()
    {
        return $this->hasMany(Orders::className(), [ 'id' => 'orders_id' ])->viaTable('orders_products', [ 'products_id' => 'id' ]);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductImages ()
    {
        return $this->hasMany(ProductImages::className(), [ 'product_id' => 'id' ]);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrand ()
    {
        return $this->hasOne(Brands::className(), [ 'id' => 'brand_id' ]);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory ()
    {
        return $this->hasOne(Categories::className(), [ 'id' => 'category_id' ]);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductsAddFilters ()
    {
        return $this->hasMany(ProductsAddFilter::className(), [ 'products_id' => 'id' ]);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddFilters ()
    {
        return $this->hasMany(AddFilter::className(), [ 'id' => 'add_filter_id' ])->viaTable('products_add_filter', [ 'products_id' => 'id' ]);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductsMainFilters ()
    {
        return $this->hasMany(ProductsMainFilter::className(), [ 'products_id' => 'id' ]);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMainFilters ()
    {
        return $this->hasMany(MainFilter::className(), [ 'id' => 'main_filter_id' ])->viaTable('products_main_filter', [ 'products_id' => 'id' ]);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductsProductParams ()
    {
        return $this->hasMany(ProductsProductParams::className(), [ 'products_id' => 'id' ]);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductParams ()
    {
        return $this->hasMany(ProductParams::className(), [ 'id' => 'product_params_id' ])->viaTable('products_product_params', [ 'products_id' => 'id' ]);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductsRelations ()
    {
        return $this->hasMany(ProductsRelations::className(), [ 'product_id' => 'id' ]);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductsRelations0 ()
    {
        return $this->hasMany(ProductsRelations::className(), [ 'related_product_id' => 'id' ]);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelatedProducts ()
    {
        return $this->hasMany(Products::className(), [ 'id' => 'related_product_id' ])->viaTable('products_relations', [ 'product_id' => 'id' ]);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts ()
    {
        return $this->hasMany(Products::className(), [ 'id' => 'product_id' ])->viaTable('products_relations', [ 'related_product_id' => 'id' ]);
    }
}

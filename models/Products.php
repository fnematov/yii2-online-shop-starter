<?php

namespace app\models;

use Yii;

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
class Products extends \yii\db\ActiveRecord
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
            [['name', 'price', 'category_id', 'brand_id'], 'required'],
            [['price', 'category_id', 'brand_id', 'created_at', 'updated_at', 'status'], 'integer'],
            [['discount', 'rating'], 'number'],
            [['content', 'short_desc', 'main_params_json'], 'string'],
            [['name', 'img', 'meta_keywords', 'meta_description'], 'string', 'max' => 255],
            [['brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brands::className(), 'targetAttribute' => ['brand_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['category_id' => 'id']],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarts()
    {
        return $this->hasMany(Cart::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdersProducts()
    {
        return $this->hasMany(OrdersProducts::className(), ['products_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['id' => 'orders_id'])->viaTable('orders_products', ['products_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductImages()
    {
        return $this->hasMany(ProductImages::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(Brands::className(), ['id' => 'brand_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductsAddFilters()
    {
        return $this->hasMany(ProductsAddFilter::className(), ['products_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddFilters()
    {
        return $this->hasMany(AddFilter::className(), ['id' => 'add_filter_id'])->viaTable('products_add_filter', ['products_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductsMainFilters()
    {
        return $this->hasMany(ProductsMainFilter::className(), ['products_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMainFilters()
    {
        return $this->hasMany(MainFilter::className(), ['id' => 'main_filter_id'])->viaTable('products_main_filter', ['products_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductsProductParams()
    {
        return $this->hasMany(ProductsProductParams::className(), ['products_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductParams()
    {
        return $this->hasMany(ProductParams::className(), ['id' => 'product_params_id'])->viaTable('products_product_params', ['products_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductsRelations()
    {
        return $this->hasMany(ProductsRelations::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductsRelations0()
    {
        return $this->hasMany(ProductsRelations::className(), ['related_product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelatedProducts()
    {
        return $this->hasMany(Products::className(), ['id' => 'related_product_id'])->viaTable('products_relations', ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['id' => 'product_id'])->viaTable('products_relations', ['related_product_id' => 'id']);
    }
}

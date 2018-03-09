<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "search_statistics".
 *
 * @property int $id
 * @property string $query
 * @property int $searched_count
 */
class SearchStatistics extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'search_statistics';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['query'], 'required'],
            [['searched_count'], 'integer'],
            [['query'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'query' => 'Query',
            'searched_count' => 'Searched Count',
        ];
    }
}

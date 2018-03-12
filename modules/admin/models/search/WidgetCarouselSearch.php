<?php

namespace app\modules\admin\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\WidgetCarousel;

/**
 * WidgetCarouselSearch represents the model behind the search form of `app\models\WidgetCarousel`.
 */
class WidgetCarouselSearch extends WidgetCarousel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'order', 'created_at', 'updated_at'], 'integer'],
            [['img', 'url', 'small_caption', 'main_caption', 'content', 'key'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = WidgetCarousel::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'order' => $this->order,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'small_caption', $this->small_caption])
            ->andFilterWhere(['like', 'main_caption', $this->main_caption])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'key', $this->key]);

        return $dataProvider;
    }
}

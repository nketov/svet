<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Product;

/**
 * ProductSearch represents the model behind the search form of `common\models\Product`.
 */
class ProductSearch extends Product
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'shop', 'active', 'category', 'height', 'diametr', 'width', 'depth'], 'integer'],
            [['code', 'name', 'description', 'image_1', 'image_2', 'image_3', 'image_4', 'image_5', 'color', 'material', 'lamps', 'second_code'], 'safe'],
            [['price'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Product::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 12,
            ],
        ]);

        $dataProvider->sort->defaultOrder['price'] = SORT_DESC;

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'shop' => $this->shop,
            'active' => $this->active,
            'category' => $this->category,
            'price' => $this->price,
            'height' => $this->height,
            'diametr' => $this->diametr,
            'width' => $this->width,
            'depth' => $this->depth,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'color', $this->color])
            ->andFilterWhere(['like', 'material', $this->material])
            ->andFilterWhere(['like', 'lamps', $this->lamps])
            ->andFilterWhere(['like', 'second_code', $this->second_code]);

        return $dataProvider;
    }
}

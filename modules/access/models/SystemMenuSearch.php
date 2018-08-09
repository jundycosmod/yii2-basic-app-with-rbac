<?php

namespace app\modules\access\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\access\models\SystemMenu;

/**
 * SystemMenuSearch represents the model behind the search form about `app\modules\access\models\SystemMenu`.
 */
class SystemMenuSearch extends SystemMenu
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'position', 'enabled'], 'integer'],
            [['menu_name', 'caption', 'link', 'parent', 'requirement', 'icon'], 'safe'],
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
        $query = SystemMenu::find();

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
            'position' => $this->position,
            'enabled' => $this->enabled,
        ]);

        $query->andFilterWhere(['like', 'menu_name', $this->menu_name])
            ->andFilterWhere(['like', 'caption', $this->caption])
            ->andFilterWhere(['like', 'link', $this->link])
            ->andFilterWhere(['like', 'parent', $this->parent])
            ->andFilterWhere(['like', 'requirement', $this->requirement])
            ->andFilterWhere(['like', 'icon', $this->icon]);

        return $dataProvider;
    }
}

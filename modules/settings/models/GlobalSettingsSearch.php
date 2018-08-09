<?php

namespace app\modules\settings\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\settings\models\GlobalSettings;

/**
 * GlobalSettingsSearch represents the model behind the search form about `app\modules\settings\models\GlobalSettings`.
 */
class GlobalSettingsSearch extends GlobalSettings
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['settings_name', 'settings_value'], 'safe'],
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
        $query = GlobalSettings::find();

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
        $query->andFilterWhere(['like', 'settings_name', $this->settings_name])
            ->andFilterWhere(['like', 'settings_value', $this->settings_value]);

        return $dataProvider;
    }
}

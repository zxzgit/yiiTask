<?php

namespace app\models\news;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\news\Acticle;

/**
 * ActicleSearch represents the model behind the search form about `app\models\news\Acticle`.
 */
class ActicleSearch extends Acticle
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['aid', 'tid', 'uid', 'pv', 'uv', 'ip'], 'integer'],
            [['title', 'keyword', 'content', 'addtime', 'mtime'], 'safe'],
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
        $query = Acticle::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
		!Yii::$app->user->getId() && Yii::$app->response->redirect(['/news/user/login','redirect'=>Yii::$app->request->getAbsoluteUrl()]);
        $query->where(['uid' => Yii::$app->user->getId()])
			->andFilterWhere([
			'aid' => $this->aid,
            'tid' => $this->tid,
            'addtime' => $this->addtime,
            'mtime' => $this->mtime,
            'uid' => $this->uid,
            'pv' => $this->pv,
            'uv' => $this->uv,
            'ip' => $this->ip,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'keyword', $this->keyword])
            ->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}

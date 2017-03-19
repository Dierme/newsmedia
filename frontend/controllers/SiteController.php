<?php
namespace frontend\controllers;

use common\models\Comments;
use common\models\News;
use Yii;
use yii\base\InvalidParamException;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public $enableCsrfValidation = false;

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['*'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['?'],
                    ]
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'post-comment' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => News::find()
                ->where(['status' => News::STATUS_PUBLISHED]),
            'pagination' => [
                'pageSize' => 5,
            ],
            'sort' => [
                'defaultOrder' => [
                    'created_at' => SORT_DESC,
                    'title' => SORT_ASC,
                ]
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Displays news view page
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionNews($id)
    {
        $model = News::findOne($id);

        $suggestedProvider = new ActiveDataProvider([
            'query' => News::find()
                ->where(['status' => News::STATUS_PUBLISHED])
                ->limit(3),
            'sort' => [
                'defaultOrder' => [
                    'created_at' => SORT_DESC,
                    'title' => SORT_ASC,
                ]
            ],
        ]);

        $commentsProvider = new ActiveDataProvider([
            'query' => Comments::find()
                ->where([
                    'status' => Comments::STATUS_PUBLISHED,
                    'news_id' => $model->id,
                ]),
            'sort' => [
                'defaultOrder' => [
                    'created_at' => SORT_ASC
                ]
            ],
        ]);

        if (empty($model)) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        return $this->render('news_view', [
            'model' => $model,
            'suggestedProvider' => $suggestedProvider,
            'commentsProvider' => $commentsProvider,
        ]);
    }


    public function actionPostComment()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $post = Yii::$app->request->post();

        if (!empty($post['text'])) {
            $post['text'] = strip_tags($post['text']);
        }

        $model = new Comments();
        $model->status = Comments::STATUS_PUBLISHED;

        if ($model->load($post, '') && $model->save()) {
            return $this->renderPartial('_comment_item', [
                'model' => $model
            ]);
        } else {
            return [
                'success' => false,
                'message' => 'Failed to load model'
            ];
        }

    }

}
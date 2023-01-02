<?php

namespace common\controllers;

use common\models\Comment;
use common\models\Post;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends Controller
{

    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Post models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $tags = $_GET['tag'];
        $dataProvider = new ActiveDataProvider([
            'query' => Post::find()->where(['condition' => Post::STATUS_PUBLISHED, 'tags' => $tags]),
            'pagination' => [
                'pageSize' => 5
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Post model.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $comment = new Comment();
        $model = $this->findModel($id);
        if ($comment->load($_POST) && $model->addComment($comment)) {
            if ($comment->status == Comment::STATUS_PENDING) {
                Yii::$app->getSession()->setFlash('warning', 'Thank you for your comment. Your comment will be posted once it is approved.');
            }
            return $this->refresh();
        }
        return $this->render('view', [
            'model' => $model,
            'comment' => $comment,
        ]);
    }

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (Yii::$app->user->isGuest)
            $condition = 'status=' . Post::STATUS_PUBLISHED
                . ' OR status=' . Post::STATUS_ARCHIVED;
        else
            $condition = '';
        if (($model = Post::findOne(['id' => $id, $condition])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

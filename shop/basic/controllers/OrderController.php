<?php

namespace app\controllers;

use app\models\Customers;
use app\models\Diliveraddress;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Ordering;
use app\models\Orders;
use app\models\Products;
use app\models\Store;
use app\models\Taxs;
/**
 * OrderController implements the CRUD actions for orders model.
 */
class OrderController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all orders models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => orders::find()->where(['CustomerId' => $_COOKIE['id']]),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionStuff()
    {
        if (!$_COOKIE['type']){
            $this->redirect('index.php');
        }
        $dataProvider = new ActiveDataProvider([
            'query' => orders::find(),
        ]);

        return $this->render('stuff', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single orders model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new orders model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $products = Yii::$app->request->post('Product');
        $num = Yii::$app->request->post('num');
        $DiliverId = (int) Yii::$app->request->post('DiliverId');
        $CreditId = (int) Yii::$app->request->post('CreditId');
        $type = (int) Yii::$app->request->post('type');
        $products = explode(',', $products);
        $num = explode(',', $num);

        if (!$customer = Customers::findOne($_COOKIE['id'])){
            $this->redirect('index.php');
        }

        $products = Products::findAll(['ProductId' => $products]);

        $price = 0;

        foreach ($products as $k => $product){
            $price += $product->ProductPrice * $num[$k];
        }
        if (($type == 2) && ($customer->Balance < $price)){
            $this->redirect('index.php');
        }

        //tax
        $add = Diliveraddress::findOne($DiliverId);
        $tax = Taxs::findOne(['StateId' => $add->StateId]);

        $model = new Orders();
        $model->CustomerId = $_COOKIE['id'];
        $model->Status = 1;
        $model->DiliverId = $type < 2 ? $DiliverId : 0;
        $model->CreditId = $CreditId;
        $model->TotalPrice = $price * (1 + $tax->Tax * 0.01);
        $model->IssueTime = date(time());
        $model->save();

        if ((!$_COOKIE['id']) || (!$id = $model->OrderId)) {
            unset($_COOKIE);
            $this->redirect('index.php?r=customers/login');
        }

        foreach ($products as $k => $product){
            $model = new Ordering();
            $model->ProductId = $product->ProductId;
            $model->OrderId = $id;
            $model->Quantity = $num[$k];
            $model->CustomerId = $_COOKIE['id'];
            if ($model->save()){
                $store = Store::find()->where('Quantity >0 and ProductId=' . $product->ProductId)->one();
                $store->Quantity -= $num[$k];
                $store->save();
            }
        }
        unset($_SESSION);
        $this->redirect('index.php?r=order/index');
    }

    /**
     * Updates an existing orders model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->OrderId]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing orders model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the orders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return orders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = orders::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

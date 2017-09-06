<?php

namespace app\controllers;

use Yii;
use app\models\Products;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Store;
use app\models\Warehouses;
/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends Controller
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
     * Lists all Products models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Products::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Products model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionStock($id)
    {
        $products = Products::findOne($id);
        if ($products){
            $stores = Store::find()->where(['ProductId' => $id])->select('Store.*, WarehouseName')->innerJoinWith('warehouse')->all();
            $warehouses = Warehouses::findAll(['WarehouseState' => 1]);
            return $this->render('stock', [
                'product' => $products,
                'stores' => $stores,
                'warehouses' => $warehouses,
            ]);
        }
        $this->redirect('index.php');
    }

    public function actionAddstock($ProductId, $WarehouseId, $quantity)
    {
        $warehouse = Warehouses::findOne($WarehouseId);
        if ($warehouse && $quantity){
            $model = Store::findOne(['WarehouseId' => $WarehouseId, 'ProductId' => $ProductId]) ?? new Store();
            $model->WarehouseId = $WarehouseId;
            $model->Quantity += $quantity;
            $model->ProductId = $ProductId;
            $model->save();
            $warehouse->CurrentStore += $quantity;
            $warehouse->save();
        }
        $this->redirect('index.php?r=products/stock&id='.$ProductId);
    }
    /**
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Products();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ProductId]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ProductId]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Products model.
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
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

<?php

namespace app\controllers;

use app\models\Diliveraddress;
use Yii;
use app\models\Customers;
use app\models\Stuffs;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CustomersController implements the CRUD actions for Customers model.
 */
class CustomersController extends Controller
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
     * Lists all Customers models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Customers::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Customers model.
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
     * Creates a new Customers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Customers();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->CustomerId]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Creates a new Customers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionLogin()
    {
        if ((isset( $_COOKIE["name"])) && (isset( $_COOKIE["id"]))){
            $this->redirect('index.php');
        }
        $this->layout = false;
        $model = new Customers();

        if ((isset($_POST['Username'])) && (isset($_POST['Password']) && !$_POST['identity'])){
            $customer = Customers::findOne(['UserName' => $_POST['Username'], 'Passport' => $_POST['Password']]);
            if ($customer) {
                setcookie("name", $customer->UserName);
                setcookie("id", $customer->CustomerId);
                setcookie("type", 0);
                $this->redirect('index.php');
            } else {
                $this->redirect('index.php?r=customers/login');
            }
        }

        if ((isset($_POST['Username'])) && (isset($_POST['Password']) && $_POST['identity'])){

            $stuff = Stuffs::findOne(['UserName' => $_POST['Username'], 'Passort' => $_POST['Password']]);
            if ($stuff) {
                setcookie("name", $stuff->UserName);
                setcookie("id", $stuff->StuffId);
                setcookie("type", 1);
                $this->redirect('index.php?r=stuff/update&id=' . $stuff->StuffId);
            } else {
                $this->redirect('index.php?r=customers/login');
            }
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->CustomerId]);
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionRegister()
    {
        $model = new Customers();
        $userName = Yii::$app->request->post('Username');
        $password = Yii::$app->request->post('Password');
        if (($userName == '') || ($password == '')){
            $this->redirect('index.php?r=customer/login');
        }
        $model->UserName = $userName;
        $model->Passport = $password;
        if ($model->save()){
            setcookie("name", $model->UserName);
            setcookie("id", $model->CustomerId);
            setcookie("type", 0);
            $this->redirect('index.php?r=customer/update');
        }
    }

    public function actionLogout()
    {
        $cookies = Yii::$app->response->cookies;
        $cookies->remove('name');
        $cookies->remove('id');
        //unset($cookies['username']);
        $this->redirect('index.php');
    }

    /**
     * Updates an existing Customers model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate()
    {
        $model = $this->findModel($_COOKIE['id']);
        $address = Diliveraddress::findAll(['CustomerId' => $_COOKIE['id']]);
        $dilivers = [];
        if ($address){
            foreach ($address as $ad){
                $dilivers[$ad->DiliverAddressId] = $ad->City.$ad->Street;
            }
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        }
        return $this->render('update', [
            'dilivers' => $dilivers,
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Customers model.
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
     * Finds the Customers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Customers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Customers::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

<?php

namespace app\controllers;

use app\models\Customers;
use app\models\Diliveraddress;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Products;
use app\models\Store;
use app\models\Warehouses;
use yii\db\Query;
use  yii\web\Session;
use yii\helpers\Json;
use app\models\Creditcard;
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
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
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = false;

        $products = Products::find()->limit(4)->all();
        return $this->render('index',[
            'products' => $products
        ]);
    }

    public function actionMail()
    {
        $this->layout = false;
        return $this->render('mail');
    }

    public function actionAddcart($productId)
    {
        $session = Yii::$app->session;
        if (!$session->isActive){
            $session->open();
        }
        if ($customerId = $_COOKIE['id']) {
            $_SESSION[$customerId]['cart'][$productId] +=1;
        } else {
            $this->redirect('index.php?r=customers/login');
        }
    }

    public function actionCart()
    {
        $id = Yii::$app->request->post('id');
        $num = Yii::$app->request->post('num');

        if ($customerId = $_COOKIE['id']){
            $customer = Customers::findOne($customerId);
            $balance = $customer->Balance;
            $address = Diliveraddress::findAll(['customerId' => $customerId]);
            $cards= Creditcard::findAll(['customerId' => $customerId]);
            return $this->render('order',[
                'balance' => $balance,
                'address' => $address,
                'cards' => $cards,
                'id' => $id,
                'num' => $num
            ]);
        }


    }

    public function actionProduct()
    {
        $this->layout = false;
        $id = (int)Yii::$app->request->get('id', 1);
        if ($id){
            $product = Products::findOne($id);
            $stores =Store::findAll(['ProductId' => $id]);

            $total = 0;
            if ($stores){
                foreach ($stores as $store){
                    $total += $store->Quantity;
                }
                $stores = Warehouses::find()->where(['WarehouseId'=>array_column($stores, 'WarehouseId')])->all();
            }
            return $this->render('single',['product' => $product, 'stores' => $stores, 'total' => $total]);
        }


    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}

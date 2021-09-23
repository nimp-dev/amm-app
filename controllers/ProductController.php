<?php

namespace app\controllers;
use app\models\Category;
use app\models\Product;
use Yii;



class ProductController extends AppController {

	public function actionView($id){

		$id = Yii::$app->request->get('id'); //можно убрать
		// $product = Product::findOne($id);
		$brand = Product::find()->all();
		$product = Product::find()->with('category')->where(['id' => $id])->limit(1)->one();
		if(empty($product))
		 			throw new \yii\web\HttpException(404, 'неверно выбранный товар');
		$hits = Product::find()->where(['hit'=> 1])->limit(6)->all();
		$this->setMeta('AMM-Dnepr | ' . $product->name, $product->keywords,$product->description);
		return $this->render('view',compact('product', 'hits','brand'));

	}

	
		public function actionAllview($id){

		$id = Yii::$app->request->get('id'); //можно убрать
		// $product = Product::findOne($id);
		// $product = Product::find()->with('category')->where(['parent_id'=> $id]);
		$product = Category::find()->with('products')->where(['parent_id' => $id])->all();
		if(empty($product))
		 			throw new \yii\web\HttpException(404, 'неверноt выбранный товар');
		$this->setMeta('AMM-Dnepr | ');

		return $this->render('allview',compact('product'));

	}




}
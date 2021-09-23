<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Category;
use app\models\Product;
use Yii;
use yii\data\Pagination;
/**
 * 
 */
class CategoryController extends AppController
{
	
		 public function actionIndex(){

		 		$hits = Product::find()->where(['hit'=> 1])->limit(6)->all();
		 		$this->setMeta('AMM-Dnepr');
		 		$brand = Product::find()->all();
		 		// debug($hits);
		        return $this->render('index', compact('hits','brand'));
		        
		    }

		 public function actionView($id){

		
		 		$id = Yii::$app->request->get('id'); //можно убрать
		 		$category = Category::findOne($id);
		 		if(empty($category))
		 			throw new \yii\web\HttpException(404, 'Не существующая категория');
		 		// $products = Product::find()->where(['category_id'=> $id])->all();
		 		$query = Product::find()->where(['category_id'=> $id]);
		 		$pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3, 'forcePageParam'=>false, 'pageSizeParam'=>false]);
		 		$products = $query->offset($pages->offset)->limit($pages->limit)->all();
		 		 
		 		$this->setMeta('AMM-Dnepr | ' . $category->name, $category->keywords,$category->description);
		 		// debug($id);
		        return $this->render('view', compact('products','pages','category'));
    		}


	     public function actionSearch(){
		        $q = trim(Yii::$app->request->get('q'));
		        $this->setMeta('E-SHOPPER | Поиск: ' . $q);
		        	
	        	if(!$q)
            	return $this->render('search');

		        $query = Product::find()->where(['like', 'name', $q]);
		        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]);
		        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
		        return $this->render('search', compact('products', 'pages', 'q'));
			}

		public function actionAllcategories(){

	 		$cat= Category::find()->with('products')->where(['parent_id'=> 0])->all();
	 		$this->setMeta('AMM-Dnepr | Все категории');
	 		// debug($hits);
	        return $this->render('allcategories', compact('cat'));
	        
	    }


			public function actionDislocation(){
				$i= 1;

		return $this->render('dislocation',compact('i'));
	}




}
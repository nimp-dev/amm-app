<!-- 
// foreach ($product as $catname) {
// 	foreach($catname->products as $res);
// 	debug($res);
	// foreach ($catname as $cat) {
	// 	debug($cat);
	// }
// };
// for ($i=0; $i <= 3; $i++) {
// 	foreach($product[$i] as $prod);
// 	 echo $prod['id'];
	// echo $product[$i]['name'];
// }
// debug($product['0']['name']); -->
<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */
use yii\helpers\Url;

?>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
<ul class="catalog category-products">
<?= \app\components\MenuWidget::widget(['tpl' => 'menu']) ?>
</ul>
					
						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<li><a href=""> <span class="pull-right">(50)</span>Acne</a></li>
									<li><a href=""> <span class="pull-right">(56)</span>Grüne Erde</a></li>
									<li><a href=""> <span class="pull-right">(27)</span>Albiro</a></li>
									<li><a href=""> <span class="pull-right">(32)</span>Ronhill</a></li>
									<li><a href=""> <span class="pull-right">(5)</span>Oddmolly</a></li>
									<li><a href=""> <span class="pull-right">(9)</span>Boudestijn</a></li>
									<li><a href=""> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
								</ul>
							</div>
						</div><!--/brands_products-->
						
						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b>$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src="/images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
						
					</div>
				</div>
		
				<div class="col-sm-9 padding-right">
					<?php foreach($product as  $produc): ?>
						<?php foreach($produc->products as $produ): ?>
							<?php $mainImg = $produ->getImage();?>
							<div class="col-sm-4">
								 <div class="product-image-wrapper">
								 	<div class="single-products">
	                                        <div class="productinfo text-center">
	                                        	<a href="<?= Url::to(['product/view','id'=>$produ->id]) ?>"><img src="<?= Url::base() . '/upload/store/' . $mainImg ->filePath ?>"></a>
	                                        	<p><a href="<?= Url::to(['product/view','id'=>$produ->id]) ?>"><span class="asdqwe2"><?=$produ->name?></span></a></p>
	                                    	</div>
	                            	</div>
	                        	</div>
	                    	</div>
                    	<?php endforeach; ?>
					<?php endforeach; ?>	
				</div>
			</div>
		</div>
	</section>
	<?php 
		foreach ($product as $produc) {
			// debug($produc->products);
			foreach ($produc->products as $produ) {
				echo $produ->name;echo $produ->id.'</br>';
			}
		}

	?>


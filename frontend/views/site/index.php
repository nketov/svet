<div class="cards-block main-page">
  <?php foreach ($models as $model){

      if(empty($product = $model->product)) continue;
      echo '<div class="card" data-key="'.$product->id.'">';
      echo $this->renderAjax('/products/_card.php', [
          'model' => $product,
      ]);
      echo '</div>';
  } ?>
</div>

<?php require APPROOT . '/views/inc/header.php'; ?>
<section class="products">
    <form action="products/delete" class="products__list" method="post" id="ids-list">
    <?php if(is_array($data) || is_object($data)) { foreach ($data['products'] as $product) : ?>
        <div class="products__list--item item">
        <div class="item__checkbox">
            <input class="delete-checkbox" type="checkbox" name="checkbox" value="<?php echo $product->id; ?>">
            <label for="checkbox" class="item__checkbox--label"></label>
        </div>
        <div class="item__sku"><?php echo $product->sku; ?></div>
        <div class="item__name"><?php echo $product->name; ?></div>
        <div class="item__price"><?php echo number_format($product->price, 2, '.', ','); ?>$</div>
        <div class="item__attributes">
        <?php 
            echo $product->size > 0 ? "{$product->size} MB" : '';
            echo $product->weight > 0 ? "{$product->weight} KG" : '';
            echo $product->height > 0 ? "Dimensions: {$product->height}x{$product->width}x{$product->length}" : '';
        ?>
        </div>        
    </div>
    <?php endforeach; } ?>
    </form>
</section>
<?php require APPROOT . '/views/inc/footer.php'; ?>
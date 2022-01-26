<?php require APPROOT . '/views/inc/addheader.php'; ?>

<form action="<?php echo URLROOT; ?>/products/addproduct" id="product_form" method="post">
    <div class="form-group">
        <label for="sku">SKU</label>
        <input type="text" name="sku" id="sku" value="<?php echo (!empty($data['sku'])) ? $data['sku'] : ''; ?>">
        <span class="input-error<?php echo (!empty($data['sku_err'])) ? ' visible' : ''; ?>"><?php echo $data['sku_err']; ?></span>
    </div>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="<?php echo (!empty($data['name'])) ? $data['name'] : ''; ?>">
        <span class="input-error<?php echo (!empty($data['name_err'])) ? ' visible' : ''; ?>"><?php echo $data['name_err']; ?></span>
    </div>
    <div class="form-group">
        <label for="price">Price ($)</label>
        <input type="number" min="0" step="any" name="price" id="price" value="<?php echo (!empty($data['price'])) ? $data['price'] : ''; ?>">
        <span class="input-error<?php echo (!empty($data['price_err'])) ? ' visible' : ''; ?>"><?php echo $data['price_err']; ?></span>
    </div>
    <div class="form-group">
        <label for="producttype">Type Switcher</label>
        <select id="productType" name="producttype">
            <option value=""></option>
            <option value="DVD" <?php echo (!empty($data['producttype']) && $data['producttype'] == 'DVD') ? 'selected="selected"' : ''; ?>>DVD</option>
            <option value="Furniture" <?php echo (!empty($data['producttype']) && $data['producttype'] == 'Furniture') ? 'selected="selected"' : ''; ?>>Furniture</option>
            <option value="Book" <?php echo (!empty($data['producttype']) && $data['producttype'] == 'Book') ? 'selected="selected"' : ''; ?>>Book</option>
        </select>
        <span class="input-error<?php echo (!empty($data['type_err'])) ? ' visible' : ''; ?>"><?php echo $data['type_err']; ?></span>
    </div>
    <div class="form-group">
        <label for="size">Size (MB)</label>
        <input type="number" min="0" step="any" name="size" value="<?php echo (!empty($data['size'])) ? $data['size'] : ''; ?>" id="size">
        <span class="input-error<?php echo (!empty($data['size_err'])) ? ' visible' : ''; ?>"><?php echo $data['size_err']; ?></span>
    </div>
    <div class="form-group">
        <label for="height">Height (CM)</label>
        <input type="number" min="0" step="any" name="height" value="<?php echo (!empty($data['height'])) ? $data['height'] : ''; ?>" id="height">
        <span class="input-error<?php echo (!empty($data['height_err'])) ? ' visible' : ''; ?>"><?php echo $data['height_err']; ?></span>
    </div>
    <div class="form-group">
        <label for="width">Width (CM)</label>
        <input type="number" min="0" step="any" name="width" value="<?php echo (!empty($data['width'])) ? $data['width'] : ''; ?>" id="width">
        <span class="input-error<?php echo (!empty($data['width_err'])) ? ' visible' : ''; ?>"><?php echo $data['width_err']; ?></span>
    </div>
    <div class="form-group">
        <label for="length">Length (CM)</label>
        <input type="number" min="0" step="any" name="length" value="<?php echo (!empty($data['length'])) ? $data['length'] : ''; ?>" id="length">
        <span class="input-error<?php echo (!empty($data['length_err'])) ? ' visible' : ''; ?>"><?php echo $data['length_err']; ?></span>
    </div>
    <div class="form-group">
        <label for="weight">Weight (KG)</label>
        <input type="number" min="0" step="any" name="weight" value="<?php echo (!empty($data['weight'])) ? $data['weight'] : ''; ?>" id="weight">
        <span class="input-error<?php echo (!empty($data['weight_err'])) ? ' visible' : ''; ?>"><?php echo $data['weight_err']; ?></span>
    </div>
    <div class="form-group" id="notification"></div>
</form>
<?php require APPROOT . '/views/inc/footer.php'; ?>
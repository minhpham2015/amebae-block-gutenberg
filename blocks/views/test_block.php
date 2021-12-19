<?php

/**
 * Button Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
 // Create id attribute allowing for custom "anchor" value.
$id = 'test_block-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'test_block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
/**
* Back-end preview
*/
if ( $is_preview && isset($block['data']['image'])) {
   echo $block['data']['image'];
   return;
} else {
    $data = $block['data'];
    ?>
    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
      <div class="cta-pj" style="text-align: <?php echo $data['mlp_align'];  ?>">
        <a href="<?php echo $data['mlp_url']; ?>" class="pj-btn <?php echo $data['mlp_width']; ?>">
          <?php echo ($data['mlp_text']) ? $data['mlp_text'] : 'Text Button'; ?>
        </a>
      </div>
    </div>
    <?php
}

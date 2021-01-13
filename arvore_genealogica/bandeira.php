<?php
$field = get_field('nacionalidade');
$valor = json_encode($field['value']);
$rotulo = json_encode($field['label']);

if ($valor === '"BR"') { ?>
    <img class="bandeira" src="<?php bloginfo('template_directory'); ?>/img/bandeira/Brasil.svg">
<?php  } elseif ($valor === '"IT"') { ?>
    <img class="bandeira" src="<?php bloginfo('template_directory'); ?>/img/bandeira/Italia.svg">
<?php  } elseif ($valor === '"GM"') { ?>
    <img class="bandeira" src="<?php bloginfo('template_directory'); ?>/img/bandeira/Alemanha.svg">
<?php  } elseif ($valor === '"HU"') { ?>
    <img class="bandeira" src="<?php bloginfo('template_directory'); ?>/img/bandeira/Hungria.svg">
<?php  } elseif ($valor === '"PT"') { ?>
    <img class="bandeira" src="<?php bloginfo('template_directory'); ?>/img/bandeira/Portugal.svg">
<?php  } elseif ($valor === '"PR"') { ?>
    <img class="bandeira" src="<?php bloginfo('template_directory'); ?>/img/bandeira/Prussia.svg">
<?php  } elseif ($valor === '"AU"') { ?>
    <img class="bandeira" src="<?php bloginfo('template_directory'); ?>/img/bandeira/Austria.svg">
<?php  } ?>
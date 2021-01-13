<?php get_header(); ?>

<div class="wrap">
    <div class="bgTabela">
        <h1><?php single_cat_title(); ?></h1>

        <h2>Todos os cadastros existentes:</h2>
        <div class="listagemNomes">

            <?php if (have_posts()) {
                while (have_posts()) {
                    the_post();
            ?>
                    <a class="aNomes" href="<?php the_permalink(); ?>">

                        <?php
                        get_template_part('bandeira');
                        the_field('nome');
                        ?>

                        (

                        <?php
                        while (have_rows('nascimento')) : the_row();
                            the_sub_field('data_de_nascimento');
                        endwhile;
                        ?>
                        -
                        <?php
                        while (have_rows('falecimento')) : the_row();
                            the_sub_field('data_de_falecimento');
                        endwhile;
                        ?>

                        )
                    </a>
            <?php
                } // end while
            } // end if
            ?>
        </div>
    </div>
</div>


<div class="wrap" style="margin-top: 30px;">
    <div class="bgTabela">

        <?php        
        $categories = get_the_category($post->ID);   
        $slug = $categories[0]->slug;

        if ($slug === "francisco-bettoni-sobrinho") { ?>

            <img class="organograma" src="<?php bloginfo('template_directory'); ?>/img/Arvore_geneaologica_francisco.png">

        <?php } elseif ($slug === "jose-zeferino-peixer") { ?>

            <img class="organograma" src="<?php bloginfo('template_directory'); ?>/img/Arvore_geneaologica_peixer.png">

        <?php } elseif ($slug === "maria-magdalena-vieira") { ?>

            <img class="organograma" src="<?php bloginfo('template_directory'); ?>/img/Arvore_geneaologica_vieira.png">

        <?php } elseif ($slug === "maria-leitholdt") { ?>

            <img class="organograma" src="<?php bloginfo('template_directory'); ?>/img/Arvore_geneaologica_leithold.png">

        <?php }; ?>
    </div>
</div>


<?php get_footer(); ?>
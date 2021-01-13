<?php get_header(); ?>


<div class="wrap">
    <div class="bgTabela">
        <div class="identificacao">
            <?php get_template_part('bandeira'); ?>

            <h1> <?php the_field('nome'); ?> </h1>
        </div>

        <!-- DADOS PESSOAIS -->
        <table>
            <tr>
                <td>Nome</td>
                <td><?php the_field('nome'); ?></td>
            </tr>
            <tr>
                <td>Nacionalidade</td>
                <td>
                    <?php
                    $field = get_field('nacionalidade');
                    $rotulo = $field['label'];
                    echo $rotulo;
                    ?>
                </td>
            </tr>

            <?php while (have_rows('nascimento')) : the_row(); ?>
                <tr>
                    <td>Nascimento</td>
                    <td>
                        <?php
                        $dataNasc = get_sub_field('data_de_nascimento');
                        $localNasc = get_sub_field('local_de_nascimento');

                        if ($dataNasc && $localNasc) { ?>
                            <span><?php echo $dataNasc . ', em '  . $localNasc; ?></span>
                        <?php } elseif ($localNasc && !$dataNasc ) { ?>
                            <?php the_sub_field('local_de_nascimento'); ?>
                        <?php } elseif (!$localNasc && $dataNasc ) { ?>
                            <?php the_sub_field('data_de_nascimento'); ?>
                        <?php }; ?>
                    </td>
                </tr>
            <?php endwhile; ?>

            <?php while (have_rows('falecimento')) : the_row(); ?>
                <tr>
                    <td>Falecimento</td>
                    <td>
                        <?php
                        $dataFale = get_sub_field('data_de_falecimento');
                        $localFale = get_sub_field('local_de_falecimento');

                        if ($dataFale && $localFale) { ?>
                            <span><?php echo $dataFale . ', em '  . $localFale; ?></span>
                        <?php } elseif ($localFale) { ?>
                            <?php the_sub_field('local_de_falecimento'); ?>
                        <?php } elseif ($localFale) { ?>
                            <?php the_sub_field('data_de_falecimento'); ?>
                        <?php }; ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>

        <!-- FILIAÇÃO -->
        <table>
            <?php while (have_rows('filiacao')) : the_row(); ?>
                <tr>
                    <td>Pai</td>
                    <td>
                        <a href="<?php the_sub_field('link_pai'); ?>"><?php the_sub_field('nome_do_pai'); ?></a>
                    </td>
                </tr>

                <tr>
                    <td>Mãe</td>
                    <td>
                        <a href="<?php the_sub_field('link_mae'); ?>"><?php the_sub_field('nome_da_mae'); ?></a>
                    </td>
                </tr>
                <?php if (get_sub_field('data_do_casamento')) { ?>
                    <tr>
                        <td>Casamento dos pais</td>
                        <td><?php get_sub_field('data_do_casamento')  . ', em '  . get_sub_field('local_do_casamento'); ?> </td>
                    </tr>
            <?php }
            endwhile; ?>
        </table>

        <!-- CONJUGÊ -->
        <?php while (have_rows('conjuge')) : the_row(); ?>
            <?php if (get_sub_field('teve_o_segundo_casamento') === true) : ?>
                <p>1º casamento:</p>
            <?php endif; ?>

            <table>
                <tr>
                    <td>Conjugê</td>
                    <td>
                        <?php
                        $link = get_sub_field('link_conjuge_01');
                        $link = $link->guid;
                        ?>
                        <a href="<?php echo $link; ?>"><?php the_sub_field('nome_do_conjuge_01'); ?></a>
                    </td>
                </tr>

                <tr>
                    <td>Local do casamento</td>
                    <?php
                    $localCasamento2 = get_sub_field('data_do_casamento_conjuge_01');
                    if ($localCasamento2 === true) { ?>
                        <td>Aconteceu em <?php get_sub_field('data_do_casamento_conjuge_02') . ', ' . $localCasamento2; ?> </td>
                    <?php } else { ?>
                        <td><?php the_sub_field('local_do_casamento_conjuge_01'); ?> </td>
                    <?php }; ?>
                </tr>
                <tr>
                    <td>Filhos</td>
                    <td><?php the_sub_field('filhos_conjuge_01'); ?></td>
                </tr>

            </table>

            <?php if (get_sub_field('teve_o_segundo_casamento') === true) : ?>
                <p>2º casamento:</p>
                <table>
                    <tr>
                        <td>Conjugê</td>
                        <td>
                            <?php
                            $link = get_sub_field('link_conjuge_02');
                            $link = $link->guid;
                            ?>
                            <a href="<?php echo $link; ?>"><?php the_sub_field('nome_do_conjuge_02'); ?></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Local do casamento</td>
                        <td>Aconteceu em <?php the_sub_field('data_do_casamento_conjuge_02'); ?>, <?php the_sub_field('local_do_casamento_conjuge_02'); ?> </td>
                    </tr>
                    <tr>
                        <td>Filhos</td>
                        <td><?php the_sub_field('filhos_conjuge_02'); ?></td>
                    </tr>

                </table>

        <?php endif;
        endwhile; ?>

        <!-- LOCALIZAÇÃO DAS CERTIDÕES -->
        <p>Localizações das certidões:</p>
        <table>

            <?php while (have_rows('certidoes')) : the_row(); ?>
                <tr>
                    <td>Nascimento</td>
                    <td>
                        n° <?php the_sub_field('n_cn'); ?>/ Folha: <?php the_sub_field('folha_cn'); ?>/ Livro: <?php the_sub_field('livro_cn'); ?>/ <?php the_sub_field('nome_do_cartorio_cn'); ?> (<?php the_sub_field('cidade_estado_cn'); ?>)
                    </td>
                </tr>

                <tr>
                    <td>Casamento</td>
                    <td>
                        n° <?php the_sub_field('n_cc'); ?>/ Folha: <?php the_sub_field('folha_cc'); ?>/ Livro: <?php the_sub_field('livro_cc'); ?>/ <?php the_sub_field('nome_do_cartorio_cc'); ?> (<?php the_sub_field('cidade_estado_cc'); ?>)
                    </td>
                </tr>

                <?php if (get_sub_field('falecido') === true) : ?>
                    <tr>
                        <td>Óbito</td>
                        <td>
                            n° <?php the_sub_field('n_co'); ?>/ Folha: <?php the_sub_field('folha_co'); ?>/ Livro: <?php the_sub_field('livro_co'); ?>/ <?php the_sub_field('nome_do_cartorio_co'); ?> (<?php the_sub_field('cidade_estado_co'); ?>)
                        </td>
                    </tr>
            <?php endif;
            endwhile; ?>
        </table>

        <!-- FONTES -->
        <?php if (get_field('fontes')) { ?>
            <table>
                <tr>
                    <td>Fontes</td>
                    <td><?php the_field('fontes'); ?></td>
                </tr>
            </table>
        <?php } ?>

    </div>

</div>
<?php get_footer(); ?>
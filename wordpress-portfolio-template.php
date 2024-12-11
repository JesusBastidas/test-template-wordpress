<?php
/*
Template Name: Portfolio Template
*/

get_header(); ?>

<section class="portfolio-section">
    <div class="portfolio-container">
        <h2 class="portfolio-title">WordPress Test</h2>
        
        <div class="portfolio-grid">
            <?php 
            // Argumentos para la consulta de proyectos
            $args = array(
                'post_type' => 'CPT-Project',     // Tipo de entrada personalizada
                'posts_per_page' => 3,            // Mostrar 3 entradas
                'orderby' => 'date',              // Ordenar por fecha
                'order' => 'DESC'                 // Orden descendiente (más recientes primero)
            );

            // Crear la consulta
            $portfolio_query = new WP_Query($args);

            // Comenzar el bucle
            if ($portfolio_query->have_posts()) :
                while ($portfolio_query->have_posts()) : $portfolio_query->the_post();
            ?>
                <div class="portfolio-item">
                    <div class="portfolio-item-inner">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="portfolio-image">
                                <?php the_post_thumbnail('medium'); ?>
                            </div>
                        <?php endif; ?>
                        
                        <div class="portfolio-content">
                            <h3 class="portfolio-item-title"><?php the_title(); ?></h3>
                            
                            <div class="portfolio-description">
                                <?php the_excerpt(); ?>
                            </div>
                            
                            <a href="<?php the_permalink(); ?>" class="read-more-btn">
                                Leer Más
                            </a>
                        </div>
                    </div>
                </div>
            <?php 
                endwhile;
                // Restablecer el post data
                wp_reset_postdata();
            else :
                // Mensaje si no hay proyectos
                echo '<p>No se encontraron proyectos.</p>';
            endif; 
            ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>

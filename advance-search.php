<?php /** * Template Name: Advanced Search Template * * @package owiki */ get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <section class="custom-advanced-search">
            <header class="page-header">
                <h1 class="page-title"><?php esc_html_e('Advanced Search', 'owiki'); ?></h1>
                <p><?php esc_html_e('Fill in the fields below to search.', 'owiki'); ?></p>
            </header>

            <div class="advance-search">
                <form role="search" method="get" id="advanced-searchform">
                    <input type="hidden" name="post_type" value="<?php echo isset($_GET['post_type']) ? $_GET['post_type'] : 'any'; ?>" />
                    <div>
                        <label for="s"><?php _e('Keyword:', 'owiki'); ?></label>
                        <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="<?php _e('Search...', 'owiki'); ?>" />
                    </div>

                    <div>
                        <label for="category"><?php _e('Category:', 'owiki'); ?></label><br>
                        <?php
                        wp_dropdown_categories(array(
                            'show_option_all' => __('All Categories', 'owiki'),
                            'name'            => 'category',
                            'id'              => 'category-dropdown',
                            'class'           => 'category-dropdown',
                            'hierarchical'    => 1,
                        ));
                        ?>
                    </div>

                    <div>
                        <label for="selected-categories"><?php _e('Selected Categories:', 'owiki'); ?></label><br>
                        <input type="text" id="selected-categories" name="selected_categories" readonly>
                        <button type="button" id="clear-categories">Clear</button>
                    </div>

                    <div>
                        <label for="post_type"><?php _e('Post Type:', 'owiki'); ?></label>
                        <select name="post_type" id="post_type">
                            <option value="any"><?php _e('Any', 'owiki'); ?></option>
                            <option value="post"><?php _e('Posts', 'owiki'); ?></option>
                            <option value="page"><?php _e('Pages', 'owiki'); ?></option>
                        </select>
                    </div>

                    <div>
                        <input type="submit" id="searchsubmit" value="<?php esc_attr_e('Search', 'owiki'); ?>" />
                    </div>
                </form>
            </div> 
            <div class="advanced-search-result" >
                
            </div>
        </section> 
    </main> 
</div> 

<?php get_footer(); ?>

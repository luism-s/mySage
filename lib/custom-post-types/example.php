<?php

require_once __DIR__ . '/post-type.php';

class Example extends Post_Type {

  const type_slug = 'custom_type';
  const type_archive = 'custom-type';

  public static function register() {
    
    register_post_type( self::type_slug, 
      [
        'labels' => [
          'name'                => __( 'Custom Type' ),                     /* This is the Title of the Group */
          'singular_name'       => __( 'Custom Type' ),                     /* This is the individual type */
          'all_items'           => __( 'All Custom Types' ),                /* the all items menu item */
          'add_new'             => __( 'Add New' ),                         /* The add new menu item */
          'add_new_item'        => __( 'Add New Custom Type' ),             /* Add New Display Title */
          'edit'                => __( 'Edit' ),                            /* Edit Dialog */
          'edit_item'           => __( 'Edit Custom Types' ),               /* Edit Display Title */
          'new_item'            => __( 'New Custom Type' ),                 /* New Display Title */
          'view_item'           => __( 'View Custom Type' ),                /* View Display Title */
          'search_items'        => __( 'Search Custom Type' ),              /* Search Custom Type Title */ 
          'not_found'           => __( 'Nothing found in the Database.' ),  /* This displays if there are no entries yet */ 
          'not_found_in_trash'  => __( 'Nothing found in Trash' ),          /* This displays if there is nothing in the trash */
          'parent_item_colon'   => ''
        ], /* end of arrays */
        'description'         => __( 'This is the example custom type' ), /* Custom Type Description */
        'public'              => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => false,
        'show_ui'             => true,
        'query_var'           => true,
        'menu_position'       => 8, /* this is what order you want it to appear in on the left hand side menu */ 
        'menu_icon'           => 'dashicons-admin-post', /* the icon for the Custom Type menu */
        'rewrite'	            => [ 'slug' => self::type_archive, 'with_front' => false ], /* you can specify its url slug */
        'has_archive'         => self::type_archive, /* you can rename the slug here */
        'capability_type'     => 'post',
        'hierarchical'        => false,
        'supports'            => [ 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky' ]
      ] /* end of options */
    ); /* end of register post type */

    /* this adds your post categories to your Custom Type */
    register_taxonomy_for_object_type( 'category', self::type_slug );
    /* this adds your post tags to your Custom Type */
    register_taxonomy_for_object_type( 'post_tag', self::type_slug );

    // add custom taxonomies (these act like categories)
    register_taxonomy( 'custom_cat', 
      [ 'custom_post_type' ],           /* if you change the name of register_post_type( 'custom_type', then you have to change this */
      [
        'hierarchical'  => true,   /* if this is true, it acts like categories */
        'labels'        => [
            'name'              => __( 'Custom Categories' ),         /* name of the custom taxonomy */
            'singular_name'     => __( 'Custom Category' ),           /* single taxonomy name */
            'search_items'      => __( 'Search Custom Categories' ),  /* search title for taxomony */
            'all_items'         => __( 'All Custom Categories' ),     /* all title for taxonomies */
            'parent_item'       => __( 'Parent Custom Category' ),    /* parent title for taxonomy */
            'parent_item_colon' => __( 'Parent Custom Category:' ),   /* parent taxonomy title */
            'edit_item'         => __( 'Edit Custom Category' ),      /* edit custom taxonomy title */
            'update_item'       => __( 'Update Custom Category' ),    /* update title for taxonomy */
            'add_new_item'      => __( 'Add New Custom Category' ),   /* add new title for taxonomy */
            'new_item_name'     => __( 'New Custom Category Name' )   /* name title for taxonomy */
        ],
        'show_admin_column' => true, 
        'show_ui'           => true,
        'query_var'         => true,
        'rewrite'           => [ 'slug' => 'custom-slug' ],
      ]
    );

    // add custom tags (these act like categories)
    register_taxonomy( 'custom_tag', 
      [ 'custom_type' ], /* if you change the name of register_post_type( 'custom_type', then you have to change this */
      [ 
        'hierarchical' => false, /* if this is false, it acts like tags */
        'labels' => [
          'name'              => __( 'Custom Tags' ),           /* name of the custom taxonomy */
          'singular_name'     => __( 'Custom Tag' ),            /* single taxonomy name */
          'search_items'      => __( 'Search Custom Tags' ),    /* search title for taxomony */
          'all_items'         => __( 'All Custom Tags' ),       /* all title for taxonomies */
          'parent_item'       => __( 'Parent Custom Tag' ),     /* parent title for taxonomy */
          'parent_item_colon' => __( 'Parent Custom Tag:' ),    /* parent taxonomy title */
          'edit_item'         => __( 'Edit Custom Tag' ),       /* edit custom taxonomy title */
          'update_item'       => __( 'Update Custom Tag' ),     /* update title for taxonomy */
          'add_new_item'      => __( 'Add New Custom Tag' ),    /* add new title for taxonomy */
          'new_item_name'     => __( 'New Custom Tag Name' ),   /* name title for taxonomy */
        ],
        'show_admin_column' => true,
        'show_ui'           => true,
        'query_var'         => true,
      ]
    );
  }
}

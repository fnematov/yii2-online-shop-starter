<?php
/**
 * Created by PhpStorm.
 * User: Farhodjon
 * Date: 10.03.2018
 * Time: 15:17
 */

use app\modules\admin\widgets\Menu;

?>
<div class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <?php
            try {
                echo Menu::widget([
                    'options' => [ 'id' => 'sidebarnav' ],
                    'submenuTemplate' => "\n<ul aria-expanded='false' class='collapse'>\n{items}\n</ul>\n",
                    'badgeClass' => 'label label-rouded label-primary pull-right',
                    'activateParents' => true,
                    'items' => [
                        [
                            'label' => '',
                            'options' => [ 'class' => 'nav-devider' ]
                        ],
                        [
                            'label' => 'Home',
                            'options' => [ 'class' => 'nav-label' ]
                        ],
                        [
                            'label' => 'Dashboard',
                            'url' => ['default/index'],
                            'icon' => '<i class="fa fa-tachometer"></i>',
                        ],
                        [
                            'label' => 'Apps',
                            'options' => ['class' => 'nav-label']
                        ],
                        [
                            'label' => 'Content',
                            'url' => '#',
                            'icon' => '<i class="fa fa-file-text-o"></i>',
                            'items' => [
                                [
                                    'label' => 'Carousel',
                                    'url' => ['widget-carousel/index']
                                ],
                            ]
                        ],
                        [
                            'label' => 'Products',
                            'url' => '#',
                            'icon' => '<i class="fa fa-archive"></i>',
                            'items' => [
                                [
                                    'label' => 'Categories',
                                    'url' => ['categories/index']
                                ],
                                [
                                    'label' => 'Brands',
                                    'url' => ['brands/index']
                                ],
                                [
                                    'label' => 'Products',
                                    'url' => ['products/index']
                                ],
                                [
                                    'label' => 'Product main page filters',
                                    'url' => ['main-filter/index']
                                ],
                                [
                                    'label' => 'Product additional filter',
                                    'url' => ['add-filter/index']
                                ],
                                [
                                    'label' => 'Product sort attributes',
                                    'url' => ['product-sort-attrs/index']
                                ],
                                [
                                    'label' => 'Product param names',
                                    'url' => ['product-params/index']
                                ],
                                [
                                    'label' => 'Reviews',
                                    'url' => ['product-review/index']
                                ],
                            ]
                        ],
                    ]
                ]);
            } catch ( Exception $e ) {
            }
            
            ?>
        </nav>
    </div>
</div>

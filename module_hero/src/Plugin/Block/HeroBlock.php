<?php

namespace Drupal\module_hero\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a block called "Example hero block"
 *
 * @Block(
 *  id = "module_hero_hero",
 *  admin_label = @Translation("Example hero block")
 * )
 */
class HeroBlock extends BlockBase{

    /**
     * {@inheritdoc}
     */
    public function build(){

        $heros = [
            ['hero_name' => 'Ram', 'real_name' => 'Shree Ram'],
            ['hero_name'=>'Luxman', 'real_name'=> 'Shree Luxman'],
            ['hero_name'=>'Luxman', 'real_name'=> 'Shree Luxman'],
            ['hero_name'=>'Balram', 'real_name'=> 'Shree Balram'],
        ];
        $table = [
            '#type' => 'table',
            '#header' => [
                $this->t('Hero Name'),
                $this->t('Real Name')
            ], 
        ];

        foreach( $heros as $hero){
            $table[] = [
                'hero_name' => [
                    '#type' => 'markup',
                    '#markup' => $hero['hero_name']
                ],
                'real_name' => [
                    '#type' => 'markup',
                    '#markup' => $hero['real_name']
                ],
            ];
        }

        return $table;
        // return[
        //     '#type' => 'markup',
        //     '#markup' => $this->t('The Output of Super Hero Block'),
        // ];
    }
}
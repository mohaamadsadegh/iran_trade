<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Plugin;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Accordion extends Elementor\Widget_Base{
    
    public function get_name(){
        return 'accordion';
    }
    
    public function get_title(){
        return 'Accordion';
    }
    
    public function get_icon(){
        return 'eicon-accordion';
    }
    
    public function get_keywords(){
        return ['accordion' , 'tabs' , 'toggle'];
    }
    
    public function get_categories(){
        return [ 'themsah' ];
    }

    protected function register_controls(){
        
        $this -> start_controls_section('tabs_section',
                                       [
                                           'label' => 'Tabs',
                                           'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                                       ]);
        
        $repeater = new \Elementor\Repeater();
        
        $repeater -> add_control('tab_heading',
                                [
                                    'label'         => 'Heading',
                                    'type'          => \Elementor\Controls_Manager::TEXT,
                                    'placeholder'   => 'Enter the title',
                                    'label_block'   => true,
                                    'title'         => 'Text Title on HOVER',
                                    'default'       => 'Tab heading',
                                ]);
        
        $repeater -> add_control('tab_content',
                                [
                                    'label'     => 'Content',
                                    'type'      => \Elementor\Controls_Manager::WYSIWYG,
                                    'default'   => 'Your Content goes here...'
                                ]);
        
        $this -> add_control('tab_items',
                            [
                                'label' => 'Accordion Items',
                                'type'  => \Elementor\Controls_Manager::REPEATER,
                                'fields' => $repeater -> get_controls(),
                                'default' => [ //List of Repeaters
                                    [ // First Repeater
                                        'tab_heading' => 'Accordion Tab #1',
                                        'tab_content' => 'Accordion Tab Content #1',
                                    ],
                                    [ // Second Repeater
                                        'tab_heading' => 'Accordion Tab #2',
                                        'tab_content' => 'Accordion Tab Content #2',
                                    ],
                                    [ // Third Repeater
                                        'tab_heading' => 'Accordion Tab #3',
                                        'tab_content' => 'Accordion Tab Content #3',
                                    ],
                                ],
                                'title_field' => '{{{tab_heading}}}',
                                'separator'   => 'after',
                            ]);
        
        $this -> add_control('tab_closed_icon',
                            [
                                'label' => 'Icon',
                                'type'  => Elementor\Controls_Manager::ICONS,
                                'skin'  => 'inline',
                                'label_block' => false,
                                'recommended' => [ // a set of Recommended libraries
                                    'fa-solid' => [ // a set of Recemmended icons from this library
                                        'chevron-down',
                                        'angle-down',
                                        'angle-double-down',
                                        'caret-down',
                                        'caret-square-down',
                                    ],
                                    'fa-regular' => [ // a set of Recemmended icons from this library
                                        'caret-square-down',
                                    ],
                                ],
                                'exclude_inline_options' => ['svg'],
                                'description' => 'The icon beside heading when the tab is closed (deactivated)',
                                'default' => [
                                    'value'   => 'far fa-caret-square-down',
                                    'library' => 'fa-regular',
                                ],
                            ]);
        
        $this -> add_control('tab_opened_icon',
                            [
                                'label' => 'Icon',
                                'type'  => Elementor\Controls_Manager::ICONS,
                                'skin'  => 'inline',
                                'label_block' => false,
                                'recommended' => [ // a set of Recommended libraries
                                    'fa-solid' => [ // a set of Recemmended icons from this library
                                        'chevron-up',
                                        'angle-up',
                                        'angle-double-up',
                                        'caret-up',
                                        'caret-square-up',
                                    ],
                                    'fa-regular' => [ // a set of Recemmended icons from this library
                                        'caret-square-up',
                                    ],
                                ],
                                'exclude_inline_options' => ['svg'],
                                'description' => 'The icon beside heading when the tab is opened (activated)',
                                'default' => [
                                    'value'   => 'far fa-caret-square-up',
                                    'library' => 'fa-regular',
                                ],
                                'separator'   => 'after',
                            ]);
        
        $this -> add_control('html_tag',
                            [
                                'label' => 'Title HTML Tag',
                                'type'  => Elementor\Controls_Manager::SELECT,
                                'options' => [
                                    'h1' => 'H1',
                                    'h2' => 'H2',
                                    'h3' => 'H3',
                                    'h4' => 'H4',
                                    'h5' => 'H5',
                                    'h6' => 'H6',
                                    'div' => 'div',
                                ],
                                'default' => 'div',
                            ]);
        
        $this -> end_controls_section();
        
        // Tabs style Section
        
        $this -> start_controls_section('tabs_style_section',
                                       [
                                           'label' => 'Tabs',
                                           'tab'   => Elementor\Controls_Manager::TAB_STYLE,
                                       ]);
        
        $this -> add_control('border_width_style',
                            [
                                'label' => 'Border Width',
                                'type'  => Elementor\Controls_Manager::SLIDER,
                                'size_units' => ['px'], // a list of size units for the slider
                                'range' => [ // The list of ranges for each registered size unit
                                    'px' => [
                                        'min'  => 0,
                                        'max'  => 10,
                                        'step' => 1,
                                    ],
                                ],
                                'separator' => 'before',
                                'default' => [
                                    'unit' => 'px',
                                    'size' => 7,
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .class' => 'border-width: {{SIZE}}{{UNIT}};',
                                ],
                            ]);
        
        $this -> add_control('border_color',
                            [
                                'label' => 'Border Color',
                                'type'  => Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .class'  => 'color: {{VALUE}};',
                                ],
                            ]);
        
        $this -> add_control('space_between_tabs',
                            [
                                'label' => 'Space Between',
                                'type'  => \Elementor\Controls_Manager::SLIDER,
                                'size_units' => ['px'], // a list of size units for the slider
                                'range' => [ // The list of ranges for each registered size unit 
                                    'px' => [
                                        'min'  => 0,
                                        'max'  => 100,
                                        'step' => 1,
                                    ],
                                ],
                                'default' => [
                                    'unit' => 'px',
                                    'size' => 15,
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .class' => 'margin-bottom: {{SIZE}}{{UNIT}}'
                                ],
                            ]);
        
        $this -> add_group_control(Elementor\Group_Control_Box_Shadow::get_type(),
                                  [
                                      'name'  => 'box_shadow',
                                      'label' => 'Box Shadow',
                                      'selectors' => [
                                          '{{WRAPPER}} .class',
                                      ],
                                  ]);
        
        $this -> end_controls_section();
        
        // Title of Tabs style section
        
        $this -> start_controls_section('title_style_section',
                                       [
                                           'label' => 'Title',
                                           'tab'   => Elementor\Controls_Manager::TAB_STYLE,
                                       ]);
        
        $this -> add_control('title_background_color',
                            [
                                'label' => 'Background Color',
                                'type'  => Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .class'  => 'background-color: {{VALUE}};',
                                ],
                            ]);
        
        $this -> add_control('title_base_color',
                            [
                                'label' => 'Color',
                                'type'  => Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .class'  => 'color: {{VALUE}};',
                                ],
                            ]);
        
        $this -> add_control('title_active_color',
                            [
                                'label' => 'Border Color',
                                'type'  => Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .class'  => 'color: {{VALUE}};',
                                ],
                            ]);
        
        $this -> add_group_control(Elementor\Group_Control_Typography::get_type(),
                                  [
                                      'name' => 'title_typography',
                                      'label' => 'Typography',
                                      'selectors' => [
                                          '{{WRAPPER}} .class',
                                      ],
                                  ]);
        
        $this -> add_group_control(Elementor\Group_Control_Text_Shadow::get_type(),
                                  [
                                      'name' => 'title_text_shadow',
                                      'selectors' => [
                                          '{{WRAPPER}} .class',
                                      ],
                                  ]);
        
        $this -> add_control('title_padding',
                            [
                                'label' => 'Padding',
                                'type'  => Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => ['px','em','%'], //list of needed size units
                                'selectors' => [
                                    '{{WRAPPER}} .class' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                            ]);
        
        $this -> end_controls_section();
        
        // Content of Tabs style section
        
        $this -> start_controls_section('content_style_section',
                                       [
                                           'label' => 'Content',
                                           'tab'   => Elementor\Controls_Manager::TAB_STYLE,
                                       ]);
        
        $this -> add_control('content_background_color',
                            [
                                'label' => 'Background Color',
                                'type'  => Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .class'  => 'background-color: {{VALUE}};',
                                ],
                            ]);
        
        $this -> add_control('content_color',
                            [
                                'label' => 'Color',
                                'type'  => Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .class'  => 'color: {{VALUE}};',
                                ],
                            ]);
        
        $this -> add_group_control(Elementor\Group_Control_Typography::get_type(),
                                  [
                                      'name' => 'content_typography',
                                      'label' => 'Typography',
                                      'selectors' => [
                                          '{{WRAPPER}} .class',
                                      ],
                                  ]);
        
        $this -> add_group_control(Elementor\Group_Control_Text_Shadow::get_type(),
                                  [
                                      'name' => 'content_text_shadow',
                                      'selectors' => [
                                          '{{WRAPPER}} .class',
                                      ],
                                  ]);
        
        $this -> add_control('content_padding',
                            [
                                'label' => 'Padding',
                                'type'  => Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => ['px','em','%'], //list of needed size units
                                'selectors' => [
                                    '{{WRAPPER}} .class' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                            ]);
        
        $this -> end_controls_section();
        
        
        $this -> start_controls_section('custom_section',
                                       [
                                           'label' => 'Customization',
                                           'tab'   => Elementor\Controls_Manager::TAB_STYLE,
                                       ]);
        
                // Controls Tabs

        $this -> start_controls_tabs('style_tab');
        
        // Normal Controls Tab
   
        $this -> start_controls_tab('normal_style_tab',
                                   [
                                       'label' => 'Normal',
                                   ]);
        
        $this -> add_control('normal_border_color',
                            [
                                'label' => 'Border Color',
                                'type'  => Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .class'  => 'color: {{VALUE}};',
                                ],
                            ]);
        
        $this -> add_control('normal_base_color',
                            [
                                'label' => 'Color',
                                'type'  => Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .class'  => 'color: {{VALUE}};',
                                ],
                            ]);
        
        $this -> add_control('normal_active_color',
                            [
                                'label' => 'Color',
                                'type'  => Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .class'  => 'color: {{VALUE}};',
                                ],
                            ]);
        
        $this -> end_controls_tab();
        
        // Hover Controls Tab
        
        $this -> start_controls_tab('hover_style_tab',
                                   [
                                       'label' => 'Hover',
                                   ]);
        
        $this -> add_control('hover_border_color',
                            [
                                'label' => 'Border Color',
                                'type'  => Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .class'  => 'color: {{VALUE}};',
                                ],
                            ]);
        
        $this -> add_control('hover_base_color',
                            [
                                'label' => 'Color',
                                'type'  => Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .class'  => 'color: {{VALUE}};',
                                ],
                            ]);
        
        $this -> add_control('hover_active_color',
                            [
                                'label' => 'Color',
                                'type'  => Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .class'  => 'color: {{VALUE}};',
                                ],
                            ]);
        
        $this -> end_controls_tab();
        
        $this -> end_controls_tabs();
        
        // PopOvers
        
        $this->add_control(
            'popover-toggle',
            [
                'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
                'label' => 'Box',
                'label_off' => 'Default',
                'label_on' => 'Custom',
                'return_value' => 'yes',
            ]);
        
        $this->start_popover();
        
        $this -> add_control('custom_padding',
                            [
                                'label' => 'Padding',
                                'type'  => Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => ['px','em','%'], //list of needed size units
                                'selectors' => [
                                    '{{WRAPPER}} .class' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ]
                            ]);
        
        $this -> add_control('custom_color',
                            [
                                'label' => 'Color',
                                'type'  => Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .class'  => 'color: {{VALUE}};',
                                ],
                            ]);
        
        $this -> add_control('custom_choose',
                            [
                                'label' => 'Customly Choose',
                                'type'  => Elementor\Controls_Manager::CHOOSE,
                                'options' => [
                                    'one' => [
                                        'label' => 'Custom One',
                                        'icon'  => 'fas fa-star',
                                    ],
                                    'two' => [
                                        'label' => 'Custom Two',
                                        'icon'  => 'eicon-icon-box',
                                    ],
                                    'three' => [
                                        'label' => 'Custom Three',
                                        'icon'  => 'fas fa-star',
                                    ],
                                ],
                                'default' => 'two',
                            ]);

        $this->end_popover();
        
        $this -> end_controls_section();
        
    }
    
}

Plugin::instance()->widgets_manager->register_widget_type( new Accordion() );

?>
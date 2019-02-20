<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Sidebar cell
 */
class SidebarCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Initialization logic run at the end of object construction.
     *
     * @return void
     */
    public function initialize()
    {
    }

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
        $this->set([
            'uri' => $this->request->env('REQUEST_URI'),
            'sidemenu' => 
            [
                [//header level
                    'name' => 'Main navigation',
                    'tree' => [ //regular menu level
                        [
                            'name' => 'Dashboard',
                            'icon' => 'fa-dashboard',
                            'url' => null,
                            'small' => [
                                ['i' => 'fa fa-angle-left pull-right', 'text' => null]
                            ],
                            'submenu' => [ //submenu level
                                [
                                    'name' => 'Dashboard v1',
                                    'url' => '/adminlte/dashboard/1',
                                    'submenu' => null
                                ],[
                                    'name' => 'Dashboard v2',
                                    'url' => '/adminlte/dashboard/2',
                                    'submenu' => null
                                ]
                            ]
                        ],[
                            'name' => 'Layout Options',
                            'icon' => 'fa-files-o',
                            'url' => null,
                            'small' => [
                                ['i' => 'label label-primary pull-right', 'text' => '4']
                            ],
                            'submenu' => [ //submenu level
                                [
                                    'name' => 'Top Navigation',
                                    'url' => '/adminlte/layout/top-nav',
                                    'submenu' => null
                                ],[
                                    'name' => 'Boxed',
                                    'url' => '/adminlte/layout/boxed',
                                    'submenu' => null
                                ],[
                                    'name' => 'Fixed',
                                    'url' => '/adminlte/layout/fixed',
                                    'submenu' => null
                                ],[
                                    'name' => 'Collapsed Sidebar',
                                    'url' => '/adminlte/layout/collapsed-sidebar',
                                    'submenu' => null
                                ]
                            ]
                        ],[
                            'name' => 'Widgets',
                            'icon' => 'fa-th',
                            'url' => 'admin/widgets',
                            'small' => [
                                ['i' => 'label pull-right bg-green', 'text' => 'new']
                            ],
                            'submenu' => null
                        ],[
                            'name' => 'Charts',
                            'icon' => 'fa-pie-chart',
                            'url' => null,
                            'small' => [
                                ['i' => 'fa fa-angle-left pull-right', 'text' => null]
                            ],
                            'submenu' => [ //submenu level
                                [
                                    'name' => 'ChartJS',
                                    'url' => '/adminlte/charts/chartjs',
                                    'submenu' => null
                                ],[
                                    'name' => 'Morris',
                                    'url' => '/adminlte/charts/boxed',
                                    'submenu' => null
                                ],[
                                    'name' => 'Flot',
                                    'url' => '/adminlte/charts/flot',
                                    'submenu' => null
                                ],[
                                    'name' => 'Inline charts',
                                    'url' => '/adminlte/charts/inline',
                                    'submenu' => null
                                ]
                            ]
                        ],[
                            'name' => 'UI Elements',
                            'icon' => 'fa-laptop',
                            'url' => null,
                            'small' => [
                                ['i' => 'fa fa-angle-left pull-right', 'text' => null]
                            ],
                            'submenu' => [ //submenu level
                                [
                                    'name' => 'General Elements',
                                    'url' => '/adminlte/uielements/general',
                                    'submenu' => null
                                ],[
                                    'name' => 'Advanced Elements',
                                    'url' => '/adminlte/uielements/advanced',
                                    'submenu' => null
                                ],[
                                    'name' => 'Editors',
                                    'url' => '/adminlte/uielements/editors',
                                    'submenu' => null
                                ]
                            ]
                        ],[
                            'name' => 'Tables',
                            'icon' => 'fa-table',
                            'url' => null,
                            'small' => [
                                ['i' => 'fa fa-angle-left pull-right', 'text' => null]
                            ],
                            'submenu' => [ //submenu level
                                [
                                    'name' => 'Simple tables',
                                    'url' => '/adminlte/tables/simple',
                                    'submenu' => null
                                ],[
                                    'name' => 'Data tables',
                                    'url' => '/adminlte/tables/data',
                                    'submenu' => null
                                ]
                            ]
                        ],[
                            'name' => 'Calendar',
                            'icon' => 'fa-calendar',
                            'url' => 'admin/calendar',
                            'small' => [
                                ['i' => 'label pull-right bg-red', 'text' => '3'],
                                ['i' => 'label pull-right bg-blue', 'text' => '17']
                            ],
                            'submenu' => null
                        ],[
                            'name' => 'Mailbox',
                            'icon' => 'fa-envelope',
                            'url' => 'admin/mailbox',
                            'small' => [
                                ['i' => 'label pull-right bg-yellow', 'text' => '12'],
                                ['i' => 'label pull-right bg-green', 'text' => '16'],
                                ['i' => 'label pull-right bg-red', 'text' => '5']
                            ],
                            'submenu' => null
                        ],[
                            'name' => 'Examples',
                            'icon' => 'fa-folder',
                            'url' => null,
                            'small' => [
                                ['i' => 'fa fa-angle-left pull-right', 'text' => null]
                            ],
                            'submenu' => [ //submenu level
                                [
                                    'name' => 'Invoice',
                                    'url' => '/adminlte/examples/invoice',
                                    'submenu' => null
                                ],[
                                    'name' => 'Profile',
                                    'url' => '/adminlte/examples/profile',
                                    'submenu' => null
                                ],[
                                    'name' => 'Login',
                                    'url' => '/adminlte/examples/login',
                                    'submenu' => null
                                ],[
                                    'name' => 'Register',
                                    'url' => '/adminlte/examples/register',
                                    'submenu' => null
                                ],[
                                    'name' => 'Lockscreen',
                                    'url' => '/adminlte/examples/lockscreen',
                                    'submenu' => null
                                ],[
                                    'name' => '404 Error',
                                    'url' => '/adminlte/examples/404error',
                                    'submenu' => null
                                ],[
                                    'name' => '500 Error',
                                    'url' => '/adminlte/examples/500error',
                                    'submenu' => null
                                ],[
                                    'name' => 'Blank Page',
                                    'url' => '/adminlte/examples/blank',
                                    'submenu' => null
                                ],[
                                    'name' => 'Pace Page',
                                    'url' => '/adminlte/examples/pace',
                                    'submenu' => null
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ]);
    }
}

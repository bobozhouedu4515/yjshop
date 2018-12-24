<?php

    namespace App\Console\Commands;

    use App\Models\Admin;
    use App\Models\Module;
    use Illuminate\Console\Command;
    use Spatie\Permission\Models\Permission;
    use Spatie\Permission\Models\Role;

    class YjModule extends Command
    {
        /**
         * The name and signature of the console command.
         *
         * @var string
         */
        protected $signature = 'yj_module';

        /**
         * The console command description.
         *
         * @var string
         */
        protected $description = '后台管理';

        /**
         * Create a new command instance.
         *
         * @return void
         */
        public function __construct ()
        {
            parent ::__construct ();
        }

        /**
         * Execute the console command.
         *
         * @return mixed
         */
        public function handle ()
        {
            //扫面所有的controllers下面的目录
            $modules = glob ('app/Http/Controllers/*');
            foreach ($modules as $module) {
                //查找所有的system目录
                if (is_dir ($module . '/System')) {
                    //获得目录名
                    $moduleName = basename ($module);
                    //读取
                    $config = include $module . "/System/config.php";
//                    $config=file_get_contents ($module . "/System/config.php");
//                    dd ($config);
                    $permissions = include $module . "/System/permission.php";
                    Module ::firstOrNew ([ 'name' => $moduleName ]) -> fill ([ 'title' => $config[ 'app' ],
                        'permissions' => $permissions
                    ]) -> save ();
                    foreach ($permissions as $permission) {
                        Permission ::firstOrNew ([ 'name' => $moduleName . '-' . $permission[ 'name' ] ]) -> fill ([
                            'title' => $permission[ 'title' ], 'guard_name' => 'admin'
                        ]) -> save ();
                    }
                }
            }
            //获取超级管理员角色
            $role = Role ::where ('name', 'superAdmin') -> first ();
            //获取所有的权限
            $permissions = Permission ::pluck ('name');
            //给角色同步权限
            $role -> syncPermissions ($permissions);
            //给用户同步角色
            $admin = Admin ::find (1);
            $admin -> assignRole ('superAdmin');
            //清除权限缓存
            app ()[ 'cache' ] -> forget ('spatie.permission.cache');
            $this -> info ('permission init successful');

        }

    }

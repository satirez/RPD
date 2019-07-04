<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;



class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      

        //Administracion

        		//Usuarios
	        	Permission::create([
	        		"name" => 'Navegar usuarios',
	        		"slug" => 'users.index',
	        		"description" => 'Ver usuarios',
	        	]);

		        Permission::create([
		        	"name" => 'Ver detalle de usuario',
		        	"slug" => 'users.show',
		        	"description" => 'Detalle usuario',
		        ]);

		        Permission::create([
		        	"name" => 'Edicion usuarios',
		        	"slug" => 'users.edit',
		        	"description" => 'Editar usuario',
		        ]);

		        Permission::create([
		        	"name" => 'Eliminar usuarios',
		        	"slug" => 'users.destroy',
		        	"description" => 'Eliminar usuario',
		        ]);

	        //Roles de usuario
				//Roles
			    Permission::create([
			    	"name" => 'Navegar roles',
			        "slug" => 'roles.index',
			        "description" => 'Ver roles',
			    ]);

			    Permission::create([
			        "name" => 'Ver detalle de rol',
			        "slug" => 'roles.show',
			        "description" => 'Detalle rol',
			    ]);

			    Permission::create([
			       	"name" => 'Creacion roles',
			        "slug" => 'roles.create',
			        "description" => 'Crear rol',
			    ]);

			    Permission::create([
			        "name" => 'Edicion roles',
			        "slug" => 'roles.edit',
			        "description" => 'Editar rol',
			    ]);

			    Permission::create([
			        "name" => 'Eliminar roles',
			        "slug" => 'roles.destroy',
			        "description" => 'Eliminar rol',
			    ]);  

			//Insumos	
			    Permission::create([
			    	"name" => 'Navegar insumos',
			        "slug" => 'admin.supplies.index',
			        "description" => 'Ver Insumos',
			    ]);

			    Permission::create([
			        "name" => 'Ver detalle del insumo',
			        "slug" => 'admin.supplies.show',
			        "description" => 'Detalle Insumo',
			    ]);

			    Permission::create([
			       	"name" => 'Creacion insumo',
			        "slug" => 'admin.supplies.create',
			        "description" => 'Crear Insumo',
			    ]);

			    Permission::create([
			        "name" => 'Edicion insumo',
			        "slug" => 'admin.supplies.edit',
			        "description" => 'Editar Insumo',
			    ]);

			    Permission::create([
			        "name" => 'Eliminar insumo',
			        "slug" => 'admin.supplies.destroy',
			        "description" => 'Eliminar insumo',
			    ]);      

		
		//Fin administracion	             

		//Recepcion 
				Permission::create([
			    	"name" => 'Navegar en recepcion',
			        "slug" => 'receptions.index',
			        "description" => 'Ver recepcion',
			    ]);

			    Permission::create([
			        "name" => 'Ver detalle de lo recepcionado',
			        "slug" => 'receptions.show',
			        "description" => 'Detalle recepcionado'
			    ]);

			  	Permission::create([
			       	"name" => 'Ingresar recepcion',
			        "slug" => 'receptions.create',
			        "description" => 'Ingresar recepcion',
			    ]);

			    Permission::create([
			        "name" => 'Edicion cualquier activo recepcionado',
			        "slug" => 'receptions.edit',
			        "description" => 'Editar recepcionado',
			    ]);

			    Permission::create([
			        "name" => 'Eliminar activo recepcionado',
			        "slug" => 'receptions.destroy',
			        "description" => 'Eliminar recepcionado',
			    ]); 

		//Fin recepcion 


		//Proceso 
				Permission::create([
			    	"name" => 'Navegar en proceso',
			        "slug" => 'processes.index',
			        "description" => 'Ver proceso',
			    ]);

			    Permission::create([
			        "name" => 'Ver detalle de lo procesado',
			        "slug" => 'processes.show',
			        "description" => 'Detalle procesado'
			    ]);

			  	Permission::create([
			       	"name" => 'Ingresar proceso',
			        "slug" => 'processes.create',
			        "description" => 'Ingresar proceso',
			    ]);

			    Permission::create([
			        "name" => 'Edicion cualquier activo procesado',
			        "slug" => 'processes.edit',
			        "description" => 'Editar procesado',
			    ]);

			    Permission::create([
			        "name" => 'Eliminar activo procesado',
			        "slug" => 'processes.destroy',
			        "description" => 'Eliminar procesado',
			    ]); 

		//Fin Proceso 

		//Proceso

        //Despacho

        //Aqui se hacen los permisos 
    }
}

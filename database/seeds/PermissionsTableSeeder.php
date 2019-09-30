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

				//Rechazos	
			    Permission::create([
			    	"name" => 'Navegar rechazos',
			        "slug" => 'admin.rejecteds.index',
			        "description" => 'Ver Insumos',
			    ]);

			    Permission::create([
			        "name" => 'Ver detalle del rechazo',
			        "slug" => 'admin.rejecteds.show',
			        "description" => 'Detalle rechazo',
			    ]);

			    Permission::create([
			       	"name" => 'Creacion rechazo',
			        "slug" => 'admin.rejecteds.create',
			        "description" => 'Crear rechazo',
			    ]);

			    Permission::create([
			        "name" => 'Edicion rechazo',
			        "slug" => 'admin.rejecteds.edit',
			        "description" => 'Editar rechazo',
			    ]);

			    Permission::create([
			        "name" => 'Eliminar rechazo',
			        "slug" => 'admin.rejecteds.destroy',
			        "description" => 'Eliminar rechazo',
				]);  
				
				//Proveedores	
			    Permission::create([
			    	"name" => 'Navegar proveedores',
			        "slug" => 'admin.providers.index',
			        "description" => 'Ver proveedor',
			    ]);

			    Permission::create([
			        "name" => 'Ver detalle del proveedor',
			        "slug" => 'admin.providers.show',
			        "description" => 'Detalle proveedor',
			    ]);

			    Permission::create([
			       	"name" => 'Creacion proveedor',
			        "slug" => 'admin.providers.create',
			        "description" => 'Crear proveedor',
			    ]);

			    Permission::create([
			        "name" => 'Edicion proveedor',
			        "slug" => 'admin.providers.edit',
			        "description" => 'Editar proveedor',
			    ]);

			    Permission::create([
			        "name" => 'Eliminar proveedor',
			        "slug" => 'admin.providers.destroy',
			        "description" => 'Eliminar proveedor',
				]);  
				
					//Frutas	
					Permission::create([
						"name" => 'Navegar frutas',
						"slug" => 'admin.fruits.index',
						"description" => 'Ver proveedor',
					]);
	
					Permission::create([
						"name" => 'Ver detalle del fruta',
						"slug" => 'admin.fruits.show',
						"description" => 'Detalle fruta',
					]);
	
					Permission::create([
						   "name" => 'Creacion fruta',
						"slug" => 'admin.fruits.create',
						"description" => 'Crear fruta',
					]);
	
					Permission::create([
						"name" => 'Edicion fruta',
						"slug" => 'admin.fruits.edit',
						"description" => 'Editar fruta',
					]);
	
					Permission::create([
						"name" => 'Eliminar fruta',
						"slug" => 'admin.fruits.destroy',
						"description" => 'Eliminar fruta',
					]); 
		
					//variedad	
					Permission::create([
						"name" => 'Navegar variedades',
						"slug" => 'admin.varieties.index',
						"description" => 'Ver veriedades',
					]);
	
					Permission::create([
						"name" => 'Ver detalle de la variedad',
						"slug" => 'admin.varieties.show',
						"description" => 'Detalle variedad',
					]);
	
					Permission::create([
						   "name" => 'Creacion de variedad',
						"slug" => 'admin.varieties.create',
						"description" => 'Crear variedad',
					]);
	
					Permission::create([
						"name" => 'Edicion variedad',
						"slug" => 'admin.varieties.edit',
						"description" => 'Editar variedad',
					]);
	
					Permission::create([
						"name" => 'Eliminar variedad',
						"slug" => 'admin.varieties.destroy',
						"description" => 'Eliminar variedad',
					]); 

					//Formato
					Permission::create([
						"name" => 'Navegar formato',
						"slug" => 'admin.formats.index',
						"description" => 'Ver formatos',
					]);
	
					Permission::create([
						"name" => 'Ver detalle del formato',
						"slug" => 'admin.formats.show',
						"description" => 'Detalle formato',
					]);
	
					Permission::create([
						   "name" => 'Creacion de formato',
						"slug" => 'admin.formats.create',
						"description" => 'Crear formato',
					]);
	
					Permission::create([
						"name" => 'Edicion formato',
						"slug" => 'admin.formats.edit',
						"description" => 'Editar formato',
					]);
	
					Permission::create([
						"name" => 'Eliminar formato',
						"slug" => 'admin.formats.destroy',
						"description" => 'Eliminar formato',
					]); 

					//Calidad
					Permission::create([
						"name" => 'Navegar calidad',
						"slug" => 'admin.quality.index',
						"description" => 'Ver calidad',
					]);
	
					Permission::create([
						"name" => 'Ver detalle del calidad',
						"slug" => 'admin.quality.show',
						"description" => 'Detalle de calidad',
					]);
	
					Permission::create([
						   "name" => 'Creacion de calidad',
						"slug" => 'admin.quality.create',
						"description" => 'Crear calidad',
					]);
	
					Permission::create([
						"name" => 'Edicion calidad',
						"slug" => 'admin.quality.edit',
						"description" => 'Editar calidad',
					]);
	
					Permission::create([
						"name" => 'Eliminar calidad',
						"slug" => 'admin.quality.destroy',
						"description" => 'Eliminar calidad',
					]); 

					//Exportadores
					Permission::create([
						"name" => 'Navegar exportadores',
						"slug" => 'admin.exporters.index',
						"description" => 'Ver exportadores',
					]);
	
					Permission::create([
						"name" => 'Ver detalle del exportador',
						"slug" => 'admin.exporters.show',
						"description" => 'Detalle de exportador',
					]);
	
					Permission::create([
						   "name" => 'Creacion de exportador',
						"slug" => 'admin.exporters.create',
						"description" => 'Crear exportador',
					]);
	
					Permission::create([
						"name" => 'Edicion exportador',
						"slug" => 'admin.exporters.edit',
						"description" => 'Editar exportador',
					]);
	
					Permission::create([
						"name" => 'Eliminar exportador',
						"slug" => 'admin.exporters.destroy',
						"description" => 'Eliminar exportador',
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
			        "slug" => 'process.processes.index',
			        "description" => 'Ver proceso',
			    ]);

			    Permission::create([
			        "name" => 'Ver detalle de lo procesado',
			        "slug" => 'process.processes.show',
			        "description" => 'Detalle procesado'
			    ]);

			  	Permission::create([
			       	"name" => 'Ingresar proceso',
			        "slug" => 'process.processes.create',
			        "description" => 'Ingresar proceso',
			    ]);

			    Permission::create([
			        "name" => 'Edicion cualquier activo procesado',
			        "slug" => 'process.processes.edit',
			        "description" => 'Editar procesado',
			    ]);

			    Permission::create([
			        "name" => 'Eliminar activo procesado',
			        "slug" => 'process.processes.destroy',
			        "description" => 'Eliminar procesado',
			    ]); 

		//Fin Proceso 

		//SubProceso
		Permission::create([
			"name" => 'Accesos a subprocesos',
			"slug" => 'subprocess.index',
			"description" => 'Acceso especiales',
		]);

		Permission::create([
			"name" => 'Accesos a subprocesos',
			"slug" => 'subprocess.show',
			"description" => 'Acceso especiales'
		]);

		  Permission::create([
			   "name" => 'Accesos a subprocesos ',
			"slug" => 'subprocess.create',
			"description" => 'Acceso especiales',
		]);

		Permission::create([
			"name" => 'Accesos a subprocesos',
			"slug" => 'subprocess.edit',
			"description" => 'Acceso especiales',
		]);

		Permission::create([
			"name" => 'Accesos a subprocesos ',
			"slug" => 'subprocess.destroy ',
			"description" => 'Acceso especiales',
		]); 
        //Despacho

        //Aqui se hacen los permisos 
    }
}
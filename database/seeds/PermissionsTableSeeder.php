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

						//Temporadas
						Permission::create([
							"name" => 'Navegar Temporadas',
							"slug" => 'admin.seasons.index',
							"description" => 'Ver Temporadas',
						]);
		
						Permission::create([
							"name" => 'Ver detalle de la temporada',
							"slug" => 'admin.seasons.show',
							"description" => 'Detalle de temporada',
						]);
		
						Permission::create([
							   "name" => 'Creacion de temporada',
							"slug" => 'admin.seasons.create',
							"description" => 'Crear temporada',
						]);
		
						Permission::create([
							"name" => 'Edicion de temporada',
							"slug" => 'admin.seasons.edit',
							"description" => 'Editar temporada',
						]);
		
						Permission::create([
							"name" => 'Eliminar temporada',
							"slug" => 'admin.seasons.destroy',
							"description" => 'Eliminar temporada',
						]); 

							//Tipo de transporte
						Permission::create([
							"name" => 'Navegar tipos de transportes',
							"slug" => 'admin.tipotransportes.index',
							"description" => 'Ver transportes',
						]);
		
						Permission::create([
							"name" => 'Ver detalle del transporte',
							"slug" => 'admin.tipotransportes.show',
							"description" => 'Detalle de transportes',
						]);
		
						Permission::create([
							   "name" => 'Creacion de transporte',
							"slug" => 'admin.tipotransportes.create',
							"description" => 'Crear transporte',
						]);
		
						Permission::create([
							"name" => 'Edicion de transporte',
							"slug" => 'admin.tipotransportes.edit',
							"description" => 'Editar transporte',
						]);
		
						Permission::create([
							"name" => 'Eliminar transporte',
							"slug" => 'admin.tipotransportes.destroy',
							"description" => 'Eliminar transporte',
						]); 


								//Tipo de producto
								Permission::create([
									"name" => 'Navegar tipos de productos a despachar',
									"slug" => 'admin.tipoproductodispatches.index',
									"description" => 'Ver tipos de productos a despachar',
								]);
				
								Permission::create([
									"name" => 'Ver detalle del producto a despachar',
									"slug" => 'admin.tipoproductodispatches.show',
									"description" => 'Detalle del producto a despachar',
								]);
				
								Permission::create([
									   "name" => 'Creacion del producto a despachar',
									"slug" => 'admin.tipoproductodispatches.create',
									"description" => 'Crear producto a despachar',
								]);
				
								Permission::create([
									"name" => 'Edicion de producto a despachar',
									"slug" => 'admin.tipoproductodispatches.edit',
									"description" => 'Editar producto a despachar',
								]);
				
								Permission::create([
									"name" => 'Eliminar producto a despachar',
									"slug" => 'admin.tipoproductodispatches.destroy',
									"description" => 'Eliminar producto a despachar',
								]); 


									//Estatus
									Permission::create([
										"name" => 'Navegar estatus',
										"slug" => 'admin.statuses.index',
										"description" => 'Ver estatus de frutas',
									]);
					
									Permission::create([
										"name" => 'Ver detalle del estatus',
										"slug" => 'admin.statuses.show',
										"description" => 'Detalle del estatus',
									]);
					
									Permission::create([
										   "name" => 'Creacion del estatus',
										"slug" => 'admin.statuses.create',
										"description" => 'Crear estatus',
									]);
					
									Permission::create([
										"name" => 'Edicion de estatus',
										"slug" => 'admin.statuses.edit',
										"description" => 'Editar estatus',
									]);
					
									Permission::create([
										"name" => 'Eliminar estatus',
										"slug" => 'admin.statuses.destroy',
										"description" => 'Eliminar estatus',
									]); 

										//Conteo de bandejas
										Permission::create([
											"name" => 'ver registro de bandejas',
											"slug" => 'admin.trays.index',
											"description" => 'registro de bandejas',
										]);
						
										Permission::create([
											"name" => 'detalle de bandejas',
											"slug" => 'admin.trays.show',
											"description" => 'Detalle de bandejas',
										]);
						
										Permission::create([
											   "name" => 'Ingreso de bandejas',
											"slug" => 'admin.trays.create',
											"description" => 'Ingreso de bandejas',
										]);
						
										Permission::create([
											"name" => 'Edicion de ingreso de bandejas',
											"slug" => 'admin.trays.edit',
											"description" => 'Editar ingreso de bandejas',
										]);
						
										Permission::create([
											"name" => 'Eliminar ingreso de bandejas',
											"slug" => 'admin.trays.destroy',
											"description" => 'Eliminar ingreso de bandejas',
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
		
		Permission::create([
			"name" => 'Accesos a despacho',
			"slug" => 'dispatch.index',
			"description" => 'Acceso a lista de depachos',
		]);

		Permission::create([
			"name" => 'Mostrar despachos',
			"slug" => 'dispatch.show',
			"description" => 'mostrar un depacho'
		]);

		  Permission::create([
			"name" => 'crear despachos ',
			"slug" => 'dispatch.create',
			"description" => 'crear un depacho',
		]);

		Permission::create([
			"name" => 'editar un despacho',
			"slug" => 'dispatch.edit',
			"description" => 'editar un depacho',
		]);

		Permission::create([
			"name" => 'eliminar un despacho ',
			"slug" => 'dispatch.destroy ',
			"description" => 'eliminar un depacho',
		]); 

		//TipoDespacho
		
		Permission::create([
			"name" => 'Accesos a tipos de despacho',
			"slug" => 'admin.tipodispatches.index',
			"description" => 'Acceso a lista de tipos de despacho',
		]);

		Permission::create([
			"name" => 'Mostrar tipo de despacho',
			"slug" => 'admin.tipodispatches.show',
			"description" => 'mostrar un tipo de despacho'
		]);

		  Permission::create([
			   "name" => 'crear tipos de despacho ',
			"slug" => 'admin.tipodispatches.create',
			"description" => 'crear un tipo despacho',
		]);

		Permission::create([
			"name" => 'editar un tipo despacho',
			"slug" => 'admin.tipodispatches.edit',
			"description" => 'editar un tipo despacho',
		]);

		Permission::create([
			"name" => 'eliminar un tipo despacho ',
			"slug" => 'admin.tipodispatches.destroy ',
			"description" => 'eliminar un tipo despacho',
		]);

		//Auditoria
		
		Permission::create([
			"name" => 'Accesos a listado de auditorias',
			"slug" => 'auditoria.index',
			"description" => 'Acceso a listado de auditorias',
		]);

		

		  Permission::create([
			   "name" => 'crear tipos de despacho ',
			"slug" => 'auditoria.create',
			"description" => 'crear un tipo despacho',
		]);

		Permission::create([
			"name" => 'editar un tipo despacho',
			"slug" => 'auditoria.edit',
			"description" => 'editar un tipo despacho',
		]);

	

        //Aqui se hacen los permisos 
    }
}
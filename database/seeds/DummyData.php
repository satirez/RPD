<?php

use Illuminate\Database\Seeder;


class DummyData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->exportadores();
        $this->calidades();
        $this->provedores();
        $this->frutas();
        $this->variedades();
        $this->MotivoRechazo();
        $this->TipoDespacho();
        $this->Bandejas();
        $this->Estatus();
        $this->Formatos();
        $this->Temporadas();

       // factory(App\Reception::class,30)->create();
    }

    public function frutas()
    {
        $now = \Carbon\Carbon::now();

        $fruits = [

            ['Mora',],
            ['Frutilla'],
            ['frambueza'],
            ['arandanos'],
        ];


        $fruits = array_map(function ($fruits) use ($now) {
            return [
                'specie' => $fruits[0],
                'updated_at' => $now,
                'created_at' => $now,
            ];
        }, $fruits);

        DB::table('fruits')->insert($fruits);
    }
    public function Temporadas()
    {
        $now = \Carbon\Carbon::now();

        $fruits = [

            ['2020-2021','2019-08-01','2019-08-01'],
        ];


        $fruits = array_map(function ($fruits) use ($now) {
            return [
                'name' => $fruits[0],
                'start_date' => $fruits[1],
                'end_date' => $fruits[2],

                'updated_at' => $now,
                'created_at' => $now,
            ];
        }, $fruits);

        DB::table('seasons')->insert($fruits);
    }
    public function variedades()
    {
        $now = \Carbon\Carbon::now();
        $fruits = [

            ['Mora', 1],
            ['Frutilla', 2],
            ['frambueza', 3],
            ['arandanos', 4],
        ];
        $fruits = array_map(function ($fruits) use ($now) {
            return [
                'variety' => $fruits[0],
                'fruit_id' => $fruits[1],
                'updated_at' => $now,
                'created_at' => $now,
            ];
        }, $fruits);

        DB::table('varieties')->insert($fruits);
    }
    public function calidades()
    {
        $now = \Carbon\Carbon::now();

        $fruits = [

            ['IQFT1', ''],
            ['IQFT2', ''],
            ['IQFT3', ''],
            ['IQFT4', ''],
        ];


        $fruits = array_map(function ($fruits) use ($now) {
            return [
                'name' => $fruits[0],
                'description' => $fruits[1],
                'updated_at' => $now,
                'created_at' => $now,
            ];
        }, $fruits);

        DB::table('qualities')->insert($fruits);
    }
    public function provedores()
    {
        $now = \Carbon\Carbon::now();

        $fruits = [

            ['Provedor', '19486800-6', 'Los castaños', '698427856', 'santiagoperez@live.cl'],
        ];


        $fruits = array_map(function ($fruits) use ($now) {
            return [
                'name' => $fruits[0],
                'rut' => $fruits[1],
                'address' => $fruits[2],
                'number_phone' => $fruits[3],
                'email' => $fruits[4],
                'updated_at' => $now,
                'created_at' => $now,
            ];
        }, $fruits);

        DB::table('providers')->insert($fruits);
    }
    public function exportadores()
    {
        $now = \Carbon\Carbon::now();

        $fruits = [

            ['Exporter', '19486800-6', '698427856', 'santiagoperez@live.cl'],
        ];


        $fruits = array_map(function ($fruits) use ($now) {
            return [
                'name' => $fruits[0],
                'rut' => $fruits[1],
                'phone' => $fruits[2],
                'email' => $fruits[3],
                'updated_at' => $now,
                'created_at' => $now,
            ];
        }, $fruits);

        DB::table('exporters')->insert($fruits);
    }
    public function MotivoRechazo()
    {
        $now = \Carbon\Carbon::now();

        $fruits = [

            ['Mala',],
            ['Podrida'],
            ['No esta'],
            ['Robada'],
        ];


        $fruits = array_map(function ($fruits) use ($now) {
            return [
                'name' => $fruits[0],
                'updated_at' => $now,
                'created_at' => $now,
            ];
        }, $fruits);

        DB::table('motivorejecteds')->insert($fruits);
    }
    public function TipoDespacho()
    {
        $now = \Carbon\Carbon::now();

        $fruits = [

            ['Simple','d'],
            ['Internacional','c'],
            ['Nacional','b'],
        ];


        $fruits = array_map(function ($fruits) use ($now) {
            return [
                'name' => $fruits[0],
                'description' => $fruits[1],
                'updated_at' => $now,
                'created_at' => $now,
            ];
        }, $fruits);

        DB::table('tipo_dispatches')->insert($fruits);
    }
    public function Bandejas()
    {
        $now = \Carbon\Carbon::now();

        $fruits = [

            ['Morada',1],
            ['Verde', 2],
            ['amarilla', 3],
            ['blanca', 4],
        ];


        $fruits = array_map(function ($fruits) use ($now) {
            return [
                'name' => $fruits[0],
                'weight' => $fruits[1],
                'updated_at' => $now,
                'created_at' => $now,
            ];
        }, $fruits);

        DB::table('supplies')->insert($fruits);
    }
    public function Estatus()
    {
        $now = \Carbon\Carbon::now();

        $fruits = [

            ['IFTE',],
            ['ASF'],
            ['WRQ'],
            ['RSQA'],
        ];


        $fruits = array_map(function ($fruits) use ($now) {
            return [
                'name' => $fruits[0],
                'updated_at' => $now,
                'created_at' => $now,
            ];
        }, $fruits);

        DB::table('statuses')->insert($fruits);
    }
    public function Formatos()
    {
        $now = \Carbon\Carbon::now();

        $fruits = [

            ['2x2',4],
            ['3x3',9],
            ['4x4',16],
            ['5x5',25],
        ];


        $fruits = array_map(function ($fruits) use ($now) {
            return [
                'name' => $fruits[0],
                'weight' => $fruits[1],
                'updated_at' => $now,
                'created_at' => $now,
            ];
        }, $fruits);

        DB::table('formats')->insert($fruits);
    }


}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('initials', 2);
            $table->string('name', 25);
        });

        DB::table('states')->insert([
            [
              'id' =>  '18d2c0cf-44b4-44be-8527-58290a0281ee',
              'initials' => 'AC',
              'name' => 'Acre'
            ],
            [
              'id' =>  'd9641071-f3f2-48fc-add8-d695804e68ea',
              'initials' => 'AL',
              'name' => 'Alagoas'
            ],
            [
              'id' =>  '9d39b8c1-9ec7-426c-b701-effbf75eefa3',
              'initials' => 'AM',
              'name' => 'Amazonas'
            ],
            [
              'id' =>  '1b05b47a-fb91-4549-9686-92e25599e272',
              'initials' => 'AP',
              'name' => 'Amapá'
            ],
            [
              'id' =>  'd6d7cb78-ab9b-4fb2-8693-851666640d71',
              'initials' => 'BA',
              'name' => 'Bahia'
            ],
            [
              'id' =>  'ad527c40-971c-44fe-9cf7-1d206f4ed3fa',
              'initials' => 'CE',
              'name' => 'Ceará'
            ],
            [
              'id' =>  'a17c6bbc-6c7e-4c9a-bed6-d67e9b690d5e',
              'initials' => 'DF',
              'name' => 'Distrito Federal'
            ],
            [
              'id' =>  '1cb0c9d7-c6d7-4b85-8345-123976de36a1',
              'initials' => 'ES',
              'name' => 'Espírito Santo'
            ],
            [
              'id' =>  '062edda3-29c6-4d94-bffa-5216cddb69d5',
              'initials' => 'GO',
              'name' => 'Goiás'
            ],
            [
              'id' =>  '6448e699-0a39-4a6d-8765-cea1ba2ff725',
              'initials' => 'MA',
              'name' => 'Maranhão'
            ],
            [
              'id' =>  '65333e4e-d9da-490a-8fbe-3e89ed692080',
              'initials' => 'MG',
              'name' => 'Minas Gerais'
            ],
            [
              'id' =>  '33e8d2ff-0fd1-4d1f-94e6-bea229088e8a',
              'initials' => 'MS',
              'name' => 'Mato Grosso do Sul'
            ],
            [
              'id' =>  '731f9497-652e-4bdb-b9ea-663ee321350d',
              'initials' => 'MT',
              'name' => 'Mato Grosso'
            ],
            [
              'id' =>  'a8c82635-6f9c-484b-a6aa-729a7340b8fe',
              'initials' => 'PA',
              'name' => 'Pará'
            ],
            [
              'id' =>  '968f65c9-4b62-41aa-b194-bd3bd5939798',
              'initials' => 'PB',
              'name' => 'Paraíba'
            ],
            [
              'id' =>  'fec7ce73-60f5-4508-b6ff-4496590ca043',
              'initials' => 'PE',
              'name' => 'Pernambuco'
            ],
            [
              'id' =>  '0ef85cb9-9bba-48c7-9ccf-64113fe6a8df',
              'initials' => 'PI',
              'name' => 'Piauí'
            ],
            [
              'id' =>  '0f8f74e5-1cb3-46d7-8802-9d12d37b81b8',
              'initials' => 'PR',
              'name' => 'Paraná'
            ],
            [
              'id' =>  'd56903d7-47a7-43c2-8aaf-94576f10bf56',
              'initials' => 'RJ',
              'name' => 'Rio de Janeiro'
            ],
            [
              'id' =>  'b5891b99-7264-401e-967a-9143a2ca2917',
              'initials' => 'RN',
              'name' => 'Rio Grande do Norte'
            ],
            [
              'id' =>  '22b49052-8fdc-49a8-89f9-0ba8a3b5dab8',
              'initials' => 'RO',
              'name' => 'Rondônia'
            ],
            [
              'id' =>  '426eae2d-c794-41df-88a3-11cfe8a5e3b2',
              'initials' => 'RR',
              'name' => 'Roraima'
            ],
            [
              'id' =>  '763989fc-d441-4a2d-a431-fef5fac35859',
              'initials' => 'RS',
              'name' => 'Rio Grande do Sul'
            ],
            [
              'id' =>  'b885177e-53e6-40a6-bdd6-cdbc47acb042',
              'initials' => 'SC',
              'name' => 'Santa Catarina'
            ],
            [
              'id' =>  '41f0311c-104c-4246-9923-cc2bd9d08c0f',
              'initials' => 'SE',
              'name' => 'Sergipe'
            ],
            [
              'id' =>  '1c688208-78a6-4653-8c65-a2df94d6fa96',
              'initials' => 'SP',
              'name' => 'São Paulo'
            ],
            [
              'id' =>  '7e363980-8e57-467d-8619-89c190fa88ea',
              'initials' => 'TO',
              'name' => 'Tocantins'
            ]
          ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('states');
    }
}

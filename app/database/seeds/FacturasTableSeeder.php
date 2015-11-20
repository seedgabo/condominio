<?php	

class FacturasTableSeeder extends Seeder {

	public function run()
	{
		DB::table('Facturas')->delete();
		$año =Carbon\Carbon::now()->year;
		for ($i=1; $i <= 12; $i++) 
		{ 
			Facturas::create(array('mes' =>''.$i, 'año' => $año ,'monto' => rand(100000,500000),'concepto' => 'Mantenimiento'));
			Facturas::create(array('mes' =>''.$i, 'año' => $año ,'monto' => rand(100000,500000),'concepto' => 'Seguridad'));
			Facturas::create(array('mes' =>''.$i, 'año' => $año ,'monto' => rand(100000,500000),'concepto' => 'Electricidad'));
			Facturas::create(array('mes' =>''.$i, 'año' => $año ,'monto' => rand(100000,500000),'concepto' => 'Servicio de Agua'));
			Facturas::create(array('mes' =>''.$i, 'año' => $año ,'monto' => rand(100000,500000),'concepto' => 'Gastos Generales'));
		}
		DB::table('recibos')->delete();
		Recibos::create(array('concepto'=>'Contrato con Sistema Web de Condominio Online','monto' => '0','persona_id'=>'0'));
	$this->command->info('Facturas Table Seed!');
	}

}

<?php
	require System::callModel("ofertas");

	class masvaloradas extends ControllerBase {
		public function init(){
			$action = System::getUrl(0);

			$ofertas = new OfertasModel();
			$ofertas_activas = @$ofertas->getMasRankeadasOfertasActivas(10, false);

			$oferta = @$ofertas->getMasRankeadasOfertasActivas(1, false);

			$datos = array();
			$datos["oferta"] = $oferta->fetch_object();
			$datos["ofertas"]['ofertas'] = $ofertas_activas;
			$datos["ofertas"]['ofertas_num'] = $ofertas_activas? $ofertas_activas->num_rows : 0;
			$datos["action"] = $action;

			$this->view->show("masvaloradas.view", $datos);
		}
	}
?>

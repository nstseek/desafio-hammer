<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
	// Define a matriz que retornará para o cliente em JSON
	private $result;

	// Define o código de status HTTP
	private $httpStatusCode = 200;

	// Define os métodos disponíveis para comparação, de acordo com a versão da API
	private $availableMethods = [
		"v1" => ["tabela", "formulario", "arquivo"]
	];

	private $allowedHTTPMethods = [ "GET" ];

	function __construct() {
		parent::__construct();

		// Carrega o model para geração dos dados aleatórios da API
		$this->load->model("DataGenerator");

		// Carrega um helper de URL do CodeIgniter, que contém a função "redirect()"
		$this->load->helper("url");
	}

	// Verifica se a versão da API foi definida
	private function versionExists($version) {
		return method_exists($this, $version);
	}

	// Retorna o JSON apropriadamente pro cliente e define o código de status HTTP
	private function outputJSON() {
		header("Access-Control-Allow-Origin: http://18.229.191.97");  
		header("Access-Control-Allow-Methods: " . implode(", ", $this->allowedHTTPMethods));
		header("Access-Control-Max-Age: 1000");
		header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
		$this->output
			->set_content_type("application/json")
			->set_status_header($this->httpStatusCode)
			->set_output(json_encode($this->result));
	}

	// Remapa o controller para usar os argumentos como métodos
	public function _remap($version, $extra = null) {
		if($version == "index") redirect("./");
		else {
			if($this->versionExists($version)) {
				$this->{$version}($extra[0], empty($extra[1]) ? null : $extra[1]);
			}
			else {
				$this->httpStatusCode = 404;
				$this->result = "Versão da API inexistente.";
				$this->outputJSON();
			}
		}
	}

	// Verifica se o método existea na versão e o chama, caso contrário
	public function v1($method = null, $extra = null) {
		if($method == "swagger.json") {
			$this->httpStatusCode = 200;
			$this->result = json_decode(file_get_contents("../public/swagger.json"));
			$this->outputJSON();
		}
		else if(in_array($method, $this->availableMethods["v1"])) $this->{"v1_".$method}($extra);
		else redirect("./");
	}

	private function v1_tabela() {
		$this->allowedHTTPMethods = [ "GET" ];
		$people = null;

		for($n = 0; $n < rand(4, 10); $n++) {
			$people[$n]["nome"] = $this->DataGenerator->getPerson();
			$drink = $this->DataGenerator->getDrink();
			$colour = $this->DataGenerator->getColour();
			$car = $this->DataGenerator->getCar();

			if(!empty($drink)) $people[$n]["bebidaFavorita"] = $drink;
			if(!empty($colour)) $people[$n]["corFavorita"] = $colour;
			if(!empty($car)) $people[$n]["tipoDeCarro"] = $car;
		}

		if(!empty($people)) $this->result = $people;

		$this->httpStatusCode = 200;
		$this->outputJSON();
	}

	private function v1_formulario() {
		$this->allowedHTTPMethods = [ "GET" , "POST", "DELETE" ];
		$form = null;

		for($n = 0; $n < rand(4, 10); $n++) {
			$form[$n]["nome"] = "Campo ".($n + 1);
			$form[$n]["campo"] = $this->DataGenerator->getFieldType();
			if($form[$n]["campo"] == "select") {
				for($n2 = 0; $n2 < rand(4, 10); $n2++) {
					$form[$n]["valores"][$n2] = $this->DataGenerator->getPerson();
				}
			}
		}

		if(!empty($form)) $this->result = $form;

		$this->httpStatusCode = 200;
		$this->outputJSON();
	}

	function v1_arquivo($file = null) {
		$this->allowedHTTPMethods = [ "GET" ];

		// Carrega um helper de URL do CodeIgniter, que contém a função "force_download()"
		$this->load->helper("download");

		$path = "../public/$file";
		if(file_exists($path)) force_download($path, null);
	}
}
